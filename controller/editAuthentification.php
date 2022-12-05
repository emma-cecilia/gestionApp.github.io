<?php
if(isset($_POST['ajouterUser'])){
	$authentification= new authentification(
		NULL,
		$_POST['nom'],
		$_POST['statut'],
		$_POST['identifiant'],
		$_POST['motDePasse']
	);
	// var_dump($fonction);exit;
	($authentification->insertAuthentificationInBDD());
	$authentification= new authentification(null,null,null,null,null,null);
}

if(isset($_POST['modifierUser'])){
	$newAuthentification= new authentification(
		$_POST['id_authentication'],
		$_POST['nom'],
		$_POST['statut'],
		$_POST['identifiant'],
		$_POST['motDePasse']
	);
	// var_dump($newAuthentification);
	if(!in_array($_POST['identifiant'], listeDesIdentifiants($_POST['id_authentication']))){
		if($newAuthentification->setAuthentificationById(null)) {
			// $_SESSION['infoCon']='utilisateur modifié veuillez vous reconnecter pour prendre en compte les modification!';
			// $_SESSION['info']='utilisateur modifié veuillez vous deconnecter pour prendre en compte les modification!';
			$infoCon='utilisateur modifié veuillez vous reconnecter pour prendre en compte les modification!';
			$info='utilisateur modifié veuillez vous deconnecter pour prendre en compte les modification!';
			// echo'<script>alert("deconnecter vous, pour prendre en compte les modification!");</script>';
		}
		else{
			echo'<script>alert("Erreur Modification Utilisateur");</script>';
			// $_SESSION['error']='Erreur Modification Utilisateur !';
			$error='Erreur Modification Utilisateur !';
		}
	}
	else{
			// $_SESSION['error']='Erreur Modification Utilisateur : cette identifiant est déjà utilisé !';
			$error='Erreur Modification Utilisateur : cette identifiant est déjà utilisé !';
			// echo'<script>alert("Erreur: cette identifiant est déjà utilisé!");</script>';
		}
}
?>
