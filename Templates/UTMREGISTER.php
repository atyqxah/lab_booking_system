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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO utm_registration (ID_NUMBER, NAME, UTM_ID_NUMBER, DATE_OF_BIRTH, IC_NUMBER, GENDER, PHONE_NUMBER, EMAIL, ADDRESS) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['NAME'], "text"),
                       GetSQLValueString($_POST['UTM_ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['DATE_OF_BIRTH'], "date"),
                       GetSQLValueString($_POST['IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['GENDER'], "text"),
                       GetSQLValueString($_POST['PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['ADDRESS'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "/lab_booking_system/Templates/LOGINUTMUSER.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO utm_registration (ID_NUMBER, NAME, UTM_ID_NUMBER, DATE_OF_BIRTH, IC_NUMBER, GENDER, PHONE_NUMBER, EMAIL, ADDRESS, UTM_PASSWORD) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['NAME'], "text"),
                       GetSQLValueString($_POST['UTM_ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['DATE_OF_BIRTH'], "date"),
                       GetSQLValueString($_POST['IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['GENDER'], "text"),
                       GetSQLValueString($_POST['PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['ADDRESS'], "text"),
                       GetSQLValueString($_POST['UTM_PASSWORD'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "/lab_booking_system/Templates/LOGINUTMUSER.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
	width: 174px;
	height: 407px;
	z-index: 1;
	left: 660px;
	top: 315px;
}
#apDiv2 {
	position: absolute;
	width: 648px;
	height: 56px;
	z-index: 2;
	left: 358px;
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
	left: 715px;
	top: 769px;
}
#apDiv4 {
	position: absolute;
	width: 278px;
	height: 248px;
	z-index: 4;
	left: 92px;
	top: 2px;
	color: #000;
}
#apDiv5 {
	position: absolute;
	width: 466px;
	height: 599px;
	z-index: 3;
	left: 433px;
	top: 130px;
	background-color: #999999;
}
body {
	background-image: url();
	background-color: #5D001D;
}
#apDiv6 {
	position: absolute;
	width: 289px;
	height: 250px;
	z-index: 4;
	left: 538px;
	top: 134px;
}
#apDiv7 {
	position: absolute;
	width: 200px;
	height: 53px;
	z-index: 5;
	left: 611px;
	top: -79px;
}
#apDiv5 #apDiv7 table tr td {
	text-align: center;
	font-weight: bold;
	font-size: 24px;
	color: #FFF;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div id="apDiv2">UTM USER SIGN UP</div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div id="apDiv6"><img src="/lab_booking_system/image/UTM-LOGO.png" width="270" height="246" alt="m" /></div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<div id="apDiv5">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div id="apDiv7">
    <table width="200" height="47" border="1">
      <tr>
        <td bgcolor="#000000"><a href="/lab_booking_system/Templates/1aloginbaru.php">HOME</a></td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form3" id="form3">
    <input type="hidden" name="MM_insert" value="form3" />
  </form>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">ID_NUMBER:</td>
        <td><input type="text" name="ID_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">NAME:</td>
        <td><input type="text" name="NAME" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">UTM_ID_NUMBER:</td>
        <td><input type="text" name="UTM_ID_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">DATE_OF_BIRTH:</td>
        <td><input type="text" name="DATE_OF_BIRTH" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">IC_NUMBER:</td>
        <td><input type="text" name="IC_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">GENDER:</td>
        <td><input type="text" name="GENDER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">PHONE_NUMBER:</td>
        <td><input type="text" name="PHONE_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">EMAIL:</td>
        <td><input type="text" name="EMAIL" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">ADDRESS:</td>
        <td><input type="text" name="ADDRESS" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">UTM_PASSWORD:</td>
        <td><input type="text" name="UTM_PASSWORD" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Insert record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form2" />
  </form>
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
</body>
</html>
