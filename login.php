<?php
include_once "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Mdyt.cz - Administrace</title>
		<link rel="stylesheet" href="CSS/screen.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="JScript/rotator.js"></script>
		<!--[if lt IE 9]>
		<script src="JScript/iefix.js"></script>
		<div class="error">Používáte přestárlý prohlížeč, prosím <a href="http://www.browserchoice.eu/">aktualizujte jej</a>!</div>
		<![endif]-->

	</head>
	<body>
		<div id="page">
			<header>
				<div id="logo">
					<h1>Martin Dytrych</h1>
				</div>
				<nav>
					<ul>
						<li>
							<a href="#akce">DOMŮ</a>
						</li>
						<li>
							<a href="#onas">O NÁS</a>
						</li>
						<li>
							<a href="#nabidka">NABÍDKA</a>
						</li>
						<li>
							<a href="#galerie">GALERIE</a>
						</li>
						<li>
							<a href="#kontakt">KONTAKT</a>
						</li>
					</ul>
				</nav>
			</header>

			<div id="prihlaseni">
				<div class="formular">
					<span id="nadpisprihlaseni">Přihlášení do administrace:</span>
					<form method="POST" action="index.php">
						<input type="text" name="username" />
						<input type="password" name="passphrase" />
						<input type="submit" name="submit" id="odeslat" value="Přihlásit"/>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>