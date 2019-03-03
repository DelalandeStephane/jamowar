<?php $bgImg ='menu-bg' ?>
<?php ob_start();?>
<div id="free-mode">
	<section id="player-select">
		<a href="?action=stage&player=1" id="player-1" class="free-player-selected">
			<figure class="player-definition">
				<img src="public/img/player/p1.jpg">
				<figcaption>Perso 1</figcaption>
			</figure>
		</a>
		<a href="?action=stage&player=2" id="player-2" class="free-player-selected">
			<figure class="player-definition">
				<img src="public/img/player/p2.jpg">
				<figcaption>Perso 2</figcaption>
			</figure>
		</a>
		<a href="?action=stage&player=3" id="player-3" class="free-player-selected">
			<figure class="player-definition">
				<img src="public/img/player/p3.jpg">
				<figcaption>Perso 3</figcaption>
			</figure>
		</a>
	</section>
	<div id="synth">
		<div class="key white" id="do"></div>
		<div class="key black" id="do-d"></div>
		<div class="key white" id="re"></div>
		<div class="key black" id="re-d"></div>
		<div class="key white" id="mi"></div>
		<div class="key white" id="fa"></div>
		<div class="key black" id="fa-d"></div>
		<div class="key white" id="sol"></div>
		<div class="key black" id="sol-d"></div>
		<div class="key white" id="la"></div>
		<div class="key black" id="la-d"></div>
		<div class="key white" id="si"></div>		
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>