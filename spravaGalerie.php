<?php
include_once 'php/sqlite.php';
if (isset($_POST['oid'])) {
	$oid = $_POST['oid'];
	if ($_POST['operation'] == "delete") {
		deleteImageFile($oid);
		deleteImageRecord($oid);
	}
	if ($_POST['operation'] == "UpdateCaps") {
		updateImageRecord($oid, $_POST['novyNadpis'], $_POST['novyPodNadpis']);
	}

	die ;
}
?>
<div class="nadpisgalerie">
	<h2>Správa Galerie</h2>
</div>
<?php
fetchGaleriesManagement();
?>

