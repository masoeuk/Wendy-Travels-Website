<?php
session_start();
// Add your admin login check here if needed
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Manage Destinations - Wendy Travels Admin</title>

<style>
  :root {
    --admin-background: #f2f8f9;
    --admin-surface: #ffffff;
    --admin-text: #000000;
    --admin-heading: #000000;
    --admin-accent: #ff8a00;
    --admin-alert: #dc3545;
    --admin-success: #28a745;
    --admin-border: rgba(0, 0, 0, 0.1);
    --admin-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    --surface-color: #ffffff;
  }

  body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: var(--admin-background);
    color: var(--admin-text);
    margin: 0;
    padding: 0;
  }

  /* Header + Nav */
  header {
    background-color: #f8f9fa;
    padding: 1rem 2rem;
    box-shadow: var(--admin-shadow);
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 999;
  }
  header h1 {
    margin: 0;
    font-size: 1.5rem;
    color: var(--admin-heading);
  }
  nav a {
    color: var(--admin-text);
    text-decoration: none;
    margin-left: 1.25rem;
    font-weight: 500;
    transition: color 0.3s ease;
  }
  nav a:hover {
    color: var(--admin-accent);
  }

  /* Container */
  .admin-container {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 1rem;
  }

  h1.page-title {
    text-align: center;
    margin-bottom: 2rem;
  }

  .destination-list {
    max-width: 1000px;
    margin: 2rem auto;
  }

  .destination-item {
    border: 1px solid #ddd;
    background: var(--admin-surface);
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 6px;
    display: flex;
    gap: 1rem;
    align-items: center;
  }

  .destination-item img {
    max-width: 120px;
    border-radius: 5px;
  }

  .destination-details {
    flex-grow: 1;
  }

  .destination-actions button {
    margin-right: 0.5rem;
    padding: 0.3rem 0.6rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .destination-actions .edit-btn {
    background-color: var(--admin-accent);
    color: white;
  }

  .destination-actions .delete-btn {
    background-color: var(--admin-alert);
    color: white;
  }

  form label {
    display: block;
    margin-top: 0.5rem;
    font-weight: bold;
  }

  form input, form select, form textarea {
    width: 100%;
    padding: 0.3rem;
    margin-top: 0.2rem;
    border: 1px solid var(--admin-border);
    border-radius: 4px;
    box-sizing: border-box;
  }

  form textarea {
    resize: vertical;
  }

  #add-form {
    max-width: 600px;
    margin: 2rem auto;
    background: var(--admin-surface);
    padding: 1rem 2rem;
    border-radius: 8px;
    box-shadow: 0 0 10px #ccc;
  }

  #add-form h2 {
    margin-top: 0;
    margin-bottom: 1rem;
  }

  /* Editable input styles */
  .edit-input {
    width: 100%;
    padding: 0.3rem;
    margin-bottom: 0.3rem;
    border-radius: 4px;
    border: 1px solid var(--admin-border);
    box-sizing: border-box;
  }

  .edit-image-input {
    margin-bottom: 0.3rem;
  }

  /* Save/Cancel buttons style */
  .destination-actions button {
    min-width: 70px;
  }
</style>
</head>
<body>

<header>
  <h1>Wendy Travels Admin</h1>
  <nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="destinations.php">Destinations</a>
    <a href="tours.php">Tours</a>
    <a href="gallery.php">Gallery</a>
    <a href="testimonials.php">Testimonials</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>

<div class="admin-container">
  <h1 class="page-title">Manage Destinations</h1>

  <div id="destination-list" class="destination-list">
    <!-- Destinations loaded here -->
  </div>

  <hr />

  <form id="add-form" enctype="multipart/form-data">
    <h2>Add New Destination</h2>
    <label>Title <input type="text" name="title" required></label>
    <label>Description <textarea name="description" rows="3" required></textarea></label>
    <label>Category 
      <select name="category" required>
        <option value="coastal">Coastal</option>
        <option value="historical">Historical</option>
        <option value="mountain">Mountain</option>
        <option value="tropical">Tropical</option>
        <option value="urban">Urban</option>
      </select>
    </label>
    <label>Tag <input type="text" name="tag" required></label>
    <label>Tag Class <input type="text" name="tag_class" required></label>
    <label>Tours <input type="text" name="tours" required></label>
    <label>Starting Price <input type="text" name="price" required></label>
    <label>Image <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" required></label>
    <button type="submit" style="margin-top:1rem; padding: 0.5rem 1rem; background: var(--admin-accent); color: #fff; border: none; border-radius: 5px; cursor: pointer;">Add Destination</button>
  </form>
</div>

<script>
const destList = document.getElementById('destination-list');
const addForm = document.getElementById('add-form');

