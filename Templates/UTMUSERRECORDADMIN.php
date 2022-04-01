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
$query_Recordset1 = "SELECT * FROM utm_registration";
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
	color: #FFF;
}
#apDiv2 {
	position: absolute;
	width: 1367px;
	height: 378px;
	z-index: 2;
	left: 25px;
	top: 116px;
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
#apDiv4 {
	position: absolute;
	width: 488px;
	height: 149px;
	z-index: 4;
	left: 107px;
	top: 30px;
}
#apDiv4 #form1 label {
	color: #FFF;
}
#apDiv4 {
	font-weight: bold;
}
#apDiv4 {
	color: #FFF;
}
#apDiv5 {
	position: absolute;
	width: 310px;
	height: 115px;
	z-index: 1;
	left: 51px;
	top: -103px;
}
#apDiv2 #apDiv5 h2 .m {
	color: #FFF;
}
#apDiv6 {
	position: absolute;
	width: 200px;
	height: 31px;
	z-index: 4;
	left: 76px;
	top: 11px;
}
</style>
</head>

<body>
<div id="apDiv6"><a titlt="print screen" alt="print screen" onclick="window.print();"target="_blank"style="cursor: pointer; font-size: 24px; color: #FFF; font-weight: bold;">PRINT</a></div>
<div id="apDiv1">UTM USER RECORDS</div>
<div id="apDiv2">
  <table border="1">
    <tr>
      <td bgcolor="#D6D6D6">ID_NUMBER</td>
      <td bgcolor="#D6D6D6">NAME</td>
      <td bgcolor="#D6D6D6">UTM_ID_NUMBER</td>
      <td bgcolor="#D6D6D6">DATE_OF_BIRTH</td>
      <td bgcolor="#D6D6D6">IC_NUMBER</td>
      <td bgcolor="#D6D6D6">GENDER</td>
      <td bgcolor="#D6D6D6">PHONE_NUMBER</td>
      <td bgcolor="#D6D6D6">EMAIL</td>
      <td bgcolor="#D6D6D6">ADDRESS</td>
      <td bgcolor="#D6D6D6">UTM_PASSWORD</td>
      <td bgcolor="#D6D6D6">&nbsp;</td>
    </thead>
  <tbody id="myTable">
    <?php do { ?>
      <tr>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['ID_NUMBER']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['NAME']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['UTM_ID_NUMBER']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['DATE_OF_BIRTH']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['IC_NUMBER']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['GENDER']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['PHONE_NUMBER']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['EMAIL']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['ADDRESS']; ?></td>
        <td bgcolor="#D6D6D6"><?php echo $row_Recordset1['UTM_PASSWORD']; ?></td>
        <td bgcolor="#D6D6D6"><a href="UTMUSERRECORDDELETE.php?ID_NUMBER=<?php echo $row_Recordset1['ID_NUMBER']; ?>">DELETE</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
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
</div>
<div id="apDiv3">
  <table width="206" height="51" border="1">
    <tr>
      <td bgcolor="#000000"><a href="/lab_booking_system/Templates/ADMINMENU.php">MENU</a></td>
    </tr>
  </table>
</div>
</body>
</html>

<?php
mysql_free_result($Recordset1);
?>
