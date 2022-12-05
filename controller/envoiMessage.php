<?php
$listeEt=listeDesEtudiants();
$listePers=listeDuPersonel();
$listeContact = array();
$contact = array();

foreach ($listeEt as $Et) {
	$contact['id']=$Et->id_etudiant;
	$contact['category']='E';
	$contact['campus']=$Et->ville_form_etud;
	$contact['classe']=$Et->sessionformation_id_sessionformation;

	$contact['name']=$Et->nom_etud.' '.$Et->prenom_etud;
	// $contact['tel']=$Et->tel_etud.($Et->tel2_etud?','.$Et->tel2_etud:'');
	$contact['tel']=$Et->tel_etud?$Et->tel_etud:'';

	$listeContact[]=$contact;
}

foreach ($listePers as $Pers) {
	$contact['id']=$Pers->id_personnel;
	$contact['category']=$Pers->id_service;
	$contact['campus']=$Pers->affectation;
	$contact['classe']=null;
	$contact['classes']=personnelClasse($Pers->id_personnel);

	$contact['name']=$Pers->nom_pers.' '.$Pers->prenom_pers;
	// $contact['tel']=$Pers->tel_pers.($Pers->tel2_pers?','.$Pers->tel2_pers:'');
	$contact['tel']=$Pers->tel_pers?$Pers->tel_pers:'';

	$listeContact[]=$contact;
}
if(isset($_POST['envoyerSMS'])){
	if(empty($_POST['smsList'])){
		// echo "<script>alert('aucun contact...!);</script>";
		$error='aucun contact...!';
	}else{
		$date_encours=date("Y-m-d H:i:00");
		// var_dump($date_encours);
		$ateur=$_SESSION['user']?$_SESSION['user']->nom.'('.$_SESSION['user']->statut.')':null;
		$ateurId=$_SESSION['user']?$_SESSION['user']->id_authentication:null;
		// var_dump($ateurId);
		$objet=$_POST['objet']?$_POST['objet']:null;
		// var_dump($objet);
		$date_envoi=$_POST['date_envoi']?$_POST['date_envoi'].' '.$_POST['heure_envoi'].':00':null;
		// var_dump($date_envoi);
		$message=$_POST['message']?$_POST['message']:null;
		// var_dump($message);
		$smsListPost=$_POST['smsList']?defaultNum.','.$_POST['smsList']:null;
		$smsListPost=str_replace("+242","",$smsListPost);
		$all=substr($smsListPost,0,3)==='all'?true:false;
		// var_dump($all);
		$smsListPost=str_replace(" ","",$smsListPost);
		$smsListPost=str_replace("all,","242",$smsListPost);
		$smsListPost=str_replace(",",",242",$smsListPost);
		if(substr($smsListPost,0,3)!=='242') $smsListPost='242'.$smsListPost;
		$smsList=$smsListPost!=='242'?$smsListPost:null;
		// var_dump($smsList);exit;
		$smsListGroup=$all?isset($_POST['smsListGroup'])?$_POST['smsListGroup']:'all':null;
		// var_dump($smsListGroup);
		// $smsList= "242044139964,242069780708,242056481139";
		//Insertion dans la BDD
		$message=new message(null,$ateurId,$date_envoi,$objet,$message,$smsListGroup,$smsList);
		// var_dump($message);exit;
		if($message->insertBanqueInBDD()){
			envoiMessage($message);/*Function d'envoi du message*/
			// 	$_SESSION['info']='message envoyé et enregistré!';
	 		$info='message envoyé et enregistré!';
		}
	}
}
if(isset($_POST['testerSMS']) and !empty($_POST['monNum'])){
	$date_encours=date("Y-m-d H:i:00");
	// var_dump($date_encours);
	$ateur=$_SESSION['user']?$_SESSION['user']->nom.'('.$_SESSION['user']->statut.')':null;
	$ateurId=$_SESSION['user']?$_SESSION['user']->id_authentication:null;
	// var_dump($ateurId);
	$objet=$_POST['objet']?$_POST['objet']:null;
	// $objet=$objet.' -SMStest';
	// var_dump($objet);
	$date_envoi=$_POST['date_envoi']?$_POST['date_envoi'].' '.$_POST['heure_envoi'].':00':null;
	// var_dump($date_envoi);
	$message=$_POST['message']?$_POST['message']:null;
	// var_dump($message);
	$smsListPost=$_POST['monNum']?defaultNum.','.$_POST['monNum']:null;
	$smsListPost=str_replace("+242","",$smsListPost);
	$all=substr($smsListPost,0,3)==='all'?true:false;
	// var_dump($all);
	$smsListPost=str_replace(" ","",$smsListPost);
	$smsListPost=str_replace("all,","242",$smsListPost);
	$smsListPost=str_replace(",",",242",$smsListPost);
	if(substr($smsListPost,0,3)!=='242') $smsListPost='242'.$smsListPost;
	$smsList=$smsListPost!=='242'?$smsListPost:null;
	// var_dump($smsList);
	$smsListGroup=$all?isset($_POST['smsListGroup'])?$_POST['smsListGroup']:'all':null;
	// var_dump($smsListGroup);
	// $smsList= "242044139964,242069780708,242056481139";
	//Insertion dans la BDD
	$message=new message(null,$ateurId,$date_envoi,$objet,$message,$smsListGroup,$smsList);
	// var_dump($message);exit;
if(!$smsList) $error='aucun contact choisit !';
else{
	if($message->insertBanqueInBDD()){
		//envoiMessage($message);/*Function d'envoi du message*/
 	// 	$_SESSION['info']='message envoyé et enregistré!';
 		$info='message envoyé et enregistré!';
	}
}
}

include('view/envoiMessage.php');
?>
