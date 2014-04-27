<?php
if (isset($_POST['gid']) && $_POST['operace'] == "reload") {
	include "sqlite.php";
	fetchThumbs($_POST['gid']);
}
function fetchThumbs($gid) {
	$dbh = initSQLite();
	$stmt2 = $dbh -> prepare("SELECT * FROM obrazky WHERE gid = :gid");
	$stmt2 -> bindParam(':gid', $gid);
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
			<input type="button" name="updateSave" id="' . $obrazek['oid'] . '" value="Uložit">
			</form>
			</div>
			</div>
		</div>';
	}
}
?>