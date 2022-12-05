<?php
Class GroupeUtilisateur{
	private $id_groupeUtilisateur;
	private $libelle_GU;
	private $niveau_acces_GU;
	private $description_droit_GU;
	
	//CONSTRUCTEUR
	public function __construct($id_groupeUtilisateur,$libelle_GU, $niveau_acces_GU, $description_droit_GU){
		$this->id_groupeUtilisateur=$id_groupeUtilisateur;
		$this->libelle_GU=$libelle_GU;
		$this->niveau_acces_GU=$niveau_acces_GU;
	}
	
//BDD getter
	public function getGroupeUtilisateurById($id){
		if(is_null($id)) $id=$this->id_groupeUtilisateur;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM campus WHERE id_groupeUtilisateur=:id_groupeUtilisateur");
		$requete->execute(array(':id_groupeUtilisateur'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_groupeUtilisateur=intval($resultat->id_groupeUtilisateur);
			$this->libelle_GU=$resultat->libelle_GU;
			$this->niveau_acces_GU=$resultat->niveau_acces_GU;
			$this->description_droit_GU=$resultat->description_droit_GU;
		}else{
			$this->id_groupeUtilisateur=null;
			$this->libelle_GU=null;
			$this->niveau_acces_GU=null;
			$this->description_droit_GU=null;
		}
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setGroupeUtilisateurById($id){
		if(is_null($id)) $id=$this->id_groupeUtilisateur;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE campus
								SET libelle_GU=:libelle_GU,
								niveau_acces_GU=:niveau_acces_GU,
								description_droit_GU=:description_droit_GU
								WHERE id_groupeUtilisateur=:id_groupeUtilisateur");
		$retour=$requete->execute(array(
			':id_groupeUtilisateur'=>$id,
			':libelle_GU'=>$this->libelle_GU,
			':niveau_acces_GU'=>$this->niveau_acces_GU,
			':description_droit_GU'=>$this->description_droit_GU
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertGroupeUtilisateurInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO campus
									VALUES(
									:id_groupeUtilisateur,
									:libelle_GU,
									:niveau_acces_GU,
									:description_droit_GU
									)");
		$retour=$requete->execute(array(
			':id_groupeUtilisateur'=>$this->id_groupeUtilisateur,
			':libelle_GU'=>$this->libelle_GU,
			':niveau_acces_GU'=>$this->niveau_acces_GU,
			':description_droit_GU'=>$this->description_droit_GU
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>