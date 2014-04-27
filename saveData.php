<?php
//security check, maybe?
include "php/session.php";
if (($_SESSION['povolitZapis'] == true) && ($_COOKIE['PovolitZapis'] == true)) {
	include "php/sqlite.php";
	if ((isset($_POST['oidname']) && isset($_POST['content']))) {
		saveContent($_POST['oidname'], $_POST['content']);
		$_POST = null;
	}

} else {

}
?>