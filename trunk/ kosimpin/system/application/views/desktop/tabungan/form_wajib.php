<?php
include(APPPATH."views/default/header.php");
?>
<body>
 <b>Input Simpanan Wajib</b><br>
<?php echo validation_errors(); ?>
<?php echo form_open('ctabungan/form'); ?>
<center><?php echo $sukses; ?></center>
<br>
<table>
<tr><td>Anggota</td>
	<td>
		<?php echo form_dropdown("anggota",$daftar_anggota); ?>
	</td>
</tr>
<tr><td>Tgl transaksi</td>
	<td>
		<?php echo tanggal_combo("tanggal"); ?>
		<?php echo bulan_combo("bulan"); ?>
		<?php echo tahun_combo("tahun"); ?>
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
		<?php echo form_submit('mysubmit', 'Simpan'); ?>
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
