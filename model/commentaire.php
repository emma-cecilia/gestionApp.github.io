<?php
class Commentaire{
	public $id_commentaire;
  public $commentaire;
	public $id_Auteur;
	public $date_com;
	public $id_personnel;
	public $id_etudiant;
	public $id_SessiondeFormation;

	public function __construct($id_commentaire=null,$commentaire=null, $id_Auteur=null, $date_com=null,$id_personnel=null, $id_etudiant=null, $id_SessiondeFormation=null ){
		$this->id_commentaire=$id_commentaire;
		$this->commentaire=$commentaire;
		$this->id_Auteur=$id_Auteur;
	    $this->date_com=$date_com;
		$this->id_personnel=$id_personnel;
		$this->id_etudiant=$id_etudiant;
		$this->id_SessiondeFormation=$id_SessiondeFormation;
	}

	//BDD insert
	public function commentaireInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO `commentaire`(`id_commentaire`, `commentaire`, `id_Auteur`, `date_com`, `id_personnel`, `id_etudiant`, `id_SessiondeFormation`)
									VALUES(
										:id_commentaire,
										:commentaire,
										:id_Auteur,
										:date_com,
										:id_personnel,
										:id_etudiant,
										:id_SessiondeFormation
									)");
		$retour=$requete->execute(array(
			':id_commentaire'=>$this->id_commentaire,
			':commentaire'=>$this->commentaire,
			':id_Auteur'=>$this->id_Auteur,
			':date_com'=>$this->date_com,
			':id_personnel'=>$this->id_personnel,
			':id_etudiant'=>$this->id_etudiant,
			':id_SessiondeFormation'=>$this->id_SessiondeFormation
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

//BDD getter
	public function getCommentaireById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM commentaire WHERE id_commentaire=:id_commentaire");
		$requete->execute(array(':id_commentaire'=>$id));
		$resultat=$requete->fetchObject();
		if(is_object($resultat)){
			$this->id_commentaire=intval($resultat->id_commentaire);
			$this->commentaire=$resultat->commentaire;
			$this->id_Auteur=$resultat->id_Auteur;
			$this->date_com=$resultat->date_com;
			$this->id_personnel=$resultat->id_personnel;
			$this->id_etudiant=$resultat->id_etudiant;
			$this->id_SessiondeFormation=$resultat->id_SessiondeFormation;


		}else{
			$this->id_commentaire=null;
			$this->commentaire=null;
			$this->id_Auteur=null;
			$this->date_com=null;
			$this->id_personnel=null;
			$this->id_etudiant=null;
			$this->id_SessiondeFormation=null;
		}


		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

//BDD modif
	public function setcommentaireById($id){
		//if(is_null($id)) $id=$this->id_commentaire;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE commentaire
								SET commentaire=:commentaire,
									id_Auteur=:id_Auteur,
									date_com=:date_com,
									id_personnel=:id_personnel,
									id_etudiant=:id_etudiant,
									id_SessiondeFormation=:id_SessiondeFormation

								WHERE id_commentaire=:id_commentaire");
		$retour=$requete->execute(array(
			':id_commentaire'=>$this->id_commentaire,
			':commentaire'=>$this->commentaire,
			':id_Auteur'=>$this->id_Auteur,
			':date_com'=>$this->date_com,
			':id_personnel'=>$this->id_personnel,
			':id_etudiant'=>$this->id_etudiant,
			':id_SessiondeFormation'=>$this->id_SessiondeFormation
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
        unset($bdd);
	}



}
function listeCommentaireFormation($id){
	// $listeCommentaire=array();
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM commentaire WHERE id_SessiondeFormation=$id ORDER BY date_com");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);

	return $result;
}
function listeCommentairePersonnel($id){
	// $listeCommentaire=array();
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM commentaire WHERE id_personnel=$id ORDER BY date_com");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);

	return $result;
}

function listeCommentaireEtudiant($id){
	// $listeCommentaire=array();
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM commentaire WHERE id_etudiant=$id ORDER BY date_com");
	$requete->execute();
	$result = $requete->fetchAll(PDO::FETCH_OBJ);

	return $result;
}

 ?>
