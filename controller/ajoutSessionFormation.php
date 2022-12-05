<?php
if(isset($_GET['id']) and !empty($_GET['id'])){
	$laSessionFormation= new SessionFormation(null,null,null,null,null,null,null,null);
	$laSessionFormation->getSessionFormationById($_GET['id']?$_GET['id']:null);
	$listeDesInscrits='all';
	foreach(listeEtudiantSession($_GET['id']) as $etS){
		$listeDesInscrits.=','.$etS->id_etudiant;
	}
	// var_dump($laSessionFormation);exit;
}
/*EDITION*/
if(isset($_POST['ajouterSessionFormation'])){
	if($_POST['id1_formateur']!=$_POST['id2_formateur']){
		$sessionFormation =new SessionFormation(
			NULL,
			$_POST['date_debut'],
			$_POST['date_fin'],
			$_POST['id1_formateur'],
			$_POST['id2_formateur'],
			$_POST['id_campus'],
			$_POST['id_typeFormation'],
			$_POST['classe']
		);
		$inscrits=explode(',',$_POST['inscriptionList']);
		if($inscrits[0]==='all') unset($inscrits[0]);
		if($sessionFormation->insertSessionFormationInBDD()) $_SESSION['info']="ajout Session de formation succred!";
		$idSession=lastId('sessionformation');
		// var_dump($idSession);exit;
		foreach($inscrits as $idEt){
			(setSessionEtudiant($idSession,$idEt));
		}
		// exit;
	}else{$_SESSION['error']="les formateurs doivent être différents";}
	header('Location: ?c=lsf');
}

if(isset($_POST['modifierSessionFormation'])){
	if($_POST['id1_formateur']!=$_POST['id2_formateur']){
		($newSessionFormation= new SessionFormation(
			$_POST['id_sessionFormation'],
			$_POST['date_debut'],
			$_POST['date_fin'],
			$_POST['id1_formateur'],
			$_POST['id2_formateur'],
			$laSessionFormation->id_campus,
			$laSessionFormation->id_typeFormation,
			$_POST['classe']
		));
		foreach(listeEtudiantSession($_GET['id']) as $etS){
			// $listeDesInscrits.=','.$etS->id_etudiant;
			$bdd=connectionBDD();
			$requete = $bdd->prepare("UPDATE etudiant SET sessionformation_id_sessionformation=NULL	WHERE id_etudiant=:id");
			($retour=$requete->execute(array(':id'=>$etS->id_etudiant)));
		}
		$inscrits=explode(',',$_POST['inscriptionList']);
		if($inscrits[0]==='all') unset($inscrits[0]);
		if($newSessionFormation->setSessionFormationById(null)) $_SESSION['info']="modification Session de formation succed!";
		$idSession=$newSessionFormation->id_sessionFormation;
		foreach($inscrits as $idEt){
			(setSessionEtudiant($idSession,$idEt));
		}
	}else{$_SESSION['error']="les formateurs doivent être différents";}
	header('Location: ?c=lsf');

}
/*EDITION FIN*/
include('view/ajoutSessionFormation.php');
?>