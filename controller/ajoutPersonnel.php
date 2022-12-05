<?php
/*EDITION */
if(isset($_POST['ajouterPersonnel'])){
	$personnel =new Personnel(
		NULL,
		isset($_POST['nom_personnel'])?$_POST['nom_personnel']:null,
		isset($_POST['prenom_personnel'])?$_POST['prenom_personnel']:null,
		isset($_POST['email_personnel'])?$_POST['email_personnel']:null,
		isset($_POST['tel_personnel'])?$_POST['tel_personnel']:null,
		isset($_POST['adresse_personnel'])?$_POST['adresse_personnel']:null,
		isset($_POST['date_nais_personnel'])?$_POST['date_nais_personnel']:null,
		isset($_POST['lieu_nais_personnel'])?$_POST['lieu_nais_personnel']:null,
		isset($_POST['matricule_personnel'])?$_POST['matricule_personnel']:null,
		isset($_POST['nombreEnfants_personnel'])?intval($_POST['nombreEnfants_personnel']):null,
		$_POST['numRIB_personnel'],
		$_POST['id_groupeUtilisateur']=null,
		$_POST['affectation_personnel'],
		$_POST['service_personnel'],
		$_POST['banque_personnel']=null,
		$_POST['compteglpi_personnel']=null,
		
		$_POST['tel2_personnel'],
		$_POST['ville_adresse']
	);
	// var_dump($personnel);
	if($personnel->insertPersonnelInBDD())
	{
		$_SESSION['info']='ajout personnel succed';
		header('Location: ?c=lstp');
	}
}

if(isset($_POST['modifierPersonnel'])){
	$newPersonnel= new Personnel(
		$_POST['id_personnel'],
		$_POST['nom_personnel'],
		$_POST['prenom_personnel'],
		$_POST['email_personnel'],
		$_POST['tel_personnel'],
		$_POST['adresse_personnel'],
		$_POST['date_nais_personnel'],
		$_POST['lieu_nais_personnel'],
		$_POST['matricule_personnel'],
		$_POST['nombreEnfants_personnel'],
		$_POST['numRIB_personnel'],
		$_POST['id_groupeUtilisateur']=null,
		$_POST['affectation_personnel'],
		$_POST['service_personnel'],
		$_POST['banque_personnel']=null,
		$_POST['compteglpi_personnel']=null,
		
		$_POST['tel2_personnel'],
		$_POST['ville_adresse']
	);

	// var_dump($newPersonnel);exit;
	if($newPersonnel->setPersonnelById(null))
	{
		$_SESSION['info']='modification personnel succed';
		header('Location: ?c=lstp');
	}
	// var_dump($newPersonnel->setPersonnelById(null));exit;
	$personnel= new Personnel(null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null);

}
/*EDITION FIN*/
if(isset($_GET['id'])){
	$lePersonnel= new Personnel(null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
	$lePersonnel->getPersonnelById($_GET['id']?$_GET['id']:null);
	// var_dump($lePersonnel);exit;
}
include('view/ajoutPersonnel.php');
?>