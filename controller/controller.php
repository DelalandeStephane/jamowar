<?php
require 'model/AutoLoader.php'; //chargement des class model
AutoLoader::register(); 

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

function connexionUser() {
	require('view/connexion.php');
}
session_start();
function registration() {
	require('view/registration.php');
}

function sendUser ($name,$password,$confirmPwd,$email,$birthDate) {
	$userManager = new UserManager();

	if(!empty($name) && !empty($password) && !empty($email) && !empty($birthDate) && !empty($confirmPwd)){

		$_SESSION['name'] = $name;
		$_SESSION['password'] = $password;
		$_SESSION['email'] = $email;
		$_SESSION['birthDate'] = $birthDate;

		if($password !== $confirmPwd)
		{
			$_SESSION['error'] = 'pwd';
			header('Location: index.php?action=registration');
		}
		elseif (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
			$_SESSION['error'] = 'mail';
			header('Location: index.php?action=registration');
		}


		else 
		{
			unset($_SESSION['error']);
			unset($_SESSION['name']);
			unset($_SESSION['password']);
			unset($_SESSION['birthDate']);
			unset($_SESSION['email']);

			$data = array (
			'name' => $name,
			'password' => crypt($password),
			'birthDate' => $birthDate,
			'email' => $email
			);

			$send = new User($data);
		    $userManager->insertUser($send);

		    header('Location: index.php?action=connexion');
			}	
	} 
	else {

		$_SESSION['error'] = 'missing';
		$_SESSION['name'] = $name;
		$_SESSION['password'] = $password;
		$_SESSION['email'] = $email;
		$_SESSION['birthDate'] = $birthDate;

		header('Location: index.php?action=registration');
		
		
	}
}	