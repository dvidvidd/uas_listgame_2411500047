<?php
include "../includes/config.php";

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = $_GET['id'];

// ambil nama gambar dulu
$data = mysqli_query($conn, "SELECT gambar FROM game WHERE id_game='$id'");
$row  = mysqli_fetch_assoc($data);

if ($row) {
    $gambar = $row['gambar'];
    $path = "../uploads/" . $gambar;

    // hapus file gambar jika ada
    if (file_exists($path)) {
        unlink($path);
    }

    // hapus data game
    mysqli_query($conn, "DELETE FROM game WHERE id_game='$id'");

    echo "<script>
            alert('Game berhasil dihapus');
            window.location='game_list.php';
          </script>";
} else {
    echo "Data tidak ditemukan";
}
