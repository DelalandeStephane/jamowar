<?php

require('controller/controller.php');
session_start();
try {
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'home'){
			 menuPage();
		}
		elseif($_GET['action'] == 'playerchoice'){
			playerChoice();
		}
		elseif($_GET['action'] == 'stage'){
			if (isset($_GET['player']) && $_GET['player'] != null) {
				showStage();
			}
			else {
            	throw new Exception('Erreur : aucun joueur selectionné');
            }
		}
		elseif($_GET['action'] == 'freemode'){
			freeMode();
		}
		elseif($_GET['action'] == 'connexion'){
			if(isset($_SESSION['user-id']))
			{
				profil();
			}else {
				connexionUser();
			}
		}
		elseif($_GET['action'] == 'registration'){
			registration();
		}
		elseif($_GET['action'] == 'send-user'){
			sendUser(
					htmlspecialchars($_POST['name']), 
					htmlspecialchars($_POST['password']),
					htmlspecialchars($_POST['confirm-password']), 
					htmlspecialchars($_POST['email']), 
					htmlspecialchars($_POST['birth-date'])
			);
		}
		elseif($_GET['action'] == 'profil'){
			if(isset($_POST['name']) && isset($_POST['password'])) {
				userAccess(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['password']));
			}
		}
			elseif($_GET['action'] == 'highscores')
				highScores();
		}
		//session
		elseif(isset($_SESSION['user-id'])){
			if($_GET['action'] == 'uploadpicture')
			{
				if (isset($_GET['id'])) {
					uploadPicture($_GET['id']);

				}
			}
			elseif($_GET['action'] == "update-email"){
				if (isset($_GET['id']) && isset($_POST['mail'])) {
					updateEmail($_GET['id'],htmlspecialchars($_POST['mail']));
				}
			}
			elseif($_GET['action'] == "updatePwd") {
				if(isset($_GET['id']) && isset($_POST['old-pwd']) && isset($_POST['new-pwd']) && isset($_POST['new-pwd-confirm'])) {
					updatePwd($_GET['id'], htmlspecialchars($_POST['old-pwd']), htmlspecialchars($_POST['new-pwd']), htmlspecialchars($_POST['new-pwd-confirm']));
				}
			}
			elseif($_GET['action'] == "up-point") {
				if(isset($_SESSION['user-id']) && isset($_POST['win-points'])) {
					updateExp($_SESSION['user-id'],$_POST['win-points']);
				}

			} elseif($_GET['action'] == 'deconnexion') {
				session_destroy();
				header('Location:index.php');
			}

		}//end session
	
	/* fin condition action*/
	else {
		 menuPage();
	}
}
catch(Exception $e) {
echo "Erreur : " . $e->getMessage();
}