<?php
include "../koneksi.php";
include "../layout/header.php";

if (!isset($_POST['tambah_masyarakat'])) {
    kembali();
    die;
} else {

    $nik        = $_POST['nik'];
    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $pwd        = $_POST['password'];
    $telp       = $_POST['telepon'];

    $sql_masyarakat = "INSERT INTO masyarakat (nik, nama, username, `password`, telp) VALUES ('$nik', '$nama', '$username', '$pwd', '$telp')";
    $exc_masyarakat = mysqli_query($koneksi, $sql_masyarakat);

    if ($exc_masyarakat) {
        echo kembali();
        die;
    } else {
        header("location: ../manage_anggota.php?gagal");
    }
}
