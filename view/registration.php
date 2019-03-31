<?php $bgImg ='menu-bg' ?>

<?php ob_start();?>

<form method="post" action="index.php?action=send-user">
	<label for="name">pseudo</label><br>
	<input type="text" name="name" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} ?>"><br>
	<label for="email">Ton email</label><br>
	<input type="text" name="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>"><br>
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'mail'):?>
		<p class="alert-form">l'adresse mail n'est pas conforme</p>
	<?php endif; ?>	
	<label for="birth-date">Date de naissance</label><br>
	<input type="date" name="birth-date" id="birth-date" value="<?php if(isset($_SESSION['birthDate'])){echo $_SESSION['birthDate'];} ?>"><br>
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'birth'):?>
		<p class="alert-form">date non conforme</p>
	<?php endif; ?>	

	<label for="password">mot de passe</label><br>
	<input type="password" name="password" value="<?php if(isset($_SESSION['password'])){echo $_SESSION['password'];} ?>"><br>



	<label for="confirm-password"> Confirmez votre mot de passe</label><br>
	<input type="password" name="confirm-password"><br>
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'pwd'):?>
		<p class="alert-form">Les deux mots de passe ne sont pas identiques</p>
	<?php endif; ?>	
	<input type="submit" value="envoyer" class="btn-submit red">
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'missing'):?>
		<p class="alert-form">Un des champs est manquant</p>
	<?php endif; ?>	
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>