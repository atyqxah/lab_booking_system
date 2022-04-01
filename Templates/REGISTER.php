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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form5")) {
  $insertSQL = sprintf("INSERT INTO non_utm_registration (USER_ID_NUMBER, USER_NAME, USER_IC_NUMBER, USER_DATE_OF_BIRTH, USER_GENDER, USER_EMAIL, USER_PHONE_NUMBER, USER_ADDRESS) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['USER_ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['USER_NAME'], "text"),
                       GetSQLValueString($_POST['USER_IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['USER_DATE_OF_BIRTH'], "date"),
                       GetSQLValueString($_POST['USER_GENDER'], "text"),
                       GetSQLValueString($_POST['USER_EMAIL'], "text"),
                       GetSQLValueString($_POST['USER_PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['USER_ADDRESS'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "/lab_booking_system/Templates/LOGINUSER.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form6")) {
  $insertSQL = sprintf("INSERT INTO non_utm_registration (USER_ID_NUMBER, USER_NAME, USER_IC_NUMBER, USER_DATE_OF_BIRTH, USER_GENDER, USER_EMAIL, USER_PHONE_NUMBER, USER_ADDRESS, USER_PASSWORD) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['USER_ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['USER_NAME'], "text"),
                       GetSQLValueString($_POST['USER_IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['USER_DATE_OF_BIRTH'], "date"),
                       GetSQLValueString($_POST['USER_GENDER'], "text"),
                       GetSQLValueString($_POST['USER_EMAIL'], "text"),
                       GetSQLValueString($_POST['USER_PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['USER_ADDRESS'], "text"),
                       GetSQLValueString($_POST['USER_PASSWORD'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "/lab_booking_system/Templates/LOGINUSER.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_dbcon, $dbcon);
$query_Recordset1 = "SELECT * FROM non_utm_registration";
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
#apDiv1 {
	position: absolute;
	width: 394px;
	height: 350px;
	z-index: 1;
	left: 862px;
	top: 317px;
}
#apDiv2 {
	position: absolute;
	width: 648px;
	height: 56px;
	z-index: 2;
	left: 386px;
	top: 50px;
	text-align: center;
	font-size: 36px;
	color: #FFF;
}
#apDiv3 {
	position: absolute;
	width: 57px;
	height: 26px;
	z-index: 3;
	left: 707px;
	top: 719px;
}
#apDiv4 {
	position: absolute;
	width: 332px;
	height: 277px;
	z-index: 4;
	left: 101px;
	top: -5px;
	color: #000;
}
body {
	background-color: #5D001D;
	background-image: url();
}
#apDiv5 {
	position: absolute;
	width: 489px;
	height: 629px;
	z-index: 5;
	left: 451px;
	top: 135px;
	background-color: #CCCCCC;
}
#apDiv6 {
	position: absolute;
	width: 200px;
	height: 73px;
	z-index: 6;
	top: 49px;
	left: 1043px;
}
#form1 #apDiv6 table tr td {
	font-weight: bold;
	text-align: center;
	font-size: 24px;
	color: #FFF;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div id="apDiv2">USER SIGN UP</div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div id="apDiv6">
    <table width="200" height="53" border="1">
      <tr>
        <td bgcolor="#000000"><a href="/lab_booking_system/Templates/1aloginbaru.php">HOME</a></td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<form method="post" name="form3" id="form3">
</form>
<div id="apDiv5">
  <div id="apDiv4">
    <form id="form2" name="form2" method="post" action="">
      <p><img src="/lab_booking_system/image/UTM-LOGO.png" width="294" height="247" alt="m" /></p>
      <p>&nbsp; </p>
    </form>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> 
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form5" id="form5">
    <input type="hidden" name="MM_insert" value="form5" />
  </form>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form6" id="form6">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_ID_NUMBER:</td>
        <td><input type="text" name="USER_ID_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_NAME:</td>
        <td><input type="text" name="USER_NAME" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_IC_NUMBER:</td>
        <td><input type="text" name="USER_IC_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_DATE_OF_BIRTH:</td>
        <td><input type="text" name="USER_DATE_OF_BIRTH" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_GENDER:</td>
        <td><input type="text" name="USER_GENDER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_EMAIL:</td>
        <td><input type="text" name="USER_EMAIL" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_PHONE_NUMBER:</td>
        <td><input type="text" name="USER_PHONE_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_ADDRESS:</td>
        <td><input type="text" name="USER_ADDRESS" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_PASSWORD:</td>
        <td><input type="text" name="USER_PASSWORD" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Insert record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form6" />
  </form>
  <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
