<?php
class GrilleSalaire{
	public $id_grilleSalaire;
	public $libelle_cat;
	public $salaire_brut;
	

	public function __construct($id_grilleSalaire,$libelle_cat, $salaire_brut){
		$this->id_grilleSalaire=$id_grilleSalaire;
		$this->libelle_cat=$libelle_cat;
		$this->salaire_brut=$salaire_brut;
		

	}

//BDD getter
	public function getGrilleSalaireById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM grilleSalaire WHERE id_grilleSalaire=:id_grilleSalaire");
		$requete->execute(array(':id_grilleSalaire'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_grilleSalaire=intval($resultat->id_grilleSalaire);
			$this->libelle_cat=$resultat->libelle_cat;
			$this->salaire_brut=$resultat->salaire_brut;
		}else{
			$this->id_grilleSalaire=null;
			$this->libelle_cat=null;
			$this->salaire_brut=null;
		}
		
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setGrilleSalaireId($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE GrilleSalaire
								SET libelle_cat=:libelle_cat,
									salaire_brut=:salaire_brut
									
								WHERE id_grilleSalaire=:id_grilleSalaire");
		$retour=$requete->execute(array(
			':id_grilleSalaire'=>$id,
			':libelle_cat'=>$this->libelle_cat,
			':salaire_brut'=>$this->salaire_brut
			
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertGrilleSalaireInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO GrilleSalaire
									VALUES(
									:id_grilleSalaire,
									:libelle_cat,
									:salaire_brut,
									
									
									)");
		$retour=$requete->execute(array(
			':id_grilleSalaire'=>$this->id_grilleSalaire,
			':libelle_cat'=>$this->libelle_cat,
			':salaire_brut'=>$this->salaire_brut
			
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
