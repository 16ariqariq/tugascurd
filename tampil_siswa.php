<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Data Siswa</title>
</head>
<body>
    <div class="container">
    <h1  class = "text-center"> Data Siswa</h1>
        <form action="tampil_siswa.php" method="POST">
            <input type="text" name="cari" class="form-control" placeholder="Masukan Nama">
        </form> 
        <br>
        <table class="table table-light table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAMA SISWA</th>
                <th>TANGGAL LAHIR</th>
                <th>ALAMAT</th>
                <th>GENDER</th>
                <th>USERNAME</th>
                <th>KELAS</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";
            if (isset($_POST["cari"])) {
                //jika ada keyword pencarian
                $cari = $_POST["cari"];
                $query_siswa = mysqli_query($koneksi,"select * from siswa join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_siswa ='$cari' or siswa.nama_siswa  like '%$cari%'");
            } else {
                //jika tidak ada keyword pencarian
                $query_siswa = mysqli_query($koneksi, "select * from siswa join kelas on siswa.id_kelas=kelas.id_kelas");
            }
        while ($data_siswa = mysqli_fetch_array($query_siswa)) {?>
            <tr>
                <td><?=$data_siswa['id_siswa']?></td>
                <td><?=$data_siswa['nama_siswa']?></td>
                <td><?=$data_siswa['tanggal_lahir']?></td>
                <td><?=$data_siswa['alamat']?></td>
                <td><?=$data_siswa['gender']?></td> 
                <td><?=$data_siswa['username']?></td> 
                <td><?=$data_siswa['nama_kelas']?></td>

                <td><a href="ubah_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-success">Update</a> | <a href="hapus.php?id_siswa=<?=$data_siswa['id_siswa']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Delete</a></td>

            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>