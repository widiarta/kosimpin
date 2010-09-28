<?php
include(APPPATH."views/default/header.php");
?>
<body>
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