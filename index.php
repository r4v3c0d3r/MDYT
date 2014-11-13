<?php
include_once "php/session.php";
include_once 'php/sqlite.php';
include_once 'php/functions.php';
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"]) && isset($_POST["submit"])) {
	$to = "mail@mdyt.cz";
	$subject = "Zpráva z formuláře na mdyt.cz od " . $_POST["name"];
	$headers = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/plain; charset=UTF-8";
	$headers[] = "From: Webový formulář <formular@mdyt.cz>";
	$headers[] = "Reply-To: " . $_POST["name"] . " <" . $_POST["email"] . ">";
	$headers[] = "Subject: {$subject}";
	$headers[] = "X-Mailer: PHP/" . phpversion();
	unset($_POST["submit"]);

	if (mail($to, $subject, $_POST["message"], implode("\n", $headers)) == true) {		
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