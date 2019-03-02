<?php
require_once('model/Manager.php');

class GameManager extends Manager 
{

	public function __construct() {
		$this->db= $this->dbConnect();
	}
	public function RiffSelector($id)
	{
	    $req =$this->db->prepare('SELECT * FROM riff WHERE id_player = ?');
	    $riffs = $req->execute(array($id));
	    return $riffs;
	}
	
}