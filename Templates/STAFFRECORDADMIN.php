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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form4")) {
  $insertSQL = sprintf("INSERT INTO staff (STAFF_ID_NUMBER, STAFF_NAME, STAFF_IC_NUMBER, STAFF_PHONE_NUMBER, STAFF_EMAIL, STAFF_PASSWORD) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['STAFF_ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['STAFF_NAME'], "text"),
                       GetSQLValueString($_POST['STAFF_IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['STAFF_PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['STAFF_EMAIL'], "text"),
                       GetSQLValueString($_POST['STAFF_PASSWORD'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());
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
	width: 1146px;
	height: 378px;
	z-index: 2;
	left: 107px;
	top: 442px;
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
	width: 510px;
	height: 315px;
	z-index: 4;
	left: 459px;
	top: 107px;
	background-color: #CC99CC;
	text-align: center;
	font-weight: bold;
}
#apDiv4 #form1 table {
	color: #FFF;
}
#apDiv2 table {
	color: #000000;
}
#apDiv5 {
	position: absolute;
	width: 335px;
	height: 36px;
	z-index: 5;
	left: 992px;
	top: 347px;
}
#apDiv5 #form3 label {
	color: #FFF;
	font-weight: bold;
}
#apDiv6 {
	position: absolute;
	width: 309px;
	height: 115px;
	z-index: 5;
	left: 112px;
	top: 269px;
}
#apDiv6 h2 .m {
	color: #FFF;
}
#apDiv7 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 6;
	left: 110px;
	top: 19px;
}
</style>
</head>

<body>
<div id="apDiv7"><a titlt="print screen" alt="print screen" onclick="window.print();"target="_blank"style="cursor: pointer; font-size: 24px; color: #FFF; font-weight: bold;">PRINT</a></div>
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
</h2>
</div>
<tr class="header">
<div id="apDiv1">STAFF  RECORDS</div>
<div id="apDiv2">
  <table border="1">
    <tr>
      <td bgcolor="#CC99CC">STAFF_ID_NUMBER</td>
      <td bgcolor="#CC99CC">STAFF_NAME</td>
      <td bgcolor="#CC99CC">STAFF_IC_NUMBER</td>
      <td bgcolor="#CC99CC">STAFF_PHONE_NUMBER</td>
      <td bgcolor="#CC99CC">STAFF_EMAIL</td>
      <td bgcolor="#CC99CC">STAFF_PASSWORD</td>
      <td bgcolor="#CC99CC">&nbsp;</td>
     </thead>
  <tbody id="myTable">
    <?php do { ?>
      <tr>
        <td bgcolor="#CC99CC"><?php echo $row_Recordset1['STAFF_ID_NUMBER']; ?></td>
        <td bgcolor="#CC99CC"><?php echo $row_Recordset1['STAFF_NAME']; ?></td>
        <td bgcolor="#CC99CC"><?php echo $row_Recordset1['STAFF_IC_NUMBER']; ?></td>
        <td bgcolor="#CC99CC"><?php echo $row_Recordset1['STAFF_PHONE_NUMBER']; ?></td>
        <td bgcolor="#CC99CC"><?php echo $row_Recordset1['STAFF_EMAIL']; ?></td>
        <td bgcolor="#CC99CC"><?php echo $row_Recordset1['STAFF_PASSWORD']; ?></td>
        <td bgcolor="#CC99CC"><a href="STAFFRECORDDELETE.php?STAFF_ID_NUMBER=<?php echo $row_Recordset1['STAFF_ID_NUMBER']; ?>">DELETE</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
<div id="apDiv3">
  <table width="206" height="51" border="1">
    <tr>
      <td bgcolor="#000000"><a href="/lab_booking_system/Templates/ADMINMENU.php">MENU</a></td>
    </tr>
  </table>
</div>
<div id="apDiv4">
  <form method="post" name="form1" id="form1">
  </form>
  <form method="post" name="form2" id="form2">
    <p>REGISTER</p>
  </form>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form4" id="form4">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_ID_NUMBER:</td>
        <td><input type="text" name="STAFF_ID_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_NAME:</td>
        <td><input type="text" name="STAFF_NAME" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_IC_NUMBER:</td>
        <td><input type="text" name="STAFF_IC_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_PHONE_NUMBER:</td>
        <td><input type="text" name="STAFF_PHONE_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_EMAIL:</td>
        <td><input type="text" name="STAFF_EMAIL" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">STAFF_PASSWORD:</td>
        <td><input type="text" name="STAFF_PASSWORD" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Insert record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form4" />
  </form>
  <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
