<?php
if (isset($_POST['gid']) && $_POST['operace'] == "reloadform") {
	include "sqlite.php";
	fetchNewImageForm(($_POST['gid']));
}
function fetchNewImageForm($gid) {
	echo '<form class="imageUpload" id="' . $gid . '" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="gid" value="' . $gid . '">
		<div class="galerynameedit editable" id="galerie' . $gid . '" title="EDITOVATELNÉ, KLIKNĚTE PRO SPUŠTĚNÍ EDITORU.">';
	echo fetchContent("galerie" . $gid);
	echo '</div>
		<br>
		<!--<input type="file" name="myfiles" multiple="multiple">-->
		<input class="fileinput" id="' . $gid . '" name="files[]" type="file" multiple="multiple">
		<br>
		<input name="uploadbutton" type="button" id="' . $gid . '" value="Nahrát!">
		<progress></progress>
	</form>';
}
