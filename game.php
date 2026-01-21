<?php
include 'koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM game");
$hasil = [];

while ($row = mysqli_fetch_assoc($data)) {
    $hasil[] = $row;
}

echo json_encode($hasil);
?>
