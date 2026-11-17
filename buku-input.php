<div id="label-page"><h3> Input Data Buku </h3></div>
<div id="content">
    <form action="buku-input-proses.php" method="post" enctype="multipart/form-data">

    <table id="table-input">
        <tr>
            <td class="label-formulir"> FOTO </td>
            <td class="isian-formulir"><input type="file" name="foto" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir"> ID Buku </td>
            <td class="isian-formulir"><input type="text" name="id_buku" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir"> Nama Buku </td>
            <td class="isian-formulir"><input type="text" name="nama_buku" class="isian-formulir isian-formulir-border"></td>
        </tr>
         </tr>
        <tr>
            <td class="label-formulir"> Penerbit </td>
            <td class="isian-formulir"><input type="text" name="penerbit" class="isian-formulir isian-formulir-border"></td>
        </tr>
        <tr>
            <td class="label-formulir"></td>
            <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" onclick="return confirm ('Yakin Data Disimpan?')" class="tombol"></td>
        </tr>
    </table>
    </form>
</div>