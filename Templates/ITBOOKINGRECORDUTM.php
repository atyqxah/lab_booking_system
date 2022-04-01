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
$query_Recordset1 = "SELECT * FROM it_lab";
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
	left: 65px;
	top: 173px;
}
#apDiv1 table {
	color: #000;
	font-weight: bold;
}
#apDiv2 {
	position: absolute;
	width: 608px;
	height: 64px;
	z-index: 2;
	font-size: 36px;
	left: 370px;
	top: 50px;
	font-weight: bold;
}
#apDiv3 {
	position: absolute;
	width: 200px;
	height: 69px;
	z-index: 3;
	left: 992px;
	top: 53px;
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
	height: 53px;
	z-index: 5;
	left: 38px;
	top: 4px;
}
</style>
</head>

<body>
<div id="apDiv6"><a titlt="print screen" alt="print screen" onclick="window.print();"target="_blank"style="cursor: pointer; color: #000; font-size: 24px; font-weight: bold;">PRINT</a></div>
<div id="apDiv1">
  <table border="1">
    <tr>
      <td bgcolor="#99CCCC">IT_LAB_ID</td>
      <td bgcolor="#99CCCC">IT_LAB_NAME</td>
      <td bgcolor="#99CCCC">IT_LAB_TIME</td>
      <td bgcolor="#99CCCC">IT_LAB_DATE</td>
      <td bgcolor="#99CCCC">HOUR_USE</td>
      <td bgcolor="#99CCCC">NUMBER_OF_PARTICIPANTS</td>
      <td bgcolor="#99CCCC">ID_NUMBER</td>
      <td bgcolor="#99CCCC">&nbsp;</td>
     </thead>
  <tbody id="myTable">
    <?php do { ?>
      <tr>
        <td bgcolor="#99CCCC"><?php echo $row_Recordset1['IT_LAB_ID']; ?></td>
        <td bgcolor="#99CCCC"><?php echo $row_Recordset1['IT_LAB_NAME']; ?></td>
        <td bgcolor="#99CCCC"><?php echo $row_Recordset1['IT_LAB_TIME']; ?></td>
        <td bgcolor="#99CCCC"><?php echo $row_Recordset1['IT_LAB_DATE']; ?></td>
        <td bgcolor="#99CCCC"><?php echo $row_Recordset1['HOUR_USE']; ?></td>
        <td bgcolor="#99CCCC"><?php echo $row_Recordset1['NUMBER_OF_PARTICIPANTS']; ?></td>
        <td bgcolor="#99CCCC"><?php echo $row_Recordset1['ID_NUMBER']; ?></td>
        <td bgcolor="#99CCCC"><a href="ITBOOKINGRECORDUTMDELETE?ID_NUMBER=<?php echo $row_Recordset1['ID_NUMBER']; ?>">DELETE</a></td>
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
<div id="apDiv2">UTM USER IT BOOKING RECORD</div>
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
