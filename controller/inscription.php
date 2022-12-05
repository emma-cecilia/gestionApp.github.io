<?php
$defaultStatut='préinscription';

/*EDITION*/
if(isset($_POST['ajouterEtudiant'])){
	$etudiant= new Etudiant(
		null,
		isset($_POST['nom_etudiant'])?($_POST['nom_etudiant']):null,
		isset($_POST['prenom_etudiant'])?($_POST['prenom_etudiant']):null,
		isset($_POST['email_etudiant'])?($_POST['email_etudiant']):null,
		isset($_POST['tel_etudiant'])?($_POST['tel_etudiant']):null,
		isset($_POST['adresse_etudiant'])?($_POST['adresse_etudiant']):null,
		isset($_POST['ville_test_etudiant'])?($_POST['ville_test_etudiant']):null,
		isset($_POST['date_test_etudiant'])&&!empty($_POST['date_test_etudiant'])?($_POST['date_test_etudiant']):null,
		isset($_POST['date_sessionForm_etudiant'])&&!empty($_POST['date_sessionForm_etudiant'])?($_POST['date_sessionForm_etudiant']):null,
		isset($_POST['date_insc_sess_etudiant'])&&!empty($_POST['date_insc_sess_etudiant'])?($_POST['date_insc_sess_etudiant']):null,
		isset($_POST['ville_form_etudiant'])?($_POST['ville_form_etudiant']):null,
		isset($_POST['vague_form_etudiant'])?($_POST['vague_form_etudiant']):null,
		isset($_POST['statut_etudiant'])?($_POST['statut_etudiant']):$defaultStatut,
		isset($_POST['date_nais_etudiant'])&&!empty($_POST['date_nais_etudiant'])?($_POST['date_nais_etudiant']):null,
		isset($_POST['lieu_nais_etudiant'])?($_POST['lieu_nais_etudiant']):null,
		isset($_POST['url_photo_etudiant'])?($_POST['url_photo_etudiant']):null,
		isset($_POST['url_pieceId_etudiant'])?($_POST['url_pieceId_etudiant']):null,
		isset($_POST['url_actNais_etudiant'])?($_POST['url_actNais_etudiant']):null,
		isset($_POST['url_attNivo_etudiant'])?($_POST['url_attNivo_etudiant']):null,
		isset($_POST['groupeutilisateur_id_groupeutilisateur'])?($_POST['groupeutilisateur_id_groupeutilisateur']):null,
		(isset($_POST['sessionformation_id_sessionformation']) && $_POST['sessionformation_id_sessionformation']!='')?($_POST['sessionformation_id_sessionformation']):null,
		isset($_POST['modeldocument_id_modeldocument'])?($_POST['modeldocument_id_modeldocument']):null,
		
		isset($_POST['ville_adresse'])?($_POST['ville_adresse']):null,
		isset($_POST['tel2_etudiant'])?($_POST['tel2_etudiant']):null,
		($_POST['note_finale']!='')?($_POST['note_finale']):null,
		isset($_POST['classe'])?($_POST['classe']):null,
		isset($_POST['commentaire'])?($_POST['commentaire']):null,
		($_POST['note_test']!='')?($_POST['note_test']):null
	);
	// var_dump($etudiant);
	if($etudiant->insertEtudiantInBDD())
	{
		$_SESSION['info']='Etudiant ajouté!';
		if(isset($_SESSION['user'])) header('Location: ?c=lst');
		else $info='Etudiant ajouté dans la liste d\'attente';		
	}
	// exit;
}

if(isset($_POST['modifierEtudiant'])){
	$newEtudiant= new Etudiant(
		isset($_POST['id_etudiant'])?($_POST['id_etudiant']):null,
		isset($_POST['nom_etudiant'])?($_POST['nom_etudiant']):null,
		isset($_POST['prenom_etudiant'])?($_POST['prenom_etudiant']):null,
		isset($_POST['email_etudiant'])?($_POST['email_etudiant']):null,
		isset($_POST['tel_etudiant'])?($_POST['tel_etudiant']):null,
		isset($_POST['adresse_etudiant'])?($_POST['adresse_etudiant']):null,
		isset($_POST['ville_test_etudiant'])?($_POST['ville_test_etudiant']):null,
		isset($_POST['date_test_etudiant'])&&!empty($_POST['date_test_etudiant'])?($_POST['date_test_etudiant']):null,
		isset($_POST['date_sessionForm_etudiant'])&&!empty($_POST['date_sessionForm_etudiant'])?($_POST['date_sessionForm_etudiant']):null,
		isset($_POST['date_insc_sess_etudiant'])&&!empty($_POST['date_insc_sess_etudiant'])?($_POST['date_insc_sess_etudiant']):null,
		isset($_POST['ville_form_etudiant'])?($_POST['ville_form_etudiant']):null,
		isset($_POST['vague_form_etudiant'])?($_POST['vague_form_etudiant']):null,
		isset($_POST['statut_etudiant'])?($_POST['statut_etudiant']):null,
		isset($_POST['date_nais_etudiant'])&&!empty($_POST['date_nais_etudiant'])?($_POST['date_nais_etudiant']):null,
		isset($_POST['lieu_nais_etudiant'])?($_POST['lieu_nais_etudiant']):null,
		isset($_POST['url_photo_etudiant'])?($_POST['url_photo_etudiant']):null,
		isset($_POST['url_pieceId_etudiant'])?($_POST['url_pieceId_etudiant']):null,
		isset($_POST['url_actNais_etudiant'])?($_POST['url_actNais_etudiant']):null,
		isset($_POST['url_attNivo_etudiant'])?($_POST['url_attNivo_etudiant']):null,
		isset($_POST['groupeutilisateur_id_groupeutilisateur'])?($_POST['groupeutilisateur_id_groupeutilisateur']):null,
		($_POST['sessionformation_id_sessionformation']!='')?($_POST['sessionformation_id_sessionformation']):null,
		isset($_POST['modeldocument_id_modeldocument'])?($_POST['modeldocument_id_modeldocument']):null,
		
		isset($_POST['ville_adresse'])?($_POST['ville_adresse']):null,
		isset($_POST['tel2_etudiant'])?($_POST['tel2_etudiant']):null,
		($_POST['note_finale']!='')?($_POST['note_finale']):null,
		isset($_POST['classe'])?($_POST['classe']):null,
		isset($_POST['commentaire'])?($_POST['commentaire']):null,
		($_POST['commentaire']!='')?($_POST['commentaire']):null
	);
	// var_dump($newEtudiant);
	if($newEtudiant->setEtudiantById(null))
	{
		$_SESSION['info']='modif succed';
		header('Location: ?c=lst');
	}
	// exit;
	$newEtudiant= new Etudiant(null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,NULL,NULL,NULL,NULL,NULL);
}
/*EDITION FIN*/

if(isset($_GET['id'])){
	$lEtudiant= new Etudiant(null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,NULL,NULL,NULL,NULL,NULL);
	$lEtudiant->getEtudiantById($_GET['id']?$_GET['id']:null);
	// var_dump($lEtudiant);exit;
}
include('view/inscription.php');
?>