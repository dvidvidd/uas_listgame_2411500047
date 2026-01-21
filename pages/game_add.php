<?php
include "../includes/config.php";
include "../includes/header.php";
include "../includes/sidebar.php";

if (isset($_POST['simpan'])) {

    $nama   = $_POST['nama_game'];
    $harga  = $_POST['harga'];
    $genre  = isset($_POST['genre']) ? implode(",", $_POST['genre']) : "";

    // upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    $folder = "../uploads/game/";
    move_uploaded_file($tmp, $folder . $gambar);

    $sql = "INSERT INTO game (nama_game, genre, harga, gambar)
            VALUES ('$nama', '$genre', '$harga', '$gambar')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Game berhasil ditambahkan');
                window.location='game_list.php';
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<div class="content">
    <h2>Tambah Game</h2>

    <div class="form-card">
        <form method="post" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group">
                    <label>Nama Game</label>
                    <input type="text" name="nama_game" required>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" required>
                </div>
            </div>

            <div class="form-group">
                <label>Genre (boleh lebih dari satu)</label>
                <div class="genre-box">
                    <?php
                    $genres = ["Action","Adventure","RPG","FPS","Strategy","Story","Sandbox","Sports","Simulation","Horror"];
                    foreach ($genres as $g) {
                        echo "<label>
                                <input type='checkbox' name='genre[]' value='$g'> $g
                              </label>";
                    }
                    ?>
                </div>
            </div>

            <div class="form-group" style="margin-top:15px">
                <label>Gambar Game</label>
                <input type="file" name="gambar" accept="image/*" required onchange="previewImage(this)">
                <img id="preview" class="preview-img" width="120">
            </div>

            <div style="margin-top:20px">
                <button type="submit" name="simpan" class="btn-primary">
                    Simpan Game
                </button>
            </div>

        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(input.files[0]);
    preview.style.display = "block";
}
</script>
