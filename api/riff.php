<?php
use  jamowar\GameManager;
require '../model/gameManager.php';
    $gameManager = new GameManager();
    $riffs = $gameManager->riffSelector($_GET['player']);

	echo $riffs;





	

