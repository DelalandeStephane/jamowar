<?php
require_once('model/gameManager.php');
//page d'accueil
function menuPage() {
	require('view/menu.php');
}
//Selection du perssonage
function playerChoice() {
	require('view/playerchoice.php');
}

function showStage() {
	$player = $_GET['player'];
	$bgImg ='stage-'.$player;
	require('view/Stage.php');
}

function freeMode() {
	require('view/freemode.php');
}