<?php
class Reporting{
	public $id_reporting;
	public $date_rep;
	public $numero_rep;
	public $retard_rep;
	public $absence_rep;

	public function __construct($id_reporting,$date_rep, $numero_rep, $retard_rep, $absence_rep){
		$this->id_reporting=$id_reporting;
		$this->date_rep=$date_rep;
		$this->numero_rep=$numero_rep;
		$this->retard_rep=$retard_rep;
		$this->absence_rep=$absence_rep;

	}

//BDD getter
	public function getReportingById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM reporting WHERE id_reporting=:id_reporting");
		$requete->execute(array(':id_reporting'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_reporting=intval($resultat->id_reporting);
			$this->date_rep=$resultat->date_rep;
			$this->numero_rep=$resultat->numero_rep;
			$this->retard_rep=$resultat->retard_rep;
			$this->absence_rep=$resultat->absence_rep;
		}else{
			$this->id_reporting=null;
			$this->date_rep=null;
			$this->numero_rep=null;
			$this->retard_rep=null;
			$this->absence_rep=null;
		}
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setSessionFormationId($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE reporting
								SET date_rep=:date_rep,
									numero_rep=:numero_rep,
									retard_rep=:retard_rep,
									absence_rep=:absence_rep
								WHERE id_reporting=:id_reporting");
		$retour=$requete->execute(array(
			':id_reporting'=>$id,
			':date_rep'=>$this->date_rep,
			':numero_rep'=>$this->numero_rep,
			':retard_rep'=>$this->retard_rep,
			':absence_rep'=>$this->absence_rep
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertSessionFormationInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO reporting
									VALUES(
									:id_reporting,
									:date_rep,
									:numero_rep,
									:retard_rep,
									:absence_rep,
									
									)");
		$retour=$requete->execute(array(
			':id_reporting'=>$this->id_reporting,
			':date_rep'=>$this->date_rep,
			':numero_rep'=>$this->numero_rep,
			':retard_rep'=>$this->retard_rep,
			':absence_rep'=>$this->absence_rep
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
