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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO it_coordinator (C_ID_NUMBER, C_IC_NUMBER, C_NAME, C_PHONE_NUMBER, C_EMAIL, C_PASSWORD) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['C_ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['C_IC_NUMBER'], "int"),
                       GetSQLValueString($_POST['C_NAME'], "text"),
                       GetSQLValueString($_POST['C_PHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['C_EMAIL'], "text"),
                       GetSQLValueString($_POST['C_PASSWORD'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "COORDINATORRECORDADMIN.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_dbcon, $dbcon);
$query_Recordset1 = "SELECT * FROM it_coordinator";
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
	width: 530px;
	height: 60px;
	z-index: 1;
	left: 417px;
	top: 37px;
	text-align: center;
	font-weight: bold;
	font-size: 36px;
	color: #FFF;
}
#apDiv2 {
	position: absolute;
	width: 891px;
	height: 378px;
	z-index: 2;
	left: 93px;
	top: 479px;
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
	width: 347px;
	height: 408px;
	z-index: 4;
	left: 944px;
	top: 119px;
}
#apDiv4 #form1 table {
	color: #FFF;
}
#apDiv5 {
	position: absolute;
	width: 500px;
	height: 327px;
	z-index: 4;
	left: 410px;
	top: 122px;
	background-color: #CCCCCC;
}
body,td,th {
	color: #000000;
	font-weight: bold;
}
#apDiv5 #form1 p {
	font-weight: bold;
	text-align: center;
	font-size: 18px;
}
#apDiv6 {
	position: absolute;
	width: 429px;
	height: 41px;
	z-index: 5;
	left: 78px;
	top: 357px;
}
#apDiv6 #form3 label {
	color: #FFFFFF;
}
#apDiv7 {
	position: absolute;
	width: 305px;
	height: 115px;
	z-index: 5;
	left: 71px;
	top: 76px;
}
#apDiv7 h2 .m {
	color: #FFFFFF;
}
#apDiv8 {
	position: absolute;
	width: 200px;
	height: 56px;
	z-index: 6;
	left: 75px;
	top: 14px;
}
</style>
</head>

<body>
<div id="apDiv1">IT COORDINATOR  RECORDS</div>
<div id="apDiv2">
  <table border="1">
    <tr>
      <td bgcolor="#CCCCCC">C_ID_NUMBER</td>
      <td bgcolor="#CCCCCC">C_IC_NUMBER</td>
      <td bgcolor="#CCCCCC">C_NAME</td>
      <td bgcolor="#CCCCCC">C_PHONE_NUMBER</td>
      <td bgcolor="#CCCCCC">C_EMAIL</td>
      <td bgcolor="#CCCCCC">C_PASSWORD</td>
      <td bgcolor="#CCCCCC">&nbsp;</td>
    </thead>
  <tbody id="myTable">
    <?php do { ?>
      <tr>
        <td bgcolor="#CCCCCC"><?php echo $row_Recordset1['C_ID_NUMBER']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_Recordset1['C_IC_NUMBER']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_Recordset1['C_NAME']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_Recordset1['C_PHONE_NUMBER']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_Recordset1['C_EMAIL']; ?></td>
        <td bgcolor="#CCCCCC"><?php echo $row_Recordset1['C_PASSWORD']; ?></td>
        <td bgcolor="#CCCCCC"><a href="COORDINATORRECORDDELETEADMIN.php?C_ID_NUMBER=<?php echo $row_Recordset1['C_ID_NUMBER']; ?>">DELETE</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
<div id="apDiv3">
  <table width="206" height="51" border="1">
    <tr>
      <td bgcolor="#000000"><a href="/lab_booking_system/Templates/ADMINMENU.php">MENU</a><a href="/lab_booking_system/Templates/ADMIN MENU.php"></a></td>
    </tr>
  </table>
</div>
<div id="apDiv5">
  <form method="post" name="form1" id="form1">
    <p>REGISTER</p>
  </form>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_ID_NUMBER:</td>
        <td><input type="text" name="C_ID_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_IC_NUMBER:</td>
        <td><input type="text" name="C_IC_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_NAME:</td>
        <td><input type="text" name="C_NAME" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_PHONE_NUMBER:</td>
        <td><input type="text" name="C_PHONE_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_EMAIL:</td>
        <td><input type="text" name="C_EMAIL" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">C_PASSWORD:</td>
        <td><input type="text" name="C_PASSWORD" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Insert record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form2" />
  </form>
  <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<div id="apDiv7">
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
<div id="apDiv8"><a titlt="print screen" alt="print screen" onclick="window.print();"target="_blank"style="cursor: pointer; color: #FFFFFF; font-size: 24px;">PRINT</a></div>
<tr class="header">
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
