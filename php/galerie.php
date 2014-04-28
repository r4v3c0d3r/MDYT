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

function fetchPicture($gid, $overlay) {
	try {
		$dbh = initSQLite();
		$stmt = $dbh -> prepare("SELECT * FROM obrazky WHERE gid = :gid ORDER BY RANDOM() LIMIT 1");
		$stmt -> bindParam(':gid', $gid);
		$stmt -> execute();
		$res = $stmt -> fetchAll();
		terminateSQLite();
		foreach ($res as $pic) {
			echo '<a href="' . $pic['urlobrazku'] . '" rel="shadowbox;height=500;width=840"><div class="obrazek" style="background-image: url(\'' . $pic['urlobrazku'] . '\');">';
			if (isset($overlay)) {
				echo '<div class="galeryoverlay">
								<div class="titlegalerie">
									<h2>' . $overlay . '</h2>
								</div>
							</div>';
			}
			echo '</div></a>';

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
	fetchPicture($galerie['gid'], ($i == 1) ? fetchContent("galerie" . $galerie['gid']) : null);
	fetchPicture($galerie['gid'], ($i == 2) ? fetchContent("galerie" . $galerie['gid']) : null);
	fetchPicture($galerie['gid'], ($i == 3) ? fetchContent("galerie" . $galerie['gid']) : null);
	echo '</div>';
}
echo '<script>loadShadowBox();</script>';
?>