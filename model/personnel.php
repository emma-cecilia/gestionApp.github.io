<?php
//personnel.php
//model personnel
Class Personnel{
	public $id_personnel;
	public $nom_pers;
	public $prenom_pers;
	public $email_pers;
	public $tel_pers;
	public $adresse_pers;
	public $date_naiss_pers;
	public $lieu_naiss_pers;
	public $matricule_pers;
	public $nbr_enfant_pers;
	public $numRIB_pers;
	public $id_groupeUtilisateur;
	public $affectation;
	public $id_service;
	public $banque_id_banque;
	public $compteglpi_id_comptegpli;

	public $tel2_pers;
	public $ville_adresse;

	//la première fonction à déclarer
	public function __construct(
	$id_personnel=null,
	$nom_pers=null,
	$prenom_pers=null,
	$email_pers=null,
	$tel_pers=null,
	$adresse_pers=null,
	$date_naiss_pers=null,
	$lieu_naiss_pers=null,
	$matricule_pers=null,
	$nbr_enfant_pers=null,
	$numRIB_pers=null,
	$id_groupeUtilisateur=null,
	$affectation,$id_service=null,
	$banque_id_banque=null,
	$compteglpi_id_comptegpli=null,
	$tel2_pers,$ville_adresse=null
	){
		$this->id_personnel          = $id_personnel;
		$this->nom_pers      	= $nom_pers;
		$this->prenom_pers	 	= $prenom_pers;
		$this->email_pers    	= $email_pers;
		$this->tel_pers   	    = $tel_pers;
		$this->adresse_pers 	= $adresse_pers;
		$this->date_naiss_pers  = $date_naiss_pers;
		$this->lieu_naiss_pers  = $lieu_naiss_pers;
		$this->matricule_pers   = $matricule_pers;
		$this->nbr_enfant_pers  = $nbr_enfant_pers;
		$this->numRIB_pers       = $numRIB_pers;
		$this->id_groupeUtilisateur       = $id_groupeUtilisateur;
		$this->affectation       = $affectation;
		$this->id_service       = $id_service;
		$this->banque_id_banque       = $banque_id_banque;
		$this->compteglpi_id_comptegpli       = $compteglpi_id_comptegpli;

		$this->tel2_pers       = $tel2_pers;
		$this->ville_adresse       = $ville_adresse;
	}


//BDD getter
	public function getPersonnelById($id){
		if(is_null($id)) $id=$this->id_personnel;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM personnel WHERE id_personnel=:id_personnel");
		$requete->execute(array(':id_personnel'=>$id));
		$resultat=$requete->fetchObject();

		if(is_object($resultat)){
			$this->id_personnel=$resultat->id_personnel;
			$this->nom_pers=$resultat->nom_pers;
			$this->prenom_pers=$resultat->prenom_pers;
			$this->email_pers=$resultat->email_pers;
			$this->tel_pers=$resultat->tel_pers;
			$this->adresse_pers=$resultat->adresse_pers;
			$this->date_naiss_pers=$resultat->date_naiss_pers;
			$this->lieu_naiss_pers=$resultat->lieu_naiss_pers;
			$this->matricule_pers=$resultat->matricule_pers;
			$this->nbr_enfant_pers=$resultat->nbr_enfant_pers;
			$this->numRIB_pers=$resultat->numRIB_pers;
			$this->id_groupeUtilisateur=$resultat->id_groupeUtilisateur;
			$this->affectation=$resultat->affectation;
			$this->id_service=$resultat->id_service;
			$this->banque_id_banque=$resultat->banque_id_banque;
			$this->compteglpi_id_comptegpli=$resultat->compteglpi_id_comptegpli;

			$this->tel2_pers=$resultat->tel2_pers;
			$this->ville_adresse=$resultat->ville_adresse;
		}else{
			$this->id_personnel=null;
			$this->nom_pers=null;
			$this->prenom_pers=null;
			$this->email_pers=null;
			$this->tel_pers=null;
			$this->adresse_pers=null;
			$this->date_naiss_pers=null;
			$this->lieu_naiss_pers=null;
			$this->matricule_pers=null;
			$this->nbr_enfant_pers=null;
			$this->numRIB_pers=null;
			$this->id_groupeUtilisateur=null;
			$this->affectation=null;
			$this->id_service=null;
			$this->banque_id_banque=null;
			$this->compteglpi_id_comptegpli=null;

			$this->tel2_pers=null;
			$this->ville_adresse=null;
		}


		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

//BDD modif
	public function setPersonnelById($id){
		if(is_null($id)) $id=$this->id_personnel;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE personnel
								SET nom_pers=:nom_pers,
								prenom_pers=:prenom_pers,
								email_pers=:email_pers,
								tel_pers=:tel_pers,
								adresse_pers=:adresse_pers,
								date_naiss_pers=:date_naiss_pers,
								lieu_naiss_pers=:lieu_naiss_pers,
								matricule_pers=:matricule_pers,
								nbr_enfant_pers=:nbr_enfant_pers,
								numRIB_pers=:numRIB_pers,
								id_groupeUtilisateur=:id_groupeUtilisateur,
								affectation=:affectation,
								id_service=:id_service,
								banque_id_banque=:banque_id_banque,
								compteglpi_id_comptegpli=:compteglpi_id_comptegpli,
								tel2_pers=:tel2_pers,
								ville_adresse=:ville_adresse
								WHERE id_personnel=:id_personnel");
		$retour=$requete->execute(array(
			':id_personnel'=>$id,
			':nom_pers'=>$this->nom_pers,
			':prenom_pers'=>$this->prenom_pers,
			':email_pers'=>$this->email_pers,
			':tel_pers'=>$this->tel_pers,
			':adresse_pers'=>$this->adresse_pers,
			':date_naiss_pers'=>$this->date_naiss_pers,
			':lieu_naiss_pers'=>$this->lieu_naiss_pers,
			':matricule_pers'=>$this->matricule_pers,
			':nbr_enfant_pers'=>$this->nbr_enfant_pers,
			':numRIB_pers'=>$this->numRIB_pers,
			':id_groupeUtilisateur'=>$this->id_groupeUtilisateur,
			':affectation'=>$this->affectation,
			':id_service'=>$this->id_service,
			':banque_id_banque'=>$this->banque_id_banque,
			':compteglpi_id_comptegpli'=>$this->compteglpi_id_comptegpli,
			':tel2_pers'=>$this->tel2_pers,
			':ville_adresse'=>$this->ville_adresse
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertPersonnelInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO `personnel`(`id_personnel`, `nom_pers`, `prenom_pers`, `email_pers`, `tel_pers`, `adresse_pers`, `date_naiss_pers`, `lieu_naiss_pers`, `matricule_pers`, `nbr_enfant_pers`, `numRIB_pers`, `id_groupeUtilisateur`, `affectation`, `id_service`, `banque_id_banque`, `compteglpi_id_comptegpli`,`tel2_pers`,`ville_adresse`)
									VALUES(
									:id_personnel,
									:nom_pers,
									:prenom_pers,
									:email_pers,
									:tel_pers,
									:adresse_pers,
									:date_naiss_pers,
									:lieu_naiss_pers,
									:matricule_pers,
									:nbr_enfant_pers,
									:numRIB_pers,
									:id_groupeUtilisateur,
									:affectation,
									:id_service,
									:banque_id_banque,
									:compteglpi_id_comptegpli,
									:tel2_pers,
									:ville_adresse
									)");
									// print'<pre>';print_r($requete);exit;
		$retour=$requete->execute(array(
			':id_personnel'=>null,
			':nom_pers'=>$this->nom_pers,
			':prenom_pers'=>$this->prenom_pers,
			':email_pers'=>$this->email_pers,
			':tel_pers'=>$this->tel_pers,
			':adresse_pers'=>$this->adresse_pers,
			':date_naiss_pers'=>$this->date_naiss_pers,
			':lieu_naiss_pers'=>$this->lieu_naiss_pers,
			':matricule_pers'=>$this->matricule_pers,
			':nbr_enfant_pers'=>$this->nbr_enfant_pers,
			':numRIB_pers'=>$this->numRIB_pers,
			':id_groupeUtilisateur'=>$this->id_groupeUtilisateur,
			':affectation'=>$this->affectation,
			':id_service'=>$this->id_service,
			':banque_id_banque'=>$this->banque_id_banque,
			':compteglpi_id_comptegpli'=>$this->compteglpi_id_comptegpli,
			':tel2_pers'=>$this->tel2_pers,
			':ville_adresse'=>$this->ville_adresse
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
//listing
function listeDuPersonel(){
	$listePersonel=array();
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM personnel WHERE supprimer=0");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);

	return $result;
}
//listing formateur
function listeDesFormateursByAffectation($affectation){
	$listePersonel=array();
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM personnel WHERE id_service=1 AND affectation=$affectation AND supprimer=0");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);

	return $result;
}
//listing formateur par ville
function listeDesFormateurs(){
	$listePersonel=array();
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM personnel WHERE id_service=1 AND supprimer=0");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);

	return $result;
}
function personnelName($id){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM personnel WHERE id_personnel=$id AND supprimer=0");
	$requete->execute();
	$result = $requete->fetchObject();
	if(!is_object($result)) return null;
	return $result->nom_pers.' '.$result->prenom_pers;
}
function personnelClasse($id){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT `id_sessionFormation` as classe FROM `sessionformation` WHERE `id1_formateur`=$id or `id2_formateur`=$id");
	$requete->execute();
	$r=$requete->fetchAll();
	$liste = array();
	foreach ($r as $value) {
		$liste[]=$value['classe'];
	}
	return $liste;
}
?>
