<?php
include_once "php/session.php";
include_once 'php/sqlite.php';
include_once 'php/functions.php';
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"]) && isset($_POST["submit"])) {

	$to = 'admin@mdyt.cz';
	$subject = 'MDYT.cz - zpráva z formuláře od ' . $_POST["name"];
	$message = $_POST["name"] . "\r\n" . $_POST["email"] . "\r\n" . $_POST["message"];
	$headers = 'From: ' . $_POST["email"] . "\r\n" . 'Reply-To: ' . $_POST["email"] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	unset($_POST["submit"]);
	if (mail($to, $subject, $message, $headers) == true) {
		echo '<script type="text/javascript">alert("Zpráva byla úspěšně odeslána."); </script>';
	} else {
		echo '<script type="text/javascript">alert("Zprávu se nepodařilo předat k doručení."); </script>';
	}

}
if (isset($_POST["passphrase"])) {
	if (verifyUser($_POST["username"], $_POST["passphrase"])) {
		//unset($_REQUEST);
		//unset($_POST);
		include_once "php/adminpage.php";

	}
} else {
	include_once "php/page.php";
}
?>