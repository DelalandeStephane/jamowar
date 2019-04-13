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
	<div class="bg menu-bg">
		<header id="main-header"><h1><img class="logo-header" src="public/img/logo.png" alt="jamowar"> </h1></header>
		<nav id="main-nav">
			<ul>
				<li ><a href="index.php?action=playerchoice" class="button red">Jouer</a></li>
				<li ><a href="index.php?action=highscores" class="button red">High-scores</a></li>
				<?php if(isset($_SESSION['user-right']) && $_SESSION['user-right'] == 'player'):?>
					<li ><a href="index.php?action=profil" class="button red">Profil</a></li>
				<?php elseif(isset($_SESSION['user-right']) && $_SESSION['user-right'] == 'admin'):?>
					<li ><a href="index.php?action=admin" class="button red">Admin</a></li>
				<?php else :?>
					<li ><a href="index.php?action=connexion" class="button red">Connexion</a></li>
					<?php endif; ?>
				<?php if(isset($_SESSION['user-id'])):?>
					<li ><a href="index.php?action=deconnexion" class="button red">Déconnexion</a></li>
				<?php endif; ?>	
			</ul>
		</nav>
	</div>
</body>
</html>