function createDestinationCard(dest) {
  const div = document.createElement('div');
  div.className = 'destination-item';
  div.dataset.id = dest.id;
  div.innerHTML = `
    <img src="${dest.image}" alt="${dest.title}" />
    <div class="destination-details">
      <strong>Title:</strong> <span class="title">${dest.title}</span><br/>
      <strong>Description:</strong> <span class="description">${dest.description}</span><br/>
      <strong>Category:</strong> <span class="category">${dest.category}</span><br/>
      <strong>Tag:</strong> <span class="tag">${dest.tag}</span><br/>
      <strong>Tag Class:</strong> <span class="tag_class">${dest.tag_class}</span><br/>
      <strong>Tours:</strong> <span class="tours">${dest.tours}</span><br/>
      <strong>Price:</strong> <span class="price">${dest.price}</span><br/>
    </div>
    <div class="destination-actions">
      <button class="edit-btn">Edit</button>
      <button class="delete-btn">Delete</button>
    </div>
  `;
  return div;
}

async function loadDestinations() {
  const res = await fetch('api/destinations.php?action=list');
  const data = await res.json();
  destList.innerHTML = '';
  data.forEach(dest => {
    destList.appendChild(createDestinationCard(dest));
  });
  addListeners();
}

function addListeners() {
  document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.onclick = handleEdit;
  });
  document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.onclick = handleDelete;
  });
}

async function handleDelete(e) {
  if (!confirm('Are you sure you want to delete this destination?')) return;
  const id = e.target.closest('.destination-item').dataset.id;
  const res = await fetch('api/destinations.php?action=delete&id=' + id, { method: 'POST' });
  const result = await res.json();
  if (result.success) {
    alert('Deleted successfully.');
    loadDestinations();
  } else {
    alert('Delete failed: ' + result.error);
  }
}

function handleEdit(e) {
  const card = e.target.closest('.destination-item');
  if (card.querySelector('input,textarea,select')) return; // Already editing

  const fields = ['title','description','category','tag','tag_class','tours','price'];
  fields.forEach(field => {
    const span = card.querySelector('.' + field);
    let input;
    if (field === 'description') {
      input = document.createElement('textarea');
      input.rows = 3;
      input.value = span.textContent;
    } else if (field === 'category') {
      input = document.createElement('select');
      ['coastal','historical','mountain','tropical','urban'].forEach(cat => {
        const option = document.createElement('option');
        option.value = cat;
        option.textContent = cat.charAt(0).toUpperCase() + cat.slice(1);
        if (cat === span.textContent.toLowerCase()) option.selected = true;
        input.appendChild(option);
      });
    } else {
      input = document.createElement('input');
      input.type = 'text';
      input.value = span.textContent;
    }
    input.className = 'edit-input';
    span.replaceWith(input);
  });

  const img = card.querySelector('img');
  const fileInput = document.createElement('input');
  fileInput.type = 'file';
  fileInput.accept = '.jpg,.jpeg,.png,.webp';
  fileInput.className = 'edit-image-input';
  img.replaceWith(fileInput);

  const actions = card.querySelector('.destination-actions');
  actions.innerHTML = '';
  const saveBtn = document.createElement('button');
  saveBtn.textContent = 'Save';
  saveBtn.style.backgroundColor = 'var(--admin-success)';
  saveBtn.style.color = '#fff';
  saveBtn.onclick = () => saveEdit(card);
  const cancelBtn = document.createElement('button');
  cancelBtn.textContent = 'Cancel';
  cancelBtn.style.backgroundColor = 'var(--admin-alert)';
  cancelBtn.style.color = '#fff';
  cancelBtn.onclick = () => loadDestinations();
  actions.appendChild(saveBtn);
  actions.appendChild(cancelBtn);
}

async function saveEdit(card) {
  const id = card.dataset.id;
  const inputs = card.querySelectorAll('.edit-input, .edit-image-input');
  const formData = new FormData();
  formData.append('id', id);
  formData.append('title', inputs[0].value);
  formData.append('description', inputs[1].value);
  formData.append('category', inputs[2].value);
  formData.append('tag', inputs[3].value);
  formData.append('tag_class', inputs[4].value);
  formData.append('tours', inputs[5].value);
  formData.append('price', inputs[6].value);

  if (inputs[7] && inputs[7].type === 'file' && inputs[7].files.length > 0) {
    formData.append('image', inputs[7].files[0]);
  }

  const res = await fetch('api/destinations.php?action=edit', {
    method: 'POST',
    body: formData
  });
  const result = await res.json();
  if (result.success) {
    alert('Saved successfully.');
    loadDestinations();
  } else {
    alert('Save failed: ' + result.error);
  }
}

addForm.addEventListener('submit', async e => {
  e.preventDefault();
  const formData = new FormData(addForm);
  const res = await fetch('api/destinations.php?action=add', {
    method: 'POST',
    body: formData
  });
  const result = await res.json();
  if (result.success) {
    alert('Destination added!');
    addForm.reset();
    loadDestinations();
  } else {
    alert('Failed to add: ' + result.error);
  }
});

loadDestinations();
</script>

</body>
</html>
