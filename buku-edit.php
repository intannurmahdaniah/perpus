<?php
	$id_buku=$_GET['id'];
	$q_tampil_buku=mysqli_query($db,"SELECT * FROM buku WHERE id_buku='$id_buku'");
	$r_tampil_buku=mysqli_fetch_array($q_tampil_buku);
	if(empty($r_tampil_buku['foto'])or($r_tampil_buku['foto']=='-'))
		$foto = "admin-no-photo.jpg";
	else
		$foto = $r_tampil_buku['foto'];
?>
<div id="label-page"><h3>Edit Data Buku</h3></div>
<div id="content">
	<form action="buku-edit-process.php" method="post" enctype="multipart/form-data">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">FOTO</td>
			<td class="isian-formulir">
			<img src="foto_buku/<?php echo $foto; ?>" width=70px height=75px>
			<input type="file" name="foto" class="isian-formulir isian-formulir-border">
			<input type="hidden" name="foto_awal" value="<?php echo $r_tampil_buku['foto']; ?>">
			</td>
		</tr>
		<tr>
			<td class="label-formulir">ID Buku</td>
			<td class="isian-formulir"><input type="text" name="id_buku" value="<?php echo $r_tampil_buku['id_buku']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"
			></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama Buku</td>
			<td class="isian-formulir"><input type="text" name="nama_buku" value="<?php echo $r_tampil_buku['nama_buku']; ?>" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir"> Penerbit </td>
			<td class="isian-formulir"><textarea rows="2" cols="40" name="penerbit" class="isian-formulir isian-formulir-border"><?php echo $r_tampil_buku["penerbit"]; ?></textarea></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" onclick = "return confirm ('Yakin Data Disimpan?')" value="Simpan" id="tombol-simpan"></td>
		</tr>
	</table>
	</form>
</div>