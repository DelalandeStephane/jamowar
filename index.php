<?php
require('controller/controller.php');

try {
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'home'){
			 menuPage();
		}
		elseif($_GET['action'] == 'playerchoice'){
			playerChoice();
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