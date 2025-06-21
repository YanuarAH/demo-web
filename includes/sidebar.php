<?php
// Mendapatkan nama file dasar, contoh: 'genshin-categories' atau 'genshin'
$current_page_base = basename($_SERVER['PHP_SELF'], '.php');

// BARU: Logika untuk mendeteksi game aktif dengan benar, bahkan di halaman kategori.
// Ini akan mengambil bagian pertama sebelum tanda '-' (jika ada).
// 'genshin-categories' -> 'genshin'
// 'genshin' -> 'genshin'
$game_id_from_page = explode('-', $current_page_base)[0];

// Mendapatkan kategori dari URL
$current_category = $_GET['category'] ?? '';

// BARU: Menentukan apakah halaman saat ini adalah beranda
$is_homepage = ($current_page_base === 'index');

// Jika kita berada di halaman game, belum ada kategori yang dipilih, DAN BUKAN halaman kategori, set default
if (
    isset($games[$game_id_from_page]) &&
    empty($current_category) &&
    strpos($current_page_base, '-categories') === false
) {
    // Menggunakan array_key_first untuk cara yang lebih modern (membutuhkan PHP 7.3+)
    // atau array_keys(...)[0] untuk kompatibilitas yang lebih luas.
    $current_category = array_key_first($games[$game_id_from_page]);
}
?>
<aside class="sidebar">
    <div class="sidebar-header">
        <h3>Navigasi</h3>
    </div>

    <div class="sidebar-content">
        <nav class="sidebar-section">
            <h3 class="sidebar-title">Menu Utama</h3>
            <div class="sidebar-nav">
                <a href="/" class="sidebar-link <?php echo $is_homepage ? 'active' : ''; ?>">
                    🏠 Beranda
                </a>
            </div>
        </nav>

        <nav class="sidebar-section">
            <h3 class="sidebar-title">Daftar Game</h3>
            <div class="sidebar-nav">
                <?php foreach ($games as $sidebar_game_id => $sidebar_game): ?>
                    <a href="/games/<?php echo htmlspecialchars($sidebar_game_id); ?>.php"
                        class="sidebar-link <?php echo $game_id_from_page === $sidebar_game_id ? 'active' : ''; ?>">
                        <?php echo htmlspecialchars($sidebar_game['title']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>

        <?php if (isset($games[$game_id_from_page])): ?>
            <nav class="sidebar-section">
                <h3 class="sidebar-title">Daftar Game</h3>
                <div class="sidebar-nav">
                    <?php foreach ($games as $sidebar_game_id => $sidebar_game): ?>
                        <a href="/api/<?php echo htmlspecialchars($sidebar_game_id); ?>.php"
                            class="sidebar-link <?php echo $game_id_from_page === $sidebar_game_id ? 'active' : ''; ?>">
                            <?php echo htmlspecialchars($sidebar_game['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </nav>

        <?php endif; ?>
    </div>

    <div class="sidebar-footer">
        <p>&copy; <?php echo date("Y"); ?> Joki Kisen. All Rights Reserved.</p>
    </div>
</aside>
<div class="sidebar-overlay" onclick="toggleSidebar()"></div>