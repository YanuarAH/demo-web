<?php
require_once dirname(__DIR__) . '/config/games.php';
$page_title = 'Beranda - ' . $site_config['site_name'];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $site_config['site_description']; ?>">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .linktree-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .linktree-card {
            position: relative;
            overflow: hidden;
            background-color: #1e2a3a;
            color: white;
            text-align: center;
            padding: 1rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s, color 0.3s;
            cursor: pointer;
        }

        .linktree-card:hover {
            background-color: #ffc107;
            color: #000;
        }

        .linktree-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -75%;
            width: 50%;
            height: 100%;
            background: linear-gradient(120deg,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.5) 50%,
                    rgba(255, 255, 255, 0) 100%);
            transform: skewX(-20deg);
            animation: glossy-slide 3s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes glossy-slide {
            0% {
                left: -75%;
            }

            100% {
                left: 125%;
            }
        }

        .linktree-card:focus,
        .linktree-card:active {
            background-color: inherit;
            color: inherit;
            outline: none;
            box-shadow: none;
        }


        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 999;
            justify-content: center;
            align-items: center;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-content {
            background: #111;
            padding: 20px 20px 40px 20px;
            border-radius: 10px;
            max-width: 90%;
            max-height: 90%;
            overflow: auto;
            position: relative;
        }

        .modal-content img {
            width: 100%;
            height: auto;
            border-radius: 6px;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 15px;
            background: red;
            color: white;
            border: none;
            padding: 6px 10px;
            cursor: pointer;
            font-weight: bold;
        }

        .linktree-card--yellow {
            background-color: #ffc107;
            color: #000;
        }

        .linktree-card--yellow:hover {
            background-color: #e0a800;
            color: #000;
        }
    </style>
</head>

<body>
    <?php include dirname(__DIR__) . '/includes/header.php'; ?>

    <main class="main-content">

        <!-- Carousel Section -->
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

                    <div class="carousel-nav">
                        <button class="carousel-btn prev" onclick="prevSlide()" aria-label="Previous slide">‹</button>
                        <button class="carousel-btn next" onclick="nextSlide()" aria-label="Next slide">›</button>
                    </div>

                    <div class="carousel-indicators">
                        <button class="indicator active" onclick="goToSlide(0)" aria-label="Go to slide 1"></button>
                        <button class="indicator" onclick="goToSlide(1)" aria-label="Go to slide 2"></button>
                        <button class="indicator" onclick="goToSlide(2)" aria-label="Go to slide 3"></button>
                        <button class="indicator" onclick="goToSlide(3)" aria-label="Go to slide 4"></button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Saweria Support Section -->
        <section class="saweria-section">
            <div class="container">
                <div class="saweria-banner">
                    <div class="saweria-content">
                        <div class="saweria-icon">💰</div>
                        <div class="saweria-text">
                            <h3 class="saweria-title">Dukung Kami via Saweria</h3>
                            <p class="saweria-subtitle">Bantu kami memberikan layanan yang lebih baik</p>
                        </div>
                    </div>
                    <div class="saweria-action">
                        <a href="<?php echo $site_config['contact']['saweria']; ?>"
                            target="_blank" class="btn-saweria">
                            <span class="btn-icon">💝</span>
                            <span class="btn-text">Support Saweria</span>
                            <span class="btn-arrow">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Linktree Section -->
        <section class="linktree-section">
            <div class="container">
                <h2 class="section-title">Temukan Kami</h2>
                <div class="linktree-grid">
                    <a href="https://wavestore.id/" target="_blank" class="linktree-card">Wave Store ID</a>
                    <a href="https://discord.com/invite/PxtScDTj4Y" target="_blank" class="linktree-card linktree-card--yellow">DC KISENITY</a>
                    <a href="https://www.youtube.com/channel/UCCjq8-CDPkODruPjlVk2MBg" target="_blank" class="linktree-card">YOUTUBE KIRITO SENPAI</a>
                    <a href="https://twitter.com/kisenjoki" target="_blank" class="linktree-card linktree-card--yellow">Twitter KISEN JOKI</a>
                    <button onclick="openModal()" class="linktree-card">SPEK PC KISEN</button>
                </div>
            </div>
        </section>

        <!-- Modal SPEK PC -->
        <div class="modal-overlay" id="spekModal">
            <div class="modal-content">
                <button class="modal-close" onclick="closeModal()">X</button>
                <img src="assets/images/hsr/SPEK PC KISEN.png" alt="Spek PC Kisen">
            </div>
        </div>

        <!-- Games Grid -->
        <section class="games-section">
            <div class="container">
                <h2 class="section-title">All Konten</h2>
                <div class="games-grid">
                    <?php foreach ($games as $game_id => $game): ?>
                        <a href="games/<?php echo $game_id; ?>" class="game-card">
                            <div class="game-image">
                                <img src="<?php echo $game['image']; ?>" alt="<?php echo $game['title']; ?>"
                                    onerror="this.src='assets/images/placeholder.jpg'">
                            </div>
                            <div class="game-title"><?php echo $game['title']; ?></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include dirname(__DIR__) . '/includes/footer.php'; ?>

    <script src="assets/js/script.js"></script>
    <script>
        function openModal() {
            document.getElementById('spekModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('spekModal').classList.remove('active');
        }
    </script>
</body>

</html>