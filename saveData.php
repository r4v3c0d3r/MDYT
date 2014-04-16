<?php
//security check, maybe?
include "php/session.php";
if (($_SESSION['povolitZapis'] == true) && ($_COOKIE['PovolitZapis'] == true)) {
	include "php/sqlite.php";
	saveContent($_POST['oidname'], $_POST['content']);
} else {
	
}
?>