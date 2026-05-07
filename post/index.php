<?php
// 1. Panggil file koneksi agar bisa akses database
include '..koneksi/koneksi.php';

// 2. Ambil semua data dari tabel 'posts', urutkan dari yang terbaru (id DESC)
$query = "SELECT * FROM posts ORDER BY id DESC";
$ambil_data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog Sederhanaku</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; background-color: #f9f9f9; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; }
        .artikel { border-bottom: 1px solid #eee; padding: 15px 0; }
        .artikel h2 { margin: 0; color: #007BFF; }
        .artikel small { color: #777; }
        .artikel p { color: #444; }
        .btn-tambah { display: inline-block; background: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Blog Sederhana</h1>

    <a href="tambah.php" class="btn-tambah">+ Tulis Artikel Baru</a>

    <hr>

    <?php 
    // 3. Cek apakah ada data di database
    if (mysqli_num_rows($ambil_data) > 0) {
        // 4. Looping: Selama ada baris data, tampilkan!
        while ($row = mysqli_fetch_assoc($ambil_data)) {
            ?>
            <div class="artikel">
                <h2><?php echo $row['judul']; ?></h2>
                <small>Ditulis oleh: <b><?php echo $row['penulis']; ?></b> | Pada: <?php echo $row['tanggal']; ?></small>
                <p><?php echo substr($row['isi'], 0, 150); ?>...</p> 
                </div>
            <?php
        }
    } else {
        echo "<p>Belum ada artikel. Ayo mulai menulis!</p>";
    }
    ?>
</div>

</body>
</html>