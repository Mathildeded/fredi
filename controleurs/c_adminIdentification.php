<?php

$id=$_REQUEST["id"];
$mdp=$_REQUEST["mdp"];
if($id=="admin" && $mdp=="admin"){
	header("location:index.php?uc=backoffice");
}
else {
    header("location:index.php?uc=adminIdentification");
}

?>