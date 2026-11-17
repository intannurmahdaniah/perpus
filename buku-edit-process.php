<?php

include 'koneksi.php';

$id_buku = $_POST['id_buku'];
$nama_buku = $_POST['nama_buku'];
$penerbit = $_POST['penerbit'];

if (isset($_POST['simpan'])) {
    extract($_POST);
    $nama_file = $_FILES['foto']['name'];
    if (!empty($nama_file)) {
        // Baca lokasi file sementara dan nama file dari form (fupload)
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_foto = $id_buku.'.'.$tipe_file;
        // Tentukan folder untuk menyimpan file
        $folder = "foto_buku/$file_foto";
        @unlink("$folder");
        // Apabila file berhasil di upload
        move_uploaded_file($lokasi_file, "$folder");
    } else {
        $file_foto = $foto_awal;
    }

    mysqli_query($db,
        "UPDATE buku
		SET nama_buku='$nama_buku',penerbit='$penerbit',foto='$file_foto'
		WHERE id_buku='$id_buku'"
    );
    header('location:index.php?p=buku');
}
