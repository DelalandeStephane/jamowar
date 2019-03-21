<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Jamowar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/style/css/style.css">
</head>
<body>
	<div class="bg <?= $bgImg ?>">
		<header class="secondary-header">
			<img src="public/img/logo.png" class="logo-navbar">
			<nav class="secondary-nav">
				<ul>
					<li><a href="?action=home">Accueil</a></li>
					<li><a href="?action=playerchoice">Jouer</a></li>
					<li><a href="?action=freemode">Mode libre</a></li>
				</ul>
			</nav>
		</header>
	<?= $content ?>
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	  crossorigin="anonymous"></script>
	  <script src="public/js/music-player.js"></script>
	  <script src="public/js/ajax.js"></script>
	  <script src="public/js/main.js"></script>
	  <?php if(isset($script)){echo $script; } ?>
</div>
</body>
</html>