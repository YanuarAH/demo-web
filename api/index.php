<?php
require_once dirname(__DIR__) . '/config/games.php';
$page_title = 'Beranda - ' . $site_config['site_name'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <meta name="description" content="<?= $site_config['site_description'] ?>">

    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

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
            padding: 1rem;
            text-align: center;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ffc107;
            margin: 2rem auto 1rem;
        }

        .kisen-title {
            font-family: 'Metal Mania', cursive;
            font-size: 2.5rem;
            color: #ffc107;
            margin-bottom: 2rem;
        }

        .vertical-link-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-width: 400px;
            margin: 0 auto;
        }

        .vertical-link-list a,
        .vertical-link-list button {
            padding: 12px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .vertical-link-list a:nth-child(odd):not(.button-image-bg),
        .vertical-link-list button:nth-child(odd):not(.button-image-bg) {
            background-color: #ffc107;
            color: #000;
        }

        .vertical-link-list a:nth-child(even):not(.button-image-bg),
        .vertical-link-list button:nth-child(even):not(.button-image-bg) {
            background-color: #1a1a1a;
            color: #fff;
        }

        .button-image-bg {
            position: relative;
            background-color: #000;
            color: white;
            font-weight: bold;
            padding: 12px 24px;
            border-radius: 6px;
            text-align: center;
            text-decoration: none;
            border: none;
            overflow: hidden;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
            box-sizing: border-box;
        }

        .button-image-bg::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-image: url('assets/images/bg-button.jpg'); /* <- Ganti jika beda nama file */
            background-size: cover;
            background-position: center;
            opacity: 0.25;
            z-index: 0;
        }

        .button-image-bg span {
            position: relative;
            z-index: 1;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            padding: 15px;
            box-sizing: border-box;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-content {
            max-width: 100%;
            max-height: 90vh;
            background-color: #fff;
            border-radius: 8px;
            position: relative;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 15px;
            box-sizing: border-box;
        }

        .modal-content img {
            width: 100%;
            height: auto;
            display: block;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 15px;
            background: #ffc107;
            border: none;
            font-weight: bold;
            font-size: 16px;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        footer {
            background-color: #0a1320;
            color: #aaa;
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
        }

        @media (max-width: 600px) {
            .modal-content {
                max-height: 80vh;
            }
        }
    </style>
</head>

<body>
<?php include dirname(__DIR__) . '/includes/header.php'; ?>

<main class="main-content">
    <img src="assets/images/profile.png" alt="Foto Profil" class="profile-pic">
    <h1 class="kisen-title">Kisen Joki</h1>

    <div class="vertical-link-list">
        <a href="https://discord.com/invite/PxtScDTj4Y" target="_blank">Discord</a>

        <a href="<?= $site_config['contact']['saweria']; ?>" target="_blank" class="button-image-bg">
            <span>Saweria</span>
        </a>

        <a href="https://wa.me/6281234567890" target="_blank">WhatsApp</a>

        <button class="button-image-bg" onclick="openModal()">
            <span>Price List</span>
        </button>
    </div>
</main>

<!-- Modal Pop-up -->
<div class="modal-overlay" id="modalPopup">
    <button class="modal-close" onclick="closeModal()">Close</button>
    <div class="modal-content">
        <img src="assets/images/genshin/listjoki.jpeg" alt="Daftar Harga">
    </div>
</div>

<footer>
    © <?= date('Y'); ?> Joki Kisen. All Rights Reserved.
</footer>

<script>
    function openModal() {
        document.getElementById('modalPopup').classList.add('active');
    }

    function closeModal() {
        document.getElementById('modalPopup').classList.remove('active');
    }
</script>

</body>
</html>
