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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE utm_registration SET NAME=%s, UTM_ID_NUMBER=%s, DATE_OF_BIRTH=%s, IC_NUMBER=%s, GENDER=%s, PHONE_NUMBER=%s, EMAIL=%s, ADDRESS=%s, UTM_PASSWORD=%s WHERE ID_NUMBER=%s",
                       GetSQLValueString($_POST['NAME'], "text"),
                       GetSQLValueString($_POST['UTM_ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['DATE_OF_BIRTH'], "date"),
                       GetSQLValueString($_POST['IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['GENDER'], "text"),
                       GetSQLValueString($_POST['PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['ADDRESS'], "text"),
                       GetSQLValueString($_POST['UTM_PASSWORD'], "text"),
                       GetSQLValueString($_POST['ID_NUMBER'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

  $updateGoTo = "UTMUSERUPDATE.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE utm_registration SET NAME=%s, UTM_ID_NUMBER=%s, DATE_OF_BIRTH=%s, IC_NUMBER=%s, GENDER=%s, PHONE_NUMBER=%s, EMAIL=%s, ADDRESS=%s, UTM_PASSWORD=%s WHERE ID_NUMBER=%s",
                       GetSQLValueString($_POST['NAME'], "text"),
                       GetSQLValueString($_POST['UTM_ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['DATE_OF_BIRTH'], "date"),
                       GetSQLValueString($_POST['IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['GENDER'], "text"),
                       GetSQLValueString($_POST['PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['ADDRESS'], "text"),
                       GetSQLValueString($_POST['UTM_PASSWORD'], "text"),
                       GetSQLValueString($_POST['ID_NUMBER'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());
}

$colname_Recordset1 = "-1";
if (isset($_GET['ID_NUMBER'])) {
  $colname_Recordset1 = $_GET['ID_NUMBER'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_Recordset1 = sprintf("SELECT * FROM utm_registration WHERE ID_NUMBER = %s", GetSQLValueString($colname_Recordset1, "text"));
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
	width: 428px;
	height: 356px;
	z-index: 1;
	left: 649px;
	top: 168px;
	background-color: #FFFFFF;
}
#apDiv2 {
	position: absolute;
	width: 452px;
	height: 61px;
	z-index: 2;
	font-size: 36px;
	font-weight: bold;
	left: 414px;
	top: 30px;
}
#apDiv2 {
	color: #000;
}
body {
	background-color: #FFF;
}
#apDiv3 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 3;
	left: 953px;
	top: 31px;
}
#apDiv3 table tr td {
	font-size: 24px;
	font-weight: bold;
	text-align: center;
	color: #CCC;
}
#apDiv4 {
	position: absolute;
	width: 481px;
	height: 216px;
	z-index: 4;
	left: 119px;
	top: 161px;
}
</style>
</head>

<body>
<div id="apDiv1">
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    <input type="hidden" name="MM_update" value="form1" />
    <input type="hidden" name="ID_NUMBER" value="<?php echo $row_Recordset1['ID_NUMBER']; ?>" />
  </form>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">ID_NUMBER:</td>
        <td><?php echo $row_Recordset1['ID_NUMBER']; ?></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">NAME:</td>
        <td><input type="text" name="NAME" value="<?php echo htmlentities($row_Recordset1['NAME'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">UTM_ID_NUMBER:</td>
        <td><input type="text" name="UTM_ID_NUMBER" value="<?php echo htmlentities($row_Recordset1['UTM_ID_NUMBER'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">DATE_OF_BIRTH:</td>
        <td><input type="text" name="DATE_OF_BIRTH" value="<?php echo htmlentities($row_Recordset1['DATE_OF_BIRTH'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">IC_NUMBER:</td>
        <td><input type="text" name="IC_NUMBER" value="<?php echo htmlentities($row_Recordset1['IC_NUMBER'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">GENDER:</td>
        <td><input type="text" name="GENDER" value="<?php echo htmlentities($row_Recordset1['GENDER'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">PHONE_NUMBER:</td>
        <td><input type="text" name="PHONE_NUMBER" value="<?php echo htmlentities($row_Recordset1['PHONE_NUMBER'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">EMAIL:</td>
        <td><input type="text" name="EMAIL" value="<?php echo htmlentities($row_Recordset1['EMAIL'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">ADDRESS:</td>
        <td><input type="text" name="ADDRESS" value="<?php echo htmlentities($row_Recordset1['ADDRESS'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">UTM_PASSWORD:</td>
        <td><input type="text" name="UTM_PASSWORD" value="<?php echo htmlentities($row_Recordset1['UTM_PASSWORD'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Update record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form2" />
    <input type="hidden" name="ID_NUMBER" value="<?php echo $row_Recordset1['ID_NUMBER']; ?>" />
  </form>
  <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<div id="apDiv4"><img src="../image/UTM-LOGO.png" width="422" height="336" alt="IU" /></div>
<div id="apDiv2">UPDATE INFORMATION</div>
<div id="apDiv3">
  <table width="200" border="1">
    <tr>
      <td height="52" bgcolor="#000000"><a href="/lab_booking_system/Templates/USERMENUUTM.php">MENU</a><a href="UTMUSERRECORD.php"></a></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);


?>
