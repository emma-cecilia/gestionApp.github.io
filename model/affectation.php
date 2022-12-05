<?php
class Affectation{
	public $id_affectation;
	public $date_affectation;

	//la première fonction à déclarer
	public function __construct($id_affectation,$date_affectation){
		$this->id_affectation      = $id_affectation; 
		$this->date_affectation  = $date_affectation;     
	}
	//BDD getter
	public function getAffectationById($id){
		if(is_null($id)) $id=$this->id_affectation;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM affectation WHERE id_affectation=:id_affectation");
		$requete->execute(array(':id_affectation'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_affectation=intval($resultat->id_affectation);
			$this->date_affectation=$resultat->date_affectation;
		}else{
			$this->id_affectation=null;
			$this->date_affectation=null;
		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD modif
	public function setAffectationById($id){
		if(is_null($id)) $id=$this->id_affectation;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE affectation
								SET date_affectation=:date_affectation
								WHERE id_affectation=:id_affectation");
		$retour=$requete->execute(array(
			':id_affectation'=>$id,
			':date_affectation'=>$this->date_affectation
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertAffectationInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO affectation
									VALUES(
									:id_affectation,
									:date_affectation
									)");
		$retour=$requete->execute(array(
			':id_affectation'=>$this->id_affectation,
			':date_affectation'=>$this->date_affectation
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>