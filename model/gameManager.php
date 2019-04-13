<?php

namespace jamowar;
require('manager.php');

class GameManager extends Manager 
{

	public function __construct() {
		$this->db= $this->dbConnect();
	}
	public function riffSelector($id)
	{
	    $req = $this->db->prepare('SELECT * FROM riff WHERE id_player =? ');

	    $req->execute(array($_GET['player']));
	    	$riffs = [];

		 while ($data = $req->fetch())
	        {
	        	array_push($riffs,[
	        		'music_note' => $data['music_note'],
	        		'sound' => $data['sound_url']
	        	]);
			}
			return  json_encode($riffs);

	}
	
}