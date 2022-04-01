<?php require_once('../Connections/dbcon.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "/lab_booking_system/Templates/1aloginbaru.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

mysql_select_db($database_dbcon, $dbcon);
$query_Recordset1 = "SELECT * FROM staff";
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
	background-color: #999999;
	color: #003;
}
#apDiv1 {
	position: absolute;
	width: 523px;
	height: 538px;
	z-index: 1;
	left: 653px;
	top: 41px;
	color: #FFF;
}
.DDD {
	color: #000099;
}
#apDiv1 #form1 table tr td {
	font-size: 36px;
	font-weight: bold;
	text-align: center;
}
body,td,th {
	color: #FFF;
}
#apDiv1 #form1 table tr td a {
	color: #FFF;
}
</style>
</head>

<body>
<div id="apDiv1">
  <form id="form1" name="form1" method="post" action="">
    <table width="511" height="511" border="1">
      <tr>
        <td width="402" height="112" bgcolor="#5D001D"><a href="<?php echo $logoutAction ?>">LOGOUT</a></td>
      </tr>
      <tr>
        <td height="132" bgcolor="#5D001D"><a href="STAFFUPDATERECORD.php?STAFF_ID_NUMBER=<?php echo $row_Recordset1['STAFF_ID_NUMBER']; ?>">UPDATE PROFILE</a><a href="/lab_booking_system/Templates/STAFFRECORD.php"></a></td>
      </tr>
      <tr>
        <td height="132" bgcolor="#5D001D"><a href="STAFFBOOKINGRECORD2.php">IT LAB BOOKING</a></td>
      </tr>
    </table>
  </form>
</div>
<p>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/lab_booking_system/image/UTM-LOGO.png" width="396" height="378" alt="D" /></p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
