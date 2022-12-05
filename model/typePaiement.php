<?php
Class TypePaiement{
	public $id_typePaiement;
	public $libelle_typPaie;

	//la première fonction à déclarer
	public function __construct($id_typePaiement,$libelle_typPaie){
		$this->id_typePaiement      = $id_typePaiement; 
		$this->libelle_typPaie  = $libelle_typPaie;     
	}
	
//BDD getter
	public function getTypePaiementById($id){
		if(is_null($id)) $id=$this->id_typePaiement;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM campus WHERE id_typePaiement=:id_typePaiement");
		$requete->execute(array(':id_typePaiement'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_typePaiement=intval($resultat->id_typePaiement);
			$this->libelle_typPaie=$resultat->libelle_typPaie;
		}else{
			$this->id_typePaiement=null;
			$this->libelle_typPaie=null;
		}
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setTypePaiementById($id){
		if(is_null($id)) $id=$this->id_typePaiement;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE campus
								SET libelle_typPaie=:libelle_typPaie
								WHERE id_typePaiement=:id_typePaiement");
		$retour=$requete->execute(array(
			':id_typePaiement'=>$id,
			':libelle_typPaie'=>$this->libelle_typPaie
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertTypePaiementInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO campus
									VALUES(
									:id_typePaiement,
									:libelle_typPaie
									)");
		$retour=$requete->execute(array(
			':id_typePaiement'=>$this->id_typePaiement,
			':libelle_typPaie'=>$this->libelle_typPaie
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>