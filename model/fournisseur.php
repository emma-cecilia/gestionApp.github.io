<?php
class Fournisseur{
	public $id_fournisseur;
	public $libelle_fourn;
	public $tel_fourn;
	public $email_fourn;
	public $num_RIB_fourn;

	public function __construct($id_fournisseur,$libelle_fourn,$tel_fourn,$email_fourn,$num_RIB_fourn){
		$this->id_fournisseur=$id_fournisseur;
		$this->tel_fourn=$tel_fourn;
		$this->email_fourn=$email_fourn;
		$this->num_RIB_fourn=$num_RIB_fourn;
	}

//BDD getter
	public function getFournisseurById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM fournisseur WHERE id_fournisseur=:id_fournisseur");
		$requete->execute(array(':id_fournisseur'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_fournisseur=intval($resultat->id_fournisseur);
			$this->libelle_fourn=$resultat->libelle_fourn;
			$this->tel_fourn=$resultat->tel_fourn;
			$this->email_fourn=$resultat->email_fourn;
			$this->num_RIB_fourn=$resultat->num_RIB_fourn;
		}else{
			$this->id_fournisseur=null;
			$this->libelle_fourn=null;
			$this->tel_fourn=null;
			$this->email_fourn=null;
			$this->num_RIB_fourn=null;
		}
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setFournisseurById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE fournisseur
								SET libelle_fourn=:libelle_fourn,
								tel_fourn=:tel_fourn,
								email_fourn=:email_fourn,
								num_RIB_fourn=:num_RIB_fourn
								WHERE id_fournisseur=:id_fournisseur");
		$retour=$requete->execute(array(
			':id_fournisseur'=>$id,
			':libelle_fourn'=>$this->libelle_fourn,
			':tel_fourn'=>$this->tel_fourn,
			':email_fourn'=>$this->email_fourn,
			':num_RIB_fourn'=>$this->num_RIB_fourn
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertFournisseurInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO fournisseur
									VALUES(
									:id_fournisseur,
									:libelle_fourn,
									:tel_fourn,
									:email_fourn
									)");
		$retour=$requete->execute(array(
			':id_fournisseur'=>$this->id_fournisseur,
			':libelle_fourn'=>$this->libelle_fourn,
			':tel_fourn'=>$this->tel_fourn,
			':email_fourn'=>$this->email_fourn,
			':num_RIB_fourn'=>$this->num_RIB_fourn
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
