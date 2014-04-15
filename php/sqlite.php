<?php
function initSQLite() {

	return($dbh);
}
function terminateSQLite() {
	$dbh = NULL;
}
?>