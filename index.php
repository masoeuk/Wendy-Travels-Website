<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Wend Travels</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons 
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->
 <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Tour
  * Template URL: https://bootstrapmade.com/tour-bootstrap-travel-website-template/
  * Updated: Jul 01 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
  <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0" id="logo">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png">
        <!--<h1 class="sitename">Wendy Travels</h1>-->
      </a>

    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        
                <nav id="navmenu" class="navmenu">
                  <ul>
                    <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="destinations.html">Destinations</a></li>
                    <li><a href="tours.html">Tours</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="contact.html">Contact</a></li>
                  </ul>
                  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <a class="btn-getstarted" href="destinations.html">Book Now</a>
       

    </div>
  </header>

  <main class="main">

    <!-- Travel Hero Section -->
    <section id="travel-hero" class="travel-hero section dark-background">

      <div class="hero-background">
        <video autoplay muted loop playsinline>
          <source src="assets/img/travel/video-2.mp4" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>
      </div>


      <div class="container position-relative">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="hero-text" data-aos="fade-up" data-aos-delay="100">
              <h1 class="hero-title">Discover Your Perfect Journey</h1>
              <!--<p class="hero-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>-->
              <div class="hero-buttons">
                <a href="#featured-destinations" class="btn btn-primary me-3">Start Exploring</a>
                <a href="#featured-tours" class="btn btn-outline">Browse Tours</a>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="booking-form-wrapper" data-aos="fade-left" data-aos-delay="200">
              <div class="booking-form">
                <h3 class="form-title">Plan Your Adventure</h3>
                <form id="search-form" class="search-form" role="search" action="https://www.google.com/search" method="get" target="_blank">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Kenya, Dubai, family tours..." name="q" id="search-input" required>
                    <input type="hidden" name="q" value="site:wendytravels.co.za">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>
             
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Travel Hero Section -->

    <!-- Featured Destinations Section -->
    <?php
      $data = json_decode(file_get_contents('admin/data/destinations.json'), true);
      ?>

