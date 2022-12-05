<?php
class ModelDocument{
	public $id_modelDocument;
	public $num_Ref_MD;
	public $libelle_MD;
	

	public function __construct($id_modelDocument,$num_Ref_MD, $libelle_MD){
		$this->id_modelDocument=$id_modelDocument;
		$this->num_Ref_MD=$num_Ref_MD;
		$this->libelle_MD=$libelle_MD;
	}

//BDD getter
	public function getModelDocumentById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM ModelDocument WHERE id_modelDocument=:id_modelDocument");
		$requete->execute(array(':id_grilleSalaire'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_modelDocument=intval($resultat->id_modelDocument);
			$this->num_Ref_MD=$resultat->num_Ref_MD;
			$this->libelle_MD=$resultat->libelle_MD;
		}else{
			$this->id_modelDocument=null;
			$this->num_Ref_MD=null;
			$this->libelle_MD=null;
		}
		$this->id_modelDocument=intval($resultat->id_modelDocument);
		$this->num_Ref_MD=$resultat->num_Ref_MD;
		$this->libelle_MD=$resultat->libelle_MD;
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setModelDocumentId($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE modelDocument
								SET num_Ref_MD=:num_Ref_MD,
									libelle_MD=:libelle_MD
									
								WHERE id_modelDocument=:id_modelDocument");
		$retour=$requete->execute(array(
			':id_modelDocument'=>$id,
			':num_Ref_MD'=>$this->num_Ref_MD,
			':libelle_MD'=>$this->libelle_MD
			
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertModelDocumentInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO modelDocument
									VALUES(
									:id_modelDocument,
									:num_Ref_MD,
									:libelle_MD
								
									
									)");
		$retour=$requete->execute(array(
			':id_modelDocument'=>$this->id_modelDocument,
			':num_Ref_MD'=>$this->num_Ref_MD,
			':libelle_MD'=>$this->libelle_MD
			
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
