<?php
include(APPPATH."views/default/header.php");
?>
<body>
 <b>Input Simpanan Wajib</b><br>
<?php echo validation_errors(); ?>
<?php echo form_open('ctabungan/form'); ?>
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
		<input type="hidden" name="jenis_simpanan" value="<?php echo $jenis_simpanan; ?>">
		<input type="submit" value="Simpan">
	</td>
</tr>
</table>
</form>
<center><?php echo $sukses; ?></center>
<?php
include(APPPATH."views/default/footer.php");
?>
</body>
</html>
