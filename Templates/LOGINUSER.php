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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['USERID'])) {
  $loginUsername=$_POST['USERID'];
  $password=$_POST['PASSWORD'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "USERMENU.php";
  $MM_redirectLoginFailed = "LOGINUSER.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_dbcon, $dbcon);
  
  $LoginRS__query=sprintf("SELECT USER_ID_NUMBER, USER_PASSWORD FROM non_utm_registration WHERE USER_ID_NUMBER=%s AND USER_PASSWORD=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $dbcon) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
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
	background-color: #5D001D;
	text-align: center;
	color: #000000;
}
.A {
	font-weight: bold;
}
#apDiv1 {
	position: absolute;
	width: 344px;
	height: 444px;
	z-index: 1;
	left: 519px;
	top: 97px;
	background-color: #999999;
}
#apDiv2 {
	position: absolute;
	width: 238px;
	height: 515px;
	z-index: 2;
	left: 575px;
	top: 241px;
	background-color: #999999;
}
#apDiv3 {
	position: absolute;
	width: 200px;
	height: 70px;
	z-index: 2;
	left: 1073px;
	top: 37px;
}
#apDiv3 table tr td {
	color: #FFFFFF;
	font-weight: bold;
	text-align: center;
	font-size: 24px;
}
#apDiv4 {
	position: absolute;
	width: 200px;
	height: 37px;
	z-index: 3;
	left: 587px;
	top: 489px;
}
#apDiv4 a {
	font-size: 18px;
}
</style>
</head>

<body>
<p>&nbsp;  </p>
<div id="apDiv1">
  <p><img src="/lab_booking_system/image/UTM-LOGO.png" width="240" height="224" alt="q" longdesc="/lab_booking_system/Templates/login.php" /></p>
  <p><span class="A">LAB BOOKING SYSTEM</span>  </p>
  <form ACTION="<?php echo $loginFormAction; ?>" id="form2" name="form2" method="POST">
    USER ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="USERID" id="USERID4" />
    <label for="PASSWORD"><br />
      PASSWORD</label>
    <input type="password" name="PASSWORD" id="PASSWORD" />
  </p>
  <p>
    <input type="submit" name="SIGNIN" id="SIGNIN" value="SIGN-IN" />
  
  </form>
</div>
<p>&nbsp;</p>
<p class="A">&nbsp;</p>
<div id="apDiv3">
  <table width="200" height="50" border="1">
    <tr>
      <td bgcolor="#000000"><a href="/lab_booking_system/Templates/1aloginbaru.php">HOME</a></td>
    </tr>
  </table>
</div>
<p>&nbsp;</p>
<div id="apDiv4"><a href="/lab_booking_system/Templates/REGISTER.php">REGISTER LINK</a></div>
<p></p>
</body>
</html>
