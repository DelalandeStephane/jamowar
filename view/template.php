<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Jamowar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/style/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/style/css/responsive.css">
	<meta name="viewport" content="width=device-width" />
</head>
<body>
	<div class="bg <?= $bgImg ?>">
		<header class="secondary-header">
			<img src="public/img/logo.png" class="logo-navbar" alt="jamowar">
			<nav class="secondary-nav">
				<ul>
					<li><a href="?action=home">Accueil</a></li>
					<li><a href="?action=playerchoice">Jouer</a></li>
					<li><a href="?action=highscores">High-scores</a></li>
					<?php if(isset($_SESSION['user-right']) && $_SESSION['user-right'] == 'player'):?>
						<li ><a href="index.php?action=profil">Profil</a></li>
					<?php elseif(isset($_SESSION['user-right']) && $_SESSION['user-right'] == 'admin'):?>
						<li ><a href="index.php?action=admin">Admin</a></li>
					<?php else :?>
						<li ><a href="index.php?action=connexion">Connexion</a></li>
					<?php endif; ?>
					<?php if(isset($_SESSION['user-id'])):?>
						<li ><a href="index.php?action=deconnexion">Déconnexion</a></li>
					<?php endif; ?>	
				</ul>
			</nav>
			<img id="menu" src="public/img/menu.png" alt="menu">
		</header>
	<?= $content ?>
	</div>
	<footer><p>Delalande Stéphane -Jamowar- 2019</p></footer>
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	  crossorigin="anonymous"></script>
	  <script src="public/js/tool.js"></script>
	  <script src="public/js/music-player.js"></script>
	  <script src="public/js/main.js"></script>
	  <?php if(isset($script)){echo $script; } ?>

</body>
</html>