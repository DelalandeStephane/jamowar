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

		
		
	}
	/* fin condition action*/
	else {
		 menuPage();
	}
}
catch(Exception $e) {
echo "Erreur : " . $e->getMessage();
}