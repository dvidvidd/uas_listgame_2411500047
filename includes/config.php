<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_game_2411500047"; 

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
