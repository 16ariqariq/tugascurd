<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "perpus";

    //buat koneksi
    $koneksi = mysqli_connect($serverName, $userName, $password, $database);

    //cek koneksi
    if (!$koneksi) {
        die("Koneksi Gagal".mysqli_connect_eror());
    }
    else{
        //echo "koneksi berhasil";
    }
?>