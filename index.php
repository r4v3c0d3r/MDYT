<?php
include_once "php/session.php";
include_once 'php/sqlite.php';
include_once 'php/functions.php';

if (isset($_POST["passphrase"])) {
	if (verifyUser($_POST["username"], $_POST["passphrase"])) {
		include_once "php/adminpage.php";
		$_POST = null;
	}
} else {
	include_once "php/page.php";
}
?>