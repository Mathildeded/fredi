<?php
    $adherent=$pdo->getadherent($_SESSION["sessid"]);
    $lesLignes=$pdo->getAllLignes($_SESSION["sessid"]);

    $_SESSION['nompreAdh']=$adherent[0][3]." ".$adherent[0][4];
    $_SESSION['adresseAdh']=$adherent[0][5]." ".$adherent[0][6]." ".$adherent[0][7];
    $tableLignes= array();
    
    foreach( $lesLignes as $ligne ){
        $date=$ligne['date'];
        $motif=$ligne['libelle'];
        $trajet=$ligne['trajet'];
        $kms=$ligne['km'];
        $cTrajet=$ligne['cout_trajet'];
        $cPeages=$ligne['cout_peage'];
        $cRepas=$ligne['cout_repas'];
        $cHeber=$ligne['cout_hebergement'];
        $totalLigne=$cTrajet+$cPeages+$cRepas+$cHeber;
        $string = "<tr><td>$date</td><td>$motif</td><td>$trajet</td><td>$kms</td><td>$cTrajet</td><td>$cPeages</td><td>$cRepas</td><td>$cHeber</td><td>$totalLigne</td>
        <td><form method='post' action='index.php?uc=afficheModifLigneFrais'><input style='display:none;' type='date' name='dateModif' value='$date'><input type='submit' value='Modifier'></form></td>
        <td><form method='post' action='index.php?uc=faireSupprLigneFrais'><input style='display:none;' type='date' name='dateSuppr' value='$date'><input type='submit' value='Supprimer'></form></td>
        <tr>";
        array_push($tableLignes,$string);
    }

    $_SESSION['tableLignes']= $tableLignes;

    header("location:index.php?uc=recap");
    
    
?>