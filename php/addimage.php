<div class="thumbwrap newimage">
	<form class="imageUpload" id="<?=$galerie['gid'] ?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="gid" value="<?=$galerie['gid'] ?>">
		<h5><?=$galerie['jmenogalerie'] ?>
		- Nahrát obrázky:</h5>
		<!--<input type="file" name="myfiles" multiple="multiple">-->
		<input class="fileinput" id="<?=$galerie['gid'] ?>" name="files[]" type="file" multiple="multiple">
		<br>
		<input name="button" type="button" id="<?=$galerie['gid'] ?>" value="Nahrát!">
		<progress></progress>
	</form>
</div>