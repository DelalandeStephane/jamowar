<?php $bgImg ='stage-1' ?>
<?php ob_start();?>
<section class="fight-scene">
	<div class="block-player">
		<img src="public/img/player/p1s.jpg">
		<div class="health-bar"></div>
	</div>
	<p>VS</p>
	<div class="block-player">
		<div class="health-bar"></div>
		<img src="public/img/player/p2s.jpg">
	</div>
</section>



<div id="synth">
	<div class="key white" id="do"></div>
	<div class="key black" id="do-d"></div>
	<div class="key white" id="re"></div>
	<div class="key black" id="re-d"></div>
	<div class="key white" id="mi"></div>
	<div class="key white" id="fa"></div>
	<div class="key black" id="fa-d"></div>
	<div class="key white" id="sol"></div>
	<div class="key black" id="sol-d"></div>
	<div class="key white" id="la"></div>
	<div class="key black" id="la-d"></div>
	<div class="key white" id="si"></div>		
</div>

<!--<audio id="back-music" src="public/sound/song/song1.mp3" autoplay="" loop=""></audio>-->
<?php $content = ob_get_clean(); ?>
<?php require('template.php');?>