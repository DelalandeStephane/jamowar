<?php
require 'model/AutoLoader.php'; //chargement des class model
jamowar\AutoLoader::register(); 
use  jamowar\UserManager;
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

	if($computer = '1') {
		$compName = "C.Obvious";
	}
	elseif($computer = '2') {
		$compName = "Issou";
	}
	elseif($computer = '3') {
		$compName = "Crazy Joe";
	}
	if(isset($_SESSION['user-name'])){
		$playerName = $_SESSION['user-name'];
	} else {
		$playerName = 'You';
	}

	if(isset($_SESSION['user-picture'])){
		$picture = $_SESSION['user-picture'];
	} else {
		$picture = 'anonym.png';
	}

	require('view/Stage.php');
}

function connexionUser() {
	require('view/connexion.php');
}
function registration() {
	require('view/registration.php');
}

function profil() {
	$userManager = new UserManager();
	$data = $userManager->userData($_SESSION['user-id']);
	require('view/profil.php');
}

function highScores() {
	$userManager = new UserManager();
	$data = $userManager->getUserList(1);
	$place = 1;
	require('view/highscores.php');
}