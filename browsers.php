<?php
  $dirname = "browsers/";
$images = glob($dirname."*.png");
foreach($images as $image) {
echo $image."<br />";	
echo '<img src="'.$image.'" /><br /><br />';
}
?>