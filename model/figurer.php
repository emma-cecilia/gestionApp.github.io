<?php
class Figurer{
	public $id_figurer;
	public $id_presence;
	public $id_personnel;

	public function __construct($id_figurer,$id_presence, $id_personnel){
		$this->id_figurer=$id_figurer;
		$this->id_presence=$id_presence;
		$this->id_personnel=$id_personnel;
	}

//BDD getter
	public function getFigurerById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM figurer WHERE id_figurer=:id_figurer");
		$requete->execute(array(':id_figurer'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_figurer=intval($resultat->id_figurer);
			$this->id_presence=$resultat->id_presence;
			$this->id_personnel=$resultat->id_personnel;
		}else{
			$this->id_figurer=null;
			$this->id_presence=null;
			$this->id_personnel=null;
		}
		

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setFigurerById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE figurer
								SET id_personnel=:id_personnel,
									id_presence=:id_presence
								WHERE id_figurer=:id_figurer");
		$retour=$requete->execute(array(
			':id_figurer'=>$id,
			':id_presence'=>$this->id_presence,
			':id_personnel'=>$this->id_personnel
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertFigurerInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO figurer
									VALUES(
									:id_figurer,
									:id_presence,
									:id_personnel
									)");
		$retour=$requete->execute(array(
			':id_figurer'=>$this->id_figurer,
			':id_presence'=>$this->id_presence,
			':id_personnel'=>$this->id_personnel
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
