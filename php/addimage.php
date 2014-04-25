<div class="picwrap newimage">
	<div class="picwrapoverflow">
		<form class="imageUpload" id="imageform" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="gid" value="<?=$galerie['gid'] ?>">
			<h3><?=$galerie['jmenogalerie'] ?> - Nahrát obrázky:</h3>
			<!--<input type="file" name="myfiles" multiple="multiple">-->
			<input id="fileinput" name="files[]" type="file" multiple="multiple">
			<br>
			<input name="button" type="button" value="Upload">			
		</form>
		<progress></progress>
	</div>
</div>