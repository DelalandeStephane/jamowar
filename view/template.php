<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Jamowar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/style/css/style.css">
</head>
<body>
	<div class="<?= $bg ?>">
		<header class="secondary-header">
			<img src="public/img/logo.png" class="logo-navbar">
			<nav class="secondary-nav">
				<ul>
					<li><a href="?action=home">Accueil</a></li>
					<li><a href="#">Jouer</a></li>
					<li><a href="#">Mode libre</a></li>
				</ul>
			</nav>
		</header>
	<?= $content ?>
</div>
</body>
</html>