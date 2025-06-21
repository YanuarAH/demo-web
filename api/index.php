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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style60.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            background-color: #0f1a2a;
        }

        .main-content {
            flex: 1;
        }

        .vertical-link-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin: 20px 0;
        }

        .vertical-link-list a {
            display: block;
            text-align: center;
            padding: 14px;
            font-weight: bold;
            border-radius: 8px;
            background-color: #ffc107;
            color: #000;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .vertical-link-list a:hover {
            background-color: #e0a800;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            padding: 1rem;
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
            border-bottom: 1px solid #333;
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
            z-index: 10000;
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
            transition: background-color 0.3s ease;
        }

        .image-modal-close-text:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    <?php include dirname(__DIR__) . '/includes/header.php'; ?>

    <main class="main-content">
        <h1 class="section-title" style="text-align: center; margin-top: 1rem;">Kisen Joki</h1>

        <!-- Carousel -->
        <section class="carousel-section">
            <div class="container">
                <div class="carousel-container">
                    <div class="carousel-wrapper">
                        <div class="carousel-slide active">
                            <img src="assets/images/carousel/c1.jpg" alt="Slide 1">
                        </div>
                        <div class="carousel-slide">
                            <img src="assets/images/carousel/c2.jpg" alt="Slide 2">
                        </div>
                        <div class="carousel-slide">
                            <img src="assets/images/carousel/c3.jpg" alt="Slide 3">
                        </div>
                        <div class="carousel-slide">
                            <img src="assets/images/carousel/c4.jpg" alt="Slide 4">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Vertical Links -->
        <section class="linktree-section">
            <div class="container">
                <div class="vertical-link-list">
                    <a href="<?php echo $site_config['contact']['saweria']; ?>" target="_blank">💝 Dukung via Saweria</a>
                    <a href="https://wavestore.id/" target="_blank">Wave Store ID</a>
                    <a href="https://discord.com/invite/PxtScDTj4Y" target="_blank">DC KISENITY</a>
                    <a href="https://www.youtube.com/channel/UCCjq8-CDPkODruPjlVk2MBg" target="_blank">YOUTUBE KIRITO SENPAI</a>
                    <a href="https://twitter.com/kisenjoki" target="_blank">Twitter KISEN JOKI</a>
                </div>
            </div>
        </section>

        <!-- List Joki -->
        <h2 class="section-title" style="text-align: center;">List Joki</h2>
        <section class="image-grid-section">
            <div class="image-grid">
                <?php foreach ($joki_list as $item): ?>
                    <div class="image-item">
                        <img src="<?php echo $item['thumbnail']; ?>" alt="<?php echo $item['title']; ?>"
                             data-popup="<?php echo $item['popup']; ?>">
                        <p><?php echo $item['title']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Modal Popup -->
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

    <script src="assets/js/script.js"></script>
    <script>
        // Modal image logic
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

        // Close modal on background click
        document.getElementById('imageModal').addEventListener('click', (e) => {
            if (e.target.id === 'imageModal') {
                closeImageModal();
            }
        });
    </script>
</body>

</html>
