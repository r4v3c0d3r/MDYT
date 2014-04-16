<?php
session_start();
if ((!isset($_SESSION['initiated'])) || (!isset($_SESSION['clientIP']))) {
	session_regenerate_id();
	$_SESSION['initiated'] = true;
	$_SESSION['clientIP'] = $_SERVER['REMOTE_ADDR'];

	//setcookie("clientIP", $_SERVER['REMOTE_ADDR'], time()+66400);
	//echo $_SESSION['clientIP'];
	//echo $_SERVER['REMOTE_ADDR'];
}
if ($_SESSION['clientIP'] != $_SERVER['REMOTE_ADDR']) {
	header("Location: http://www.mdyt.cz/login.php");
	die();
}

if (isset($_SESSION['HTTP_USER_AGENT'])) {
	if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
		header("Location: http://www.mdyt.cz/login.php");
		die();
	}
} else {
	$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
}
?>