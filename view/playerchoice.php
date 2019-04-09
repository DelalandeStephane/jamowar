<?php $bgImg ='menu-bg' ?>
<?php ob_start();?>
<section id="player-select">
	<a href="?action=stage&player=1" id="player-1" value="1" class="player-selected">
		<figure class="player-definition">
			<img src="public/img/player/p1.jpg">
			<figcaption>C.Obvious</figcaption>
		</figure>
	</a>
	<a href="?action=stage&player=2" id="player-2" value="2" class="player-selected">
		<figure class="player-definition">
			<img src="public/img/player/p2.jpg">
			<figcaption>Issou</figcaption>
		</figure>
	</a>
	<a href="?action=stage&player=3" id="player-3" value="3" class="player-selected">
		<figure class="player-definition">
			<img src="public/img/player/p3.jpg">
			<figcaption>Crazy Joe</figcaption>
		</figure>
	</a>
</section>
<div id="confirm"></div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>