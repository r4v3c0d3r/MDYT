<?php
//security check, maybe?
include "php/sqlite.php";
saveContent($_POST['oidname'], $_POST['content']);
?>