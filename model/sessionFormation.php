<?php
class SessionFormation{
	public $id_sessionFormation;
	public $date_debut;
	public $date_fin;
	public $id1_formateur;
	public $id2_formateur;
	public $id_campus;
	public $id_typeFormation;
	public $classe;

	public function __construct($id_sessionFormation,$date_debut, $date_fin, $id1_formateur, $id2_formateur, $id_campus, $id_typeFormation, $classe){
		$this->id_sessionFormation=$id_sessionFormation;
		$this->date_debut=$date_debut;
		$this->date_fin=$date_fin;
		$this->id1_formateur=$id1_formateur;
		$this->id2_formateur=$id2_formateur;
		$this->id_campus=$id_campus;
		$this->id_typeFormation=$id_typeFormation;
		$this->classe=$classe;

	}

//BDD getter
	public function getSessionFormationById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM sessionformation WHERE id_sessionFormation=:id_sessionFormation");
		$requete->execute(array(':id_sessionFormation'=>$id));
		$resultat=$requete->fetchObject();

		if(is_object($resultat)){
			$this->id_sessionFormation=intval($resultat->id_sessionFormation);
			$this->date_debut=$resultat->date_debut;
			$this->date_fin=$resultat->date_fin;
			$this->id1_formateur=$resultat->id1_formateur;
			$this->id2_formateur=$resultat->id2_formateur;
			$this->id_campus=$resultat->id_campus;
			$this->id_typeFormation=$resultat->id_typeFormation;
			$this->classe=$resultat->classe;
		}else{
			$this->id_sessionFormation=null;
			$this->date_debut=null;
			$this->date_fin=null;
			$this->id1_formateur=null;
			$this->id2_formateur=null;
			$this->id_campus=null;
			$this->id_typeFormation=null;
			$this->classe=null;
		}


		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

//BDD modif
	public function setSessionFormationById($id){
		if(is_null($id)) $id=$this->id_sessionFormation;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE sessionformation
								SET date_debut=:date_debut,
									date_fin=:date_fin,
									id1_formateur=:id1_formateur,
									id2_formateur=:id2_formateur,
									id_campus=:id_campus,
									id_typeFormation=:id_typeFormation,
									classe=:classe
								WHERE id_sessionFormation=:id_sessionFormation");
		$retour=$requete->execute(array(
			':id_sessionFormation'=>$id,
			':date_debut'=>$this->date_debut,
			':date_fin'=>$this->date_fin,
			':id1_formateur'=>$this->id1_formateur,
			':id2_formateur'=>$this->id2_formateur,
			':id_campus'=>$this->id_campus,
			':id_typeFormation'=>$this->id_typeFormation,
			':classe'=>$this->classe
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertSessionFormationInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO `sessionformation`(`id_sessionFormation`, `date_debut`, `date_fin`, `id1_formateur`, `id2_formateur`, `id_campus`, `id_typeFormation`, `classe`)
									VALUES(
									:id_sessionFormation,
									:date_debut,
									:date_fin,
									:id1_formateur,
									:id2_formateur,
									:id_campus,
									:id_typeFormation,
									:classe
									)");
		$retour=$requete->execute(array(
			':id_sessionFormation'=>$this->id_sessionFormation,
			':date_debut'=>$this->date_debut,
			':date_fin'=>$this->date_fin,
			':id1_formateur'=>$this->id1_formateur,
			':id2_formateur'=>$this->id2_formateur,
			':id_campus'=>$this->id_campus,
			':id_typeFormation'=>$this->id_typeFormation,
			':classe'=>$this->classe
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
//listing
function listeDesSessionFormation(){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM sessionformation WHERE supprimer=0");
	$requete->execute();
	return $result = $requete->fetchAll(PDO::FETCH_OBJ);
}
//listing
function listeDesSessionFormationByCampus($idCampus){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM sessionformation WHERE supprimer=0 AND id_campus=:id_campus");
	$requete->execute(array(':id_campus'=>$idCampus));
	return $result = $requete->fetchAll(PDO::FETCH_OBJ);
}
//listing
function SessionFormationClasse($id){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM sessionformation WHERE id_sessionFormation=$id  AND supprimer=0");
	$requete->execute();
	$result = $requete->fetchObject();
	if(!is_object($result)) return null;
	return $result->classe;
}
function SessionFormationCampus($id){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM sessionformation WHERE id_sessionFormation=$id  AND supprimer=0");
	$requete->execute();
	$result = $requete->fetchObject();
	if(!is_object($result)) return null;
	return campuseName($result->id_campus).' ('.campuseVilleName($result->id_campus).')';
}
//listing
function listeEtudiantSession($idSession){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM etudiant WHERE sessionformation_id_sessionformation='$idSession' AND supprimer=0");
	$requete->execute();
	return $result = $requete->fetchAll(PDO::FETCH_OBJ);
}
//listing
function listeEtudiantSansSession($idSession){
	$liste=array();
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM etudiant WHERE supprimer=0");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);
	foreach($result as $element){
		if(is_null($element->sessionformation_id_sessionformation) or $element->sessionformation_id_sessionformation==$idSession) $liste[]=$element;
	}
	return $liste;
}

function listeEtudiantSansSessionByCF($idSession,$campus,$formation){
	$liste=array();
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM etudiant WHERE supprimer=0 AND ville_form_etud=$campus AND vague_form_etud=$formation");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);
	foreach($result as $element){
		if(is_null($element->sessionformation_id_sessionformation) or $element->sessionformation_id_sessionformation==$idSession) $liste[]=$element;
	}
	return $liste;
}
?>
