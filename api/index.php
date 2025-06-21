<?php
require_once dirname(__DIR__) . '/config/games.php';
$page_title = 'Beranda - ' . $site_config['site_name'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $page_title ?></title>
  <meta name="description" content="<?= $site_config['site_description'] ?>" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #0f1a2a;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .main-content {
      flex: 1;
      text-align: center;
      padding: 1rem;
    }

    .profile-image {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin: 1rem auto;
      display: block;
      border: 4px solid #ffc107;
    }

    .kisen-title {
      font-family: 'Metal Mania', cursive;
      font-size: 2.5rem;
      color: #ffc107;
      margin-bottom: 1.5rem;
    }

    .vertical-buttons {
      display: flex;
      flex-direction: column;
      gap: 12px;
      max-width: 300px;
      margin: 0 auto;
    }

    .vertical-buttons a,
    .vertical-buttons button {
      padding: 12px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .vertical-buttons a:nth-child(odd),
    .vertical-buttons button:nth-child(odd) {
      background-color: #ffc107;
      color: #000;
    }

    .vertical-buttons a:nth-child(even),
    .vertical-buttons button:nth-child(even) {
      background-color: #1a1a1a;
      color: #fff;
    }

    /* Modal styles */
    .modal-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      padding: 15px;
      background: rgba(0, 0, 0, 0.85);
      justify-content: center;
      align-items: center;
      z-index: 9999;
      box-sizing: border-box;
    }

    .modal-overlay.active {
      display: flex;
    }

    .modal-content {
      max-width: 100%;
      max-height: 100%;
      position: relative;
    }

    .modal-content img {
      max-width: 100%;
      max-height: 90vh;
      border-radius: 10px;
      display: block;
      margin: auto;
      object-fit: contain;
    }

    .modal-close {
      position: absolute;
      top: 10px;
      right: 10px;
      background: #ffc107;
      color: black;
      font-size: 1.5rem;
      font-weight: bold;
      border: none;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      cursor: pointer;
    }

    footer {
      background-color: #0a1320;
      color: #aaa;
      text-align: center;
      padding: 1rem;
      font-size: 0.9rem;
    }

    @media (max-width: 480px) {
      .kisen-title {
        font-size: 2rem;
      }

      .profile-image {
        width: 100px;
        height: 100px;
      }
    }
  </style>
</head>

<body>
  <?php include dirname(__DIR__) . '/includes/header.php'; ?>

  <main class="main-content">
    <img src="assets/images/profile.jpg" alt="Profile" class="profile-image" />
    <h1 class="kisen-title">KISEN JOKI</h1>

    <div class="vertical-buttons">
      <a href="https://discord.com/invite/PxtScDTj4Y" target="_blank">Discord</a>
      <a href="<?= $site_config['contact']['saweria']; ?>" target="_blank">Saweria</a>
      <a href="https://wa.me/6281234567890" target="_blank">WhatsApp</a>
      <button onclick="openModal()">Price List</button>
    </div>
  </main>

  <footer>
    © <?= date('Y'); ?> Joki Kisen. All Rights Reserved.
  </footer>

  <!-- Modal HTML -->
  <div class="modal-overlay" id="imageModal">
    <div class="modal-content">
      <button class="modal-close" onclick="closeModal()">×</button>
      <img src="assets/images/genshin/listjoki.jpeg" alt="Price List">
    </div>
  </div>

  <script>
    function openModal() {
      document.getElementById('imageModal').classList.add('active');
    }

    function closeModal() {
      document.getElementById('imageModal').classList.remove('active');
    }
  </script>
</body>

</html>
