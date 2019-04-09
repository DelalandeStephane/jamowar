<?php
require('controller/controller.php');
require('controller/userController.php');
require('controller/adminController.php');
session_start();
try {
	if(isset($_GET['action'])) {
		//Affichage page d'accueil
		if($_GET['action'] == 'home'){
			 menuPage();
		}
		// Affichage page selection joueur
		elseif($_GET['action'] == 'playerchoice'){
			playerChoice();
		}
		// Affichage du jeu et téléchargement des données
		elseif($_GET['action'] == 'stage'){
			if (isset($_GET['player']) && $_GET['player'] != null) {
				showStage();
			}
			else {
            	throw new Exception('Erreur : aucun joueur selectionné');
            }
		}
		// Afficghage page connexion
		elseif($_GET['action'] == 'connexion'){
			connexionUser();
		}
		// affichage formulaire inscription
		elseif($_GET['action'] == 'registration'){
			registration();
		}
		// Inscription utilisateur
		elseif($_GET['action'] == 'send-user'){
			if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['confirm-password']) && isset($_POST['email']) && isset($_POST['birth-date'])) {
				sendUser(
					htmlspecialchars($_POST['name']), 
					htmlspecialchars($_POST['password']),
					htmlspecialchars($_POST['confirm-password']), 
					htmlspecialchars($_POST['email']), 
					htmlspecialchars($_POST['birth-date'])
				);
			} else {
				throw new Exception("Erreur : problème lors de l'envoi du formulaire");
			}
		}
		// Vérification utilisateur et/ou acces au profil
		elseif($_GET['action'] == 'profil'){
			if(isset($_POST['name']) && isset($_POST['password'])) {
				userAccess(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['password']));
			} else {
				profil();
			}
		}
		//affichage highscores
		elseif($_GET['action'] == 'highscores') {
			highScores();
		}			
		//session utilisateur
		elseif(isset($_SESSION['user-id'])){
			//modifier image
			if($_GET['action'] == 'uploadpicture')
			{
				if (isset($_GET['id'])) {
					uploadPicture($_GET['id']);
				} else {
					throw new Exception("Erreur : problème lors de l'envoi de l'image");
				}
			}
			//modifier email
			elseif($_GET['action'] == "update-email"){
				if (isset($_GET['id']) && isset($_POST['mail'])) {
					updateEmail($_GET['id'],htmlspecialchars($_POST['mail']));
				} else {
					throw new Exception("Erreur : problème lors de l'envoi de l'adresse mail");
				}
			}
			//modifier mot de passe
			elseif($_GET['action'] == "updatePwd") {
				if(isset($_GET['id']) && isset($_POST['old-pwd']) && isset($_POST['new-pwd']) && isset($_POST['new-pwd-confirm'])) {
					updatePwd($_GET['id'], htmlspecialchars($_POST['old-pwd']), htmlspecialchars($_POST['new-pwd']), htmlspecialchars($_POST['new-pwd-confirm']));
				} else {
					throw new Exception("Erreur : problème lors de l'envoi du mot de passe");
				}
			}
			// augmentation de l'xp
			elseif($_GET['action'] == "up-point") {
				if(isset($_SESSION['user-id']) && isset($_POST['win-points'])) {
					updateExp($_SESSION['user-id'],$_POST['win-points']);
				} else {
					throw new Exception("erreur : L'expérience n'a pas pu être augmenté ");
				}
			}
			//deconnexion
			elseif($_GET['action'] == 'deconnexion') {
				session_destroy();
				header('Location:index.php');
			}
			//affichage zone admin
			elseif ($_GET['action'] == 'admin') {
				if (isset($_GET['page'])) {
					admin($_GET['page']);
				} else {
					admin(1);
				}	
			}
			// Bannir utilisateur
			elseif ($_GET['action'] == 'delete-user') {
				if(isset($_GET['id'])) {
					deleteUser($_GET['id']);
				} else {
					throw new Exception("Erreur : l'identifiant utilisateur n'as pas pu être récupèrer ");
				}	
			}
			// remplacer image
			elseif ($_GET['action'] == 'remove-picture') {
				if(isset($_GET['id'])) {
					removePicture($_GET['id']);
				}	else {
					throw new Exception("Erreur : l'identifiant utilisateur n'as pas pu être récupèrer ");
				}
			}
		}//end session

		//Si pas de connexion pas de points
		elseif($_GET['action'] == "up-point") {
			if(!isset($_SESSION['user-id'])) {
				header('Location:index.php');
			}
		}
	}	
	/* fin condition action*/
	else {
		 menuPage();
	}
}
catch(Exception $e) {
echo "Erreur : " . $e->getMessage();
}