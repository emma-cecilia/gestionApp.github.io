<?php
class Etudiant{
	public $id_etudiant;
	public $nom_etud;
	public $prenom_etud;
	public $email_etud;
	public $tel_etud;
	public $adresse_etud;
	public $ville_test_etud;
	public $date_test_etud;
	public $date_sessionForm_etud;
	public $date_insc_sess_etud;
	public $ville_form_etud;
	public $vague_form_etud;
	public $statut_etud;
	public $date_nais_etud;
	public $lieu_nais_etud;
	public $url_photo_etud;
	public $url_pieceId_etud;
	public $url_actNais_etud;
	public $url_attNivo_etud;
	public $groupeutilisateur_id_groupeutilisateur;
	public $sessionformation_id_sessionformation;
	public $modeldocument_id_modeldocument;

	public $ville_adresse;
	public $tel2_etud;
	public $note_finale;
	public $classe;
	public $commentaire;
	public $note_test;

	public function __construct(
		$id_etudiant=null,
		$nom_etud=null,
		$prenom_etud=null,
		$email_etud=null,
		$tel_etud=null,
		$adresse_etud=null,
		$ville_test_etud=null,
		$date_test_etud=null,
		$date_sessionForm_etud=null,
		$date_insc_sess_etud=null,
		$ville_form_etud=null,
		$vague_form_etud=null,
		$statut_etud=null,
		$date_nais_etud=null,
		$lieu_nais_etud=null,
		$url_photo_etud=null,
		$url_pieceId_etud=null,
		$url_actNais_etud=null,
		$url_attNivo_etud=null,
		$groupeutilisateur_id_groupeutilisateur=null,
		$sessionformation_id_sessionformation=null,
		$modeldocument_id_modeldocument=null,
		
		$ville_adresse=null,
		$tel2_etud=null,
		$note_finale=null,
		$classe=null,
		$commentaire=null,
		$note_test=null
	){
		$this->id_etudiant=$id_etudiant;
		$this->prenom_etud=$prenom_etud;
		$this->nom_etud=$nom_etud;
		$this->email_etud=$email_etud;
		$this->tel_etud=$tel_etud;
		$this->adresse_etud=$adresse_etud;
		$this->ville_test_etud=$ville_test_etud;
		$this->date_test_etud=$date_test_etud;
		$this->date_sessionForm_etud=$date_sessionForm_etud;
		$this->date_insc_sess_etud=$date_insc_sess_etud;
		$this->ville_form_etud=$ville_form_etud;
		$this->vague_form_etud=$vague_form_etud;
		$this->statut_etud=$statut_etud;
		$this->date_nais_etud=$date_nais_etud;
		$this->lieu_nais_etud=$lieu_nais_etud;
		$this->url_photo_etud=$url_photo_etud;
		$this->url_pieceId_etud=$url_pieceId_etud;
		$this->url_actNais_etud=$url_actNais_etud;
		$this->url_attNivo_etud=$url_attNivo_etud;
		$this->groupeutilisateur_id_groupeutilisateur=$groupeutilisateur_id_groupeutilisateur;
		$this->sessionformation_id_sessionformation=$sessionformation_id_sessionformation;
		$this->modeldocument_id_modeldocument=$modeldocument_id_modeldocument;
		
		$this->ville_adresse=$ville_adresse;
		$this->tel2_etud=$tel2_etud;
		$this->note_finale=$note_finale;
		$this->classe=$classe;
		$this->commentaire=$commentaire;
		$this->note_test=$note_test;
	}

//BDD getter
	public function getEtudiantById($id){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("SELECT * FROM etudiant WHERE id_etudiant=:id_etudiant");
		$requete->execute(array(':id_etudiant'=>$id));
		$resultat=$requete->fetchObject();
		
		if(is_object($resultat)){
			$this->id_etudiant=intval($resultat->id_etudiant);
			$this->nom_etud=$resultat->nom_etud;
			$this->prenom_etud=$resultat->prenom_etud;
			$this->email_etud=$resultat->email_etud;
			$this->tel_etud=$resultat->tel_etud;
			$this->adresse_etud=$resultat->adresse_etud;
			$this->ville_test_etud=$resultat->ville_test_etud;
			$this->date_test_etud=$resultat->date_test_etud;
			$this->date_sessionForm_etud=$resultat->date_sessionForm_etud;
			$this->date_insc_sess_etud=$resultat->date_insc_sess_etud;
			$this->ville_form_etud=$resultat->ville_form_etud;
			$this->vague_form_etud=$resultat->vague_form_etud;
			$this->statut_etud=$resultat->statut_etud;
			$this->date_nais_etud=$resultat->date_nais_etud;
			$this->lieu_nais_etud=$resultat->lieu_nais_etud;
			$this->url_photo_etud=$resultat->url_photo_etud;
			$this->url_pieceId_etud=$resultat->url_pieceId_etud;
			$this->url_attNivo_etud=$resultat->url_attNivo_etud;
			$this->groupeutilisateur_id_groupeutilisateur=$resultat->groupeutilisateur_id_groupeutilisateur;
			$this->sessionformation_id_sessionformation=$resultat->sessionformation_id_sessionformation;
			$this->modeldocument_id_modeldocument=$resultat->modeldocument_id_modeldocument;
			
			$this->ville_adresse=$resultat->ville_adresse;
			$this->tel2_etud=$resultat->tel2_etud;
			$this->note_finale=$resultat->note_finale;
			$this->classe=$resultat->classe;
			$this->commentaire=$resultat->commentaire;
			$this->note_test=$resultat->note_test;
		}else{
			$this->id_etudiant=$id;
			$this->nom_etud=null;
			$this->prenom_etud=null;
			$this->email_etud=null;
			$this->tel_etud=null;
			$this->adresse_etud=null;
			$this->ville_test_etud=null;
			$this->date_test_etud=null;
			$this->date_sessionForm_etud=null;
			$this->date_insc_sess_etud=null;
			$this->ville_form_etud=null;
			$this->vague_form_etud=null;
			$this->statut_etud=null;
			$this->date_nais_etud=null;
			$this->lieu_nais_etud=null;
			$this->url_photo_etud=null;
			$this->url_pieceId_etud=null;
			$this->url_attNivo_etud=null;
			$this->groupeutilisateur_id_groupeutilisateur=null;
			$this->sessionformation_id_sessionformation=null;
			$this->modeldocument_id_modeldocument=null;
			
			$this->ville_adresse=null;
			$this->tel2_etud=null;
			$this->note_finale=null;
			$this->classe=null;
			$this->commentaire=null;
			$this->note_test=null;
		}

		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}
	
//BDD modif
	public function setEtudiantById($id){
		if(is_null($id)) $id=$this->id_etudiant;
		$bdd=connectionBDD();
		$requete = $bdd->prepare("UPDATE etudiant
								SET nom_etud=:nom_etud,
								prenom_etud=:prenom_etud,
								email_etud=:email_etud,
								tel_etud=:tel_etud,
								adresse_etud=:adresse_etud,
								ville_test_etud=:ville_test_etud,
								date_test_etud=:date_test_etud,
								date_sessionForm_etud=:date_sessionForm_etud,
								date_insc_sess_etud=:date_insc_sess_etud,
								ville_form_etud=:ville_form_etud,
								vague_form_etud=:vague_form_etud,
								statut_etud=:statut_etud,
								date_nais_etud=:date_nais_etud,
								lieu_nais_etud=:lieu_nais_etud,
								url_photo_etud=:url_photo_etud,
								url_pieceId_etud=:url_pieceId_etud,
								url_actNais_etud=:url_actNais_etud,
								url_attNivo_etud=:url_attNivo_etud,
								groupeutilisateur_id_groupeutilisateur=:groupeutilisateur_id_groupeutilisateur,
								sessionformation_id_sessionformation=:sessionformation_id_sessionformation,
								modeldocument_id_modeldocument=:modeldocument_id_modeldocument,
								
								ville_adresse=:ville_adresse,
								tel2_etud=:tel2_etud,
								note_finale=:note_finale,
								classe=:classe,
								commentaire=:commentaire,
								note_test=:note_test
								WHERE id_etudiant=:id_etudiant");
		$retour=$requete->execute(array(
			':id_etudiant'=>$id,
			':nom_etud'=>$this->nom_etud,
			':prenom_etud'=>$this->prenom_etud,
			':email_etud'=>$this->email_etud,
			':tel_etud'=>$this->tel_etud,
			':adresse_etud'=>$this->adresse_etud,
			':ville_test_etud'=>$this->ville_test_etud,
			':date_test_etud'=>$this->date_test_etud,
			':date_sessionForm_etud'=>$this->date_sessionForm_etud,
			':date_insc_sess_etud'=>$this->date_insc_sess_etud,
			':ville_form_etud'=>$this->ville_form_etud,
			':vague_form_etud'=>$this->vague_form_etud,
			':statut_etud'=>$this->statut_etud,
			':date_nais_etud'=>$this->date_nais_etud,
			':lieu_nais_etud'=>$this->lieu_nais_etud,
			':url_photo_etud'=>$this->url_photo_etud,
			':url_pieceId_etud'=>$this->url_pieceId_etud,
			':url_actNais_etud'=>$this->url_actNais_etud,
			':url_attNivo_etud'=>$this->url_attNivo_etud,
			':groupeutilisateur_id_groupeutilisateur'=>$this->groupeutilisateur_id_groupeutilisateur,
			':sessionformation_id_sessionformation'=>$this->sessionformation_id_sessionformation,
			':modeldocument_id_modeldocument'=>$this->modeldocument_id_modeldocument,
			
			':ville_adresse'=>$this->ville_adresse,
			':tel2_etud'=>$this->tel2_etud,
			':note_finale'=>$this->note_finale,
			':classe'=>$this->classe,
			':commentaire'=>$this->commentaire,
			':note_test'=>$this->note_test
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

	//BDD insert
	public function insertEtudiantInBDD(){
		$bdd=connectionBDD();
		$requete = $bdd->prepare("INSERT INTO `etudiant`(
										`id_etudiant`,
										`nom_etud`,
										`prenom_etud`,
										`email_etud`,
										`tel_etud`,
										`adresse_etud`,
										`ville_test_etud`,
										`date_test_etud`,
										`date_sessionForm_etud`,
										`date_insc_sess_etud`,
										`ville_form_etud`,
										`vague_form_etud`,
										`statut_etud`,
										`date_nais_etud`,
										`lieu_nais_etud`,
										`url_photo_etud`,
										`url_pieceId_etud`,
										`url_actNais_etud`,
										`url_attNivo_etud`,
										`groupeutilisateur_id_groupeutilisateur`,
										`sessionformation_id_sessionformation`,
										`modeldocument_id_modeldocument`,
										`ville_adresse`,
										`tel2_etud`,
										`note_finale`,
										`classe`,
										`commentaire`,
										`note_test`) 
									VALUES (
									:id_etudiant,
									:nom_etud,
									:prenom_etud,
									:email_etud,
									:tel_etud,
									:adresse_etud,
									:ville_test_etud,
									:date_test_etud,
									:date_sessionForm_etud,
									:date_insc_sess_etud,
									:ville_form_etud,
									:vague_form_etud,
									:statut_etud,
									:date_nais_etud,
									:lieu_nais_etud,
									:url_photo_etud,
									:url_pieceId_etud,
									:url_actNais_etud,
									:url_attNivo_etud,
									:groupeutilisateur_id_groupeutilisateur,
									:sessionformation_id_sessionformation,
									:modeldocument_id_modeldocument,
									
									:ville_adresse,
									:tel2_etud,
									:note_finale,
									:classe,
									:commentaire,
									:note_test
									)");
		$retour=$requete->execute(array(
			':id_etudiant'=>$this->id_etudiant,
			':nom_etud'=>$this->nom_etud,
			':prenom_etud'=>$this->prenom_etud,
			':email_etud'=>$this->email_etud,
			':tel_etud'=>$this->tel_etud,
			':adresse_etud'=>$this->adresse_etud,
			':ville_test_etud'=>$this->ville_test_etud,
			':date_test_etud'=>$this->date_test_etud,
			':date_sessionForm_etud'=>$this->date_sessionForm_etud,
			':date_insc_sess_etud'=>$this->date_insc_sess_etud,
			':ville_form_etud'=>$this->ville_form_etud,
			':vague_form_etud'=>$this->vague_form_etud,
			':statut_etud'=>$this->statut_etud,
			':date_nais_etud'=>$this->date_nais_etud,
			':lieu_nais_etud'=>$this->lieu_nais_etud,
			':url_photo_etud'=>$this->url_photo_etud,
			':url_pieceId_etud'=>$this->url_pieceId_etud,
			':url_actNais_etud'=>$this->url_actNais_etud,
			':url_attNivo_etud'=>$this->url_attNivo_etud,
			':groupeutilisateur_id_groupeutilisateur'=>$this->groupeutilisateur_id_groupeutilisateur,
			':sessionformation_id_sessionformation'=>$this->sessionformation_id_sessionformation,
			':modeldocument_id_modeldocument'=>$this->modeldocument_id_modeldocument,
			
			':ville_adresse'=>$this->ville_adresse,
			':tel2_etud'=>$this->tel2_etud,
			':note_finale'=>$this->note_finale,
			':classe'=>$this->classe,
			':commentaire'=>$this->commentaire,
			':note_test'=>$this->note_test
		));
		return $retour;
		//on detruit l'objet connexion ce qui ferme la connexion à la BDD
		unset($bdd);
	}

}
//listing
function listeDesEtudiants(){
	$listeVilles=array();
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT * FROM etudiant WHERE supprimer=0");
	$requete->execute(array(':ordre'=>2));
	$result = $requete->fetchAll(PDO::FETCH_OBJ);
	
	return $result;
}

function setSessionEtudiant($idSess,$idEt){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("UPDATE etudiant
							SET sessionformation_id_sessionformation=$idSess
							WHERE id_etudiant=$idEt");
	$retour=$requete->execute();
	return $retour;
	//on detruit l'objet connexion ce qui ferme la connexion à la BDD
	unset($bdd);
}
?>
