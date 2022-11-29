<?php
// SET DEFAULT TIMEZONE
date_default_timezone_set("Asia/Jakarta");

session_start();
include "../koneksi.php";

$tgl          = date("Y-m-d");
$id_petugas   = $_SESSION['nik'];
$tanggapan    = $_POST['tanggapan'];
$id_pengaduan = $_POST['id_pengaduan'];

$sql_tanggapan = "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('$id_pengaduan', '$tgl', '$tanggapan', '$id_petugas')";
$exc_tanggapan = mysqli_query($koneksi, $sql_tanggapan);

if ($exc_tanggapan) {
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
