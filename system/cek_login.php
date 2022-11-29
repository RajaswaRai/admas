<?php
session_start();
include "../koneksi.php";

// INACTIVE LOGOUT SCRIPT
$_SESSION['logged_in'] = true; //set you've logged in
$_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
// $_SESSION['expire_time'] = 1 * 60 * 60; //expire time in seconds: three hours (you must change this)
$_SESSION['expire_time'] = 10; //expire time in seconds: three hours (you must change this)

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM masyarakat WHERE `username`='$username' AND `password`='$password'";
$excSql = mysqli_query($koneksi, $sql);
$result = mysqli_num_rows($excSql);

if ($result > 0) {
    // echo "Login Valid";
    $data = mysqli_fetch_array($excSql);
    $nik = $data['nik'];
    $nama = $data['nama'];

    $_SESSION['nik'] = $nik;
    $_SESSION['nama'] = $nama;
    $_SESSION['level'] = 'masyarakat';

    header("location: ../index.php");
} else {

    // Jika Login Akun Petugas
    $sql_petugas = "SELECT * FROM petugas WHERE username='$username' AND `password`='$password'";
    $exc_petugas = mysqli_query($koneksi, $sql_petugas);
    $result_petugas = mysqli_num_rows($exc_petugas);

    if ($result_petugas) {
        $data = mysqli_fetch_array($exc_petugas);
        $nik = $data['id_petugas'];
        $nama = $data['nama_petugas'];
        $lvl = $data['level'];

        $_SESSION['nik'] = $nik;
        $_SESSION['nama'] = $nama;
        $_SESSION['level'] = $lvl;

        header("location: ../index.php");
    } else {
        echo "<script>
            function kembali(){
                history.go(-1);
            }
            kembali();
          </script>";
    }


    // header("location: ../form_login.php");
}
