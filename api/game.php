<?php
include "../includes/config.php";

$q = mysqli_query($koneksi, "SELECT * FROM game");
$data = [];

while ($d = mysqli_fetch_assoc($q)) {
    $data[] = $d;
}

echo json_encode($data);
