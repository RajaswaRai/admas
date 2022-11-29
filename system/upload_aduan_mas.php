<?php
include "../koneksi.php";

session_start();
error_reporting(0);

// SET DEFAULT TIMEZONE
date_default_timezone_set("Asia/Jakarta");

// TANGGAL UPLOAD
$tgl = date('Y-m-d');

// NIK LOGIN
$nik = $_SESSION['nik'];

// ISI LAPORAN
$isi = $_POST['isi_laporan'];

// FOTO
$fototmp = $_FILES['foto']['tmp_name']; // File 'temp' yang diunggah
$foto_name_old = $_FILES['foto']['name']; // Nama file foto lawas
$foto_ext = end(explode('.', $foto_name_old)); // Ekstensi file foto
$dir = "../img_pengaduan/";

// File name baru : nik_pengguna + tanggal + waktu upload
$foto_name = $nik . "_" . date("Ymd_His") . "." . $foto_ext;

// UNGGAH
$upload = move_uploaded_file($fototmp, $dir . $foto_name);
if ($upload) {
    $sql_laporan = "INSERT INTO `pengaduan` (`tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES ('$tgl', '$nik', '$isi', '$foto_name', '0')";
    $exc_laporan = mysqli_query($koneksi, $sql_laporan);
    if ($exc_laporan) {
        header("location: ../index.php?unggah-berhasil");
    } else {
        header("location: ../index.php?unggah-gagal");
    }
} else {
    header("location: ../index.php?unggah-gagal");
}
