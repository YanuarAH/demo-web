<?php
// Daftar halaman dan judul tombolnya
$pages = [
    ['path' => 'harga60.php', 'title' => 'Harga 60'],
    ['path' => 'kisen.php', 'title' => 'Kisen'],
    // Tambahkan halaman lainnya di sini
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Navigasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0f1a2a;
            color: #fff;
            text-align: center;
            padding-top: 50px;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 12px 24px;
            background-color: #ffc107;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s;
        }
        .button:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>

    <h1>Daftar Halaman</h1>

    <?php foreach ($pages as $page): ?>
        <a class="button" href="<?php echo $page['path']; ?>">
            <?php echo $page['title']; ?>
        </a>
    <?php endforeach; ?>

</body>
</html>
