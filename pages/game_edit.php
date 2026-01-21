<?php
include '../includes/config.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM game WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<h2>Edit Game</h2>

<form method="post" enctype="multipart/form-data">
    <label>Nama Game</label><br>
    <input type="text" name="nama_game" value="<?= $data['nama_game'] ?>"><br><br>

    <label>Harga</label><br>
    <input type="number" name="harga" value="<?= $data['harga'] ?>"><br><br>

    <label>Genre</label><br>
    <?php
    $genres = explode(',', $data['genre']);
    $listGenre = ['Action','Adventure','RPG','FPS','Story','Horror','Strategy','Sandbox','Simulation','Racing','Sports'];
    foreach ($listGenre as $g) {
        $checked = in_array($g, $genres) ? 'checked' : '';
        echo "<label><input type='checkbox' name='genre[]' value='$g' $checked> $g</label> ";
    }
    ?>
    <br><br>

    <label>Gambar Sekarang</label><br>
    <img src="../uploads/<?= $data['gambar'] ?>" width="120"><br><br>

    <label>Ganti Gambar (opsional)</label><br>
    <input type="file" name="gambar"><br><br>

    <button type="submit" name="update">Update Game</button>
</form>
