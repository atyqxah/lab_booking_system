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
  $insertSQL = sprintf("INSERT INTO notification (NOT_ID, EMAIL, NOTIFICATION, ID_NUMBER, STATUS, USER_ID_NUMBER) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['NOT_ID'], "text"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['NOTIFICATION'], "text"),
                       GetSQLValueString($_POST['ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['STATUS'], "text"),
                       GetSQLValueString($_POST['USER_ID_NUMBER'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());
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
	width: 476px;
	height: 60px;
	z-index: 1;
	left: 478px;
	top: 30px;
	text-align: center;
	font-weight: bold;
	font-size: 36px;
	color: #CCCCCC;
}
#apDiv2 {
	position: absolute;
	width: 1701px;
	height: 690px;
	z-index: 2;
	left: -3px;
	top: 154px;
}
.N {
	text-align: center;
}
#apDiv2 table tr td {
	text-align: center;
	font-weight: bold;
}
#apDiv3 {
	position: absolute;
	width: 226px;
	height: 68px;
	z-index: 3;
	left: 1079px;
	top: 31px;
}
#apDiv3 table tr td {
	text-align: center;
	color: #FFF;
	font-weight: bold;
	font-size: 24px;
}
body {
	background-image: url();
	background-color: #5D001D;
}
#apDiv3 table tr td a {
	color: #FFF;
}
body,td,th {
	color: #000000;
	font-weight: bold;
}
#apDiv4 {
	position: absolute;
	width: 757px;
	height: 339px;
	z-index: 4;
	left: 317px;
	top: 146px;
	background-color: #A6A6A6;
}
#apDiv4 #form1 p {
	text-align: center;
}
#apDiv5 {
	position: absolute;
	width: 398px;
	height: 256px;
	z-index: 5;
	left: 206px;
	top: 145px;
	text-align: center;
	background-color: #A6A6A6;
}
#apDiv5 #form3 table {
	text-align: left;
}
#apDiv6 {
	position: absolute;
	width: 458px;
	height: 259px;
	z-index: 6;
	left: 11px;
	top: 147px;
	background-color: #A6A6A6;
}
#apDiv6 #form4 p {
	text-align: center;
}
</style>
</head>

<body>
<div id="apDiv1"><strong>BOOKING STATUS</strong></div>
<div id="apDiv3">
  <table width="206" height="51" border="1">
    <tr>
      <td bgcolor="#000000"><a href="/lab_booking_system/Templates/BOOKINGRECORDCOORDINATOR.php">MENU</a></td>
    </tr>
  </table>
</div>
<div id="apDiv4">
  <form method="post" name="form1" id="form1">
    <p>&nbsp;</p>
    <p> STATUS
      <input type="hidden" name="NOTIFICATION" />
    </p>
  </form>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form3" id="form3">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">NOT_ID:</td>
        <td><input type="text" name="NOT_ID" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">EMAIL:</td>
        <td><input type="text" name="EMAIL" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right" valign="top">NOTIFICATION:</td>
        <td><textarea name="NOTIFICATION" cols="50" rows="5"></textarea></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">ID_NUMBER:</td>
        <td><input type="text" name="ID_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STATUS:</td>
        <td><select name="STATUS">
          <option value="APPROVED" selected="selected" >APPROVED</option>
          <option value="NOT APPROVED" >NOT APPROVED</option>
        </select></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_ID_NUMBER:</td>
        <td><input type="text" name="USER_ID_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Insert record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form3" />
  </form>
  <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<div align="center"></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>