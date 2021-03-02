<?php

if($_SERVER["REQUEST_METHODE"] = "POST"){
	//vérifie si la requête à été effectuée via la méthode "post".
	require 'connexion.php';
		// copie le code qui se trouve à l'interieur du fichier connexion.php dans insertUtilisateur.php 
	createUser();
}

function createUser(){

	global $connect;

	//var_dump($connect);
	//echo json_encode($_POST['password']);

	if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2'])){
		// si tous les champs sont bien rempli.

		// Initiation des variables 
		// variable = données entrée par l'utilisateur 
		$pseudo = $_POST["pseudo"];
		$email = $_POST["email"];
		$password = md5($_POST["password"]);
		$password2 = $_POST["password2"];

		// La requête
		$query = "Insert into utilisateur(pseudo,email,password) values ('$pseudo', '$email', '$password');";

		// mysqli_query renvoie un objet mysqli_result, qui renvoie true si la requête est réussie false sinon.
		$result = mysqli_query($connect,$query) or die(mysql_error());

	 	$rows = mysqli_num_rows($result);

        if($rows==1){
           echo "success";
        }else{
			echo "error";
        }

		mysqli_close($connect);

	}
	else{
		if(empty($_POST['pseudo']))
			echo json_encode("Veuillez remplir le pseudo");
		if(empty($_POST['email']))
			echo json_encode("Veuillez remplir le email");
		if (empty($_POST['password']))
			echo json_encode("Veuillez remplir le mot de passe");
		if (empty($_POST['password2']))
			echo json_encode("Veuillez remplir la confirmation de mot de passe");
			
	}
	
}

?>
