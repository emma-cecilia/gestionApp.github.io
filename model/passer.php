<?php
class Passer{
	public $id_passer;
	public $id_etudiant;
	public $result_test_etud;

	public function __construct($id_passer,$id_etudiant, $result_test_etud){
		$this->id_passer=$id_passer;
		$this->id_etudiant=$id_etudiant;
		$this->result_test_etud=$result_test_etud;
	}

//BDD getter
	public function getPasserById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM passer WHERE id_passer=:id_passer");
		$requete->execute(array(':id_passer'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_passer=intval($resultat->id_passer);
			$this->id_etudiant=$resultat->id_etudiant;
			$this->result_test_etud=$resultat->result_test_etud;
		}else{
			$this->id_passer=null;
			$this->id_etudiant=null;
			$this->result_test_etud=null;
		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setPasserById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE passer
								SET result_test_etud=:result_test_etud,
									id_etudiant=:id_etudiant
								WHERE id_passer=:id_passer");
		$retour=$requete->execute(array(
			':id_passer'=>$id,
			':id_etudiant'=>$this->id_etudiant,
			':result_test_etud'=>$this->result_test_etud
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertPasserInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO passer
									VALUES(
									:id_passer,
									:id_etudiant,
									:result_test_etud
									)");
		$retour=$requete->execute(array(
			':id_passer'=>$this->id_passer,
			':id_etudiant'=>$this->id_etudiant,
			':result_test_etud'=>$this->result_test_etud
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
