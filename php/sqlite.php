<?php
function initSQLite() {
	try {
		$dbh = new PDO('sqlite:db/mdytdb');
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		print 'Exception : ' . $e -> getMessage();
		die();
	}
	return ($dbh);
}

function terminateSQLite() {
	$dbh = NULL;
}

function fetchContent($oidname) {
	try {
		$dbh = initSQLite();
		$stmt = $dbh -> prepare("SELECT * FROM Obsah WHERE oidname = :oidname LIMIT 1");
		$stmt -> bindParam(':oidname', $oidname);
		$stmt -> execute();
		$rows = $stmt -> fetchAll();
		terminateSQLite();
		foreach ($rows as $row) {
			return $row['obsah'];
		}
	} catch(exception $e) {
		print 'Exception : ' . $e -> getMessage();
	}
}

//adminfce
function fetchGaleriesManagement() {
	try {
		$dbh = initSQLite();
		$stmt = $dbh -> prepare('SELECT * FROM galerie WHERE povoleno');
		//neat WHERE BOOL
		//variabilizovat limit nebo něco
		$stmt -> execute();
		$res = $stmt -> fetchAll();
		terminateSQLite();
		//	foreach ($res as $galerie) {
		$galerie = $res[0]; {
			echo '<div class="spravaAlba"><h3>' . $galerie['jmenogalerie'] . '</h3>';
			$dbh = initSQLite();
			$stmt2 = $dbh -> prepare("SELECT * FROM obrazky WHERE gid = :gid");
			$stmt2 -> bindParam(':gid', $galerie['gid']);
			$stmt2 -> execute();
			$res2 = $stmt2 -> fetchAll();
			terminateSQLite();
			foreach ($res2 as $obrazek) {
				echo '<div class="picwrap" style="background-image: url(\'' . $obrazek['urlobrazku'] . '\');">
				<div class="picwrapoverflow">
				</div>
				</div>';
			}
			include "addimage.php";
			//upload new images to this album!
		}
	} catch(exception $e) {
		print 'Exception : ' . $e -> getMessage();
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
function createImageRecord($gid, $url) {
	try {
		$dbh = new PDO('sqlite:../db/mdytdb');
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		print 'Exception : ' . $e -> getMessage();
	}

	$stmt = $dbh -> prepare("INSERT INTO obrazky (oid, gid, urlobrazku) VALUES (NULL, :gid, :urlobrazku)");
   	$stmt -> bindParam(':gid', $gid);
	$stmt -> bindParam(':urlobrazku', $url);
	$stmt -> execute();
	$rows = $stmt -> fetchAll();
	terminateSQLite();
echo "Record created.";
}
?>