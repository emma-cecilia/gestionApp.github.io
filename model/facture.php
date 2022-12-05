<?php
//factures.php
//model facture
Class Facture{
	public $id_facture;
	public $montant_FF;
	public $raison_FF;
	public $reference_Paie_FF;
	public $date_saisie_FF;
	public $date_paie_FF;
	public $date_echeance_FF;
	public $commentaires;
	
	//la première fonction à déclarer
	public function __construct($id_facture,$montant_FF,$raison_FF,$reference_Paie_FF,$date_saisie_FF,$date_paie_FF,$date_echeance_FF, $commentaires){
		$this->id_facture             = $id_facture; 
		$this->montant_FF      	 = $montant_FF; 
		$this->raison_FF	     = $raison_FF; 
		$this->reference_Paie_FF = $reference_Paie_FF;
		$this->date_saisie_FF    = $date_saisie_FF;
		$this->date_paie_FF      = $date_paie_FF;
		$this->date_echeance_FF  = $date_echeance_FF;
		$this->commentaires      = $commentaires;		
	}

//BDD getter
	public function getFactureById($id){
		if(is_null($id)) $id=$this->id_facture;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM campus WHERE id_facture=:id_facture");
		$requete->execute(array(':id_facture'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_facture=intval($resultat->id_facture);
			$this->montant_FF=$resultat->montant_FF;
			$this->raison_FF=$resultat->raison_FF;
			$this->reference_Paie_FF=$resultat->reference_Paie_FF;
			$this->date_saisie_FF=$resultat->date_saisie_FF;
			$this->date_paie_FF=$resultat->date_paie_FF;
			$this->date_echeance_FF=$resultat->date_echeance_FF;
			$this->commentaires=$resultat->commentaires;
		}else{
			$this->id_facture=null;
			$this->montant_FF=null;
			$this->raison_FF=null;
			$this->reference_Paie_FF=null;
			$this->date_saisie_FF=null;
			$this->date_paie_FF=null;
			$this->date_echeance_FF=null;
			$this->commentaires=null;
		}
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setFactureById($id){
		if(is_null($id)) $id=$this->id_facture;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE campus
								SET montant_FF=:montant_FF,
								raison_FF=:raison_FF,
								reference_Paie_FF=:reference_Paie_FF,
								date_saisie_FF=:date_saisie_FF,
								date_paie_FF=:date_paie_FF,
								date_echeance_FF=:date_echeance_FF,
								commentaires=:commentaires
								WHERE id_facture=:id_facture");
		$retour=$requete->execute(array(
			':id_facture'=>$id,
			':montant_FF'=>$this->montant_FF,
			':raison_FF'=>$this->raison_FF,
			':reference_Paie_FF'=>$this->reference_Paie_FF,
			':date_saisie_FF'=>$this->date_saisie_FF,
			':date_paie_FF'=>$this->date_paie_FF,
			':date_echeance_FF'=>$this->date_echeance_FF,
			':commentaires'=>$this->commentaires
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertFactureInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO campus
									VALUES(
									:id_facture,
									:montant_FF,
									:raison_FF,
									:reference_Paie_FF,
									:date_saisie_FF,
									:date_paie_FF,
									:date_echeance_FF,
									:commentaires
									)");
		$retour=$requete->execute(array(
			':id_facture'=>$this->id_facture,
			':montant_FF'=>$this->montant_FF,
			':raison_FF'=>$this->raison_FF,
			':reference_Paie_FF'=>$this->reference_Paie_FF,
			':date_saisie_FF'=>$this->date_saisie_FF,
			':date_paie_FF'=>$this->date_paie_FF,
			':date_echeance_FF'=>$this->date_echeance_FF,
			':commentaires'=>$this->commentaires
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>