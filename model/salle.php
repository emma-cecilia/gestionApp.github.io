<?php
class Salle{
	public $id_salle;
	public $numero_sall;
	public $id_campus;

	public function __construct($id_salle,$numero_sall,$id_campus){
		$this->id_salle=$id_salle;
		$this->numero_sall=$numero_sall;
		$this->id_campus=$id_campus;
	}

//BDD getter
	public function getSalleById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM salle WHERE id_salle=:id_salle");
		$requete->execute(array(':id_salle'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_salle=intval($resultat->id_salle);
			$this->numero_sall=$resultat->numero_sall;
			$this->id_campus=$resultat->id_campus;
		}else{
			$this->id_salle=null;
			$this->numero_sall=null;
			$this->id_campus=null;
		}
		$this->id_salle=intval($resultat->id_salle);
		$this->numero_sall=$resultat->numero_sall;
		$this->id_campus=$resultat->id_campus;

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setSalleById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE salle
								SET numero_sall=:numero_sall,
								id_campus=:id_campus
								WHERE id_salle=:id_salle");
		$retour=$requete->execute(array(
			':id_salle'=>$id,
			':numero_sall'=>$this->numero_sall,
			':id_campus'=>$this->id_campus
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertSalleInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO salle
									VALUES(
									:id_salle,
									:numero_sall,
									:id_campus
									)");
		$retour=$requete->execute(array(
			':id_salle'=>$this->id_salle,
			':numero_sall'=>$this->numero_sall,
			':id_campus'=>$this->id_campus
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
