<?php
include '../includes/config.php';
include '../includes/header.php';
include '../includes/sidebar.php';


$keyword = '';
if (isset($_GET['search'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['search']);
}


if ($keyword != '') {
    $query = "
        SELECT * FROM game 
        WHERE nama_game LIKE '%$keyword%' 
           OR genre LIKE '%$keyword%'
        ORDER BY id_game DESC
    ";
} else {
    $query = "SELECT * FROM game ORDER BY id_game DESC";
}

$result = mysqli_query($conn, $query);
?>

<div class="content">
    <h2>Daftar Game</h2>

    <!-- SEARCH FORM -->
    <form method="GET" style="margin-bottom:15px;">
        <input 
            type="text" 
            name="search"
            placeholder="Cari nama / genre game..."
            value="<?= htmlspecialchars($keyword) ?>"
            style="padding:8px;width:250px;"
        >
        <button type="submit" class="btn btn-primary">Cari</button>
        <a href="game_list.php" class="btn">Reset</a>
    </form>

    <!-- TABLE -->
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Game</th>
                <th>Genre</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php $no = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <img src="../uploads/game/<?= $row['gambar'] ?>" width="70">
                </td>
                <td><?= $row['nama_game'] ?></td>
                <td><?= $row['genre'] ?></td>
                <td>Rp <?= number_format($row['harga']) ?></td>
                <td>
                            <a href="game_edit.php?id=<?= $row['id_game'] ?>" 
        class="action-btn btn-edit">
        ✏ Edit
        </a>
    <a href="game_delete.php?id=<?= $row['id_game'] ?>" 
    class="action-btn btn-delete"
    onclick="return confirm('Yakin hapus game ini?')">
    🗑 Hapus
    </a>

                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align:center;">
                    Data game tidak ditemukan
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
