<?php require_once('../Connections/dbcon.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form3")) {
  $updateSQL = sprintf("UPDATE non_utm_registration SET USER_NAME=%s, USER_IC_NUMBER=%s, USER_DATE_OF_BIRTH=%s, USER_GENDER=%s, USER_EMAIL=%s, USER_PHONE_NUMBER=%s, USER_ADDRESS=%s WHERE USER_ID_NUMBER=%s",
                       GetSQLValueString($_POST['USER_NAME'], "text"),
                       GetSQLValueString($_POST['USER_IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['USER_DATE_OF_BIRTH'], "date"),
                       GetSQLValueString($_POST['USER_GENDER'], "text"),
                       GetSQLValueString($_POST['USER_EMAIL'], "text"),
                       GetSQLValueString($_POST['USER_PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['USER_ADDRESS'], "text"),
                       GetSQLValueString($_POST['USER_ID_NUMBER'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

  $updateGoTo = "USERRECORD.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE non_utm_registration SET USER_NAME=%s, USER_IC_NUMBER=%s, USER_DATE_OF_BIRTH=%s, USER_GENDER=%s, USER_EMAIL=%s, USER_PHONE_NUMBER=%s, USER_ADDRESS=%s, USER_PASSWORD=%s WHERE USER_ID_NUMBER=%s",
                       GetSQLValueString($_POST['USER_NAME'], "text"),
                       GetSQLValueString($_POST['USER_IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['USER_DATE_OF_BIRTH'], "date"),
                       GetSQLValueString($_POST['USER_GENDER'], "text"),
                       GetSQLValueString($_POST['USER_EMAIL'], "text"),
                       GetSQLValueString($_POST['USER_PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['USER_ADDRESS'], "text"),
                       GetSQLValueString($_POST['USER_PASSWORD'], "text"),
                       GetSQLValueString($_POST['USER_ID_NUMBER'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

  $updateGoTo = "USERRECORDUPDATE.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['USER_ID_NUMBER'])) {
  $colname_Recordset1 = $_GET['USER_ID_NUMBER'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_Recordset1 = sprintf("SELECT * FROM non_utm_registration WHERE USER_ID_NUMBER = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $dbcon) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<style type="text/css">
body {
	background-image: url();
	background-color: #FFFFFF;
	color: #000000;
}
#apDiv1 {
	position: absolute;
	width: 494px;
	height: 288px;
	z-index: 1;
	left: 587px;
	top: 152px;
	background-color: #FFFFFF;
}
#apDiv2 {
	position: absolute;
	width: 471px;
	height: 54px;
	z-index: 2;
	left: 464px;
	top: 39px;
	font-size: 36px;
	font-weight: bold;
}
#apDiv1 table {
	text-align: center;
}
#apDiv3 {
	position: absolute;
	width: 200px;
	height: 46px;
	z-index: 3;
	left: 1016px;
	top: 43px;
}
#apDiv3 table tr td strong {
	font-weight: bold;
	color: #CCC;
	font-size: 24px;
}
#apDiv3 table tr td strong a {
	color: #FFF;
	text-align: center;
}
#apDiv4 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 4;
	left: 98px;
	top: 149px;
}
</style>
</head>

<body>
<div id="apDiv1">
  <form id="form1" name="form1" method="post">
  </form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">USER_ID_NUMBER:</td>
      <td><?php echo $row_Recordset1['USER_ID_NUMBER']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">USER_NAME:</td>
      <td><input type="text" name="USER_NAME" value="<?php echo htmlentities($row_Recordset1['USER_NAME'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">USER_IC_NUMBER:</td>
      <td><input type="text" name="USER_IC_NUMBER" value="<?php echo htmlentities($row_Recordset1['USER_IC_NUMBER'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">USER_DATE_OF_BIRTH:</td>
      <td><input type="text" name="USER_DATE_OF_BIRTH" value="<?php echo htmlentities($row_Recordset1['USER_DATE_OF_BIRTH'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">USER_GENDER:</td>
      <td><input type="text" name="USER_GENDER" value="<?php echo htmlentities($row_Recordset1['USER_GENDER'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">USER_EMAIL:</td>
      <td><input type="text" name="USER_EMAIL" value="<?php echo htmlentities($row_Recordset1['USER_EMAIL'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">USER_PHONE_NUMBER:</td>
      <td><input type="text" name="USER_PHONE_NUMBER" value="<?php echo htmlentities($row_Recordset1['USER_PHONE_NUMBER'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">USER_ADDRESS:</td>
      <td><input type="text" name="USER_ADDRESS" value="<?php echo htmlentities($row_Recordset1['USER_ADDRESS'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">USER_PASSWORD:</td>
      <td><input type="text" name="USER_PASSWORD" value="<?php echo htmlentities($row_Recordset1['USER_PASSWORD'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form2" />
  <input type="hidden" name="USER_ID_NUMBER" value="<?php echo $row_Recordset1['USER_ID_NUMBER']; ?>" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<div id="apDiv2">UPDATE USER RECORD
  <input type="hidden" name="USER_ID_NUMBER" />
</div>
<p>&nbsp;</p>
<div id="apDiv3">
  <table width="200" border="1">
    <tr>
      <td height="43" bgcolor="#000000"><strong>&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/lab_booking_system/Templates/USERMENU.php">MENU</a></strong></td>
    </tr>
  </table>
</div>
<div id="apDiv4"><img src="../image/UTM-LOGO.png" width="416" height="351" alt="XD" /></div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
