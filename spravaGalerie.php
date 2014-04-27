<?php
include_once 'php/sqlite.php';
if (isset($_POST['oid'])) {
	$oid = $_POST['oid'];
	if ($_POST['operation'] == "delete") {
		deleteImageFile($oid);
		deleteImageRecord($oid);
		echo "Deleted oid:" . $_POST['oid'];
	}
	if ($_POST['operation'] == "update") {
		echo "Update oid:" . $_POST['oid'];
	}
	//AND OID exists
	//delete record and file

	die ;
}
?>
<div class="nadpisgalerie">
	<h2>Správa Galerie</h2>
</div>
<?php
fetchGaleriesManagement();
?>

