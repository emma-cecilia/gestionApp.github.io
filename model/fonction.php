<?php
class Fonction{
	public $id_fonction;
	public $libelle_fonct;
	public $abbreviation_fonct;
	

	public function __construct($id_fonction,$libelle_fonct, $abbreviation_fonct){
		$this->id_fonction=$id_fonction;
		$this->libelle_fonct=$libelle_fonct;
		$this->abbreviation_fonct=$abbreviation_fonct;
	}

//BDD getter
	public function getFonctionById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM fonctionWHERE id_fonction=:id_fonction");
		$requete->execute(array(':id_fonction'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_fonction=intval($resultat->id_fonction);
			$this->libelle_fonct=$resultat->libelle_fonct;
			$this->abbreviation_fonct=$resultat->abbreviation_fonct;
		}else{
			$this->id_fonction=null;
			$this->libelle_fonct=null;
			$this->abbreviation_fonct=null;
		}
		
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setFonctionId($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE fonction
								SET libelle_fonct=:libelle_fonct,
									abbreviation_fonct=:abbreviation_fonct
									
								WHERE id_fonction=:id_fonction");
		$retour=$requete->execute(array(
			':id_fonction'=>$id,
			':libelle_fonct'=>$this->libelle_fonct,
			':abbreviation_fonct'=>$this->abbreviation_fonct
			
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertFonctionInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO fonction
									VALUES(
									:id_fonction,
									:libelle_fonct,
									:abbreviation_fonct
								
									
									)");
		$retour=$requete->execute(array(
			':id_fonction'=>$this->id_fonction,
			':libelle_fonct'=>$this->libelle_fonct,
			':abbreviation_fonct'=>$this->abbreviation_fonct
			
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
