<?php

function reArrayFiles(&$file_post) {

	$file_ary = array();
	$file_count = count($file_post['name']);
	$file_keys = array_keys($file_post);

	for ($i = 0; $i < $file_count; $i++) {
		foreach ($file_keys as $key) {
			$file_ary[$i][$key] = $file_post[$key][$i];
		}
	}

	return $file_ary;
}
?>
<?php

header('Content-Type: text/plain; charset=utf-8');

try {
	$file_ary = reArrayFiles($_FILES['files']);
	foreach ($file_ary as $file) {

		if (!isset($file['error']) || is_array($file['error'])) {
			throw new RuntimeException('Invalid parameters.');
		}

		// Check $_FILES['upfile']['error'] value.
		switch ($file['error']) {
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
		if ($file['size'] > 12800000) {
			throw new RuntimeException('Exceeded filesize limit.');
		}

		// DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
		// Check MIME Type by yourself.
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		if (false === $ext = array_search($finfo -> file($file['tmp_name']), array('jpg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif', ), true)) {
			throw new RuntimeException('Invalid file format.');
		}
		// You should name it uniquely.
		// DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
		// On this example, obtain safe unique name from its binary data.
		// DIAKRITIKA TAK UPLNĚ NEFUNGUJE, MOŽNÁ NA SERVERU - proto GID!
		$fileurl = sprintf('../galerie/%s/%s.%s', $_POST['gid'], sha1_file($file['tmp_name']), $ext);
		$folderurl = sprintf('../galerie/%s', $_POST['gid']);
		$dburl = sprintf('galerie/%s/%s.%s', $_POST['gid'], sha1_file($file['tmp_name']), $ext);

		if (!is_dir($folderurl)) {
			mkdir(dirname($folderurl), 0777, true);
			//UNTESTED
		}
		if (!move_uploaded_file($file['tmp_name'], $fileurl)) {
			throw new RuntimeException('Failed to move uploaded file.');
		}
		include_once "sqlite.php";
		createImageRecord($_POST['gid'], $dburl);
		//TODO - vytvořit thumby, poslat info a refreshnout galerii
	}

} catch (RuntimeException $e) {
	echo $e -> getMessage();
}
?>