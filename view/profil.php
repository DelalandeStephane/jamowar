<?php $bgImg ='menu-bg' ?>

<?php ob_start();?>
<div class="user-profil">
	<p>Pseudo: <?= $data->getName(); ?> </p>
	<p>Votre photo :</p>
	<img src="public/img/user/<?= $data->getPicture() ?>">
	<form method="post" action="index.php?action=uploadpicture&id=<?= $data->getId()?>" enctype="multipart/form-data">
	<input type="file" name="picture"><br>
	<input type="submit" value="envoyer" class="btn-submit red">
	</form>

	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'pictureExt'):?>
		<p class="alert-form">l'extension du fichier est incorrect</p>
	<?php endif; ?>	
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'trasnfert'):?>
		<p class="alert-form">Le trasnfert à échouer</p>
	<?php endif; ?>
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'pictureSize'):?>
		<p class="alert-form">Le poids de l'image</p>
	<?php endif; ?>

	<p>Votre score : <?= $data->getExp(); ?></p>
	<p>date d'inscription: <?= $data->getInscription_date(); ?>  </p>

	<h3>informations personnelles</h3>
	<form method="post" action="index.php?action=update-email&id=<?= $data->getId()?>">
		<p>votre adresse mail : <?= $data->getEmail(); ?></p>
		<label>Changer votre adresse mail</label>
		<br>
		<input type="text" name="mail"><br>
		<input type="submit" name="" class="btn-submit red">

	</form>
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'mail-empty'):?>
		<p class="alert-form">Le champ est vide</p>
	<?php endif; ?>	
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'mail-format'):?>
		<p class="alert-form">le format de l'adresse mail est incorrect</p>
	<?php endif; ?>	
	<form method="post" action="index.php?action=updatePwd&id=<?= $data->getId()?>">
		<p>Changer votre mot de passe</p>
		<label>Votre ancien mot de passe</label><br>
		<input type="password" name="old-pwd"><br>
		<label>Votre nouveau mot de passe</label><br>
		<input type="password" name="new-pwd"><br>
		<label>Confirmez votre nouveau mot de passe</label><br>
		<input type="password" name="new-pwd-confirm"><br>
		<input type="submit" name="" class="btn-submit red">
	</form>
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'empty-pwd'):?>
		<p class="alert-form">Le champs est vide</p>
	<?php endif; ?>	
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'wrong-pwd'):?>
		<p class="alert-form">Le mot de passe incorrect</p>
	<?php endif; ?>
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'wrong-new-pwd'):?>
		<p class="alert-form">Les deux mots de passe ne sont pas identiques</p>
	<?php endif; ?>		
	
	
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>