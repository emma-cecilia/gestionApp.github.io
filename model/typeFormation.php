<?php
class TypeFormation{
	public $id_typeFormation;
	public $libelle_typForm;
	public $prix_typForm;
	

	public function __construct($id_typeFormation,$libelle_typForm, $prix_typForm){
		$this->id_typeFormation=$id_typeFormation;
		$this->libelle_typForm=$libelle_typForm;
		$this->prix_typForm=$prix_typForm;
		

	}

//BDD getter
	public function getTypeFormationById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM typeformation WHERE id_typeFormation=:id_typeFormation");
		$requete->execute(array(':id_typeFormation'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_typeFormation=intval($resultat->id_typeFormation);
			$this->libelle_typForm=$resultat->libelle_typForm;
			$this->prix_typForm=$resultat->prix_typForm;
		}else{
			$this->id_typeFormation=null;
			$this->libelle_typForm=null;
			$this->prix_typForm=null;
		}
		$this->id_typeFormation=intval($resultat->id_typeFormation);
		$this->libelle_typForm=$resultat->libelle_typForm;
		$this->prix_typForm=$resultat->prix_typForm;
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setGrilleSalaireId($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE typeformation
								SET libelle_typForm=:libelle_typForm,
									prix_typForm=:prix_typForm
									
								WHERE id_typeFormation=:id_typeFormation");
		$retour=$requete->execute(array(
			':id_typeFormation'=>$id,
			':libelle_typForm'=>$this->libelle_typForm,
			':prix_typForm'=>$this->prix_typForm
			
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertGrilleSalaireInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO typeformation
									VALUES(
									:id_typeFormation,
									:prix_typForm,
									:libelle_typForm
									)");
		$retour=$requete->execute(array(
			':id_typeFormation'=>$this->id_typeFormation,
			':prix_typForm'=>$this->prix_typForm,
			':libelle_typForm'=>$this->libelle_typForm
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
function listeDesTypeFormation(){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM typeformation ");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);
	
	return $result;
}
function TypeFormationInfo($id){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM typeformation WHERE id_typeFormation=$id");
	$requete->execute();
	$result = $requete->fetchObject();
	if(!is_object($result)) return null;
	return $result->libelle_typForm.' ('.$result->prix_typForm.')';
}
?>
