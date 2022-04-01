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

mysql_select_db($database_dbcon, $dbcon);
$query_Recordset1 = "SELECT LAB_NAME, IT_LAB_TIME, IT_LAB_DATE, LAB_TIME_END FROM it_lab";
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
	width: 929px;
	height: 115px;
	z-index: 1;
	left: 172px;
	top: 164px;
}
#apDiv2 {
	position: absolute;
	width: 638px;
	height: 62px;
	z-index: 2;
	left: 238px;
	top: 36px;
}
#apDiv2 strong {
	font-size: 36px;
	text-align: center;
	color: #000;
}
#apDiv2 {
	color: #99F;
}
#apDiv2 {
	color: #99F;
}
#apDiv2 {
	color: #FCC;
}
body {
	background-color: #CCF;
}
#apDiv3 {
	position: absolute;
	width: 200px;
	height: 78px;
	z-index: 3;
	left: 913px;
	top: 28px;
}
#apDiv3 table tr td {
	text-align: center;
	font-weight: bold;
	color: #FFF;
	font-size: 24px;
}
</style>
</head>

<body>
<div id="apDiv1">
  <table width="928" height="103" border="1">
    <tr>
      <td bgcolor="#FFCCFF">IT_LAB_NAME</td>
      <td bgcolor="#FFCCFF">IT_LAB_TIME</td>
      <td bgcolor="#FFCCFF">IT_LAB_DATE</td>
      <td bgcolor="#FFCCFF">LAB_TIME_END</td>
    </tr>
    <?php do { ?>
      <tr>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['LAB_NAME']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['IT_LAB_TIME']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['IT_LAB_DATE']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['LAB_TIME_END']; ?></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
<div id="apDiv3">
  <table width="200" height="54" border="1">
    <tr>
      <td bgcolor="#000000"><a href="USERBOOKING.php">MENU</a></td>
    </tr>
  </table>
</div>
<div id="apDiv2"><strong>LAB THAT HAD BEEN BOOKED</strong></div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
