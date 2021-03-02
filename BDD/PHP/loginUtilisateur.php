<?php

if($_SERVER["REQUEST_METHODE"] = "POST"){
	require 'connexion.php';
	loginUser();
}

function loginUser(){

	global $connect;

	if(!empty($_POST['pseudo']) && !empty($_POST['password'])){

		$pseudo = $_POST["pseudo"];
		$password = $_POST["password"];

		$query ="SELECT * FROM `utilisateur` WHERE pseudo='$pseudo' and password='".md5($password)."'";

	 	$result = mysqli_query($connect,$query) or die(mysql_error());

	 	$rows = mysqli_num_rows($result);

        if($rows==1){
           echo "success";
        }else{
			echo "error";
        }

	}else{
		if(empty($_POST['pseudo']))
			echo json_encode($_POST);
		if(empty($_POST['password']))
			echo json_encode("Veuillez remplir le mot de passe");
	}
}

?>
