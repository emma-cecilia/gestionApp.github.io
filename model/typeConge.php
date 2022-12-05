<?php
Class TypeConge{
	public $id_typeConge;
	public $libelle_type;
	
	//la première fonction à déclarer
	public function __construct($id_typeConge,$libelle_type){
		$this->id_typeConge      = $id_typeConge; 
		$this->libelle_type  = $libelle_type;     
	}
	
//BDD getter
	public function getTypeCongeById($id){
		if(is_null($id)) $id=$this->id_typeConge;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM campus WHERE id_typeConge=:id_typeConge");
		$requete->execute(array(':id_typeConge'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_typeConge=intval($resultat->id_typeConge);
			$this->libelle_type=$resultat->libelle_type;
		}else{
			$this->id_typeConge=null;
			$this->libelle_type=null;
		}
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setTypeCongeById($id){
		if(is_null($id)) $id=$this->id_typeConge;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE campus
								SET libelle_type=:libelle_type
								WHERE id_typeConge=:id_typeConge");
		$retour=$requete->execute(array(
			':id_typeConge'=>$id,
			':libelle_type'=>$this->libelle_type
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertTypeCongeInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO campus
									VALUES(
									:id_typeConge,
									:libelle_type
									)");
		$retour=$requete->execute(array(
			':id_typeConge'=>$this->id_typeConge,
			':libelle_type'=>$this->libelle_type
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>