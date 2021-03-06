<?php
namespace jamowar;
require('model/Manager.php');

class UserManager extends Manager 
{

	public function __construct() {
		$this->db= $this->dbConnect();
	}
	public function insertUser($data)
	{
	    $req = $this->db->prepare('INSERT INTO user (name,password,birth_date,email, inscription_date, exp, picture, user_right) VALUES (:name, :password, :birth_date, :email, CURDATE(),0, :picture,:user_right)');
	    $req->bindValue(':name', $data->getName());
	    $req->bindValue(':password', $data->getPassword());
	    $req->bindValue(':birth_date', $data->getBirth_date());
	    $req->bindValue(':email', $data->getEmail());
	    $req->bindValue(':picture', 'anonym.png' );
	    $req->bindValue(':user_right', 'player' );
	    $req->execute();
	}
	public function getUserList($page){
		$start = ($page-1)*20;
		$req = $this->db->prepare('SELECT * FROM user WHERE user_right = :user ORDER BY exp DESC LIMIT :page,20 ');
		$req->bindValue(':page', $start,\PDO::PARAM_INT);
		$req->bindValue(':user','player');
		$req->execute();
		while ($data = $req->fetch())
        {
        	$users[] = new User($data);  
        }
        if(isset($users)){
   			 return  $users;     	
        } 
	}

	public function getUser($name) {
		$req= $this->db->prepare('SELECT * FROM user WHERE name=:name');
		
		$req->bindValue(':name', $name);
		$req->execute();
      	$data = $req->fetch();
      	$user = new User($data);   	
	    return $user; 	
	}
	public function getPwdUser($id) {
		$req = $this->db->prepare('SELECT password FROM user WHERE id = :id');
		$req->bindValue(':id', $id);
		$req->execute();
		$data = $req->fetch();
      	$user = new User($data);   	
	    return $user; 	
	}
	public function userData ($id) {
		$req= $this->db->prepare('SELECT * , DATE_FORMAT(inscription_date, \'%d/%m/%Y\') AS inscription_date FROM user WHERE id=:id');
		$req->bindValue(':id', $id);
		$req->execute();
		$data = $req->fetch();
      	$user = new User($data);   	
	    return $user; 	
	}
	public function userVerify($name) {
		$req= $this->db->prepare('SELECT COUNT(id) AS nb FROM user WHERE name = :name');
		$req->bindValue(':name', $name);
		$req->execute();
		$result = $req->fetch();

		return $result['nb'];
	}
	public function userPicture($data) {
		$req=$this->db->prepare('UPDATE user SET picture = :picture WHERE id = :id');
		$req->bindValue(':picture', $data->getPicture());
		$req->bindValue(':id', $data->getId());
		$req->execute();

	}
	public function userEmailUpdate($data){
		$req = $this->db->prepare('UPDATE user SET email = :email WHERE id= :id');
		$req->bindValue(':email', $data->getEmail());
		$req->bindValue(':id', $data->getId());
		$req->execute();
	}
	public function userPwdUpdate($data) {
		$req = $this->db->prepare('UPDATE user SET password = :password WHERE id= :id');
		$req->bindValue(':password', $data->getPassword());
		$req->bindValue(':id', $data->getId());
		$req->execute();
	}
	public function userExp($id) {
		$req = $this->db->prepare('SELECT exp FROM user WHERE id = :id');
		$req->bindValue(':id', $id );
		$req->execute();
		$data = $req->fetch();
      	$user = new User($data);   	
	    return $user; 	
	}
	public function userExpUpdate($data,$exp) {
		$points = $data->getExp()+ $exp;
		$req = $this->db->prepare('UPDATE user SET exp = :exp WHERE id= :id');
		$req->bindValue(':exp', $points);
		$req->bindValue(':id', $data->getId());
		$req->execute();
	}
	public function userCount(){
		$req = $this->db->prepare('SELECT COUNT(*) AS total FROM user WHERE user_right = :user');
		$req->bindValue(':user', 'player');
		$req->execute();
		$result = $req->fetch();
		$nbPages = ceil($result['total']/20);
		return $nbPages;

	}

	public function adminDeleteUser($data) {
		$req =$this->db->prepare('DELETE FROM user WHERE id= :id');
		$req->bindValue(':id', $data->getId());
		$req->execute();
	}
	public function adminRemovePicture($data) {
		$req =$this->db->prepare('UPDATE user SET picture = :picture WHERE id= :id');
		$req->bindValue(':id', $data->getId());
		$req->bindValue(':picture','anonym.png');
		$req->execute();
	}
	
}