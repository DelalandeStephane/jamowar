<?php $bgImg ='menu-bg' ?>
<?php ob_start();?>
<p class="inform-text">Sélectionner votre adversaire</p>
<section id="player-select">
		<figure class="player-definition" id="player-1">
			<img src="public/img/player/p1.jpg" alt="image adversaire">
			<figcaption><p>C.Obvious<br>Niveau 1</p></figcaption>
		</figure>
		<figure class="player-definition" id="player-2">
			<img src="public/img/player/p2.jpg" alt="image adversaire">
			<figcaption><p>Issou<br>Niveau 2</p></figcaption>
		</figure>
		<figure class="player-definition" id="player-3">
			<img src="public/img/player/p3.jpg" alt="image adversaire">
			<figcaption><p>Crazy Joe<br>Niveau 3</p></figcaption>
		</figure>
</section>
<?php if(!isset($_SESSION['user-id'])):?>
	<div class="connexion-block">
		<p>Pensez à vous connecter</p>
		<a href="index.php?action=connexion" class="link-blue">connexion</a>
	</div>
<?php endif; ?>
<div id="confirm"></div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>