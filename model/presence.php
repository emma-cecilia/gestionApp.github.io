<?php
class Presence{
	public $id_presence;
	public $date_GP;
	public $matricule_elt_GP;
	public $heure_arr_GP;
	public $heure_dep_dem_GP;
	public $heure_retour_GP;
	public $heure_dep_fin_GP;
	public $justificatifs;
	public $id_reporting;
	public $id_personnel;
	public $id_etudiant;

	public function __construct(
		$id_presence,
		$date_GP,
		$matricule_elt_GP,
		$heure_arr_GP,
		$heure_dep_dem_GP,
		$heure_retour_GP,
		$heure_dep_fin_GP,
		$justificatifs,
		$id_reporting,
		$id_personnel,
		$id_etudiant
	){
		$this->id_presence=$id_presence;
		$this->date_GP=$date_GP;
		$this->matricule_elt_GP=$matricule_elt_GP;
		$this->heure_arr_GP=$heure_arr_GP;
		$this->heure_dep_dem_GP=$heure_dep_dem_GP;
		$this->heure_retour_GP=$heure_retour_GP;
		$this->heure_dep_fin_GP=$heure_dep_fin_GP;
		$this->justificatifs=$justificatifs;
		$this->id_reporting=$id_reporting;
		$this->id_personnel=$id_personnel;
		$this->id_etudiant=$id_etudiant;
	}

//BDD getter
	public function getPresenceById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM presence WHERE id_presence=:id_presence");
		$requete->execute(array(':id_presence'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_presence=intval($resultat->id_presence);
			$this->date_GP=$resultat->date_GP;
			$this->matricule_elt_GP=$resultat->matricule_elt_GP;
			$this->heure_arr_GP=$resultat->heure_arr_GP;
			$this->heure_dep_dem_GP=$resultat->heure_dep_dem_GP;
			$this->heure_retour_GP=$resultat->heure_retour_GP;
			$this->heure_dep_fin_GP=$resultat->heure_dep_fin_GP;
			$this->justificatifs=$resultat->justificatifs;
			$this->id_reporting=$resultat->id_reporting;
			$this->id_personnel=$resultat->id_personnel;
			$this->id_etudiant=$resultat->id_etudiant;
		}else{
			$this->id_presence=null;
			$this->date_GP=null;
			$this->matricule_elt_GP=null;
			$this->heure_arr_GP=null;
			$this->heure_dep_dem_GP=null;
			$this->heure_retour_GP=null;
			$this->heure_dep_fin_GP=null;
			$this->justificatifs=null;
			$this->id_reporting=null;
			$this->id_personnel=null;
			$this->id_etudiant=null;
		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setPresenceById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE presence
								SET date_GP=:date_GP,
								matricule_elt_GP=:matricule_elt_GP,
								heure_arr_GP=:heure_arr_GP,
								heure_dep_dem_GP=:heure_dep_dem_GP,
								heure_retour_GP=:heure_retour_GP,
								heure_dep_fin_GP=:heure_dep_fin_GP,
								justificatifs=:justificatifs,
								id_reporting=:id_reporting,
								id_personnel=:id_personnel,
								id_etudiant=:id_etudiant
								WHERE id_presence=:id_presence");
		$retour=$requete->execute(array(
			':id_presence'=>$id,
			':date_GP'=>$this->date_GP,
			':matricule_elt_GP'=>$this->matricule_elt_GP,
			':heure_arr_GP'=>$this->heure_arr_GP,
			':heure_dep_dem_GP'=>$this->heure_dep_dem_GP,
			':heure_retour_GP'=>$this->heure_retour_GP,
			':heure_dep_fin_GP'=>$this->heure_dep_fin_GP,
			':justificatifs'=>$this->justificatifs,
			':id_reporting'=>$this->id_reporting,
			':id_personnel'=>$this->id_personnel,
			':id_etudiant'=>$this->id_etudiant
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertPresenceInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO presence
									VALUES(
									:id_presence,
									:date_GP,
									:matricule_elt_GP,
									:heure_arr_GP,
									:heure_dep_dem_GP,
									:heure_retour_GP,
									:heure_dep_fin_GP,
									:justificatifs,
									:id_reporting,
									:id_personnel,
									:id_etudiant
									)");
		$retour=$requete->execute(array(
			':id_presence'=>$this->id_presence,
			':date_GP'=>$this->date_GP,
			':matricule_elt_GP'=>$this->matricule_elt_GP,
			':heure_arr_GP'=>$this->heure_arr_GP,
			':heure_dep_dem_GP'=>$this->heure_dep_dem_GP,
			':heure_retour_GP'=>$this->heure_retour_GP,
			':heure_dep_fin_GP'=>$this->heure_dep_fin_GP,
			':justificatifs'=>$this->justificatifs,
			':id_reporting'=>$this->id_reporting,
			':id_personnel'=>$this->id_personnel,
			':id_etudiant'=>$this->id_etudiant
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
