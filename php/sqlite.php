<?php
function initSQLite() {

	try {
		$dbh = new PDO('sqlite:' . $_SERVER["DOCUMENT_ROOT"] . '/db/mdytdb');
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		print 'Exception : ' . $e -> getMessage();
		die();
	}
	return ($dbh);
}

function terminateSQLite() {
	$dbh = null;
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
		//}
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $dbh -> prepare('SELECT * FROM galerie WHERE povoleno');
		//neat WHERE BOOL
		//variabilizovat limit nebo něco
		$stmt -> execute();
		$res = $stmt -> fetchAll();
		terminateSQLite();
		foreach ($res as $galerie) { {
				echo '<div class="spravaAlba" id="' . $galerie['gid'] . '"><h3>' . $galerie['jmenogalerie'] . '</h3>';
				include "addimage.php";
				$dbh = initSQLite();
				$stmt2 = $dbh -> prepare("SELECT * FROM obrazky WHERE gid = :gid");
				$stmt2 -> bindParam(':gid', $galerie['gid']);
				$stmt2 -> execute();
				$res2 = $stmt2 -> fetchAll();
				terminateSQLite();
				foreach ($res2 as $obrazek) {
					echo '
	<div class="thumbwrap" style="background-image: url(\'' . $obrazek['urlobrazku'] . '\');">
			<div class="thumboverlay">
			<div class="button yellow" id="EDIT' . $obrazek['oid'] . '" data-oid="' . $obrazek['oid'] . '">
			E
			</div>
			<div class="button red" id="DELETE' . $obrazek['oid'] . '" data-oid="' . $obrazek['oid'] . '">
			X
			</div>
			<div class="updatedialog">
			<form method="POST" >
			Nadpis: <input type="text" name="nadpisObrazku" value="' . $obrazek['nadpisObrazku'] . '">
			Podnadpis: <input type="text" name="podnadpisObrazku" value="' . $obrazek['podnadpisObrazku'] . '">
			<input type="button" value="Uložit">
			</form>
			</div>
			</div>
		</div>';
				}
				echo "</div>";
				//upload new images to this album!
			}
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
}

function deleteImageRecord($oid) {
	try {
		$dbh = initSQLite();
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		print 'Exception : ' . $e -> getMessage();
	}
	$stmt = $dbh -> prepare("DELETE FROM obrazky WHERE oid = :oid");
	$stmt -> bindParam(':oid', $oid);
	$stmt -> execute();
	$rows = $stmt -> fetchAll();
	terminateSQLite();
}

function deleteImageFile($oid) {
	try {
		$dbh = initSQLite();
		$stmt = $dbh -> prepare("SELECT urlobrazku FROM obrazky WHERE oid = :oid");
		$stmt -> bindParam(':oid', $oid, PDO::PARAM_INT);
		$stmt -> execute();
		$res = $stmt -> fetchAll();
		$picurl = realpath($res[0]['urlobrazku']);
		if (is_readable($picurl)) {
			unset($picurl);
		} else {
			echo "\nSoubor nejde smazat.";
		}

		terminateSQLite();
	} catch(exception $e) {
		print 'Exception : ' . $e -> getMessage();
	}
}
?>