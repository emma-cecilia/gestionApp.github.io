<?php
class Conge{
	public $id_conge;
	public $date_demand;
	public $date_debut_conge;
	public $date_fin_conge;
	public $statut_damand;
	public $id_typeConge;
	public $id_personnel;

	public function __construct($id_conge,$date_demand, $date_debut_conge, $date_fin_conge, $statut_damand, $id_typeConge, $id_personnel){
		$this->id_conge=$id_conge;
		$this->date_demand=$date_demand;
		$this->date_debut_conge=$date_debut_conge;
		$this->date_fin_conge=$date_fin_conge;
		$this->statut_damand=$statut_damand;
		$this->id_typeConge=$id_typeConge;
		$this->id_personnel=$id_personnel;

	}

//BDD getter
	public function getCongeById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM conge WHERE id_conge=:id_conge");
		$requete->execute(array(':id_conge'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_conge=intval($resultat->id_conge);
			$this->date_demand=$resultat->date_demand;
			$this->date_debut_conge=$resultat->date_debut_conge;
			$this->date_fin_conge=$resultat->date_fin_conge;
			$this->statut_damand=$resultat->statut_damand;
			$this->id_typeConge=$resultat->id_typeConge;
			$this->id_personnel=$resultat->id_personnel;
		}else{
			$this->id_conge=null;
			$this->date_demand=null;
			$this->date_debut_conge=null;
			$this->date_fin_conge=null;
			$this->statut_damand=null;
			$this->id_typeConge=null;
			$this->id_personnel=null;
		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setSessionFormationId($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE conge
								SET date_demand=:date_demand,
									date_debut_conge=:date_debut_conge,
									date_fin_conge=:date_fin_conge,
									statut_damand=:statut_damand,
									id_typeConge=:id_typeConge,
									id_personnel=:id_personnel
								WHERE id_conge=:id_conge");
		$retour=$requete->execute(array(
			':id_conge'=>$id,
			':date_demand'=>$this->date_demand,
			':date_debut_conge'=>$this->date_debut_conge,
			':date_fin_conge'=>$this->date_fin_conge,
			':statut_damand'=>$this->statut_damand,
			':id_typeConge'=>$this->id_typeConge,
			':id_personnel'=>$this->id_personnel
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertSessionFormationInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO conge
									VALUES(
									:id_conge,
									:date_demand,
									:date_debut_conge,
									:date_fin_conge,
									:statut_damand,
									:id_typeConge,
									:id_personnel
									
									)");
		$retour=$requete->execute(array(
			':id_conge'=>$this->id_conge,
			':date_demand'=>$this->date_demand,
			':date_debut_conge'=>$this->date_debut_conge,
			':date_fin_conge'=>$this->date_fin_conge,
			':statut_damand'=>$this->statut_damand,
			':id_typeConge'=>$this->id_typeConge,
			':id_personnel'=>$this->id_personnel
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
