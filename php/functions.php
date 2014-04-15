<?php
function verifyUser($jmeno, $heslo) {
	try {
		$dbh = new PDO('sqlite:db/mdytdb');
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		print 'Exception : ' . $e -> getMessage();
	}
	$stmt = $dbh -> prepare("SELECT * FROM uzivatele WHERE jmeno = :jmeno AND heslo = :heslo LIMIT 1");
	$hash = crypt($heslo, '$2y$08$dvacetdvaznakuosumosum$');
	$stmt -> bindParam(':jmeno', $jmeno);
	$stmt -> bindParam(':heslo', $hash);
	$stmt -> execute();
	$rows = $stmt -> fetchAll();
	$rowsCount = count($rows);
	terminateSQLite();
	if ($rowsCount == 1) {
		return true;
	} else {
		return false;
	}
}
?>