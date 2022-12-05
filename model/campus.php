<?php
class Campus{
	public $id_campus;
	public $libelle_camp;
	public $id_ville;

	public function __construct($id_campus,$libelle_camp,$id_ville){
		$this->id_campus=$id_campus;
		$this->id_ville=$id_ville;
		$this->id_ville=$id_ville;
	}

//BDD getter
	public function getCampusById($id){
		if(is_null($id)) $id=$this->id_campus;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM campus WHERE id_campus=:id_campus");
		$requete->execute(array(':id_campus'=>$id));
		$resultat=$requete->fetchObject();


		if(is_object($resultat)){
			$this->id_campus=intval($resultat->id_campus);
			$this->libelle_camp=$resultat->libelle_camp;
			$this->id_ville=$resultat->id_ville;
		}else{
			$this->id_campus=null;
			$this->libelle_camp=null;
			$this->id_ville=null;
		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

//BDD modif
	public function setCampusById($id){
		if(is_null($id)) $id=$this->id_campus;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE campus
								SET libelle_camp=:libelle_camp,
								id_ville=:id_ville
								WHERE id_campus=:id_campus");
		$retour=$requete->execute(array(
			':id_campus'=>$id,
			':libelle_camp'=>$this->libelle_camp,
			':id_ville'=>$this->id_ville
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertCampusInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO campus
									VALUES(
									:id_campus,
									:libelle_camp,
									:id_ville
									)");
		$retour=$requete->execute(array(
			':id_campus'=>$this->id_campus,
			':libelle_camp'=>$this->libelle_camp,
			':id_ville'=>$this->id_ville
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
function listeDesCampus(){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM campus ");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);

	return $result;
}
function listeDesCampusByVille($id){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM campus WHERE id_ville=$id");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);

	return $result;
}
function campuseName($id){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM campus WHERE id_campus=$id");
	$requete->execute();
	$result = $requete->fetchObject();
	if(!is_object($result)) return null;
	return $result->libelle_camp;
}
function campuseVilleName($id){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM campus WHERE id_campus=$id");
	$requete->execute();
	$result = $requete->fetchObject();
	if(!is_object($result)) return null;
	return villeName($result->id_ville);
}
?>
