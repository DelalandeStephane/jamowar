<?php
require('model/Manager.php');

class GameManager extends Manager 
{

	public function __construct() {
		$this->db= $this->dbConnect();
	}
	public function riffSelector($id)
	{
	    $req = $this->db->prepare('SELECT * FROM riff WHERE id_player = '.$id);
	    $req->execute(array($_GET['player']));
	    return $req;
	}
	
}