<section id="featured-destinations" class="featured-destinations section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <div class="description-title">
      <h1><strong><? $data['title'] ?></strong></h1>
      <p><? $data['description'] ?></p>
    </div>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <!-- Featured Destination -->
      <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="featured-destination">
          <div class="destination-overlay">
            <img src="<?= $data['featured']['image'] ?>" alt="<?= $data['featured']['title'] ?>" class="img-fluid">
            <div class="destination-info">
              <span class="destination-tag"><?= $data['featured']['tag'] ?></span>
              <h3><?= $data['featured']['title'] ?></h3>
              <p class="location"><i class="bi bi-geo-alt-fill"></i> <?= $data['featured']['location'] ?></p>
              <p class="description"><?= $data['featured']['description'] ?></p>
              <div class="destination-meta">
                <div class="tours-count">
                  <i class="bi bi-collection"></i>
                  <span><?= $data['featured']['packages'] ?></span>
                </div>
                <div class="rating">
                  <?php for ($i = 0; $i < 5; $i++): ?>
                    <i class="bi bi-star-fill"></i>
                  <?php endfor; ?>
                  <span><?= $data['featured']['rating'] ?> (<?= $data['featured']['reviews'] ?>)</span>
                </div>
              </div>
              <div class="price-info">
                <span class="starting-from">Starting from</span>
                <span class="amount"><?= $data['featured']['price'] ?></span>
              </div>
              <a href="destination-details.html" class="explore-btn">
                <span>Explore Now</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Compact Destinations -->
      <div class="col-lg-6">
        <div class="row g-3">
          <?php foreach ($data['compact'] as $index => $dest): ?>
            <div class="col-12" data-aos="fade-left" data-aos-delay="<?= 300 + ($index * 100) ?>">
              <div class="compact-destination">
                <div class="destination-image">
                  <img src="<?= $dest['image'] ?>" alt="<?= $dest['title'] ?>" class="img-fluid">
                  <?php if (!empty($dest['badge'])): ?>
                    <div class="badge-offer<?= strtolower($dest['badge']) === 'limited spots' ? ' limited' : '' ?>"><?= $dest['badge'] ?></div>
                  <?php endif; ?>
                </div>
                <div class="destination-details">
                  <h4><?= $dest['title'] ?></h4>
                  <p class="location"><i class="bi bi-geo-alt"></i> <?= $dest['location'] ?></p>
                  <p class="brief"><?= $dest['brief'] ?></p>
                  <div class="stats-row">
                    <span class="tour-count"><i class="bi bi-calendar-check"></i> <?= $dest['tours'] ?></span>
                    <span class="rating"><i class="bi bi-star-fill"></i> <b><?= $dest['rating'] ?></b></span>
                    <span class="price">from <?= $dest['price'] ?></span>
                  </div>
                  <a href="destination-details.html" class="quick-link">View Details <i class="bi bi-chevron-right"></i></a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
      
    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="hero-content" data-aos="zoom-in" data-aos-delay="200">
          <div class="content-wrapper">
            
           <h2>Explore the World with Wendy's Expert Guidance</h2>
                <p>With over 15 years of travel experience across 85 countries, I've perfected the art of crafting unforgettable journeys. My passion is helping travelers like you discover the world's hidden gems while avoiding the common pitfalls of international travel.</p>
           
            <div class="action-section">
              <div class="main-actions">
                <a href="destinations.html" class="btn btn-explore">
                  <i class="bi bi-compass"></i>
                  Explore Now
                </a>
               
              </div>

          
            </div>
          </div>

          <div class="visual-element">
             
          </div>
        </div>

      </div>
    </section><!-- /Featured Destinations Section -->

    <!-- Featured Tours Section -->
    <section id="featured-tours" class="featured-tours section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
       
        <div class="description-title"><h3><strong>Check Our Featured Tours <i class="bi bi-chevron-down"></i></strong> </h3></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="tour-card">
              <div class="tour-image">
                <img src="assets/img/travel/tour-1.webp" alt="Serene Beach Retreat" class="img-fluid" loading="lazy">
                <div class="tour-badge">Top Rated</div>
                <div class="tour-price">R2,150</div>
              </div>
              <div class="tour-content">
                <h4>Serene Beach Retreat</h4>
                <div class="tour-meta">
                  <span class="duration"><i class="bi bi-clock"></i> 8 Days</span>
                  <span class="group-size"><i class="bi bi-people"></i> Max 6</span>
                </div>
                <p>Mauris ipsum neque, cursus ac ipsum at, iaculis facilisis ligula. Suspendisse non sapien vel enim cursus semper.</p>
                <div class="tour-highlights">
                  <span>Maldives</span>
                  <span>Seychelles</span>
                  <span>Bora Bora</span>
                </div>
                <div class="tour-action">
                  <a href="booking.html" class="btn-book">Book Now</a>
                  <div class="tour-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <span>4.8 (95)</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Tour Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="tour-card">
              <div class="tour-image">
                <img src="assets/img/travel/tour-2.webp" alt="Arctic Expedition" class="img-fluid" loading="lazy">
                <div class="tour-badge limited">Only 3 Spots!</div>
                <div class="tour-price">R5,700</div>
              </div>
              <div class="tour-content">
                <h4>Arctic Wilderness Expedition</h4>
                <div class="tour-meta">
                  <span class="duration"><i class="bi bi-clock"></i> 10 Days</span>
                  <span class="group-size"><i class="bi bi-people"></i> Max 8</span>
                </div>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec dictum non massa nec fermentum.</p>
                <div class="tour-highlights">
                  <span>Greenland</span>
                  <span>Iceland</span>
                  <span>Norway</span>
                </div>
                <div class="tour-action">
                  <a href="booking.html" class="btn-book">Book Now</a>
                  <div class="tour-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <span>4.6 (55)</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Tour Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="tour-card">
              <div class="tour-image">
                <img src="assets/img/travel/tour-4.webp" alt="Desert Safari" class="img-fluid" loading="lazy">
                <div class="tour-badge new">Newly Added</div>
                <div class="tour-price">R1,400</div>
              </div>
              <div class="tour-content">
                <h4>Sahara Desert Discovery</h4>
                <div class="tour-meta">
                  <span class="duration"><i class="bi bi-clock"></i> 5 Days</span>
                  <span class="group-size"><i class="bi bi-people"></i> Max 10</span>
                </div>
                <p>Pellentesque euismod tincidunt turpis ac tristique. Phasellus vitae lacus in enim mollis facilisis vel quis ex. In hac habitasse platea dictumst.</p>
                <div class="tour-highlights">
                  <span>Morocco</span>
                  <span>Egypt</span>
                  <span>Dubai</span>
                </div>
                <div class="tour-action">
                  <a href="booking.html" class="btn-book">Book Now</a>
                  <div class="tour-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <span>4.9 (72)</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Tour Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="tour-card">
              <div class="tour-image">
                <img src="assets/img/travel/tour-5.webp" alt="Coastal Explorer" class="img-fluid" loading="lazy">
                <div class="tour-badge">Popular Choice</div>
                <div class="tour-price">R1,980</div>
              </div>
              <div class="tour-content">
                <h4>Mediterranean Coastal Cruise</h4>
                <div class="tour-meta">
                  <span class="duration"><i class="bi bi-clock"></i> 9 Days</span>
                  <span class="group-size"><i class="bi bi-people"></i> Max 15</span>
                </div>
                <p>Nullam lacinia justo eget ex sodales, vel finibus orci aliquet. Donec auctor, elit ut molestie gravida, magna mi molestie nisi.</p>
                <div class="tour-highlights">
                  <span>Greece</span>
                  <span>Croatia</span>
                  <span>Italy</span>
                </div>
                <div class="tour-action">
                  <a href="booking.html" class="btn-book">Book Now</a>
                  <div class="tour-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <span>4.7 (110)</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Tour Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="tour-card">
              <div class="tour-image">
                <img src="assets/img/travel/tour-6.webp" alt="Rainforest Trek" class="img-fluid" loading="lazy">
                <div class="tour-badge cultural">Eco-Friendly</div>
                <div class="tour-price">R2,650</div>
              </div>
              <div class="tour-content">
                <h4>Amazon Rainforest Trek</h4>
                <div class="tour-meta">
                  <span class="duration"><i class="bi bi-clock"></i> 12 Days</span>
                  <span class="group-size"><i class="bi bi-people"></i> Max 10</span>
                </div>
                <p>Quisque dictum felis eu tortor mollis, quis tincidunt arcu pharetra. A pellentesque sit amet, consectetur adipiscing elit.</p>
                <div class="tour-highlights">
                  <span>Brazil</span>
                  <span>Ecuador</span>
                  <span>Peru</span>
                </div>
                <div class="tour-action">
                  <a href="booking.html" class="btn-book">Book Now</a>
                  <div class="tour-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <span>4.5 (88)</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Tour Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="tour-card">
              <div class="tour-image">
                <img src="assets/img/travel/tour-8.webp" alt="Patagonian Peaks" class="img-fluid" loading="lazy">
                <div class="tour-badge adventure">Adventure Seekers</div>
                <div class="tour-price">R3,950</div>
              </div>
              <div class="tour-content">
                <h4>Patagonian Peaks &amp; Glaciers</h4>
                <div class="tour-meta">
                  <span class="duration"><i class="bi bi-clock"></i> 14 Days</span>
                  <span class="group-size"><i class="bi bi-people"></i> Max 10</span>
                </div>
                <p>Vivamus eget semper neque. Ut porttitor mi at odio egestas, non vestibulum est malesuada. Nunc facilisis in felis eget efficitur.</p>
                <div class="tour-highlights">
                  <span>Argentina</span>
                  <span>Chile</span>
                  <span>Ushuaia</span>
                </div>
                <div class="tour-action">
                  <a href="booking.html" class="btn-book">Book Now</a>
                  <div class="tour-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <span>4.9 (60)</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Tour Item -->

        </div>

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="500">
          <a href="tours.html" class="btn-view-all">View All Tours</a>
        </div>

      </div>

    


  </main>

  <footer id="footer" class="footer position-relative dark-background">

    <!--<div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>-->

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">WENDY TRAVELS</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Cedar Square, Cedar Rd</p>
            <p>Fourways, Johannesburg</p>
            <p>2068</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+27 78 233 0721 </span></p>
            <p><strong>Email:</strong> <span>info@wendytravels.co.za</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Destination</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
          </ul>
        </div>

        <!--<div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
          </ul>
        </div>-->

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Wendy Travels</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://itkaofela.co.za/">Binary Bit Technologies</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
   
   
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>