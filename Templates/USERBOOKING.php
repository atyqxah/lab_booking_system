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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO it_lab (IT_LAB_ID, LAB_NAME, IT_LAB_TIME, IT_LAB_DATE, LAB_TIME_END, NUMBER_OF_PARTICIPANTS, USER_ID_NUMBER, ITNOT) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['IT_LAB_ID'], "text"),
                       GetSQLValueString($_POST['LAB_NAME'], "text"),
                       GetSQLValueString($_POST['IT_LAB_TIME'], "double"),
                       GetSQLValueString($_POST['IT_LAB_DATE'], "date"),
                       GetSQLValueString($_POST['LAB_TIME_END'], "double"),
                       GetSQLValueString($_POST['NUMBER_OF_PARTICIPANTS'], "int"),
                       GetSQLValueString($_POST['USER_ID_NUMBER'], "text"),
                       GetSQLValueString($_POST['ITNOT'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "USERBOOKING.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$query_Recordset1 = "SELECT IT_LAB_ID, IT_LAB_TIME, IT_LAB_DATE, LAB_TIME_END, NUMBER_OF_PARTICIPANTS, USER_ID_NUMBER FROM it_lab";
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
	width: 1271px;
	height: 2267px;
	z-index: 1;
	left: 25px;
	top: 627px;
}
#apDiv2 {
	position: absolute;
	width: 762px;
	height: 421px;
	z-index: 2;
	left: 268px;
	top: 135px;
	font-weight: bold;
	background-color: #FF99CC;
}
#apDiv3 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 3;
	left: 853px;
	top: 427px;
}
#apDiv4 {
	position: absolute;
	width: 486px;
	height: 62px;
	z-index: 3;
	left: 435px;
	top: 16px;
	background-color: #5D001D;
	font-weight: bold;
	color: #FFFFFF;
	font-size: 36px;
}
body {
	background-color: #5D001D;
	background-image: url();
}
#apDiv5 {
	position: absolute;
	width: 200px;
	height: 71px;
	z-index: 4;
	left: 211px;
	top: -84px;
	color: #FFF;
	font-weight: bold;
	text-align: center;
}
#apDiv2 #form2 table tr td #apDiv5 table tr td {
	text-align: center;
}
#apDiv1 table {
	font-weight: bold;
	text-align: center;
}
#apDiv4 blockquote strong {
	font-size: 36px;
	color: #5D001D;
}
#apDiv2 #form1 p {
	color: #000;
	font-size: 24px;
	text-align: center;
}
#apDiv6 {
	position: absolute;
	width: 200px;
	height: 61px;
	z-index: 4;
	text-align: center;
	font-weight: bold;
	left: 1075px;
	top: 27px;
}
#apDiv6 table tr td {
	text-align: center;
	color: #FFF;
	font-size: 24px;
}
#apDiv7 {
	position: absolute;
	width: 477px;
	height: 209px;
	z-index: 5;
	left: 625px;
	top: 127px;
	text-align: center;
	font-weight: bold;
	font-size: 24px;
	background-color: #CC99FF;
}
#apDiv7 #form4 table {
	font-size: 16px;
	text-align: left;
}
#apDiv7 #form5 table {
	font-size: 16px;
	text-align: left;
}
#apDiv8 {
	position: absolute;
	width: 242px;
	height: 115px;
	z-index: 5;
	left: 128px;
	top: 22px;
}
#apDiv8 table tr td {
	color: #FFF;
	font-size: 24px;
	font-weight: bold;
	text-align: center;
}
#apDiv1 table tr td p {
	text-align: left;
}
#apDiv9 {
	position: absolute;
	width: 109px;
	height: 69px;
	z-index: 6;
	left: 1133px;
	top: 113px;
	font-size: 36px;
	color: #FFF;
}
#apDiv9 a {
	color: #FFF;
}
</style>
</head>

