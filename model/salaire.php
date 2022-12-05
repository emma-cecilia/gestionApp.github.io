<?php
class Salaire{
	public $id_salaire;
	public $mois_salaire;
	public $date_paie;
	public $reference_transact;
	public $prime_transport;
	public $prime_ponctualite;
	public $prime_logement;
	public $avance_salaire;
	public $autres_retenus;
	public $id_grilleSalaire;
	public $id_typePaiement;
	public $id_personnel;

	public function __construct(
		$id_salaire,
		$mois_salaire,
		$date_paie,
		$reference_transact,
		$prime_transport,
		$prime_ponctualite,
		$prime_logement,
		$avance_salaire,
		$autres_retenus,
		$id_grilleSalaire,
		$id_typePaiement,
		$id_personnel
	){
		$this->id_salaire=$id_salaire;
		$this->mois_salaire=$mois_salaire;
		$this->date_paie=$date_paie;
		$this->reference_transact=$reference_transact;
		$this->prime_transport=$prime_transport;
		$this->prime_ponctualite=$prime_ponctualite;
		$this->prime_logement=$prime_logement;
		$this->avance_salaire=$avance_salaire;
		$this->autres_retenus=$autres_retenus;
		$this->id_grilleSalaire=$id_grilleSalaire;
		$this->id_typePaiement=$id_typePaiement;
		$this->id_personnel=$id_personnel;
	}

//BDD getter
	public function getSalaireById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM salaire WHERE id_salaire=:id_salaire");
		$requete->execute(array(':id_salaire'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_salaire=intval($resultat->id_salaire);
			$this->mois_salaire=$resultat->mois_salaire;
			$this->date_paie=$resultat->date_paie;
			$this->reference_transact=$resultat->reference_transact;
			$this->prime_transport=$resultat->prime_transport;
			$this->prime_ponctualite=$resultat->prime_ponctualite;
			$this->prime_logement=$resultat->prime_logement;
			$this->avance_salaire=$resultat->avance_salaire;
			$this->autres_retenus=$resultat->autres_retenus;
			$this->id_grilleSalaire=$resultat->id_grilleSalaire;
			$this->id_typePaiement=$resultat->id_typePaiement;
			$this->id_personnel=$resultat->id_personnel;
		}else{
			$this->id_salaire=null;
			$this->mois_salaire=null;
			$this->date_paie=null;
			$this->reference_transact=null;
			$this->prime_transport=null;
			$this->prime_ponctualite=null;
			$this->prime_logement=null;
			$this->avance_salaire=null;
			$this->autres_retenus=null;
			$this->id_grilleSalaire=null;
			$this->id_typePaiement=null;
			$this->id_personnel=null;
		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setSalaireById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE salaire
								SET date_paie=:date_paie,
									mois_salaire=:mois_salaire,
									reference_transact=:reference_transact,
									prime_transport=:prime_transport,
									prime_ponctualite=:prime_ponctualite,
									prime_logement=:prime_logement,
									avance_salaire=:avance_salaire,
									autres_retenus=:autres_retenus,
									id_grilleSalaire=:id_grilleSalaire,
									id_typePaiement=:id_typePaiement,
									id_personnel=:id_personnel
								WHERE id_salaire=:id_salaire");
		$retour=$requete->execute(array(
			':id_salaire'=>$id,
			':mois_salaire'=>$this->mois_salaire,
			':date_paie'=>$this->date_paie,
			':reference_transact'=>$this->reference_transact,
			':prime_transport'=>$this->prime_transport,
			':prime_ponctualite'=>$this->prime_ponctualite,
			':prime_logement'=>$this->prime_logement,
			':avance_salaire'=>$this->avance_salaire,
			':autres_retenus'=>$this->autres_retenus,
			':id_grilleSalaire'=>$this->id_grilleSalaire,
			':id_typePaiement'=>$this->id_typePaiement,
			':id_personnel'=>$this->id_personnel
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertSalaireInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO salaire
									VALUES(
									:id_salaire,
									:mois_salaire,
									:date_paie,
									:reference_transact,
									:prime_transport,
									:prime_ponctualite,
									:prime_logement,
									:avance_salaire,
									:autres_retenus,
									:id_grilleSalaire,
									:id_typePaiement,
									:id_personnel
									)");
		$retour=$requete->execute(array(
			':id_salaire'=>$this->id_salaire,
			':mois_salaire'=>$this->mois_salaire,
			':date_paie'=>$this->date_paie,
			':reference_transact'=>$this->reference_transact,
			':prime_transport'=>$this->prime_transport,
			':prime_ponctualite'=>$this->prime_ponctualite,
			':prime_logement'=>$this->prime_logement,
			':avance_salaire'=>$this->avance_salaire,
			':autres_retenus'=>$this->autres_retenus,
			':id_grilleSalaire'=>$this->id_grilleSalaire,
			':id_typePaiement'=>$this->id_typePaiement,
			':id_personnel'=>$this->id_personnel
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
