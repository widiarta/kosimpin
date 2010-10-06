<?php
include(APPPATH."views/default/header.php");
?>
<body>
    <b>Pinjaman : <?php echo $nama_anggota; ?></b>
	<table style='border:solid 1px #EEEEEE;'>
	<?php
	  $tsaldo=0;$tpinjaman=0;$tjasa=0;
	?>
	<tr style="font-weight:bold;background-color:#EEEEEE;">
		<td align='center'>No.</td>
		<td align='center'>Total</td>
		<td align='center'>Jasa</td>
		<td align='center'>Total Saldo</td>
		<td align='center'>&nbsp;</td>
	</tr>
	<?php
	  if($pembayaran)
	  {
		$c=1;
		foreach($pembayaran as $rp)
		{
	?>

	<tr>
		<td align="center"><?php echo $c; ?>.</td>
		<td align='right'><?php //echo number_format($pinjaman->tpinjaman,","); ?></td>		
		<td align='right'><?php //echo number_format($pinjaman->tjasa,","); ?></td>
		<td align='right'><?php //echo number_format($pinjaman->tsaldo,","); ?></a></td>
		<td align='center'><a href='<?php //echo base_url()?>index.php/cpinjaman/bayar/<?php //echo $pinjaman->id."/".$pinjaman->id_anggota; ?>'>Bayar</a></td>
	</tr>
	
	<?php
		$c++;
		}		
	  }
	?>
	<tr style="font-weight:bold;background-color:#EEEEEE;">
		<td align='center'></td>		
		<td align='right'><?php echo number_format($tpinjaman,","); ?></td>
		<td align='right'><?php echo number_format($tjasa,","); ?></td>
		<td align='right'><?php echo number_format($tsaldo,","); ?></td>
		<td align='center'></td>		
	</tr>	
	</table>
</body>
<?php
include(APPPATH."views/default/footer.php");
?>
</html>