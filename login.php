<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi,
    "SELECT * FROM users 
     WHERE username='$username' 
     AND password='$password'");

if (mysqli_num_rows($query) > 0) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "failed"]);
}
?>
