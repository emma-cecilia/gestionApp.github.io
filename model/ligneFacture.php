<?php
class LigneFacture{
	public $id_ligneFacture;
	public $libelle_prod_LF;
	public $pu_prod_LF;
	public $pt_prod_LF;
	public $qty_prod_LF;
	public $id_facture;

	public function __construct($id_ligneFacture,$libelle_prod_LF, $PU_prod_LF, $pt_prod_LF, $qty_prod_LF, $id_facture){
		$this->id_ligneFacture=$id_ligneFacture;
		$this->libelle_prod_LF=$libelle_prod_LF;
		$this->pu_prod_LF=$pu_prod_LF;
		$this->pt_prod_LF=$pt_prod_LF;
		$this->qty_prod_LF=$qty_prod_LF;
		$this->id_facture=$id_facture;

	}

//BDD getter
	public function getLigneFactureById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM  ligneFacture WHERE id_ligneFacture=:id_ligneFacture");
		$requete->execute(array(':id_ligneFacture'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_ligneFacture=intval($resultat->id_ligneFacture);
			$this->libelle_prod_LF=$resultat->libelle_prod_LF;
			$this->pu_prod_LF=$resultat->pu_prod_LF;
			$this->pt_prod_LF=$resultat->pt_prod_LF;
			$this->qty_prod_LF=$resultat->qty_prod_LF;
			$this->id_facture=$resultat->id_facture;
		}else{
			$this->id_ligneFacture=null;
			$this->libelle_prod_LF=null;
			$this->pu_prod_LF=null;
			$this->pt_prod_LF=null;
			$this->qty_prod_LF=null;
			$this->id_facture=null;
		}
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setLigneFactureId($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE ligneFacture
								SET libelle_prod_LF=:libelle_prod_LF,
									pu_prod_LF=:pu_prod_LF,
									pt_prod_LF=:pt_prod_LF,
									qty_prod_LF=:qty_prod_LF,
									id_facture=:id_facture
								WHERE id_ligneFacture=:id_ligneFacture");
		$retour=$requete->execute(array(
			':id_ligneFacture'=>$id,
			':libelle_prod_LF'=>$this->libelle_prod_LF,
			':pu_prod_LF'=>$this->pu_prod_LF,
			':pt_prod_LF'=>$this->pt_prod_LF,
			':qty_prod_LF'=>$this->qty_prod_LF,
			':id_facture'=>$this->id_facture
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertLigneFactureInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO ligneFacture
									VALUES(
									:id_ligneFacture,
									:libelle_prod_LF,
									:pu_prod_LF,
									:pt_prod_LF,
									:qty_prod_LF,
									:id_facture
									
									)");
		$retour=$requete->execute(array(
			':id_ligneFacture'=>$this->id_ligneFacture,
			':libelle_prod_LF'=>$this->libelle_prod_LF,
			':pu_prod_LF'=>$this->pu_prod_LF,
			':pt_prod_LF'=>$this->pt_prod_LF,
			':qty_prod_LF'=>$this->qty_prod_LF,
			':id_facture'=>$this->id_facture
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
