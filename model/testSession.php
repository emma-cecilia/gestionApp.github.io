<?php
class TestSession{
	public $id_testSession;
	public $Type_test;
	public $date_debut_test;
	public $date_fin_test;
	public $nbr_candidat;

	public function __construct($id_testSession,$Type_test, $date_debut_test, $date_fin_test, $nbr_candidat){
		$this->id_testSession=$id_testSession;
		$this->Type_test=$Type_test;
		$this->date_debut_test=$date_debut_test;
		$this->date_fin_test=$date_fin_test;
		$this->nbr_candidat=$nbr_candidat;

	}

//BDD getter
	public function getTestSessionById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM testSession WHERE id_testSession=:id_testSession");
		$requete->execute(array(':id_testSession'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_testSession=intval($resultat->id_testSession);
			$this->Type_test=$resultat->Type_test;
			$this->date_debut_test=$resultat->date_debut_test;
			$this->date_fin_test=$resultat->date_fin_test;
			$this->nbr_candidat=$resultat->nbr_candidat;
		}else{
			$this->id_testSession=null;
			$this->Type_test=null;
			$this->date_debut_test=null;
			$this->date_fin_test=null;
			$this->nbr_candidat=null;
		
		}
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setTestSessionById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE testSession
								SET date_debut_test=:date_debut_test,
									Type_test=:Type_test,
									date_fin_test=:date_fin_test,
									nbr_candidat=:nbr_candidat
								WHERE id_testSession=:id_testSession");
		$retour=$requete->execute(array(
			':id_testSession'=>$id,
			':Type_test'=>$this->Type_test,
			':date_debut_test'=>$this->date_debut_test,
			':date_fin_test'=>$this->date_fin_test,
			':nbr_candidat'=>$this->nbr_candidat
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertTestSessionInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO testSession
									VALUES(
									:id_testSession,
									:Type_test,
									:date_debut_test,
									:date_fin_test,
									:nbr_candidat
									)");
		$retour=$requete->execute(array(
			':id_testSession'=>$this->id_testSession,
			':Type_test'=>$this->Type_test,
			':date_debut_test'=>$this->date_debut_test,
			':date_fin_test'=>$this->date_fin_test,
			':nbr_candidat'=>$this->nbr_candidat
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
