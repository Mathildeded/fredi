<?php
    $lesMotifs=$pdo->getAllMotifs();

   
    $tableMotifs = array();
    
    foreach( $lesMotifs as $motif ){
        $id=$motif['id'];
        $libelle=$motif['libelle'];
        $string = "<option value = $id > $libelle </option>";
        array_push($tableMotifs,$string);
    }

    $_SESSION['tableMotifs']= $tableMotifs;

    header("location:index.php?uc=ajoutLigne");
    
    
?>