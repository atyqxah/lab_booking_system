<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 276px;
	height: 364px;
	z-index: 1;
	left: 10px;
	top: -26px;
}
#apDiv2 {
	position: absolute;
	width: 364px;
	height: 176px;
	z-index: 1;
	left: 542px;
	top: 419px;
}
#apDiv3 {
	position: absolute;
	width: 269px;
	height: 190px;
	z-index: 2;
	left: 986px;
	top: 392px;
}
#apDiv4 {
	position: absolute;
	width: 890px;
	height: 257px;
	z-index: 3;
	left: 67px;
	top: 349px;
	font-weight: bold;
	color: #931D3D;
	font-size: 36px;
}
#apDiv3 li a {
	font-size: 18px;
}
#apDiv3 li a {
	font-size: 24px;
}
</style>
</head>

<body>
<div id="apDiv1"><img src="../image/utm logo.jpg" width="1310" height="347" alt="n" /></div>
<div id="apDiv3"><li><a href="/Templates/register utm.php"></a><a href="/lab_booking_system/Templates/UTMREGISTER.php">UTM User Register</a><a href="#"></a></li>
        <li><a href="/lab_booking_system/Templates/REGISTER.php">Register</a><a href="/Templates/register.php"></a><a href="#"></a></li>
        <li><a href="/lab_booking_system/Templates/LOGINUTMUSER.php">UTM User Login</a><a href="#"></a></li>
        <li><a href="#"></a><a href="/lab_booking_system/Templates/LOGINCOORDINATOR.php">IT Coordinator Login</a></li>
        <li><a href="/lab_booking_system/Templates/LOGINADMIN.php">Admin Login</a><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"></a></li>
        <li><a href="/lab_booking_system/Templates/LOGINUSER.php">User Login</a></li>
        <li><a href="/lab_booking_system/Templates/LOGINSTAFF.php">Staff Login</a><a href="#"></a></li></div>
<div id="apDiv4">
  <p>SCHOOL OF MECHANICAL ENGINEERING </p>
  <p>LAB IT BOOKING</p>
</div>
</body>
</html>