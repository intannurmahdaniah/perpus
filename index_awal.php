<?php
include 'koneksi.php';
$tgl=date('Y-m-d');
session_start();
if(isset($_SESSION['sesi'])){
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Document </title>
    </head>
    <body>
        <h1> Selamat Datang di Sistem Informasi Perpustakaan</h1>
        <a href="logout.php"> logout</a>
    </body>
</html>
<?php
    } else {
        header('location:login.php');
        echo "<script>
        alert('Anda Harus Login Dahulu');
        </script>";
    }