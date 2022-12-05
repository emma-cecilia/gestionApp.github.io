<?php
class Message{
	public $id_message;
	public $id_auteur;
	public $date_envoi;
	public $objet;
	public $contenu;
	public $group_destinataire;
	public $destinataire;

	//la première fonction à déclarer
	public function __construct($id_message=null,$id_auteur=null,$date_envoi=null,$objet=null,$contenu=null,$group_destinataire=null,$destinataire=null){
		$this->id_message=$id_message;
		$this->id_auteur=$id_auteur;
		$this->date_envoi=$date_envoi;
		$this->objet=$objet;
		$this->contenu=$contenu;
		$this->group_destinataire=$group_destinataire;
		$this->destinataire=$destinataire;
	}

	//BDD getter
	public function getMessageById($id=null){
		if(is_null($id)) $id=$this->id_message;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM message WHERE id_message=:id_message");
		$requete->execute(array(':id_message'=>$id));
		$resultat=$requete->fetchObject();

		if(is_object($resultat)){
			$this->id_message=intval($resultat->id_message);
			$this->id_auteur=$resultat->id_auteur;
			$this->date_envoi=$resultat->date_envoi;
			$this->objet=$resultat->objet;
			$this->contenu=$resultat->contenu;
			$this->group_destinataire=$resultat->group_destinataire;
			$this->destinataire=$resultat->destinataire;
		}else{
			$this->id_message=null;
			$this->id_auteur=null;
			$this->date_envoi=null;
			$this->objet=null;
			$this->contenu=null;
			$this->group_destinataire=null;
			$this->destinataire=null;
		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

//BDD modif
	public function setMessageById($id=null){
		if(is_null($id)) $id=$this->id_message;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE message
								SET id_auteur=:id_auteur,
										date_envoi=:date_envoi,
										objet=:objet,
										contenu=:contenu,
										group_destinataire=:group_destinataire,
										destinataire=:destinataire
								WHERE id_message=:id_message");
		$retour=$requete->execute(array(
			':id_message'=>$id,
			':id_auteur'=>$this->id_auteur,
			':date_envoi'=>$this->date_envoi,
			':objet'=>$this->objet,
			':contenu'=>$this->contenu,
			':group_destinataire'=>$this->group_destinataire,
			':destinataire'=>$this->destinataire
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertBanqueInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO message
									VALUES(
									:id_message,
									:id_auteur,
									:date_envoi,
									:objet,
									:contenu,
									:group_destinataire,
									:destinataire
									)");
		$retour=$requete->execute(array(
			':id_message'=>$this->id_message,
			':id_auteur'=>$this->id_auteur,
			':date_envoi'=>$this->date_envoi,
			':objet'=>$this->objet,
			':contenu'=>$this->contenu,
			':group_destinataire'=>$this->group_destinataire,
			':destinataire'=>$this->destinataire
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
?>
