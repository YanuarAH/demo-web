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
    <link rel="stylesheet" href="assets/css/style60.css">
    <link rel="stylesheet" href="assets/css/style35.css">

</head>

<body>
    <?php include dirname(__DIR__) . '/includes/header.php'; ?>
    <?php
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
                    <a href="https://www.youtube.com/channel/UCCjq8-CDPkODruPjlVk2MBg" target="_blank" class="linktree-card linktree-card--yellow" linktree-card--yellow>YOUTUBE KIRITO SENPAI</a>
                    <a href="https://twitter.com/kisenjoki" target="_blank" class="linktree-card">Twitter KISEN JOKI</a>
                </div>
            </div>
        </section>

        

    <?php include dirname(__DIR__) . '/includes/footer.php'; ?>

    <script src="assets/js/script.js"></script>
    <script>
        // Tangani klik gambar dengan popup khusus
        document.querySelectorAll('.image-grid .image-item img').forEach(img => {
            img.addEventListener('click', () => {
                const modal = document.getElementById('imageModal');
                const modalImg = document.getElementById('modalImage');
                const popupSrc = img.getAttribute('data-popup');

                modalImg.src = popupSrc;
                modal.classList.add('active');
            });
        });

        function closeImageModal() {
            document.getElementById('imageModal').classList.remove('active');
            document.getElementById('modalImage').src = '';
        }
    </script>
</body>

</html>