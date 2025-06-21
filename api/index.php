<?php
require_once dirname(__DIR__) . '/config/games.php';
$page_title = 'Beranda - ' . $site_config['site_name'];

$joki_list = [
    [
        'title' => 'Genshin Impact',
        'thumbnail' => 'assets/images/genshin/quest/char.jpg',
        'popup' => 'assets/images/genshin/listjoki.jpeg'
    ],
    [
        'title' => 'Wuthering Waves',
        'thumbnail' => 'assets/images/wuwa.jpg',
        'popup' => 'assets/images/genshin/listjoki.jpeg'
    ],
    [
        'title' => 'ZZZ',
        'thumbnail' => 'assets/images/zzz.jpg',
        'popup' => 'assets/images/genshin/listjoki.jpeg'
    ],
    [
        'title' => 'Honkai Star Rail',
        'thumbnail' => 'assets/images/hsr/story/Penacony.jpg',
        'popup' => 'assets/images/genshin/listjoki.jpeg'
    ]
];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $site_config['site_description']; ?>">
    
    <!-- Font Metal Mania -->
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            background-color: #0f1a2a;
            font-family: Arial, sans-serif;
        }

        .main-content {
            flex: 1;
        }

        .kisen-title {
            font-family: 'Metal Mania', cursive;
            font-size: 3rem;
            color: #ffc107;
            text-align: center;
            margin: 2rem 0 1rem 0;
            letter-spacing: 2px;
        }

        .vertical-link-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 1rem auto;
            max-width: 600px;
            padding: 0 1rem;
        }

        .vertical-link-list a {
            display: block;
            padding: 14px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .vertical-link-list a:nth-child(odd) {
            background-color: #ffc107;
            color: #000;
        }

        .vertical-link-list a:nth-child(even) {
            background-color: #1a1a1a;
            color: #fff;
        }

        .vertical-link-list a:hover {
            filter: brightness(1.1);
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-top: 2rem;
            color: #fff;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            padding: 1rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .image-item {
            text-align: center;
            background: #1a2b3c;
            border-radius: 8px;
            overflow: hidden;
        }

        .image-item img {
            width: 100%;
            cursor: pointer;
        }

        .image-item p {
            margin: 0;
            padding: 10px;
            color: #fff;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #141e30;
            color: #aaa;
            font-size: 0.9rem;
        }

        .image-modal-overlay {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            justify-content: center;
            align-items: center;
            padding: 15px;
        }

        .image-modal-overlay.active {
            display: flex;
        }

        .image-modal-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }

        .image-modal-content img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 8px;
        }

        .image-modal-close {
            position: absolute;
            top: 10px;
            right: 15px;
            background: red;
            color: white;
            border: none;
            font-size: 20px;
            padding: 5px 12px;
            cursor: pointer;
        }

        .image-modal-close-text {
            display: block;
            margin: 15px auto 0;
            padding: 10px 24px;
            background-color: #ffc107;
            color: #000;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }

        .image-modal-close-text:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    <?php include dirname(__DIR__) . '/includes/header.php'; ?>

    <main class="main-content">
        <h1 class="kisen-title">Kisen Joki</h1>

        <!-- Vertical Buttons -->
        <div class="vertical-link-list">
            <a href="<?php echo $site_config['contact']['saweria']; ?>" target="_blank">💝 Dukung via Saweria</a>
            <a href="https://wavestore.id/" target="_blank">Wave Store ID</a>
            <a href="https://discord.com/invite/PxtScDTj4Y" target="_blank">DC KISENITY</a>
            <a href="https://www.youtube.com/channel/UCCjq8-CDPkODruPjlVk2MBg" target="_blank">YOUTUBE KIRITO SENPAI</a>
            <a href="https://twitter.com/kisenjoki" target="_blank">Twitter KISEN JOKI</a>
        </div>

        <h2 class="section-title">List Joki</h2>
        <div class="image-grid">
            <?php foreach ($joki_list as $item): ?>
                <div class="image-item">
                    <img src="<?php echo $item['thumbnail']; ?>" alt="<?php echo $item['title']; ?>"
                         data-popup="<?php echo $item['popup']; ?>">
                    <p><?php echo $item['title']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Modal -->
        <div class="image-modal-overlay" id="imageModal">
            <div class="image-modal-content">
                <button class="image-modal-close" onclick="closeImageModal()">×</button>
                <img id="modalImage" src="" alt="Preview Besar">
                <button class="image-modal-close-text" onclick="closeImageModal()">Close</button>
            </div>
        </div>
    </main>

    <footer>
        © <?php echo date("Y"); ?> Joki Kisen. All Rights Reserved.
    </footer>

    <script>
        document.querySelectorAll('.image-grid .image-item img').forEach(img => {
            img.addEventListener('click', () => {
                const modal = document.getElementById('imageModal');
                const modalImg = document.getElementById('modalImage');
                modalImg.src = img.getAttribute('data-popup');
                modal.classList.add('active');
            });
        });

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            modal.classList.remove('active');
            modalImg.src = '';
        }

        document.getElementById('imageModal').addEventListener('click', (e) => {
            if (e.target.id === 'imageModal') {
                closeImageModal();
            }
        });
    </script>
</body>
</html>
