<?php
require'mail.php';
use  jamowar\UserManager;
use  jamowar\User;

function sendUser ($name,$password,$confirmPwd,$email,$birthDate) {
	$userManager = new UserManager();
	if(!empty($name) && !empty($password) && !empty($email) && !empty($birthDate) && !empty($confirmPwd)){
		//stock les données en cas d'erreur
		$_SESSION['name'] = $name;
		$_SESSION['password'] = $password;
		$_SESSION['email'] = $email;
		$_SESSION['birthDate'] = $birthDate;

		if($password !== $confirmPwd) {
			$_SESSION['error'] = 'pwd';
			header('Location: index.php?action=registration');
		}
		elseif (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
			$_SESSION['error'] = 'mail';
			header('Location: index.php?action=registration');
		}
		elseif($userManager->userVerify($name) > 0){
			$_SESSION['error'] = 'name';
			header('Location: index.php?action=registration');
		}
		else {

			unset($_SESSION['error']);
			unset($_SESSION['name']);
			unset($_SESSION['password']);
			unset($_SESSION['birthDate']);
			unset($_SESSION['email']);
			$data = array (
			'name' => $name,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'birth_date' => $birthDate,
			'email' => $email
			);
			$send = new User($data);
			$_SESSION['success'] = "user";
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

function userAccess($pseudo,$userpw)
{
	$userManager = new UserManager();
	if($userManager->userVerify($pseudo) > 0) {
		$data = $userManager->getUser($pseudo);
		$name = $data->getName();
		$pass = $data->getPassword();
		if($pseudo == $name && password_verify($userpw, $pass)) {
			$_SESSION['user-id'] = $data->getId();
			$_SESSION['user-picture'] = $data->getPicture();
			$_SESSION['user-name'] = $data->getName();
			$_SESSION['user-points'] = $data->getExp();
			$_SESSION['user-right'] = $data->getUser_right();
			unset($_SESSION['error']);

			if($data->getUser_right() == "admin") {
				header('Location: index.php?action=admin');
			} else {
				header('Location: index.php?action=profil');
			}			
		}else {
			$_SESSION['error'] = 'connexion';
			require('view/connexion.php');
		}
	}
	else {
			$_SESSION['error'] = 'connexion';
			require('view/connexion.php');
		}
}

function uploadPicture($id) {
	$userManager = new UserManager();
	if(isset($_FILES['picture']) && $_FILES['picture']['error'] <= 0){
		$goodExt = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$uploadExt = strtolower(  substr(  strrchr($_FILES['picture']['name'], '.')  ,1)  );

		if ( in_array($uploadExt,$goodExt) && $_FILES['picture']['size'] <= 500000  ){
			unset($_SESSION['error']);
			$ext = strrchr($_FILES['picture']['name'], '.');
			$fileName ='pic'.$_SESSION['user-id'].$ext;
			move_uploaded_file($_FILES['picture']['tmp_name'], 'public/img/user/'.$fileName);
			$data = array (
			'id' => $id,
			'picture' => $fileName
			);
			$send = new User($data);
		    $userManager->userPicture($send);

		} elseif($_FILES['picture']['size'] > 500000) {
			$_SESSION['error'] = 'pictureSize';
		}
		else {
			$_SESSION['error'] = 'pictureExt';
		}
	}
	else{
		$_SESSION['error'] = 'transfert';
		}
	header('Location: index.php?action=profil');
}

function updateEmail($id,$email) {
	if (!empty($email)) {

		if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
			$userManager = new UserManager();
			$data = array (
			'id' => $id,
			'email' => $email
			);
			$send = new User($data);
		    $userManager->userEmailUpdate($send);
		} else {
			$_SESSION['error'] = 'mail-format';
		}	
	} else {
		$_SESSION['error'] = 'mail-empty';	
	}
header('Location: index.php?action=profil');
}

function updatePwd($id,$oldPwd,$newPwd,$newPwdConfirm) {

	if(!empty($oldPwd) && !empty($newPwd) && !empty($newPwdConfirm)){
		$userManager = new UserManager();
		$access = $userManager->getPwdUser($id);
		$pass = $access->getPassword();
		
		if(password_verify($oldPwd, $pass) && $newPwd == $newPwdConfirm) {
			unset($_SESSION['error']);
			$data = array (
				'id' => $id,
				'password' =>password_hash($newPwd, PASSWORD_DEFAULT)
			);
		$send = new User($data);
		 $userManager->userpwdUpdate($send);
		 $_SESSION['success'] = 'pwd';
		} elseif ($newPwd != $newPwdConfirm) {
			$_SESSION['error'] = 'wrong-new-pwd';
		} 
		else {
			$_SESSION['error'] = 'wrong-pwd';
		}
	} else {
		$_SESSION['error'] = 'empty-pwd';
	}
	header('Location: index.php?action=profil');
}

function updateExp($id,$points) {
	if(!empty($points)){
			$userManager = new UserManager();
		 	$expDb = $userManager->userExp($id);
		$data = array (
			'id' => $id,
			'exp' =>$expDb->getExp()
			);
		$send = new User($data);

		$userManager->userExpUpdate($send,$points);
	}
	header('Location: index.php?action=playerchoice');
}