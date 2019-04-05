<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Jamowar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/style/css/style.css">
</head>
<body>
	<div class="bg menu-bg">
		<header id="main-header"><h1><img class="logo-header" src="public/img/logo.png"></h1></header>
		<nav id="main-nav">
			<ul>
				<li ><a href="index.php?action=playerchoice" class="button red">Jouer</a></li>
				<li ><a href="index.php?action=freemode" class="button red">Mode libre</a></li>
				<li ><a href="index.php?action=highscores" class="button red">High scores</a></li>
				<li ><a href="index.php?action=connexion" class="button red"><?php if(isset($_SESSION['user-id'])){ echo 'profil'; } else{echo 'connexion';} ?></a></li>
				<?php if(isset($_SESSION['user-id'])):?>
					<li ><a href="index.php?action=deconnexion" class="button red">Déconnexion</a></li>
				<?php endif; ?>	
			</ul>
		</nav>
	</div>
</body>
</html>