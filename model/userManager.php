<?php
require('model/Manager.php');

class UserManager extends Manager 
{

	public function __construct() {
		$this->db= $this->dbConnect();
	}
	public function insertUser($data)
	{
	    $req = $this->db->prepare('INSERT INTO user (pseudo,password,birth_date,email, inscription_date, exp, picture) VALUES (:name, :password, :birth_date, :email, CURDATE(),0, :picture)');
	    $req->bindValue(':name', $data->getName());
	    $req->bindValue(':password', $data->getPassword());
	    $req->bindValue(':birth_date', $data->getBirthDate());
	    $req->bindValue(':email', $data->getEmail());
	    $req->bindValue(':picture', 'anonym.png' );

	    $req->execute();
	    return $req;
	}
	
}