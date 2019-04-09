<?php
    $lesLicences=$pdo->getAllLicences();
    
    //$lesClubs=$pdo->getAllClubs();

    $tableLicences = array();
    
    $tableClubs= array();

    foreach( $lesLicences as $licence ){
        $id=$licence['num_licence'];
        $libelle=$licence['num_licence'];
        $string = "<option value = '$id' > $libelle </option>";
        array_push($tableLicences,$string);
    }

    /*foreach( $lesClubs as $club ){
        $id=$club['id'];
        $libelle=$club['nom'];
        $string = "<option value = '$id' > $libelle </option>";
        array_push($tableClub,$string);
    } */

    $_SESSION['tableLicences']= $tableLicences;

    header("location:index.php?uc=inscription");
    
    
?>