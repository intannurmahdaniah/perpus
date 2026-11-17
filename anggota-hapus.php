<?php
include'koneksi.php';
$id_anggota=$_GET['id'];

mysqli_query($db,
	"DELETE FROM anggota
	WHERE id_anggota='$id_anggota'"
);

header("location:index.php?p=anggota");
?>