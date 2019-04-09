<?php
$suppr = $pdo->deleteAllAdh();
if ($suppr == false){
    echo "Erreur";
}
else {
    echo "Adhérents supprimés.";
}
?>