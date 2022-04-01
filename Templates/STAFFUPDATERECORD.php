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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE staff SET STAFF_NAME=%s, STAFF_IC_NUMBER=%s, STAFF_PHONE_NUMBER=%s, STAFF_EMAIL=%s, STAFF_PASSWORD=%s WHERE STAFF_ID_NUMBER=%s",
                       GetSQLValueString($_POST['STAFF_NAME'], "text"),
                       GetSQLValueString($_POST['STAFF_IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['STAFF_PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['STAFF_EMAIL'], "text"),
                       GetSQLValueString($_POST['STAFF_PASSWORD'], "text"),
                       GetSQLValueString($_POST['STAFF_ID_NUMBER'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

  $updateGoTo = "STAFFUPDATERECORD.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['STAFF_ID_NUMBER'])) {
  $colname_Recordset1 = $_GET['STAFF_ID_NUMBER'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_Recordset1 = sprintf("SELECT * FROM staff WHERE STAFF_ID_NUMBER = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $dbcon) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 512px;
	height: 390px;
	z-index: 1;
	left: 609px;
	top: 170px;
	background-color: #FFFFFF;
}
#apDiv2 {
	position: absolute;
	width: 376px;
	height: 60px;
	z-index: 2;
	font-size: 36px;
	color: #FFF;
	left: 500px;
	top: 47px;
}
#apDiv2 {
	color: #000;
	text-align: center;
	font-weight: bold;
}
body {
	background-color: #FFF;
}
#apDiv3 {
	position: absolute;
	width: 200px;
	height: 73px;
	z-index: 3;
	left: 1010px;
	top: 46px;
}
#apDiv3 table tr td {
	font-weight: bold;
	text-align: center;
	font-size: 24px;
	color: #FFF;
}
body,td,th {
	color: #000;
}
#apDiv4 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 4;
	left: 62px;
	top: 154px;
}
</style>
</head>

<body>
<div id="apDiv1">
  <form method="post" name="form1" id="form1">
    <p>&nbsp;</p>
  </form>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_ID_NUMBER:</td>
        <td><?php echo $row_Recordset1['STAFF_ID_NUMBER']; ?></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_NAME:</td>
        <td><input type="text" name="STAFF_NAME" value="<?php echo htmlentities($row_Recordset1['STAFF_NAME'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_IC_NUMBER:</td>
        <td><input type="text" name="STAFF_IC_NUMBER" value="<?php echo htmlentities($row_Recordset1['STAFF_IC_NUMBER'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_PHONE_NUMBER:</td>
        <td><input type="text" name="STAFF_PHONE_NUMBER" value="<?php echo htmlentities($row_Recordset1['STAFF_PHONE_NUMBER'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_EMAIL:</td>
        <td><input type="text" name="STAFF_EMAIL" value="<?php echo htmlentities($row_Recordset1['STAFF_EMAIL'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_PASSWORD:</td>
        <td><input type="text" name="STAFF_PASSWORD" value="<?php echo htmlentities($row_Recordset1['STAFF_PASSWORD'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Update record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form2" />
    <input type="hidden" name="STAFF_ID_NUMBER" value="<?php echo $row_Recordset1['STAFF_ID_NUMBER']; ?>" />
  </form>
  <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<div id="apDiv4"><img src="../image/UTM-LOGO.png" width="460" height="352" alt="M" /></div>
<div id="apDiv2">STAFF RECORD</div>
<div id="apDiv3">
  <table width="200" height="62" border="1">
    <tr>
      <td bgcolor="#000000"><a href="/lab_booking_system/Templates/STAFFMENU.php">MENU</a></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
