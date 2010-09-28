<?php
include(APPPATH."views/default/header.php");
?>
<body>
<form action="<?php echo base_url()?>/index.php/ctabungan/save">
<table>
<tr><td>Anggota</td>
	<td>
		<input type="text" name="anggota">
	</td>
</tr>
<tr><td>Tgl transaksi</td>
	<td>
		<input type="text" name="tgltrans">
	</td>
</tr>
<tr><td>Jumlah</td>
	<td>
		<input type="text" name="jumlah">
	</td>
</tr>
<tr><td></td>
	<td>
		<input type="submit" value="Simpan">
	</td>
</tr>
</table>
</form>
</body>
</html>
