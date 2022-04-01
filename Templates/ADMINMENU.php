<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "/lab_booking_system/Templates/1aloginbaru.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "/lab_booking_system/image/academic-education/page log in.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
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
body {
	background-color: #999999;
	color: #003;
}
#apDiv1 {
	position: absolute;
	width: 523px;
	height: 383px;
	z-index: 1;
	left: 759px;
	top: 71px;
	color: #FFF;
}
.DDD {
	color: #000099;
}
#apDiv1 #form1 table tr td {
	font-size: 36px;
	font-weight: bold;
	text-align: center;
}
#apDiv2 {
	position: absolute;
	width: 617px;
	height: 510px;
	z-index: 1;
	left: 581px;
	top: 120px;
	font-size: 36px;
	color: #FFF;
	text-align: center;
}
#apDiv2 table tr td {
	text-align: center;
	font-size: 24px;
	font-weight: bold;
}
#apDiv3 {
	position: absolute;
	width: 659px;
	height: 55px;
	z-index: 2;
	left: 707px;
	top: 30px;
	text-align: center;
	font-size: 18px;
	color: #FFF;
	font-weight: bold;
}
#apDiv3 table tr td {
	text-align: center;
}
body,td,th {
	color: #D6D6D6;
}
#apDiv3 table tr td a {
	color: #FFFFFF;
	font-size: 24px;
}
#apDiv2 table tr td a {
	color: #FFFFFF;
}
</style>
</head>

<body>
<p>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<div id="apDiv3">
  <table width="385" height="47" border="1">
    <tr>
      <td width="174" bgcolor="#000000"><a href="/lab_booking_system/Templates/ADMINSTATISTIC.php">STATISTIC</a></td>
      <td width="195" bgcolor="#000000"><a href="/lab_booking_system/image/academic-education/page log in.php"></a><a href="<?php echo $logoutAction ?>">LOGOUT</a></td>
    </tr>
  </table>
</div>
<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/lab_booking_system/image/UTM-LOGO.png" width="396" height="378" alt="D" /></p>
<div id="apDiv2">
  <table width="535" height="320" border="1">
    <tr>
      <td width="255" height="101" bgcolor="#5D001D"><a href="/lab_booking_system/Templates/USERRECORDADMIN.php">USER RECORD</a></td>
      <td width="264" bgcolor="#5D001D"><a href="/lab_booking_system/Templates/UTMUSERRECORDADMIN.php">UTM USER RECORD</a></td>
    </tr>
    <tr>
      <td height="108" bgcolor="#5D001D"><a href="/lab_booking_system/Templates/STAFFRECORDADMIN.php">STAFF RECORD</a></td>
      <td bgcolor="#5D001D"><a href="/lab_booking_system/Templates/COORDINATORRECORDADMIN.php">COORDINATOR RECORD</a></td>
    </tr>
    <tr>
      <td height="101" bgcolor="#5D001D"><a href="/lab_booking_system/Templates/BOOKINGRECORDADMIN.php">BOOKING RECORD</a></td>
      <td bgcolor="#5D001D"><a href="/lab_booking_system/Templates/PAYMENTRECORDADMIN.php">PAYMENT RECORD</a></td>
    </tr>
  </table>
</div>
</body>
</html>
