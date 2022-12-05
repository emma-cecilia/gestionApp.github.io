<?php
class authentification{
	public $id_authentication;
	public $nom;
	public $statut;
	public $identifiant;
	public $motDePasse;

	public function __construct(
		$id_authentication,
		$nom,
		$statut,
		$identifiant,
		$motDePasse
	){
		$this->id_authentication=$id_authentication;
		$this->nom=$nom;
		$this->statut=$statut;
		$this->identifiant=$identifiant;
		$this->motDePasse=$motDePasse;

	}

//BDD getter
	public function getAuthentificationById($id){
		if(is_null($id)) $id=$this->id_authentication;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM authentification WHERE id_authentication=:id_authentication");
		$requete->execute(array(':id_authentication'=>$id));
		$resultat=$requete->fetchObject();

		if(is_object($resultat)){
			$this->id_authentication=intval($resultat->id_authentication);
			$this->nom=$resultat->nom;
			$this->statut=$resultat->statut;
			$this->identifiant=$resultat->identifiant;
			$this->motDePasse=$resultat->motDePasse;

		}else{
			$this->id_authentication=null;
			$this->nom=null;
			$this->statut=null;
			$this->identifiant=null;
			$this->motDePasse=null;

		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	public function getAuthentificationByLogin($login){
		if(is_null($login)) $login=$this->identifiant;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM authentification WHERE identifiant=:login");
		$requete->execute(array(':login'=>$login));
		$resultat=$requete->fetchObject();

		if(is_object($resultat)){
			$this->id_authentication=$resultat->id_authentication;
			$this->nom=$resultat->nom;
			$this->statut=$resultat->statut;
			$this->identifiant=$resultat->identifiant;
			$this->motDePasse=$resultat->motDePasse;
			return true;

		}else{
			$this->id_authentication=null;
			$this->nom=null;
			$this->statut=null;
			$this->identifiant=null;
			$this->motDePasse=null;
			return false;

		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

//BDD modif
	public function setAuthentificationById($id){
		if(is_null($id)) $id=$this->id_authentication;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE authentification
								SET nom=:nom,
								statut=:statut,
								identifiant=:identifiant,
								motDePasse=:motDePasse
								WHERE id_authentication=:id_authentication");
		$retour=$requete->execute(array(
			':id_authentication'=>$id,
			':nom'=>$this->nom,
			':statut'=>$this->statut,
			':identifiant'=>$this->identifiant,
			':motDePasse'=>$this->motDePasse

		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertAuthentificationInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO `authentification`(`id_authentication`, `nom`, `statut`, `identifiant`, `motDePasse`)
									VALUES (
									:id_authentication,
									:nom,
									:statut,
									:identifiant,
									:motDePasse

									)");
		$retour=$requete->execute(array(
			':id_authentication'=>$this->id_authentication,
			':nom'=>$this->nom,
			':prenom'=>$this->prenom,
			':statut'=>$this->statut,
			':identifiant'=>$this->identifiant,
			':motDePasse'=>$this->motDePasse

		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
//listing
function listeDesAuthentification(){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM authentification");
	$requete->execute(array(':ordre'=>2));
	$result = $requete->fetchAll(PDO::FETCH_OBJ);

	return $result;
}

function listeDesIdentifiants($id){
	$listeDesIdentifiants=array();
	$bdd=connectionBDD();
	if($id){
		$requete = $bdd->prepare("SELECT identifiant FROM authentification WHERE NOT `id_authentication`=:id");
		$requete->execute(array(':id'=>$id));
	}
	else{
		$requete = $bdd->prepare("SELECT identifiant FROM authentification");
		$requete->execute();
	}
	$result = $requete->fetchAll(PDO::FETCH_OBJ);
	foreach($result as $el){
		$listeDesIdentifiants[]=$el->identifiant;
	}
	return $listeDesIdentifiants;
}
?>
