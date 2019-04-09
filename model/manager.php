<?php

namespace jamowar;
class Manager {
	protected function dbConnect ()
		{
	        $db = new \PDO('mysql:host=localhost;dbname=jamowar;charset=utf8', 'root', '');
	        return $db;
		}	
}