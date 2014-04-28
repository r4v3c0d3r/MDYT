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
			<?php
			include_once 'php/header.php';
			?>
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
									<div id="akce1" class="titleakce">
										<?php echo fetchContent("akce1"); ?>
									</div>
								</div> </a>
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce2imgurl") . "'"; ?>)">
								<a href="#2">
								<div class="overlay">
									<div id="akce2" class="titleakce">
										<?php echo fetchContent("akce2"); ?>
									</div>
								</div> </a>
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce3imgurl") . "'"; ?>)">
								<a href="#3">
								<div class="overlay">
									<div id="akce3" class="titleakce">
										<?php echo fetchContent("akce3"); ?>
									</div>
								</div> </a>
							</div>
							<div class="slideimage" style="background-image: url(<?php echo "'" . fetchContent("akce4imgurl") . "'"; ?>)">
								<a href="#4">
								<div class="overlay">
									<div id="akce4" class="titleakce">
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
				<p class="dvasloupce">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis ante a metus mattis accumsan ac quis lorem.
					Phasellus ac sem eu tellus posuere iaculis. Nunc ut dui ipsum. Aenean eleifend nibh sit amet scelerisque sagittis.
					Fusce et ornare urna. Nulla facilisi. Donec tristique, est vel mollis rutrum, mauris leo luctus erat,
					sit amet cursus massa leo vel arcu. Nullam in volutpat tellus.
					Ut mollis enim eu nisl luctus, sed ultrices sapien luctus. Etiam at quam nunc. Etiam urna velit,
					aliquet vitae ipsum bibendum, congue posuere risus. Ut sit amet vestibulum lorem. Duis eget est in mi fringilla rutrum vel a velit.
					Curabitur in pharetra sem. Duis pellentesque, lorem a luctus laoreet, lorem augue lobortis dolor, eget mattis nisi velit eget sapien.
					Sed sed tellus pellentesque, laoreet risus ac, varius ligula. Aliquam enim eros, sollicitudin sit amet pulvinar vitae, porttitor in sapien.
					Vestibulum tincidunt tempor lectus, eu vehicula nibh ultrices non. Etiam egestas dui id mi congue lobortis.
					Pellentesque ut risus erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi sed congue magna.
					Praesent eu lorem sagittis, ultrices libero vel, hendrerit lorem. Integer convallis imperdiet nisl, non vestibulum est.
					Pellentesque orci nisl, faucibus sit amet justo et, ornare suscipit augue. Phasellus a lacus non tortor aliquam posuere.
					Integer a lacus nec neque mattis volutpat. Maecenas et augue libero. Maecenas non tortor pellentesque, ornare sem et, ornare urna.
					In vehicula ante lorem, non varius orci blandit auctor.
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
				<h4>Neváhejte napsat</h4>
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