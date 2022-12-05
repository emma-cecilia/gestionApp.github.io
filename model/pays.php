<?php
Class Pays{
	private $id_pays;
	private $libelle_pays;
	
	//la première fonction à déclarer
	public function __construct($id_pays,$libelle_pays){
		$this->id_pays      = $id_pays; 
		$this->libelle_pays  = $libelle_pays;     
	}
	

//BDD getter
	public function getPaysById($id){
		if(is_null($id)) $id=$this->id_pays;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM campus WHERE id_pays=:id_pays");
		$requete->execute(array(':id_pays'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_pays=intval($resultat->id_pays);
			$this->libelle_pays=$resultat->libelle_pays;
		}else{
			$this->id_pays=null;
			$this->libelle_pays=null;
		}
		$this->id_pays=intval($resultat->id_pays);
		$this->libelle_pays=$resultat->libelle_pays;

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setPaysById($id){
		if(is_null($id)) $id=$this->id_pays;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE campus
								SET libelle_pays=:libelle_pays
								WHERE id_pays=:id_pays");
		$retour=$requete->execute(array(
			':id_pays'=>$id,
			':libelle_pays'=>$this->libelle_pays
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertPaysInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO campus
									VALUES(
									:id_pays,
									:libelle_pays
									)");
		$retour=$requete->execute(array(
			':id_pays'=>$this->id_pays,
			':libelle_pays'=>$this->libelle_pays
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
}
?>