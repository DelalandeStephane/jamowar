<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=jamowar", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $req = $conn->prepare('SELECT * FROM riff WHERE id_player =? ');

    $req->execute(array($_GET['player']));
    	$riffs = [];

	 while ($data = $req->fetch())
        {
        	array_push($riffs,[
        		'music_note' => $data['music_note'],
        		'sound' => $data['sound_url']
        	]);
		}

		echo json_encode($riffs);


    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }






	

