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
$query_Recordset1 = "SELECT * FROM non_utm_registration";
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
	left: 303px;
	top: 37px;
	text-align: center;
	font-weight: bold;
	font-size: 36px;
	color: #FFF;
}
#apDiv2 {
	position: absolute;
	width: 1134px;
	height: 378px;
	z-index: 2;
	left: 9px;
	top: 139px;
	color: #000;
}
.N {
	text-align: center;
}
#apDiv2 table tr td {
	text-align: center;
	font-weight: bold;
	color: #000;
	font-size: 16px;
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
#apDiv4 {
	position: absolute;
	width: 698px;
	height: 115px;
	z-index: 4;
	left: 234px;
	top: 149px;
}
#apDiv5 {
	position: absolute;
	width: 257px;
	height: 73px;
	z-index: 3;
	left: 901px;
	top: 40px;
}
#apDiv5 table tr td {
	font-weight: bold;
	font-size: 36px;
	text-align: center;
	color: #FFF;
}
#apDiv6 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 4;
	left: 212px;
	top: 161px;
}
.n {
	color: #FFF;
}
#apDiv7 {
	position: absolute;
	width: 200px;
	height: 72px;
	z-index: 1;
	left: 929px;
	top: -106px;
}
#apDiv2 table {
	font-size: 16px;
	color: #000;
}
#apDiv2 #apDiv7 table tr td a {
	font-size: 24px;
}
#apDiv8 {
	position: absolute;
	width: 344px;
	height: 83px;
	z-index: 3;
	left: 22px;
	top: 18px;
	color: #FFF;
}
#apDiv8 form p label {
	font-weight: bold;
	color: #FFF;
}
#apDiv9 {
	position: absolute;
	width: 200px;
	height: 26px;
	z-index: 4;
	left: 21px;
	top: 12px;
}
</style>
</head>

<body>
<div id="apDiv9"><a titlt="print screen" alt="print screen" onClick="window.print();"target="_blank"style="cursor: pointer; font-size: 24px; font-weight: bold; color: #FFF;">PRINT</a></div>
<div id="apDiv1">USER RECORDS</div>
<div id="apDiv2">
  <div id="apDiv7">
    <table width="200" height="60" border="1">
      <tr>
        <td bgcolor="#000000"><a href="/lab_booking_system/Templates/ADMINMENU.php">MENU</a></td>
      </tr>
    </table>
  </div>
  <table border="1">
    <tr>
      <td bgcolor="#FFCCFF">USER_ID_NUMBER</td>
      <td bgcolor="#FFCCFF">USER_NAME</td>
      <td bgcolor="#FFCCFF">USER_IC_NUMBER</td>
      <td bgcolor="#FFCCFF">USER_DATE_OF_BIRTH</td>
      <td bgcolor="#FFCCFF">USER_GENDER</td>
      <td bgcolor="#FFCCFF">USER_EMAIL</td>
      <td bgcolor="#FFCCFF">USER_PHONE_NUMBER</td>
      <td bgcolor="#FFCCFF">USER_ADDRESS</td>
      <td bgcolor="#FFCCFF">USER_PASSWORD</td>
      <td bgcolor="#FFCCFF">&nbsp;</td>
  </thead>
  <tbody id="myTable">
 
    <?php do { ?>
      <tr>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['USER_ID_NUMBER']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['USER_NAME']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['USER_IC_NUMBER']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['USER_DATE_OF_BIRTH']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['USER_GENDER']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['USER_EMAIL']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['USER_PHONE_NUMBER']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['USER_ADDRESS']; ?></td>
        <td bgcolor="#FFCCFF"><?php echo $row_Recordset1['USER_PASSWORD']; ?></td>
        <td bgcolor="#FFCCFF"><a href="ADMINUSERRECORDDELETE.php?USER_ID_NUMBER=<?php echo $row_Recordset1['USER_ID_NUMBER']; ?>">DELETE</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><!DOCTYPE html>
<html>
<div id="apDiv8"><head>
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

<h2>SEARCH
  <input id="myInput" type="text" placeholder="Search..">
<br><br>
</h2>
</div>
<tr class="header">
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
&nbsp;</p>
