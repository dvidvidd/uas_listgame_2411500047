<?php
include "includes/header.php";
include "includes/sidebar.php";
include "includes/nav.php";
?>

<div class="content">
    <h1>Dashboard</h1>
    <p>Selamat datang di List Game</p>

    <div class="card">
        <p style="margin-bottom:15px;font-weight:500">
            Silakan pilih menu:
        </p>

        <div style="display:flex; gap:12px">
            <a href="pages/game_add.php">
                <button class="btn btn-primary">
                    ➕ Tambah Game
                </button>
            </a>

            <a href="pages/game_list.php">
                <button class="btn" style="background:#16a34a;color:white">
                    📋 Daftar Game
                </button>
            </a>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
