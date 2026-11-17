<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['sesi'])) {
    header('location:login.php');
    exit;
}

$id = mysqli_real_escape_string($db, $_GET['id'] ?? '');
$query = mysqli_query($db, "SELECT * FROM anggota WHERE id_anggota='$id'");
$r = mysqli_fetch_array($query);

if (!$r) {
    die('Data anggota tidak ditemukan.');
}

$foto = (empty($r['foto']) || $r['foto'] == '-') ? 'admin-no-photo.jpg' : $r['foto'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Anggota - <?php echo htmlspecialchars($r['nama']); ?></title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; margin: 20px; }
        h2, h4 { text-align: center; margin: 4px 0; }
        hr { margin: 12px 0 18px; }
        .tombol { margin-bottom: 15px; }
        .tombol button { padding: 6px 14px; cursor: pointer; }
        .kartu { width: 520px; margin: 0 auto; border: 2px solid #000; padding: 20px; }
        .kartu table { width: 100%; border-collapse: collapse; }
        .kartu td { padding: 5px 4px; vertical-align: top; }
        .label { width: 130px; }
        .foto { width: 110px; height: 130px; object-fit: cover; border: 1px solid #000; }
        .ttd { width: 200px; float: right; margin-top: 30px; text-align: center; }

        @media print {
            .tombol { display: none; }
            body { margin: 0; }
        }
    </style>
</head>
<body>

<div class="tombol">
    <button onclick="window.print()">Cetak</button>
    <button onclick="window.close()">Tutup</button>
</div>

<div class="kartu">
    <h2>PERPUSTAKAAN UMUM</h2>
    <h4>Jl. Ks Tubun Gg.II Damai, Telp: (021)5555555</h4>
    <hr>
    <h3 style="text-align:center; margin-top:0;">KARTU ANGGOTA</h3>

    <table>
        <tr>
            <td rowspan="5" width="130">
                <img class="foto" src="imagess/<?php echo htmlspecialchars($foto); ?>">
            </td>
            <td class="label">ID Anggota</td>
            <td>: <?php echo htmlspecialchars($r['id_anggota']); ?></td>
        </tr>
        <tr>
            <td class="label">Nama</td>
            <td>: <?php echo htmlspecialchars($r['nama']); ?></td>
        </tr>
        <tr>
            <td class="label">Jenis Kelamin</td>
            <td>: <?php echo htmlspecialchars($r['jenis_kelamin']); ?></td>
        </tr>
        <tr>
            <td class="label">Alamat</td>
            <td>: <?php echo htmlspecialchars($r['alamat']); ?></td>
        </tr>
    </table>

   

</body>
</html>