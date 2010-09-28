<?php
include(APPPATH."views/default/header.php");
?>
<body>
<b>Tabungan Rinci</b><br><br>
<?php echo "S.".$jenis_tabungan->jenis_tabungan; ?> >> <?php echo $nama_anggota; ?>
<table width="300px" cellpadding='2px'>
 <tr style="font-weight:bold;background-color:#EEEEEE;">
     <td align='center'>No.</td>
     <td align='center'>Tgl</td><td align='center'>In</td><td align='center'>Out</td></tr>
<?php
  if($detail_transaksi){
  $total_in = 0;
  $total_out = 0;
  $c=1;
  foreach($detail_transaksi as $trans)
  {

    $total_in += $trans->jumlah_in;
	$total_out += $trans->jumlah_out;
	if(($c%2)==1)
	{
		$background_color="#EEEEEE";
	}
	else
	{
		$background_color="#FFFFFF";
	}
  ?>
    <tr bgcolor="<?php echo $background_color; ?>">
        <td><?php echo $c; ?></td>
        <td><?php echo date("d-m-Y",strtotime($trans->tgl_transaksi)); ?></td>
        <td align="right"><?php echo number_format($trans->jumlah_in,"."); ?></td>
        <td align="right"><?php echo number_format($trans->jumlah_out,"."); ?>
        </td>		
        </tr>
  <?php
    $c++;
  }
  ?>
    <tr style="font-weight:bold;background-color:#EEEEEE;">
        <td></td>
        <td></td>
		<td align="right"><?php echo number_format($total_in,"."); ?></td>
		<td align="right"><?php echo number_format($total_out,"."); ?></td>
	</tr>
  <?php
  }
?>
</table>
<?php
include(APPPATH."views/default/footer.php");
?>
</body>
</html>