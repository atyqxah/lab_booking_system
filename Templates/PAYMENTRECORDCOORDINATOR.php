<?php virtual('/lab_booking_system/Connections/dbcon.php'); ?>
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
$query_Record10 = "SELECT * FROM payment";
$Record10 = mysql_query($query_Record10, $dbcon) or die(mysql_error());
$row_Record10 = mysql_fetch_assoc($Record10);
$totalRows_Record10 = mysql_num_rows($Record10);
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
	top: 40px;
	text-align: center;
	font-weight: bold;
	font-size: 36px;
	color: #FFF;
}
#apDiv2 {
	position: absolute;
	width: 779px;
	height: 378px;
	z-index: 2;
	left: 338px;
	top: 142px;
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
	width: 389px;
	height: 43px;
	z-index: 4;
	left: 583px;
	top: 126px;
}
#apDiv4 #form1 label {
	color: #FFF;
	font-weight: bold;
}
#apDiv5 {
	position: absolute;
	width: 374px;
	height: 115px;
	z-index: 4;
	left: 87px;
	top: 20px;
}
#apDiv5 h2 .m {
	color: #FFF;
}
#apDiv6 {
	position: absolute;
	width: 200px;
	height: 30px;
	z-index: 5;
	left: 87px;
	top: 18px;
}
</style>
</head>

<body>
<div id="apDiv1">PAYMENT  RECORDS</div>
<div id="apDiv2">
  <table border="1">
    <tr>
      <td bgcolor="#9999CC">USER_ID_NUMBER</td>
      <td bgcolor="#9999CC">PAYMENT_CODE</td>
      <td bgcolor="#9999CC">PAYMENT</td>
      <td bgcolor="#9999CC">&nbsp;</td>
     </thead>
  <tbody id="myTable">
    <?php do { ?>
      <tr>
        <td bgcolor="#9999CC"><?php echo $row_Record10['USER_ID_NUMBER']; ?></td>
        <td bgcolor="#9999CC"><?php echo $row_Record10['PAYMENT_CODE']; ?></td>
        <td bgcolor="#9999CC"><?php echo $row_Record10['PAYMENT']; ?></td>
        <td bgcolor="#9999CC"><a href="PAYMENTRECORDCOORDINATORDELETE.php?PAYMENT_CODE=<?php echo $row_Record10['PAYMENT_CODE']; ?>">DELETE</a></td>
      </tr>
      <?php } while ($row_Record10 = mysql_fetch_assoc($Record10)); ?>
  </table>
</div>
<div id="apDiv3">
  <table width="206" height="51" border="1">
    <tr>
      <td bgcolor="#000000"><a href="/lab_booking_system/Templates/COORDINATORMENU.php">MENU</a></td>
    </tr>
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
</div>
<div id="apDiv6"><a titlt="print screen" alt="print screen" onclick="window.print();"target="_blank"style="cursor: pointer; color: #FFF; font-weight: bold; font-size: 24px;">PRINT</a></div>
<tr class="header">
</body>
</html>
<?php
mysql_free_result($Record10);
?>
