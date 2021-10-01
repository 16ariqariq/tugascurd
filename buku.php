<?php
include "header.php";
?>
    <h2>Daftar Buku</h2>
        <form action = "buku.php" method = "POST">
            <input type = "text" name = "cari" class = "form-control" placeholder = "Masukkan Keyword Pencarian"/>
        </form><br>
        <div class="row">
            <?php
            include "koneksi.php";
            if (isset($_POST["cari"])){
                //jika ada keyword pencarian
                $cari = $_POST['cari'];
                $qry_buku = mysqli_query($conn, "select * from buku where id_buku like '%$cari%' or nama_buku like '%$cari%'");
            } else {
                //jika tidak ada keyword pencarian
                $qry_buku = mysqli_query($conn, "select * from buku");
            }
            while($dt_buku=mysqli_fetch_array($qry_buku)){
            ?>
            <div class="col-md-3">
            <div class="card" >
            <img src="foto_produk/<?=$dt_buku['foto']?>" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title"><?=$dt_buku['nama_buku']?></h5>
            <p class="card-text"><?=substr($dt_buku['deskripsi'],0,20)?></p>
            <a href="pinjam_buku.php?id_buku=<?=$dt_buku['id_buku']?>" class="btn btn-primary">Pinjam</a>
            </div>
            </div>
            </div>
            <?php
            }
            ?>
            </div>
            <?php
            include "footer.php";
            ?>