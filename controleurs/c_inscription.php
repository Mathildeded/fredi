<?php
$ajout = $pdo->ajoutAdh($_REQUEST["numAdh"],$_REQUEST["mailAdh"],$_REQUEST['mdpAdh'],0);
if ($ajout == false){
	$erreur = "Le client n'a pas &eacute;t&eacute; ajout&eacute;. Le num&eacute;ro du nouveau client existait peut-&ecirc;tre d&eacute;j&agrave;.";
    header('Refresh: 5; URL=index.php?uc=afficheInscription');
}
else{
    echo "Vous êtes maintenant enregistré, bienvenu !";
    header('Refresh: 5; URL=index.php?uc=identification');
}
?>
