<?php
Class Ville{
	public $id_ville;
	public $libelle_vil;
	
	//la première fonction à déclarer
	public function __construct($id_vil,$libelle_vil){
		$this->id_vil      = $id_vil; 
		$this->libelle_vil  = $libelle_vil;     
	}

//BDD getter
	public function getVilleById($id){
		if(is_null($id)) $id=$this->id_ville;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM ville WHERE id_ville=:id_ville");
		$requete->execute(array(':id_ville'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_ville=intval($resultat->id_ville);
			$this->libelle_vil=$resultat->libelle_vil;
		}else{
			$this->id_ville=null;
			$this->libelle_vil=null;
		}
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setVilleById($id){
		if(is_null($id)) $id=$this->id_ville;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE ville
								SET libelle_vil=:libelle_vil
								WHERE id_ville=:id_ville");
		$retour=$requete->execute(array(
			':id_ville'=>$id,
			':libelle_vil'=>$this->libelle_vil
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertVilleInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO ville
									VALUES(
									:id_ville,
									:libelle_vil
									)");
		$retour=$requete->execute(array(
			':id_ville'=>$this->id_ville,
			':libelle_vil'=>$this->libelle_vil
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
//listing
function listeDesVilles(){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM ville");
	$requete->execute();
	return $result = $requete->fetchAll(PDO::FETCH_OBJ);
}
function villeName($id){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM ville WHERE id_ville=$id");
	$requete->execute();
	$result = $requete->fetchObject();
	if(!is_object($result)) return null;
	return $result->libelle_vil;
}
?>