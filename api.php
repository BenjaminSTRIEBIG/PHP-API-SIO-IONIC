<?php

	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true'); //Autorise les cookies et l authentification
        header('Access-Control-Max-Age: 86400'); //mise en cache de la requête
    }

   
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); //Méthodes HTTP permises par le serveur         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))   
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}"); //Entêtes HTTP permises par le serveur  

        exit(0);
    }


   
    $postdata = file_get_contents("php://input"); //On stocke la valeur recue
	if (isset($postdata)) { //On verifie que la varible n est pas null
		$request = json_decode($postdata); //Récupère la chaîne encodée JSON et la convertit en une variable PHP ("request")
		$username = $request->username; //On stocke la valeur de request dans username

		if ($username != "") { //Si la variable nest pas vide alors le serveur renvoi
			echo "Server returns: " . $username;
		}
		else {
			echo "Empty username parameter!";
		}
	}
	else {
		echo "Not called properly with username parameter!";
	}
?>
