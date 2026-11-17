<?php
include'koneksi.php';
$id_buku=$_POST['id_buku'];
$nama_buku=$_POST['nama_buku'];
$penerbit=$_POST['penerbit'];
$status="Tidak Minjam";

if(isset($_POST['simpan'])){
    extract($_POST);
    $nama_file = $_FILES['foto']['name'];
    if(!empty($nama_file)){
        // Baca lokasi file sementara dan file dari form (fupload)
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_foto = $id_buku.".".$tipe_file;

        //tentukan folder untuk menyimpan file
        $folder = "foto_buku/$file_foto";
        //apabila file berhasil di upload
        move_uploaded_file($lokasi_file, "$folder");
    }
    else
        $file_foto="-";

    $sql =
    "INSERT INTO buku
    VALUES('$id_buku','$nama_buku','$penerbit','$file_foto')";
    $query = mysqli_query($db, $sql);
    header("location:index.php?p=buku");
}
?>