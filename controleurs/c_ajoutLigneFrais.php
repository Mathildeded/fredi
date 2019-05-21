<?php
$ajout = $pdo->ajoutLigne($_SESSION["sessid"],$_REQUEST["dateFrais"],$_REQUEST["motifFrais"],$_REQUEST['trajetFrais'],$_REQUEST["kmFrais"],$_REQUEST["coutTrajetFrais"],$_REQUEST["peagesFrais"],$_REQUEST["repasFrais"],$_REQUEST["hebergFrais"]);
if ($ajout == false){
	$erreur = "Une erreur est survenue";
	$_SESSION["dateFrais"]=$_REQUEST["dateFrais"];
	$_SESSION["motifFrais"]=$_REQUEST["motifFrais"];
    $_SESSION["trajetFrais"]=$_REQUEST["trajetFrais"];
    $_SESSION["kmFrais"]=$_REQUEST["kmFrais"];
	$_SESSION["coutTrajetFrais"]=$_REQUEST["coutTrajetFrais"];
    $_SESSION["peagesFrais"]=$_REQUEST["peagesFrais"];
	$_SESSION["repasFrais"]=$_REQUEST["repasFrais"];
    $_SESSION["hebergFrais"]=$_REQUEST["hebergFrais"];
    header('Refresh: 5; URL=index.php?uc=ajoutLigne');
}
else{
    header("location:index.php?uc=faireRecap");}
?>