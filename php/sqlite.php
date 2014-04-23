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
		foreach ($res as $galerie) {
			echo '<div class="spravaAlba"><h3>' . $galerie['jmenogalerie'] . '</h3>';
			$dbh = initSQLite();
			$stmt2 = $dbh -> prepare("SELECT * FROM obrazky WHERE gid = :gid");
			$stmt2 -> bindParam(':gid', $galerie['gid']);
			$stmt2 -> execute();
			$res2 = $stmt2 -> fetchAll();
			terminateSQLite();
			foreach ($res2 as $obrazek) {
				echo '<div class="picwrap"></div>';
			}
			//upload new images to this album!
			echo '<div class="picwrap newimage" id="' . $galerie['jmenogalerie'] . '">
			<div class="picwrapoverflow"><form method="post" action="">
			<input type="hidden" name="gid" value="' . $galerie['jmenogalerie'] . '">
			<h3>Nahrát obrázky:</h3>
			<input type="file" name="myfiles" multiple="multiple"><br>
			<input type="button" value="Nahrát soubory" onclick="startUpload()" >
			</form></div></div>';
			echo '</div>';
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
?>