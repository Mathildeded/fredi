<?php

$id=$_REQUEST["id"];
$mdp=$_REQUEST["mdp"];
if($pdo->verifid($id, $mdp)){
	$_SESSION["sessid"]=$id;
	$_SESSION["sessmdp"]=$mdp;
    $_REQUEST['uc']="faireRecap";
	header("location:index.php");
}
else {
	$erreur="L'identifiant ou le mot de passe est incorrect";
	$_REQUEST['uc']="identification";
}

?>
