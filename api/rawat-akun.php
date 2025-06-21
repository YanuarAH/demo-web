<?php
require_once dirname(__DIR__) . '/config/games.php';
$game_id = 'rawat-akun';
$game = $games[$game_id];
// $page_title = $game['title'] . ' - Pilih Kategori - ' . $site_config['site_name'];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="Pilih kategori joki <?php echo $game['title']; ?> yang Anda inginkan - <?php echo $site_config['site_description']; ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include dirname(__DIR__) . '/includes/header.php'; ?>

    <div class="game-layout">
        <!-- Mobile Header -->
        <div class="mobile-header">
            <button class="mobile-menu-btn" onclick="toggleSidebar()">☰</button>
        </div>

        <?php include dirname(__DIR__) . '/includes/sidebar.php'; ?>

        <main class="game-content">
            <div class="content-wrapper">
                <!-- Header -->
                <div class="category-page-header">
                    <h1 class="category-page-title"><?php echo $game['title']; ?></h1>
                    <p class="category-page-description">Pilih kategori joki <?php echo $game['title']; ?> yang Anda inginkan</p>
                </div>

                <!-- Category Grid -->
                <div class="category-grid">
                    <?php foreach ($game['categories'] as $cat_id => $category): ?>
                        <!-- <a href="<?php echo $game_id; ?>.php?category=<?php echo $cat_id; ?>" class="category-card"> -->
                        <a class="category-card">

                            <div class="category-image">
                                <img src="<?php echo isset($category['image']) ? '../' . $category['image'] : '../assets/images/placeholder.jpg'; ?>"
                                    alt="<?php echo $category['title']; ?>"
                                    onerror="this.onerror=null;this.src='../assets/images/placeholder.jpg';">
                                <!-- <div class="category-badge">
                                    <?php echo count($category['services']); ?> layanan
                                </div> -->
                            </div>

                            <div class="category-info">
                                <div class="category-header">
                                    <h3 class="category-title"><?php echo $category['title']; ?></h3>
                                    <span class="category-arrow">→</span>
                                </div>

                                <p class="category-description"><?php echo $category['description']; ?></p>

                                <?php if (!empty($category['price'])): ?>
                                    <p class="category-price"><strong>Harga Mulai:</strong> <?php echo $category['price']; ?></p>
                                <?php endif; ?>

                                <div class="category-preview">
                                    <!-- <p class="preview-label">Contoh Layanan:</p> -->
                                    <div class="preview-services">
                                        <?php
                                        $preview_services = array_slice($category['services'], 0, 2);
                                        foreach ($preview_services as $service):
                                        ?>
                                            <div class="preview-service">
                                                <span class="service-name"><?php echo $service['name']; ?></span>
                                                <span class="service-price"><?php echo $service['price']; ?></span>
                                            </div>
                                        <?php endforeach; ?>

                                        <?php if (count($category['services']) > 2): ?>
                                            <p class="preview-more">+<?php echo count($category['services']) - 2; ?> layanan lainnya</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>