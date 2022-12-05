<?php
class Service{
	public $id_service;
	public $libelle;
	
	

	public function __construct($id_service,$libelle){
		$this->id_service=$id_service;
		$this->libelle=$libelle;
	}

//BDD getter
	public function getServiceById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM sevice WHERE id_service=:id_service");
		$requete->execute(array(':id_service'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_service=intval($resultat->id_service);
			$this->libelle=$resultat->libelle;
		}else{
			$this->id_service=null;
			$this->libelle=null;
		}
		
		
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setServiceId($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE sevice
								SET libelle=:libelle
									
									
								WHERE id_service=:id_service");
		$retour=$requete->execute(array(
			':id_service'=>$id,
			':libelle'=>$this->libelle
			
			
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertServiceInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO sevice
									VALUES(
									:id_service,
									:libelle
									
									
									
									)");
		$retour=$requete->execute(array(
			':id_service'=>$this->id_service,
			':libelle'=>$this->libelle
			
			
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
//listing
function listeDesServives(){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM service");
	$requete->execute();
	return $result = $requete->fetchAll(PDO::FETCH_OBJ);
}
function serviceName($id){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM service WHERE id_service=$id");
	$requete->execute();
	$result = $requete->fetchObject();
	if(!is_object($result)) return null;
	return $result->libelle;
}
?>
