<?php
include "../koneksi.php";
include "../layout/header.php";

// PETUGAS
if (isset($_POST['tambah_petugas'])) {
    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $pwd        = $_POST['password'];
    $telp       = $_POST['telepon'];

    $sql_petugas = "INSERT INTO petugas (nama_petugas, username, `password`, telp, `level`) VALUES ('$nama ', '$username', '$pwd', '$telp', 'petugas')";
    $exc_petugas = mysqli_query($koneksi, $sql_petugas);

    if ($exc_petugas) {
        echo kembali();
        die;
    } else {
        header("location: ../manage_anggota.php?gagal");
    }
}

// ADMIN
elseif (isset($_POST['tambah_admin'])) {

    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $pwd        = $_POST['password'];
    $telp       = $_POST['telepon'];

    $sql_petugas = "INSERT INTO petugas (nama_petugas, username, `password`, telp, `level`) VALUES ('$nama', '$username', '$pwd', '$telp', 'admin')";
    $exc_petugas = mysqli_query($koneksi, $sql_petugas);

    if ($exc_petugas) {
        echo kembali();
        die;
    } else {
        header("location: ../manage_anggota.php?gagal");
    }
} else {
    echo kembali();
    die;
}
