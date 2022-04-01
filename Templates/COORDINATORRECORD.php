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
  $updateSQL = sprintf("UPDATE it_coordinator SET C_IC_NUMBER=%s, C_NAME=%s, C_PHONE_NUMBER=%s, C_EMAIL=%s, C_PASSWORD=%s WHERE C_ID_NUMBER=%s",
                       GetSQLValueString($_POST['C_IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['C_NAME'], "text"),
                       GetSQLValueString($_POST['C_PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['C_EMAIL'], "text"),
                       GetSQLValueString($_POST['C_PASSWORD'], "text"),
                       GetSQLValueString($_POST['C_ID_NUMBER'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

  $updateGoTo = "COORDINATORRECORD.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['C_ID_NUMBER'])) {
  $colname_Recordset1 = $_GET['C_ID_NUMBER'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_Recordset1 = sprintf("SELECT * FROM it_coordinator WHERE C_ID_NUMBER = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $dbcon) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<style type="text/css">
body {
	background-color: #FFF;
}
#apDiv1 {
	position: absolute;
	width: 460px;
	height: 46px;
	z-index: 1;
	text-align: center;
	color: #000;
	font-size: 36px;
	left: 474px;
	top: 44px;
}
#apDiv2 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 2;
	left: 1046px;
	top: 43px;
}
#apDiv2 table tr td {
	text-align: center;
	font-size: 24px;
	color: #FFF;
}
#apDiv3 {
	position: absolute;
	width: 509px;
	height: 115px;
	z-index: 3;
	left: 514px;
	top: 192px;
}
.MN {
	color: #FFF;
}
#apDiv4 {
	position: absolute;
	width: 230px;
	height: 388px;
	z-index: 4;
	left: 25px;
	top: 143px;
}
#apDiv2 table tr td a {
	font-weight: bold;
}
</style>
<div id="apDiv1">INFORMATION UPDATE</div>
<div id="apDiv2">
  <table width="200" border="1">
    <tr>
      <td height="46" bgcolor="#000000"><a href="COORDINATORMENU.php">MENU</a></td>
    </tr>
  </table>
</div>
<div id="apDiv3">
  <form method="post" name="form1">
    <input type="hidden" name="C_ID_NUMBER">
  </form>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_ID_NUMBER:</td>
        <td><?php echo $row_Recordset1['C_ID_NUMBER']; ?></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_IC_NUMBER:</td>
        <td><input type="text" name="C_IC_NUMBER" value="<?php echo htmlentities($row_Recordset1['C_IC_NUMBER'], ENT_COMPAT, ''); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_NAME:</td>
        <td><input type="text" name="C_NAME" value="<?php echo htmlentities($row_Recordset1['C_NAME'], ENT_COMPAT, ''); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_PHONE_NUMBER:</td>
        <td><input type="text" name="C_PHONE_NUMBER" value="<?php echo htmlentities($row_Recordset1['C_PHONE_NUMBER'], ENT_COMPAT, ''); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_EMAIL:</td>
        <td><input type="text" name="C_EMAIL" value="<?php echo htmlentities($row_Recordset1['C_EMAIL'], ENT_COMPAT, ''); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_PASSWORD:</td>
        <td><input type="text" name="C_PASSWORD" value="<?php echo htmlentities($row_Recordset1['C_PASSWORD'], ENT_COMPAT, ''); ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Update record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form2" />
    <input type="hidden" name="C_ID_NUMBER" value="<?php echo $row_Recordset1['C_ID_NUMBER']; ?>" />
  </form>
  <p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<div id="apDiv4"><img src="../image/UTM-LOGO.png" width="450" height="363" alt="X" /></div>
<?php
mysql_free_result($Recordset1);
?>
