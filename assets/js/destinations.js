document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("destination-container");
  if (!container) return;

  fetch("/admin/data/destinations.json")
    .then((res) => {
      if (!res.ok) throw new Error("Failed to load destination data.");
      return res.json();
    })
    .then((data) => {
      data.forEach((dest) => {
        const item = document.createElement("div");
        item.className = `col-lg-4 col-md-6 destination-item isotope-item filter-${dest.category}`;

        const imgUrl = dest.image.startsWith("assets/")
          ? dest.image
          : `assets/img/travel/${dest.image}`;

        item.innerHTML = `
          <a href="destination-details.html?id=${dest.id}" class="destination-tile">
            <div class="tile-image">
              <img src="${imgUrl}" alt="${dest.title}" class="img-fluid" loading="lazy">
              <div class="overlay-content">
                <span class="destination-tag ${dest.tag_class}">${dest.tag}</span>
                <div class="destination-info">
                  <h4>${dest.title}</h4>
                  <p>${dest.description}</p>
                  <div class="destination-stats">
                    <span class="tours-available"><i class="bi bi-map"></i> ${dest.tours}</span>
                    <span class="starting-price">From ${dest.price}</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        `;

        container.appendChild(item);
      });

      // Wait for all images to load, then initialize Isotope
      imagesLoaded(container, () => {
        const iso = new Isotope(container, {
          itemSelector: ".destination-item",
          layoutMode: "masonry",
        });

        // Enable filter buttons
        document.querySelectorAll(".destination-filters li").forEach((filterBtn) => {
          filterBtn.addEventListener("click", function () {
            document.querySelector(".filter-active")?.classList.remove("filter-active");
            this.classList.add("filter-active");
            const filterValue = this.getAttribute("data-filter");
            iso.arrange({ filter: filterValue });
          });
        });

        // Optional: Reinitialize AOS if animations are used
        if (typeof AOS !== "undefined") {
          AOS.refresh();
        }
      });
    })
    .catch((err) => {
      console.error("Error loading destinations:", err);
      container.innerHTML = `<p class="alert alert-danger">Unable to load destinations. Please try again later.</p>`;
    });
});
