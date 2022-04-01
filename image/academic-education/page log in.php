<?php
$currentPage = $_SERVER["PHP_SELF"];

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
?>
<!DOCTYPE html>
<!--
Template Name: Academic Education V2
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Academic Education V2</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style type="text/css">
body {
	background-image: url();
	background-repeat: no-repeat;
	margin-left: 0px;
	background-color: #931D3D;
}
body,td,th {
	font-size: large;
}
#apDiv1 {
	position: absolute;
	width: 255px;
	height: 241px;
	z-index: 1;
	left: 843px;
	top: 453px;
}
</style>
</head>
<body id="top">
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="clear"> 
    <!-- ################################################################################################ -->
    <nav>
      <ul>
        <li><img src="/lab_booking_system/image/utm logo.jpg" alt="a" width="1000" height="406"></li>
      </ul>
    </nav>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --><!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --><!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper"></div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --><!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --><!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --><!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
<!-- Default Statcounter code for lab_booking_system
http://m -->
<script type="text/javascript">
var sc_project=11945549; 
var sc_invisible=0; 
var sc_security="d555672d"; 
var sc_https=1; 
var scJsHost = "https://";
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript>
<div class="statcounter"></div></noscript>
<div id="apDiv1"><li><a href="/Templates/register utm.php"></a><a href="/lab_booking_system/Templates/UTMREGISTER.php">UTM User Register</a><a href="#"></a></li>
        <li><a href="/lab_booking_system/Templates/REGISTER.php">Register</a><a href="/Templates/register.php"></a><a href="#"></a></li>
        <li><a href="/lab_booking_system/Templates/LOGINUTMUSER.php">UTM User Login</a><a href="#"></a></li>
        <li><a href="#"></a><a href="/lab_booking_system/Templates/LOGINCOORDINATOR.php">IT Coordinator Login</a></li>
        <li><a href="/lab_booking_system/Templates/LOGINADMIN.php">Admin Login</a><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"></a></li>
        <li><a href="/lab_booking_system/Templates/LOGINUSER.php">User Login</a></li>
        <li><a href="/lab_booking_system/Templates/LOGINSTAFF.php">Staff Login</a><a href="#"></a></li></div>
<!-- End of Statcounter Code -->
</body>
</html>