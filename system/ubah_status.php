<?php
session_start();
include "../koneksi.php";

// SET DEFAULT TIMEZONE
date_default_timezone_set("Asia/Jakarta");

$tgl          = date("Y-m-d");
$id_pengaduan = $_POST['id_pengaduan'];
$status       = $_POST['status'];
$id_petugas   = $_SESSION['nik'];

if ($status == '0') {
    $tanggapan = "Status pekerjaan diubah menjadi peninjauan";
} elseif ($status == 'proses') {
    $tanggapan = "Status pekerjaan diubah menjadi sedang berlangsung";
} elseif ($status == 'selesai') {
    $tanggapan = "Status pekerjaan diubah menjadi selesai";
}

$update_status = "UPDATE pengaduan SET `status`='$status' WHERE id_pengaduan='$id_pengaduan'";
$exc_status    = mysqli_query($koneksi, $update_status);

if ($exc_status) {
    // Record perubahan status di kolom tanggapan
    $sql_tanggapan = "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('$id_pengaduan', '$tgl', '$tanggapan', '$id_petugas')";
    $exc_tanggapan = mysqli_query($koneksi, $sql_tanggapan);

    // header("location: ../pengaduan_detail.php?id_pengaduan=$id_pengaduan");
    echo "<script>
            function kembali(){
                history.go(-1);
            }
            kembali();
          </script>";
} else {
    // header("location: ../pengaduan_detail.php?id_pengaduan=$id_pengaduan");
    echo "<script>
            function kembali(){
                history.go(-1);
            }
            kembali();
          </script>";
}
