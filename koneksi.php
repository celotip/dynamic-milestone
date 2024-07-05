<?php
    // $db_host = "localhost" //host database
    $db_host = "127.0.0.1:3306"; // host database
    $db_username = "root";
    $db_password = "";
    $db_name = "milestone";

    // buat koneksi ke server mysql
    $koneksi = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($koneksi->connect_error){
        die("Koneksi ke database gagal");
    }
    echo "Status koneksi: Koneksi berhasil<br>";
?>