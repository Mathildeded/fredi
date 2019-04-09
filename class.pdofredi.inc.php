<?php
class pdofredi{
        private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=m2l-fredi';
      	private static $user='root' ;
      	private static $mdp='';
		private static $monPdo;
		private static $monpdofredi=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */
	private function __construct(){
    	pdofredi::$monPdo = new PDO(pdofredi::$serveur.';'.pdofredi::$bdd, pdofredi::$user, pdofredi::$mdp);
		pdofredi::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		pdofredi::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe

 * Appel : $instancepdofredi = pdofredi::getpdofredi();

 * @return l'unique objet de la classe pdofredi
 */
	public  static function getpdofredi(){
		if(pdofredi::$monpdofredi==null){
			pdofredi::$monpdofredi= new pdofredi();
		}
		return pdofredi::$monpdofredi;
	}

	
	function verifid($id, $mdp) {
		$req = "select count(*) from adherents where num_licence = '$id' and mdp = '$mdp'";
		$res = pdofredi::$monPdo->query($req)->fetchColumn();
		if ($res>0) {
			return true;
		}
		else
			return false;

	}
    public function getadherent($num){
		$req = "select * from adherents where num_licence='$num'";
		$res = pdofredi::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
    public function getAllLignes($num){
        $req = "select * from ligne_frais, motifs where ligne_frais.motif=motifs.id and num_licence='$num' ";
		$res = pdofredi::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
    }
    public function getUneLigne($num,$date){
        $req = "select * from ligne_frais where num_licence='$num' and date='$date' ";
		$res = pdofredi::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
    }
    public function delUneLigne($num,$date){
        $req="delete from ligne_frais where num_licence='$num' and date='$date'";
        $ok = pdofredi::$monPdo->exec($req);
		return $ok;
    }
    
    public function getAllMotifs(){
        $req = "select * from motifs";
		$res = pdofredi::$monPdo->query($req);
		$lesMotifs = $res->fetchAll();
		return $lesMotifs;
    }
    public function getAllLicences(){
        $req = "select num_licence from adherents where mdp is null and mail is null";
		$res = pdofredi::$monPdo->query($req);
		$lesLicences = $res->fetchAll();
		return $lesLicences;
    }
	public function ajoutAdh($num,$mail,$mdp,$club){
        $ok=false;
        $req = "update adherents set mdp='$mdp', mail='$mail', num_club=$club where num_licence='$num'";
        $ok = pdofredi::$monPdo->exec($req);
		return $ok;
	}
    public function ajoutLigne($num,$date,$motif,$trajet,$km,$ctrajet,$cpeage,$crepas,$cheber){
        $ok=false;
        $req = "insert into ligne_frais values('$num','$date',$motif,'$trajet',$km,$ctrajet,$cpeage,$crepas,$cheber,0,0,0,0)";
        $ok = pdofredi::$monPdo->exec($req);
		return $ok;
    }

	public function verifLicence($num){
        $req = "select * from adherents where num_licence='$num'";
		$res = pdofredi::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
        if(count($lesLignes)>0){
            return false;
        }
        else{
            return true;
        }
	}
    public function ajoutAdhCSV($num,$sexe,$nom,$pren,$date,$adr,$cp,$ville){
        $adr=str_replace("'", "\'",$adr);
        $ok=false;
        $req = "insert into adherents (num_licence,sexe,nom,prenom,date_naissance,adresse,code_postal,ville) values('$num','$sexe','$nom','$pren',STR_TO_DATE('$date', '%d/%m/%Y'),'$adr','$cp','$ville')"; 
        $ok = pdofredi::$monPdo->exec($req);
		return $ok;
	}
    public function deleteAllAdh(){
        $ok=false;
        $req = "delete from adherents;"; 
        $ok = pdofredi::$monPdo->exec($req);
		return $ok;
	}
}
?>
