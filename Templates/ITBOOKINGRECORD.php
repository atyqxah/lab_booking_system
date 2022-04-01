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

$colname_Recordset1 = "-1";
if (isset($_GET['IT_LAB_ID'])) {
  $colname_Recordset1 = $_GET['IT_LAB_ID'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_Recordset1 = sprintf("SELECT IT_LAB_ID, LAB_NAME, IT_LAB_TIME, IT_LAB_DATE, LAB_TIME_END, NUMBER_OF_PARTICIPANTS, USER_ID_NUMBER, ID_NUMBER FROM it_lab WHERE IT_LAB_ID = %s", GetSQLValueString($colname_Recordset1, "text"));
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
	width: 200px;
	height: 115px;
	z-index: 1;
	left: 43px;
	top: 155px;
}
#apDiv1 table {
	color: #000;
	font-weight: bold;
}
#apDiv2 {
	position: absolute;
	width: 439px;
	height: 64px;
	z-index: 2;
	font-size: 36px;
	left: 476px;
	top: 50px;
	font-weight: bold;
}
#apDiv3 {
	position: absolute;
	width: 200px;
	height: 69px;
	z-index: 3;
	left: 1028px;
	top: 46px;
}
#apDiv3 table tr td {
	color: #FFF;
	font-size: 24px;
	text-align: center;
	font-weight: bold;
}
#apDiv4 {
	position: absolute;
	width: 379px;
	height: 52px;
	z-index: 4;
	left: 493px;
	top: 135px;
}
#apDiv5 {
	position: absolute;
	width: 319px;
	height: 115px;
	z-index: 4;
	left: 39px;
	top: 38px;
}
#apDiv6 {
	position: absolute;
	width: 200px;
	height: 49px;
	z-index: 5;
	left: 40px;
	top: 10px;
}
</style>
</head>

<body>
<div id="apDiv6"><a titlt="print screen" alt="print screen" onclick="window.print();"target="_blank"style="cursor: pointer; color: #000; font-weight: bold; font-size: 24px;">PRINT</a></div>
<div id="apDiv1">
  <table border="1">
    <tr>
      <td bgcolor="#D6D6D6">IT_LAB_ID</td>
      <td bgcolor="#D6D6D6">LAB_NAME</td>
      <td bgcolor="#D6D6D6">IT_LAB_TIME</td>
      <td bgcolor="#D6D6D6">IT_LAB_DATE</td>
      <td bgcolor="#D6D6D6">LAB_TIME_END</td>
      <td bgcolor="#D6D6D6">NUMBER_OF_PARTICIPANTS</td>
      <td bgcolor="#D6D6D6">NOTIFICATION</td>
      <td bgcolor="#D6D6D6">USER_ID_NUMBER</td>
      <td bgcolor="#D6D6D6">ID_NUMBER</td>
      <td bgcolor="#D6D6D6">&nbsp;</td>
    </tr>
    <tbody id="myTable">
    <?php do { ?>
      <tr>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['IT_LAB_ID']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['LAB_NAME']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['IT_LAB_TIME']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['IT_LAB_DATE']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['LAB_TIME_END']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['NUMBER_OF_PARTICIPANTS']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['ITNOT']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['USER_ID_NUMBER']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['ID_NUMBER']; ?></td>
        <td bgcolor="#D6D6D6"><a href="ITBOOKINGRECORDDELETE.php?IT_LAB_ID=<?php echo $row_Recordset1['IT_LAB_ID']; ?>">DELETE</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
<div id="apDiv5">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2><span class="m">SEARCH</span>
  <input id="myInput" type="text" placeholder="Search..">
<br><br>
</h2>
<tr class="header">
</div>
<div id="apDiv2"> BOOKING RECORD</div>
<div id="apDiv3">
  <table width="200" border="1">
    <tr>
      <td height="52" bgcolor="#000000"><a href="/lab_booking_system/Templates/COORDINATORMENU.php">MENU</a></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
