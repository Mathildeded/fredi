<?php
    $laLigne=$pdo->getUneLigne($_SESSION['sessid'],$_REQUEST['dateModif']);

    $_SESSION['dateModif']=$_REQUEST['dateModif'];
    $_SESSION['date']=$laLigne[0]['date'];
    $_SESSION['motif']=$laLigne[0]['motif'];
    $_SESSION['trajet']=$laLigne[0]['trajet'];
    $_SESSION['km']=$laLigne[0]['km'];
    $_SESSION['cout_trajet']=$laLigne[0]['cout_trajet'];
    $_SESSION['cout_peage']=$laLigne[0]['cout_peage'];
    $_SESSION['cout_repas']=$laLigne[0]['cout_repas'];
    $_SESSION['cout_hebergement']=$laLigne[0]['cout_hebergement'];    
    
    $lesMotifs=$pdo->getAllMotifs();
   
    $tableMotifs = array();
    
    foreach( $lesMotifs as $motif ){
        $id=$motif['id'];
        $selected="";
        if($id==$laLigne[0]['motif']){
            $selected="selected";
        }
        $libelle=$motif['libelle'];
        $string = "<option value = $id $selected > $libelle </option>";
        array_push($tableMotifs,$string);
    }

    $_SESSION['tableMotifs']= $tableMotifs;

    header("location:index.php?uc=modifLigne");
    
    
?>