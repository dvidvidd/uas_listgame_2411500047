<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_game_2411500047";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal");
}
?>
