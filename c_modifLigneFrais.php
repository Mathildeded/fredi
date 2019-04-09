<?php
$suppr = $pdo->delUneLigne($_SESSION['sessid'],$_SESSION['dateModif']);
if ($suppr == false){
    echo "Erreur";
}

$ajout = $pdo->ajoutLigne($_SESSION["sessid"],$_REQUEST["dateFrais"],$_REQUEST["motifFrais"],$_REQUEST['trajetFrais'],$_REQUEST["kmFrais"],$_REQUEST["coutTrajetFrais"],$_REQUEST["peagesFrais"],$_REQUEST["repasFrais"],$_REQUEST["hebergFrais"]);

if ($ajout == false){
	$erreur = "Une erreur est survenue";
}
else{
    header("location:index.php?uc=faireRecap");
}
?>