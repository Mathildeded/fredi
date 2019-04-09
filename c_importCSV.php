<?php 
$fichier = './csv/Liste_Licencies.csv';
$csv = new SplFileObject($fichier); // On instancie l'objet SplFileObject
$csv->setFlags(SplFileObject::READ_CSV); // On indique que le fichier est de type CSV
$csv->setCsvControl(';'); // On indique le caractère délimiteur, ici c'est la virgule
$tailleTableau=0;
$cpt=0;
foreach($csv as $ligne){    
        $cpt=$cpt+1;
        if($ligne[4] != "DateNais"){            
            $numLicence=substr($ligne[0], 1);
            $sexe=$ligne[1];
            $nom=$ligne[2];
            $prenom=$ligne[3];
            $dateNais=$ligne[4];
            $adresse=$ligne[5];
            $CP=$ligne[6];
            $ville=$ligne[7];     
            $ajout=$pdo->ajoutAdhCSV($numLicence,$sexe,$nom,$prenom,$dateNais,$adresse,$CP,$ville);
            if($ajout){
                $tailleTableau=$tailleTableau+1;
            }
        }  
}
$cpt=$cpt-1;
echo "$tailleTableau sur $cpt adhérents ajoutés."
?>