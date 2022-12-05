<?php
class Enseigner{
	public $id_enseigner;
	public $id_personnel;

	public function __construct($id_enseigner,$id_personnel){
		$this->id_enseigner=$id_enseigner;
		$this->id_personnel=$id_personnel;
	}

//BDD getter
	public function getEnseignerById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM enseigner WHERE id_enseigner=:id_enseigner");
		$requete->execute(array(':id_enseigner'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_enseigner=intval($resultat->id_enseigner);
			$this->id_personnel=$resultat->id_personnel;	
		}else{
			$this->id_enseigner=null;
			$this->id_personnel=null;
		}
		
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setEnseignerById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE enseigner
								SET id_personnel=:id_personnel
								WHERE id_enseigner=:id_enseigner");
		$retour=$requete->execute(array(
			':id_enseigner'=>$id,
			':id_personnel'=>$this->id_personnel
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertEnseignerInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO enseigner
									VALUES(
									:id_enseigner,
									:id_personnel
									)");
		$retour=$requete->execute(array(
			':id_enseigner'=>$this->id_enseigner,
			':id_personnel'=>$this->id_personnel
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
