<div class="picwrap newimage">
	<div class="picwrapoverflow">
		<form class="imageUpload" id="<?=$galerie['jmenogalerie'] ?>" enctype="multipart/form-data">
			<input type="hidden" name="gid" value="<?=$galerie['gid'] ?>">
			<h3>Nahrát obrázky:</h3>
			<!--<input type="file" name="myfiles" multiple="multiple">-->
			<input name="file" type="file" multiple="multiple">
			<br>
			<input name="button" type="button" value="Upload">
			
		</form>
		<progress></progress>
	</div>
</div>