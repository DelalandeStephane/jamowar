<?php $bgImg ='menu-bg' ?>

<?php ob_start();?>

<form class="">
	<label for="name">Pseudo</label><br>
	<input type="text" name="name" id="name"><br>
	<label for="password">mot de passe</label><br>
	<input type="password" name="password" id="password"><br>
	<input type="submit" value="envoyer" class="btn-submit red">
	<div class="booking-message">
		<p>Pas encore inscrit ?</p>
		<a  class="link-blue" href="?action=registration">Inscription</a>	
	</div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>