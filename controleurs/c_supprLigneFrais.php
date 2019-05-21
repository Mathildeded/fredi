<?php 
$suppr = $pdo->delUneLigne($_SESSION['sessid'],$_REQUEST['dateSuppr']);
if ($suppr == false){
    echo "Erreur";
}
else{
    echo "Suppression éffectuée";
    header('Refresh: 5; URL=index.php?uc=faireRecap');
}
?>