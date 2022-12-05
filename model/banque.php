<?php
class Banque{
	private $id_banque;
	private $libelle_bank;
	
	//la première fonction à déclarer
	public function __construct($id_banque,$libelle_bank){
		$this->id_banque      = $id_banque; 
		$this->libelle_bank  = $libelle_bank;     
	}
	
	//BDD getter
	public function getBanqueById($id){
		if(is_null($id)) $id=$this->id_banque;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM banque WHERE id_banque=:id_banque");
		$requete->execute(array(':id_banque'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_banque=intval($resultat->id_banque);
			$this->libelle_bank=$resultat->libelle_bank;
		}else{
			$this->id_banque=null;
			$this->libelle_bank=null;
		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setBanqueById($id){
		if(is_null($id)) $id=$this->id_banque;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE banque
								SET libelle_bank=:libelle_bank
								WHERE id_banque=:id_banque");
		$retour=$requete->execute(array(
			':id_banque'=>$id,
			':libelle_bank'=>$this->libelle_bank
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertBanqueInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO banque
									VALUES(
									:id_banque,
									:libelle_bank
									)");
		$retour=$requete->execute(array(
			':id_banque'=>$this->id_banque,
			':libelle_bank'=>$this->libelle_bank
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>