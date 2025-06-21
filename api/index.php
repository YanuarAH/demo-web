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
    <title><?= $page_title ?></title>
    <meta name="description" content="<?= $site_config['site_description'] ?>">
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('assets/images/hsr/bg-ff.png') no-repeat center center fixed;
            background-size: cover;
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

        .vertical-link-list a:nth-child(odd):not(.button-image-bg) {
            background-color: #ffc107;
            color: #000;
        }

        .vertical-link-list a:nth-child(even):not(.button-image-bg) {
            background-color: #1a1a1a;
            color: #fff;
        }

        .button-image-bg {
            position: relative;
            background-color: #000;
            color: white;
            font-weight: bold;
            padding: 14px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            border: none;
            overflow: hidden;
            cursor: pointer;
            transition: 0.3s;
        }

        .button-image-bg::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-image: url('assets/images/hsr/bg-ff.png');
            background-size: cover;
            background-position: center;
            opacity: 0.25;
            z-index: 0;
        }

        .button-image-bg span {
            position: relative;
            z-index: 1;
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
            background: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
            padding: 15px;
            box-sizing: border-box;
            z-index: 1000;
        }

        .image-modal-overlay.active {
            display: flex;
        }

        .image-modal-content {
            position: relative;
            max-width: 100%;
            max-height: 100%;
            width: 100%;
        }

        .image-modal-content img {
            max-width: 100%;
            max-height: calc(100vh - 30px);
            object-fit: contain;
            border-radius: 10px;
            display: block;
            margin: auto;
        }

        .image-modal-close {
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
            z-index: 9999;
        }

        @media (max-width: 600px) {
            .image-modal-content img {
                max-height: 80vh;
            }

            .image-modal-close {
                width: 28px;
                height: 28px;
                font-size: 1.2rem;
                top: 5px;
                right: 5px;
            }
        }
    </style>
</head>
<body>

<?php include dirname(__DIR__) . '/includes/header.php'; ?>

<main class="main-content">
    <h1 class="kisen-title">Kisen Joki</h1>

    <!-- Carousel Section -->
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

    <!-- Vertical Buttons -->
    <div class="vertical-link-list">
        <a href="<?= $site_config['contact']['saweria']; ?>" target="_blank" class="button-image-bg"><span>💝 Dukung via Saweria</span></a>
        <a href="https://wavestore.id/" target="_blank">Wave Store ID</a>
        <a href="https://discord.com/invite/PxtScDTj4Y" target="_blank">DC KISENITY</a>
        <a href="https://www.youtube.com/channel/UCCjq8-CDPkODruPjlVk2MBg" target="_blank">YOUTUBE KIRITO SENPAI</a>
        <a href="#" class="button-image-bg" onclick="openImageModal('assets/images/genshin/listjoki.jpeg')"><span>LIST JOKI</span></a>
    </div>
</main>

<!-- Modal -->
<div class="image-modal-overlay" id="imageModal">
    <div class="image-modal-content">
        <button class="image-modal-close" onclick="closeImageModal()">×</button>
        <img id="modalImage" src="" alt="Preview Gambar">
    </div>
</div>

<footer>
    © <?= date('Y'); ?> Joki Kisen. All Rights Reserved.
</footer>

<script>
    function openImageModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModal').classList.add('active');
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.remove('active');
        document.getElementById('modalImage').src = '';
    }

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
</script>

</body>
</html>
