<?php
use  jamowar\UserManager;
use  jamowar\User;
function admin($page) {
		$userManager = new UserManager();
		
		if(!isset($_GET['page'])) {
			$_GET['page'] = 1;
		}
		$data = $userManager->getUserList($_GET['page']);	
		/*Pagination*/
		$nbPage = $userManager->userCount();
		if(isset($_GET['page']) && !empty($_GET['page'])){
			if($_GET['page'] == 1 ) {
				$back = $_GET['page'];
				$next = $_GET['page'] +1;
			} 
			else {
				$back = $_GET['page'] - 1 ;
				if($_GET['page'] == $nbPage+1){		
					$next = $_GET['page'];
				} 
				else {
					$next = $_GET['page'] + 1 ;
				}
			}	
		}
		require('view/admin.php');
}

function deleteUser($id) {
	$userManager = new UserManager();
	$data = array ('id' => $id);
	$send = new User($data);
	$userManager->adminDeleteUser($send);

	header('Location:index.php?action=admin');
}

function removePicture($id) {
	$userManager = new UserManager();
	$data = array ('id' => $id);
	$send = new User($data);
	$userManager->adminRemovePicture($send);
		    
	header('Location:index.php?action=admin');
}