<?php

namespace jamowar;
use  jamowar\User;
class User {

	private $id;
	private $name;
	private $birthDate;
	private $password;
	private $email;
	private $inscriptionDate;
	private $exp;
	private $picture;
	private $userRight;


	public function __construct(array $data)
  	{
    $this->hydrate($data);
  	}

	public function hydrate(array $data)
	{
  		foreach ($data as $key => $value)
	  	{
		    // On récupère le nom du setter correspondant à l'attribut.
		    $method = 'set'.ucfirst($key);
		    // Si le setter correspondant existe.
		    if (method_exists($this, $method))
		    {
		      // On appelle le setter.
		      $this->$method($value);
		    }
	  	}
	}

	public  function getId() {
		return $this->id;
	}
	public  function getName() {
		return $this->name;
	}
	public  function getPassword() {
		return $this->password;
	}
	public  function getBirth_date() {
		return $this->birthDate;
	}
	public  function getEmail() {
		return $this->email;
	}
	public  function getInscription_Date() {
		return $this->inscriptionDate;
	}
	public  function getExp() {
		return $this->exp;
	}
	public  function getPicture() {
		return $this->picture;
	}
	public  function getUser_right() {
		return $this->userRight;
	}



	public  function setId($id) {
		$this->id = $id;
	}

	public  function setName($name) {
		$this->name = $name;
	}
	public  function setPassword($password) {
		$this->password = $password;
	}
	public  function setBirth_date($birthDate) {
		$this->birthDate = $birthDate;
	}
	public  function setEmail($email) {
		$this->email = $email;
	}
	public  function setInscription_date($inscriptionDate) {
		$this->inscriptionDate = $inscriptionDate;
	}
	public  function setExp($exp) {
		$this->exp = $exp;
	}
	public  function setPicture($picture) {
		$this->picture = $picture;
	}
	public  function setUser_right($userRight) {
		$this->userRight = $userRight;
	}


}