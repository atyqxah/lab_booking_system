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
$query_Recordset1 = "SELECT * FROM notification";
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
	left: 64px;
	top: 132px;
}
#apDiv5 {
	position: absolute;
	width: 292px;
	height: 115px;
	z-index: 5;
	left: 101px;
	top: 13px;
}
#apDiv5 h2 .m {
	color: #FFFFFF;
}
#apDiv6 {
	position: absolute;
	width: 200px;
	height: 26px;
	z-index: 6;
	left: 41px;
	top: 13px;
}
</style>
</head>

<body>
<div id="apDiv1"><strong>NOTIFICATION RECORD</strong></div>
<div id="apDiv3">
  <table width="206" height="51" border="1">
    <tr>
      <td bgcolor="#000000"><a href="/lab_booking_system/Templates/COORDINATORMENU.php">MENU</a></td>
    </tr>
  </table>
</div>
<div id="apDiv4">
  <table border="1">
    <tr>
      <td bgcolor="#FFCCFF">NOT_ID</td>
      <td bgcolor="#FFCCFF">EMAIL</td>
      <td bgcolor="#FFCCFF">NOTIFICATION</td>
      <td bgcolor="#FFCCFF">USER_ID_NUMBER</td>
      <td bgcolor="#FFCCFF">ID_NUMBER</td>
      <td bgcolor="#FFCCFF">STATUS</td>
      <td bgcolor="#FFCCFF">&nbsp;</td>
    </tr>
    <tbody id="myTable">
    <?php do { ?>
      <tr>
        <td height="23" bgcolor="#FFCCFF"><?php echo $row_Recordset1['NOT_ID']; ?></td>
        <td bgcolor="#FFCCFF"><a href="mailto:<?php echo $row_Recordset1['EMAIL']; ?>"><?php echo $row_Recordset1['EMAIL']; ?></a></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['NOTIFICATION']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['USER_ID_NUMBER']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['ID_NUMBER']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['STATUS']; ?></td>
        <td bgcolor="#FFCCFF"><a href="RECORDCOORDINATORSTATUSDELETE.php?NOT_ID=<?php echo $row_Recordset1['NOT_ID']; ?>">DELETE</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
<div align="center">
  <div id="apDiv6"><a titlt="print screen" alt="print screen" onclick="window.print();"target="_blank"style="cursor: pointer; color: #FFFFFF; font-size: 24px;">PRINT</a></div>
</div>
<p>&nbsp;</p>
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
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
