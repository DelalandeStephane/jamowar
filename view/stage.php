
<?php ob_start();?>
<section id="fight-scene">
	<div class="block-player" id="computer">
		<img src="public/img/player/p<?= $player ?>s.jpg">
		<div class="block-health">
			<p><?= $compName ?></p>
			<div class="health-bar"><div class="health-progress"></div></div>
		</div>
	</div>
	<p class="vs">VS</p>
	<div class="block-player" id="player">
		<div class="block-health">
			<p><?= $playerName ?></p>
			<div class="health-bar"><div class="health-progress"></div></div>
		</div>
		<img src="public/img/user/<?= $picture  ?>">
	</div>
</section>


<div id="synth">
	<div class="key white" id="do"><p>Q</p></div>
	<div class="key black" id="do-d"><p>Z</p></div>
	<div class="key white" id="re"><p>S</p></div>
	<div class="key black" id="re-d"><p>E</p></div>
	<div class="key white" id="mi"><p>D</p></div>
	<div class="key white" id="fa"><p>F</p></div>
	<div class="key black" id="fa-d"><p>T</p></div>
	<div class="key white" id="sol"><p>G</p></div>
	<div class="key black" id="sol-d"><p>Y</p></div>
	<div class="key white" id="la"><p>H</p></div>
	<div class="key black" id="la-d"><p>U</p></div>
	<div class="key white" id="si"><p>J</p></div>		
</div>

<!--<audio id="back-music" src="public/sound/song/song<?= $player ?>.mp3" autoplay="" loop="" ></audio>-->
<?php $content = ob_get_clean(); ?>
<?php $script='<script src="public/js/gameplay.js"></script>' ?>;
<?php require('template.php');?>
