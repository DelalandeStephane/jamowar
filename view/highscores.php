<?php $bgImg ='score-bg' ?>
<?php ob_start();?>
<h2 class="secondary-title">HIGH SCORES</h2>
		<table class="score-tab">
			<tr>
				<th></th>
				<th></th>
				<th>Pseudo</th>
				<th>Score</th>
			</tr>
			<?php
	        foreach ($data as $user) 
	        	
	        { ?>
	        	<tr>
	        		<td><?= $place ?></td>
	        		<td><img src="public/img/user/<?= $user->getPicture() ?>"></td>
	        		<td><?= $user->getName() ?></td>
	        		<td><?= $user->getExp() ?></td>
	        	</tr>
	       
	        <?php
	        	$place++;
	        	}

	         ?>
     </table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>