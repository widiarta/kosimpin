<html>
<head>
<title><?php echo $this->config->item('nama_koperasi'); ?> - <?php echo $this->config->item('alamat'); ?></title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>/assets/css/default.css"/>
<link href="<?php echo base_url();?>/assets/images/kosim.png" rel='shortcut icon'/>
</head>
<body>

<h1><?php echo $this->config->item('nama_koperasi'); ?></h1>
Selamat datang di <?php echo $this->config->item('nama_koperasi'); ?><br/><br/>
<form name="form1" method="post" action="<?php echo base_url();?>/index.php/main/login">
  <table width="300" border="0">
    <tr>
      <td width="111">User</td>
      <td width="179"><input name="user" type="text" id="user" maxlength="10" size="12"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input name="password" type="password" id="password" maxlength="10" size="12"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Login"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php echo $message; ?>

<?php
include(APPPATH."views/default/footer.php");
?>
</body>
</html>