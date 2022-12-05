<?php
class Exercer{
	public $id_exercer;
	public $id_fonction;

	public function __construct($id_exercer,$id_fonction){
		$this->id_exercer=$id_exercer;
		$this->id_fonction=$id_fonction;
	}

//BDD getter
	public function getExercerById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM exercer WHERE id_exercer=:id_exercer");
		$requete->execute(array(':id_exercer'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_exercer=intval($resultat->id_exercer);
			$this->id_fonction=$resultat->id_fonction;
		}else{
			$this->id_exercer=null;
			$this->id_fonction=null;
		}
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setExercerById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE exercer
								SET id_fonction=:id_fonction
								WHERE id_exercer=:id_exercer");
		$retour=$requete->execute(array(
			':id_exercer'=>$id,
			':id_fonction'=>$this->id_fonction
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertExercerInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO exercer
									VALUES(
									:id_exercer,
									:id_fonction
									)");
		$retour=$requete->execute(array(
			':id_exercer'=>$this->id_exercer,
			':id_fonction'=>$this->id_fonction
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