<body>
<div id="apDiv1">
  <table width="1248" height="474" border="1">
    <tr>
      <td width="24" bgcolor="#FFFFCC">NO</td>
      <td width="617" bgcolor="#FFFFCC">PICTURE</td>
      <td width="105" bgcolor="#FFFFCC">LAB  NAME</td>
      <td width="113" bgcolor="#FFFFCC">RENT RATE PER DAY</td>
      <td width="178" bgcolor="#FFFFCC">EQUIPMENT FACILITIES</td>
      <td width="171" bgcolor="#FFFFCC">STAFF IN-CHARGE</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFCC">1</td>
      <td bgcolor="#FFFFCC"><embed src="../image/baru.html" width="607" height="398"></embed>&nbsp;</td>
      <td bgcolor="#FFFFCC">C24_408</td>
      <td bgcolor="#FFFFCC">RM150.00</td>
      <td bgcolor="#FFFFCC"><p>- 36 COMPUTER UNIT</p>
      <p>- SKRIN</p>
      <p>- LCD PROJECTOR</p>
      <p>- WHITE BOARD</p>
      <p>- WIFI</p>
      <p>- PRINTER</p>
      <p>- SCANNER</p></td>
      <td bgcolor="#FFFFCC"><p><img src="../image/SHAH.png" alt="SHAH" width="104" height="131" /></p>
      <p>MR MOHD SHAH BIN SAHRI</p></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFCC">2</td>
      <td bgcolor="#FFFFCC"><embed src="../image/kedua.html" width="607" height="417"></embed>&nbsp;</td>
      <td bgcolor="#FFFFCC">C24-409</td>
      <td bgcolor="#FFFFCC">RM150.00</td>
      <td bgcolor="#FFFFCC"><p>- 50 COMPUTER UNIT</p>
        <p>- SKRIN</p>
        <p>- LCD PROJECTOR</p>
        <p>- WHITE BOARD</p>
        <p>- WIFI</p>
        <p>- PRINTER</p>
      <p>- SCANNER</p></td>
      <td bgcolor="#FFFFCC"><p><img src="../image/HAFIS.png" alt="HAFIS" width="115" height="137" /></p>
      <p>MR MOHAMED HAFIS BIN SAMSUALDIN</p></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFCC">3</td>
      <td bgcolor="#FFFFCC"><embed src="../image/10 baru.html" width="616" height="413"></embed>&nbsp;</td>
      <td bgcolor="#FFFFCC">C24-410</td>
      <td bgcolor="#FFFFCC">RM150.00</td>
      <td bgcolor="#FFFFCC"><p>- 50 COMPUTER UNIT</p>
        <p>- SKRIN</p>
        <p>- LCD PROJECTOR</p>
        <p>- WHITE BOARD</p>
        <p>- WIFI</p>
        <p>- PRINTER</p>
      <p>- SCANNER</p></td>
      <td bgcolor="#FFFFCC"><p><img src="../image/HALIMAH.png" alt="HALIMAH" width="119" height="155" /></p>
      <p>MS HALIMAH BINTI A.RAZAK</p></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFCC">4</td>
      <td bgcolor="#FFFFCC"><embed src="../image/11 baru.html" width="616" height="451"></embed>&nbsp;</td>
      <td bgcolor="#FFFFCC">C24-411</td>
      <td bgcolor="#FFFFCC">RM150.00</td>
      <td bgcolor="#FFFFCC"><p>- 50 COMPUTER UNIT</p>
        <p>- SKRIN</p>
        <p>- LCD PROJECTOR</p>
        <p>- WHITE BOARD</p>
        <p>- WIFI</p>
        <p>- PRINTER</p>
      <p>- SCANNER</p></td>
      <td bgcolor="#FFFFCC"><p><img src="../image/IDZHAM.png" alt="IDZHAM" width="129" height="159" /></p>
      <p>MR MOHD IDZHAM IQBAL BIN ABD RANI</p></td>
    </tr>
  </table>
</div>
<div id="apDiv2">
  <form id="form1" name="form1" method="post" action="">
    <p>BOOKING  </p>
  </form>
  <form method="post" name="form2" id="form2">
  </form>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form3" id="form3">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">IT_LAB_ID:</td>
        <td><input type="text" name="IT_LAB_ID" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">LAB_NAME:</td>
        <td><select name="LAB_NAME">
          <option value="C24-408" >C24-408</option>
          <option value="C24-409" >C24-409</option>
          <option value="C24-410" >C24-410</option>
          <option value="C24-411" >C24-411</option>
        </select></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">IT_LAB_TIME:</td>
        <td><input type="text" name="IT_LAB_TIME" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
      <html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:"yy-mm-dd"});
  } );
  </script>
        <td nowrap="nowrap" align="right">IT_LAB_DATE:</td>
        <td><input type="text" name="IT_LAB_DATE" id="datepicker" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">LAB_TIME_END:</td>
        <td><input type="text" name="LAB_TIME_END" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">NUMBER_OF_PARTICIPANTS:</td>
        <td><input type="text" name="NUMBER_OF_PARTICIPANTS" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">USER_ID_NUMBER:</td>
        <td><input type="text" name="USER_ID_NUMBER" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right" valign="top">NOTIFICATION:</td>
        <td><textarea name="ITNOT" cols="50" rows="5"></textarea></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Insert record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form3" />
  </form>
  <p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<div id="apDiv4">
  <blockquote> USER BOOKING</blockquote>
</div>
<div id="apDiv6">
  <table width="200" height="54" border="1">
    <tr>
      <td bgcolor="#000000"><a href="/lab_booking_system/Templates/USERMENU.php">MENU</a></td>
    </tr>
  </table>
</div>
<div id="apDiv8">
  <table width="198" border="1">
    <tr>
      <td width="188" height="49" bgcolor="#000000"><a href="USERBOOKINGBOOKED.php">BOOKED LIST</a></td>
    </tr>
  </table>
</div>
<div id="apDiv9"><a href="TERM.php">TERM</a></div>
</body>
</html>