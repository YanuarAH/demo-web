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

    <!-- Font Metal Mania -->
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
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
        }

        .kisen-title {
            font-family: 'Metal Mania', cursive;
            font-size: 3rem;
            text-align: center;
            margin-top: 1.5rem;
            color: #ffc107;
        }

        .carousel-section {
            padding: 2rem 1rem;
        }

        .carousel-container {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }

        .carousel-wrapper {
            display: flex;
            overflow: hidden;
            border-radius: 10px;
        }

        .carousel-slide {
            flex: 0 0 100%;
            display: none;
        }

        .carousel-slide.active {
            display: block;
        }

        .carousel-slide img {
            width: 100%;
            border-radius: 10px;
        }

        .carousel-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .carousel-btn {
            background: rgba(0,0,0,0.5);
            color: #fff;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            padding: 0.2rem 1rem;
        }

        .carousel-indicators {
            text-align: center;
            margin-top: 0.5rem;
        }

        .indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            background: #666;
            border-radius: 50%;
            margin: 0 4px;
            cursor: pointer;
        }

        .indicator.active {
            background: #ffc107;
        }

        .vertical-link-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 2rem auto;
            max-width: 600px;
            padding: 0 1rem;
        }

        .vertical-link-list a {
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

        .section-title {
            text-align: center;
            font-size: 2rem;
            color: #fff;
        }

        footer {
            background-color: #0a1320;
            color: #aaa;
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
        }

        .image-modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .image-modal-overlay.active {
            display: flex;
        }

        .image-modal-content {
            max-width: 90%;
            max-height: 90%;
            position: relative;
        }

        .image-modal-content img {
            max-width: 100%;
            border-radius: 10px;
        }

        .image-modal-close {
            position: absolute;
            top: -10px;
            right: -10px;
            background: #ffc107;
            border: none;
            padding: 6px 10px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 50%;
        }
    </style>
</head>

<body>
<?php include dirname(__DIR__) . '/includes/header.php'; ?>

<main class="main-content">
    <h1 class="kisen-title">Kisen Joki</h1>

    <!-- Carousel -->
    <section class="carousel-section">
        <div class="carousel-container">
            <div class="carousel-wrapper" id="carouselSlides">
                <div class="carousel-slide active"><img src="assets/images/carousel/c1.jpg" alt="Slide 1"></div>
                <div class="carousel-slide"><img src="assets/images/carousel/c2.jpg" alt="Slide 2"></div>
                <div class="carousel-slide"><img src="assets/images/carousel/c3.jpg" alt="Slide 3"></div>
                <div class="carousel-slide"><img src="assets/images/carousel/c4.jpg" alt="Slide 4"></div>
            </div>
            <div class="carousel-nav">
                <button class="carousel-btn prev" onclick="prevSlide()">‹</button>
                <button class="carousel-btn next" onclick="nextSlide()">›</button>
            </div>
            <div class="carousel-indicators" id="carouselIndicators">
                <button class="indicator active" onclick="goToSlide(0)"></button>
                <button class="indicator" onclick="goToSlide(1)"></button>
                <button class="indicator" onclick="goToSlide(2)"></button>
                <button class="indicator" onclick="goToSlide(3)"></button>
            </div>
        </div>
    </section>

    <!-- Vertical Button Links -->
    <div class="vertical-link-list">
        <a href="<?= $site_config['contact']['saweria']; ?>" target="_blank">💝 Dukung via Saweria</a>
        <a href="https://wavestore.id/" target="_blank">Wave Store ID</a>
        <a href="https://discord.com/invite/PxtScDTj4Y" target="_blank">DC KISENITY</a>
        <a href="https://www.youtube.com/channel/UCCjq8-CDPkODruPjlVk2MBg" target="_blank">YOUTUBE KIRITO SENPAI</a>
        <a href="#" onclick="showPopup(event)">List Joki</a>
    </div>

    <!-- Modal Popup Image -->
    <div class="image-modal-overlay" id="imageModal">
        <div class="image-modal-content">
            <button class="image-modal-close" onclick="closeImageModal()">×</button>
            <img id="modalImage" src="assets/images/genshin/listjoki.jpeg" alt="List Joki">
        </div>
    </div>
</main>

<footer>
    © <?= date('Y'); ?> Joki Kisen. All Rights Reserved.
</footer>

<!-- JS -->
<script>
    // Carousel
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.indicator');

    function showSlide(index) {
        slides.forEach((s, i) => {
            s.classList.toggle('active', i === index);
            indicators[i].classList.toggle('active', i === index);
        });
        currentSlide = index;
    }

    function nextSlide() {
        showSlide((currentSlide + 1) % slides.length);
    }

    function prevSlide() {
        showSlide((currentSlide - 1 + slides.length) % slides.length);
    }

    function goToSlide(index) {
        showSlide(index);
    }

    setInterval(nextSlide, 4000);

    // Modal PopUp
    function showPopup(e) {
        e.preventDefault();
        document.getElementById('imageModal').classList.add('active');
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.remove('active');
        document.getElementById('modalImage').src = 'assets/images/genshin/listjoki.jpeg';
    }
</script>
</body>
</html>
