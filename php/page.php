<?php
include_once "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">
	<?php
	include_once 'php/head.php';
	?>
	<body>
		<div id="page">
			<header>
	<div id="logo">
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
									<div id="akce1" class="titleakce">
										<?php echo fetchContent("akce1"); ?>
									</div>
								</div> 
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce2imgurl") . "'"; ?>)">
																<div class="overlay">
									<div id="akce2" class="titleakce">
										<?php echo fetchContent("akce2"); ?>
									</div>
								</div>
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce3imgurl") . "'"; ?>)">
								
								<div class="overlay">
									<div id="akce3" class="titleakce">
										<?php echo fetchContent("akce3"); ?>
									</div>
								</div>
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce4imgurl") . "'"; ?>)">
								
								<div class="overlay">
									<div id="akce4" class="titleakce">
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
				<p id="textonas" class="dvasloupce">
					<?php echo fetchContent("textonas"); ?>
				</p>
			</section>
			<section id="nabidka">
				<div class="infobox">
					<img src="/img/nabidka_strecha_komin.jpg" alt="Nabídka střech">
					<div class="subinfobox">
									<div id="nadpisnabidka1">
				<?php echo fetchContent("nadpisnabidka1"); ?>
				</div>
						<p id="obsahnabidka1">
					<?php echo fetchContent("obsahnabidka1"); ?>
				</p>						
					</div>
				</div>
				<div class="infobox">
					<img src="/img/nabidka_strecha_tram.jpg" alt="Nabídka střech">
						<div class="subinfobox">
									<div id="nadpisnabidka2">
				<?php echo fetchContent("nadpisnabidka2"); ?>
				</div>
						<p id="obsahnabidka2">
					<?php echo fetchContent("obsahnabidka2"); ?>
				</p>						
					</div>
				</div>
				

				<div class="infobox">
					<img src="/img/nabidka_klempir.jpg" alt="Nabídka střech">
						<div class="subinfobox">
									<div id="nadpisnabidka3">
				<?php echo fetchContent("nadpisnabidka3"); ?>
				</div>
						<p id="obsahnabidka3">
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
						<p id="obsahnabidka4">
					<?php echo fetchContent("obsahnabidka4"); ?>
				</p>						
					</div>
				</div>
			</section>
			<section id="galerie">
				<div class="nadpisgalerie">
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
					<div class="kontaktbox" id="telefon">
<?php echo fetchContent("telefon"); ?>
					</div>
					<div class="kontaktbox" id="email">
<?php echo fetchContent("email"); ?>
					</div>
					<div class="kontaktbox" id="adresa">
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