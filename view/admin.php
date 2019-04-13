<?php $bgImg ='admin-bg' ?>

<?php ob_start();?>
<section class="admin-area">
	<h2>zone admin</h2>
	<p>Bienvenue sur l'interface d'administration Jamowar<br>Vous pouvez ici supprimer les comptes utilisateurs et modifier les images utilisateurs</p>

	
	<table class="admin-table">
		<tr>
			<th>image</th>
			<th>id</th>
			<th>Pseudo</th>
			<th>score</th>
			<th>Date de naissance</th>
			<th>Supprimer</th>
		</tr>

		<?php
		        foreach ($data as $user) 
		        	
		        { ?>
		        	<tr>
		        		<td><a href="index.php?action=remove-picture&id=<?= $user->getId() ?>" class="update-btn"><img src="public/img/user/<?= $user->getPicture() ?>" alt="image joueur"></a></td>
		        		<td><?= $user->getId() ?></td>
		        		<td><?= $user->getName() ?></td>
		        		<td><?= $user->getExp() ?></td>
		        		<td><?= $user->getBirth_date() ?></td>
		        		<td><a class="delete-btn" href="?action=delete-user&id=<?= $user->getId() ?>">X</a></td>
		        	</tr>
		       
		        <?php
		        	}

		         ?>
	</table>
	<div class="nav-arrow-bar">
	<?php if(isset($_GET['page']) && $_GET['page'] != 1 && !empty($_GET['page'])): ?>
		<a href="index.php?action=admin&page=<?= $back ?>" class="nav-arrow"><</a>
	<?php endif; ?>
	<?php if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] != $nbPage ): ?>
		<a href="index.php?action=admin&page=<?= $next ?>" class="nav-arrow">></a>
	<?php endif; ?>
	</div>	
</section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>