<?php
function initSQLite() {

	return ($dbh);
}

function terminateSQLite() {
	$dbh = NULL;
}

function fetchContent($oidname) {
	try {
		$dbh = new PDO('sqlite:db/mdytdb');
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		print 'Exception : ' . $e -> getMessage();
	}
	$stmt = $dbh -> prepare("SELECT * FROM Obsah WHERE oidname = :oidname LIMIT 1");
	$stmt -> bindParam(':oidname', $oidname);
	$stmt -> execute();
	$rows = $stmt -> fetchAll();
	terminateSQLite();
	foreach ($rows as $row) {
		return $row['obsah'];
	}
}
function saveContent($oidname, $content) {
	try {
		$dbh = new PDO('sqlite:db/mdytdb');
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		print 'Exception : ' . $e -> getMessage();
	}
	$stmt = $dbh -> prepare("UPDATE Obsah SET obsah = :content WHERE oidname = :oidname");
	$stmt -> bindParam(':oidname', $oidname);
	$stmt -> bindParam(':content', $content);
	$stmt -> execute();
	$rows = $stmt -> fetchAll();
	terminateSQLite();
	foreach ($rows as $row) {
		return $row['obsah'];
	}
}
?>