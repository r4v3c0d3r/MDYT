<?php

header('Content-Type: text/plain; charset=utf-8');

try {
	//TODO multiupload yet to be done!
	// Undefined | Multiple Files | $_FILES Corruption Attack
	// If this request falls under any of them, treat it invalid.
	if (!isset($_FILES['file']['error']) || is_array($_FILES['file']['error'])) {
		throw new RuntimeException('Invalid parameters.');
	}

	// Check $_FILES['upfile']['error'] value.
	switch ($_FILES['file']['error']) {
		case UPLOAD_ERR_OK :
			break;
		case UPLOAD_ERR_NO_FILE :
			throw new RuntimeException('No file sent.');
		case UPLOAD_ERR_INI_SIZE :
		case UPLOAD_ERR_FORM_SIZE :
			throw new RuntimeException('Exceeded filesize limit.');
		default :
			throw new RuntimeException('Unknown errors.');
	}

	// You should also check filesize here.
	if ($_FILES['file']['size'] > 2400000) {
		throw new RuntimeException('Exceeded filesize limit.');
	}

	// DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
	// Check MIME Type by yourself.
	$finfo = new finfo(FILEINFO_MIME_TYPE);
	if (false === $ext = array_search($finfo -> file($_FILES['file']['tmp_name']), array('jpg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif', ), true)) {
		throw new RuntimeException('Invalid file format.');
	}
	// You should name it uniquely.
	// DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
	// On this example, obtain safe unique name from its binary data.
	// DIAKRITIKA TAK UPLNĚ NEFUNGUJE, MOŽNÁ NA SERVERU - proto GID!
	$url = sprintf('../galerie/%s/%s.%s', $_POST['gid'], sha1_file($_FILES['file']['tmp_name']), $ext);
	if (!move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
		throw new RuntimeException('Failed to move uploaded file.');
	}
	include_once "sqlite.php";
	createImageRecord($_POST['gid'], $url);
	//TODO - vytvořit thumby a db záznamy, poslat info a refreshnout galerii
	echo 'Nahrávání uspělo!';

} catch (RuntimeException $e) {
	echo $e -> getMessage();
}
?>