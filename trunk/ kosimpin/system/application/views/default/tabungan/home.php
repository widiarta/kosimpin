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
<tr><td>jumlah</td>
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
<b>Saldo Tabungan</b>
<table width="300px">
 <tr style="font-weight:bold;background-color:#EEEEEE;">
     <td>No.</td>
     <td>Anggota</td><td>Tabungan</td></tr>
<?php
  if($saldo_tabungan){
  $total_saldo = 0;
  $c=1;
  foreach($saldo_tabungan as $saldo)
  {

    $total_saldo += $saldo->saldo;
  ?>
    <tr>
        <td><?php echo $c; ?></td>
        <td><a href='<?php echo base_url();?>/index.php/anggota/<?php echo $saldo->id_anggota; ?>'>
            <?php echo $saldo->nama; ?>
            </a>
        </td>
        <td>
            <a href='<?php echo base_url();?>/index.php/ctabungan/detail/<?php echo $saldo->id_anggota; ?>'>
            <?php echo number_format($saldo->saldo,"."); ?>
            </a>
        </td>
        </tr>
  <?php
    $c++;
  }
  ?>
    <tr style="font-weight:bold;background-color:#EEEEEE;">
        <td></td>
        <td>Total</td><td><?php echo number_format($total_saldo,"."); ?></td></tr>
  <?php
  }
?>
</table>
</body>
</html>