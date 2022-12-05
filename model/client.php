<?php
class Client{
	public $id_client;
	public $tel_client;
	public $libelle_client;
	public $email_client;

	public function __construct($id_client,$tel_client,$libelle_client,$email_client){
		$this->id_client=$id_client;
		$this->libelle_client=$libelle_client;
		$this->email_client=$email_client;
	}

//BDD getter
	public function getClientById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM client WHERE id_client=:id_client");
		$requete->execute(array(':id_client'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_client=intval($resultat->id_client);
			$this->tel_client=$resultat->tel_client;
			$this->libelle_client=$resultat->libelle_client;
			$this->email_client=$resultat->email_client;
		}else{
			$this->id_client=null;
			$this->tel_client=null;
			$this->libelle_client=null;
			$this->email_client=null;
		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setClientById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE client
								SET tel_client=:tel_client,
								libelle_client=:libelle_client,
								email_client=:email_client
								WHERE id_client=:id_client");
		$retour=$requete->execute(array(
			':id_client'=>$id,
			':tel_client'=>$this->tel_client,
			':libelle_client'=>$this->libelle_client,
			':email_client'=>$this->email_client
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertClientInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO client
									VALUES(
									:id_client,
									:tel_client,
									:libelle_client
									)");
		$retour=$requete->execute(array(
			':id_client'=>$this->id_client,
			':tel_client'=>$this->tel_client,
			':libelle_client'=>$this->libelle_client,
			':email_client'=>$this->email_client
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
