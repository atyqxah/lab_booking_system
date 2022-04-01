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
?>
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
$query_Record8 = "SELECT * FROM it_lab";
$Record8 = mysql_query($query_Record8, $dbcon) or die(mysql_error());
$row_Record8 = mysql_fetch_assoc($Record8);
$totalRows_Record8 = mysql_num_rows($Record8);
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
	width: 1200px;
	height: 331px;
	z-index: 4;
	left: 13px;
	top: 120px;
}
#apDiv5 {
	position: absolute;
	width: 424px;
	height: 46px;
	z-index: 5;
	left: 550px;
	top: 131px;
}
#apDiv5 #form1 label {
	color: #FFFFFF;
}
.m {
	color: #FFFFFF;
}
#apDiv6 {
	position: absolute;
	width: 285px;
	height: 115px;
	z-index: 5;
	left: 85px;
	top: 9px;
}
#apDiv7 {
	position: absolute;
	width: 200px;
	height: 27px;
	z-index: 6;
	left: 20px;
	top: 1px;
}
</style>
</head>

<body>
<div id="apDiv1"><strong>USER BOOKING RECORD</strong></div>
<div id="apDiv3">
  <table width="206" height="51" border="1">
    <tr>
      <td bgcolor="#000000"><a href="/lab_booking_system/Templates/STAFFMENU.php">MENU</a></td>
    </tr>
  </table>
</div>
<div id="apDiv4">
  <table border="1">
    <tr>
      <td bgcolor="#FFCCFF">IT_LAB_ID</td>
      <td bgcolor="#FFCCFF">LAB_NAME</td>
      <td bgcolor="#FFCCFF">IT_LAB_TIME</td>
      <td bgcolor="#FFCCFF">IT_LAB_DATE</td>
      <td bgcolor="#FFCCFF">LAB_TIME_END</td>
      <td bgcolor="#FFCCFF">NUMBER_OF_PARTICIPANTS</td>
      <td bgcolor="#FFCCFF">NOTIFICATION</td>
      <td bgcolor="#FFCCFF">USER_ID_NUMBER</td>
      <td bgcolor="#FFCCFF">ID_NUMBER</td>
      <td bgcolor="#FFCCFF">&nbsp;</td>
    </tr>
    <tbody id="myTable">
    <?php do { ?>
      <tr>
        <td bgcolor="#FFCCFF"><?php echo $row_Record8['IT_LAB_ID']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Record8['LAB_NAME']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Record8['IT_LAB_TIME']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Record8['IT_LAB_DATE']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Record8['LAB_TIME_END']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Record8['NUMBER_OF_PARTICIPANTS']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Record8['ITNOT']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Record8['USER_ID_NUMBER']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Record8['ID_NUMBER']; ?></td>
        <td bgcolor="#FFCCFF"><a href="STAFFBOOKINGRECORD2DELETE.php?IT_LAB_ID=<?php echo $row_Record8['IT_LAB_ID']; ?>">DELETE</a></td>
      </tr>
      <?php } while ($row_Record8 = mysql_fetch_assoc($Record8)); ?>
  </table>
</div>
<div align="center">
  <div id="apDiv7"><a titlt="print screen" alt="print screen" onClick="window.print();"target="_blank"style="cursor: pointer; color: #FFFFFF; font-size: 24px;">PRINT</a></div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><!DOCTYPE html>
<html>
<div id="apDiv6">
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
</h2></div>
<tr class="header">
</body>
</html>
<?php
mysql_free_result($Record8);
?>
