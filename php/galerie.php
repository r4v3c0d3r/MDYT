<?php
include_once "sqlite.php";
function fetchGaleries() {
	try {
		$dbh = initSQLite();
		$stmt = $dbh -> prepare("SELECT * FROM galerie WHERE povoleno = 1");
		$stmt -> execute();
		$res = $stmt -> fetchAll();
		terminateSQLite();
		return $res;
	} catch(exception $e) {
		print 'Exception : ' . $e -> getMessage();
	}
}

function FetchGaleryPictures($gid) {
	try {
		$dbh = initSQLite();
		$stmt = $dbh -> prepare("SELECT * FROM obrazky WHERE gid = :gid ORDER BY RANDOM()");
		$stmt -> bindParam(':gid', $gid);
		$stmt -> execute();
		$res = $stmt -> fetchAll();
		terminateSQLite();
		$picCounter = 1;
		foreach ($res as $pic) {

			if ($picCounter <= 3) {
				echo '<a href="' . $pic['urlobrazku'] . '" rel="shadowbox[' . $pic['gid'] . '];height=500;width=840"><div class="obrazek" style="background-image: url(\'' . $pic['urlobrazku'] . '\');">';
				if ($picCounter == 1 && $pic['gid'] == 1 || $picCounter == 2 && $pic['gid'] == 2 || $picCounter == 3 && $pic['gid'] == 3) {
					echo '<div class="galeryoverlay">
								<div class="titlegalerie">
									<h2>' . fetchContent("galerie".$pic['gid']) . '</h2>
								</div>
							</div>';
				}
			} else {
				echo '<a href="' . $pic['urlobrazku'] . '" rel="shadowbox[' . $pic['gid'] . '];height=500;width=840"><div class="skrytyobrazek" style="background-image: url(\'' . $pic['urlobrazku'] . '\');">';
			}

			echo '</div></a>';
			$picCounter++;
		}
	} catch(exception $e) {
		print 'Exception : ' . $e -> getMessage();
	}
}
$res = fetchGaleries();
$i = 0;

foreach ($res as $galerie) {
	$i++;
	echo '<div class="album">';
	FetchGaleryPictures($galerie['gid']);	
	echo '</div>';
}
echo '<script>loadShadowBox();</script>';
?>