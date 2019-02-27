<?php $bg ='menu-bg' ?>
<?php ob_start();?>
<section id="player-select">
	<figure class="player-definition">
		<img src="public/img/player/p1.jpg">
		<figcaption>Perso 1</figcaption>
	</figure>
	<figure class="player-definition">
		<img src="public/img/player/p2.jpg">
		<figcaption>Perso 2</figcaption>
	</figure>
	<figure class="player-definition">
		<img src="public/img/player/p3.jpg">
		<figcaption>Perso 3</figcaption>
	</figure>
</section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>