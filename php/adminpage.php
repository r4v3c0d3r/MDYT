<?php
$_SESSION['povolitZapis'] = true;
setcookie("PovolitZapis", true, time() + 66400);
?>
<!DOCTYPE html>
<html lang="cs">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title id="PageTitle"><?php echo fetchContent("PageTitle"); ?></title>
	<link rel="stylesheet" href="CSS/screen.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,100' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="./tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="JScript/ajax.js"></script>
	<script type="text/javascript" src="JScript/fileupload.js"></script>
	<script type="text/javascript" src="JScript/galerymanager.js"></script>
	<script type="text/javascript" src="JScript/rotator.js"></script>
	<!--[if lt IE 9]>
	<script src="JScript/iefix.js"></script>
	<div class="error">Používáte přestárlý prohlížeč, prosím <a href="http://www.browserchoice.eu/">aktualizujte jej</a>!</div>
	<![endif]-->
</head>
	<body>
		<div id="page">
			<header>
	<div id="logo" class="editable">
		<?php echo fetchContent("logo"); ?>		
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
			<section id="akce">
				<div id="slider-wrapper">
					<div class="inner-wrapper" id="sliderControl">
						<input checked type="radio" name="slide" class="control" id="Slide1" value="0"/>
						<label for="Slide1" id="s1"></label>
						<input type="radio" name="slide" class="control" id="Slide2" value="1"/>
						<label for="Slide2" id="s2"></label>
						<input type="radio" name="slide" class="control" id="Slide3" value="2"/>
						<label for="Slide3" id="s3"></label>
						<input type="radio" name="slide" class="control" id="Slide4" value="3"/>
						<label for="Slide4" id="s4"></label>
						<div id="leftarrow"></div>
						<div id="rightarrow"></div>
						<div class="overflow-wrapper">
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce1imgurl") . "'"; ?>)">
								<a href="#1">
								<div class="overlay">
									<div id="akce1" class="titleakce editable">
										<?php echo fetchContent("akce1"); ?>
									</div>
								</div> </a>
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce2imgurl") . "'"; ?>)">
								<a href="#2">
								<div class="overlay">
									<div id="akce2" class="titleakce editable">
										<?php echo fetchContent("akce2"); ?>
									</div>
								</div> </a>
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce3imgurl") . "'"; ?>)">
								<a href="#3">
								<div class="overlay">
									<div id="akce3" class="titleakce editable">
										<?php echo fetchContent("akce3"); ?>
									</div>
								</div> </a>
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce4imgurl") . "'"; ?>)">
								<a href="#4">
								<div class="overlay">
									<div id="akce4" class="titleakce editable">
										<?php echo fetchContent("akce4"); ?>
									</div>
								</div> </a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="onas">
				<h2>O nás / Kdo jsem?</h2>
				<p id="textonas" class="dvasloupce editable">
					<?php echo fetchContent("textonas"); ?>
				</p>
			</section>
			<section id="nabidka">

				<div class="infobox">
					<img src="/img/nabidka_strecha_komin.jpg" alt="Nabídka střech">
					<div class="subinfobox">
						<h3>Nabídka střech</h3>
						<p>
							In hac habitasse platea dictumst. Donec iaculis enim quis porttitor tempor.
							Nulla non volutpat dolor, mattis interdum mauris. Nulla nibh dolor, congue ac consectetur sodales,
							lobortis eget libero. Maecenas commodo, metus vel vulputate porta, arcu libero sagittis quam,
							vitae congue sapien.
						</p>
					</div>
				</div>
				<div class="infobox">
					<img src="/img/nabidka_strecha_tram.jpg" alt="Nabídka střech">
					<div class="subinfobox">
						<h3>Tesařské práce</h3>
						<p>
							In hac habitasse platea dictumst. Donec iaculis enim quis porttitor tempor.
							Nulla non volutpat dolor, mattis interdum mauris. Nulla nibh dolor, congue ac consectetur sodales,
							lobortis eget libero. Maecenas commodo, metus vel vulputate porta, arcu libero sagittis quam,
							vitae congue sapien.
						</p>
					</div>
				</div>

				<div class="infobox">
					<img src="/img/nabidka_klempir.jpg" alt="Nabídka střech">
					<div class="subinfobox">
						<h3>Klempířství</h3>
						<p>
							In hac habitasse platea dictumst. Donec iaculis enim quis porttitor tempor.
							Nulla non volutpat dolor, mattis interdum mauris. Nulla nibh dolor, congue ac consectetur sodales,
							lobortis eget libero. Maecenas commodo, metus vel vulputate porta, arcu libero sagittis quam,
							vitae congue sapien.
						</p>
					</div>
				</div>

				<div class="infobox">
					<img src="/img/nabidka_strecha_tasky.jpg" alt="Nabídka střech">
					<div class="subinfobox">
						<h3>Pokrývačství</h3>
						<p>
							In hac habitasse platea dictumst. Donec iaculis enim quis porttitor tempor.
							Nulla non volutpat dolor, mattis interdum mauris. Nulla nibh dolor, congue ac consectetur sodales,
							lobortis eget libero. Maecenas commodo, metus vel vulputate porta, arcu libero sagittis quam,
							vitae congue sapien.
						</p>
					</div>
				</div>

			</section>
			<section id="spravagalerie">
				<?php
				include "php/spravaGalerie.php";
				?>
			</section>
			<section id="galerie">
				<div class="nadpisgalerie editable">
					<h2>Galerie</h2>
				</div>
				<div id="obsahgalerie">
					<div class="album">
						<div class="obrazek" style="background-image: url('img/nabidka_strecha_komin.jpg');">
							<div class="galeryoverlay">
								<div class="titlegalerie editable">
									<h2>Dřevostavby</h2>
								</div>
							</div>
						</div>
						<div class="obrazek" style="background-image: url('img/nabidka_strecha_komin.jpg');">

						</div>
						<div class="obrazek" style="background-image: url('img/nabidka_strecha_komin.jpg');">

						</div>
					</div>
					<div class="album">
						<div class="obrazek" style="background-image: url('img/nabidka_strecha_komin.jpg');">

						</div>
						<div class="obrazek" style="background-image: url('img/nabidka_strecha_komin.jpg');">
							<div class="galeryoverlay">
								<div class="titlegalerie editable">
									<h2>Střechy</h2>
								</div>
							</div>
						</div>
						<div class="obrazek" style="background-image: url('img/nabidka_strecha_komin.jpg');">

						</div>
					</div>
					<div class="album">
						<div class="obrazek" style="background-image: url('img/nabidka_strecha_komin.jpg');">

						</div>
						<div class="obrazek" style="background-image: url('img/nabidka_strecha_komin.jpg');">

						</div>
						<div class="obrazek" style="background-image: url('img/nabidka_strecha_komin.jpg');">
							<div class="galeryoverlay">
								<div class="titlegalerie editable">
									<h2>Šrot</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="kontakt">
				<h2>Kontaktujte nás</h2>
				<div class="editable">
					<h4>Neváhejte napsat</h4>
				</div>
				<div class="kontaktniinformace">
					<div class="kontaktbox" id="telefon">
						<h5>Telefon</h5>
						<p>
							+420 604 804 652
						</p>
					</div>
					<div class="kontaktbox" id="email">
						<h5>Email</h5>
						<p>
							email@mdyt.cz
						</p>
					</div>
					<div class="kontaktbox" id="adresa">
						<h5>Adresa</h5>
						<p>
							Martin Dytrych
							<br>
							Husova 23, Hořice 508 01
						</p>
					</div>
				</div>
				<div class="formular">
					<form>
						<input type="text" name="name" value="Vaše jméno" />
						<input type="text" name="email" value="Váš email" />
						<textarea name="message" id="velkevstupnipole">Vaše zpráva</textarea>
						<input type="submit" name="submit" id="odeslat" value="Odeslat"/>
					</form>
				</div>
			</section>
			<section id="paticka"></section>
		</div>
	</body>
</html>