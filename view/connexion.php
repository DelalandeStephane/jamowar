<?php $bgImg ='menu-bg' ?>

<?php ob_start();?>

<form class="user-form" method="post" action="index.php?action=profil">
	<label for="name">Pseudo</label><br>
	<input type="text" name="name" id="name"><br>
	<label for="password">mot de passe</label><br>
	<input type="password" name="password" id="password"><br>
	<input type="submit" value="envoyer" class="btn-submit red">
	<div class="booking-message">
		<p>Pas encore inscrit ?</p>
		<a  class="link-blue" href="?action=registration">Inscription</a>	
	</div>
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'connexion'):?>
		<p class="alert-form">Identifiants incorrects</p>
	<?php endif; ?>	
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>