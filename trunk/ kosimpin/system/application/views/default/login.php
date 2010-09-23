<html>
<head>
<title><?php echo $this->config->item('nama_koperasi'); ?> - <?php echo $this->config->item('alamat'); ?></title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #339933;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}


</style>
</head>
<body>

<h1><?php echo $this->config->item('nama_koperasi'); ?></h1>

<form name="form1" method="post" action="<?php echo base_url();?>/index.php/main/login">
  <table width="300" border="0">
    <tr>
      <td width="111">User</td>
      <td width="179"><input name="user" type="text" id="user" maxlength="10"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input name="password" type="password" id="password" maxlength="10"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Login"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php echo $message; ?>
</body>
</html>