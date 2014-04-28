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
	<script type="text/javascript" src="JScript/galerie.js"></script>	
	<script type="text/javascript" src="JScript/shadow/shadowbox.js"></script>
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
							
								<div class="overlay">
									<div id="akce1" class="titleakce editable">
										<?php echo fetchContent("akce1"); ?>
									</div>
								</div> 
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce2imgurl") . "'"; ?>)">
																<div class="overlay">
									<div id="akce2" class="titleakce editable">
										<?php echo fetchContent("akce2"); ?>
									</div>
								</div>
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce3imgurl") . "'"; ?>)">
								
								<div class="overlay">
									<div id="akce3" class="titleakce editable">
										<?php echo fetchContent("akce3"); ?>
									</div>
								</div>
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce4imgurl") . "'"; ?>)">
								
								<div class="overlay">
									<div id="akce4" class="titleakce editable">
										<?php echo fetchContent("akce4"); ?>
									</div>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="onas">
				<div class="editable" id="nadpisonas">
				<?php echo fetchContent("nadpisonas"); ?>
				</div>
				<p id="textonas" class="dvasloupce editable">
					<?php echo fetchContent("textonas"); ?>
				</p>
			</section>
			<section id="nabidka">
				<div class="infobox">
					<img src="/img/nabidka_strecha_komin.jpg" alt="Nabídka střech">
					<div class="subinfobox">
									<div class="editable" id="nadpisnabidka1">
				<?php echo fetchContent("nadpisnabidka1"); ?>
				</div>
						<p id="obsahnabidka1" class="editable">
					<?php echo fetchContent("obsahnabidka1"); ?>
				</p>						
					</div>
				</div>
				<div class="infobox">
					<img src="/img/nabidka_strecha_tram.jpg" alt="Nabídka střech">
						<div class="subinfobox">
									<div class="editable" id="nadpisnabidka2">
				<?php echo fetchContent("nadpisnabidka2"); ?>
				</div>
						<p id="obsahnabidka2" class="editable">
					<?php echo fetchContent("obsahnabidka2"); ?>
				</p>						
					</div>
				</div>
				

				<div class="infobox">
					<img src="/img/nabidka_klempir.jpg" alt="Nabídka střech">
						<div class="subinfobox">
									<div class="editable" id="nadpisnabidka3">
				<?php echo fetchContent("nadpisnabidka3"); ?>
				</div>
						<p id="obsahnabidka3" class="editable">
					<?php echo fetchContent("obsahnabidka3"); ?>
				</p>						
					</div>
				</div>
				
				<div class="infobox">
					<img src="/img/nabidka_strecha_tasky.jpg" alt="Nabídka střech">
						<div class="subinfobox">
									<div class="editable" id="nadpisnabidka4">
				<?php echo fetchContent("nadpisnabidka4"); ?>
				</div>
						<p id="obsahnabidka4" class="editable">
					<?php echo fetchContent("obsahnabidka4"); ?>
				</p>						
					</div>
				</div>
			</section>
			<section id="spravagalerie">
				<?php
				include "spravaGalerie.php";
				?>
			</section>
			<section id="galerie">
				<div class="nadpisgalerie editable">
					<h2>Galerie</h2>
				</div>
				<div id="obsahgalerie">
								<?php
								include "php/galerie.php";
				?>					
				</div>
			</section>

			<section id="kontakt">
				<h2>Kontaktujte nás</h2>
				<div>
					<h4>Neváhejte napsat</h4>
				</div>
				<div class="kontaktniinformace">
					<div class="kontaktbox editable" id="telefon">
<?php echo fetchContent("telefon"); ?>
					</div>
					<div class="kontaktbox editable" id="email">
<?php echo fetchContent("email"); ?>
					</div>
					<div class="kontaktbox editable" id="adresa">
						<?php echo fetchContent("adresa"); ?>
					</div>
				</div>
				<div class="formular">
					<form method="POST" action="index.php">
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