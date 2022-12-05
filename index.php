<?php
date_default_timezone_set('Africa/Brazzaville');
require('config.php');
require('model/connectionBDD.php');

require('model/affectation.php');
require('model/authentification.php');
require('model/banque.php');
require('model/campus.php');
require('model/client.php');
require('model/compteGLPI.php');
require('model/conge.php');
require('model/enseigner.php');
require('model/etudiant.php');
require('model/exercer.php');
require('model/facture.php');
require('model/figurer.php');
require('model/fonction.php');
require('model/fournisseur.php');
require('model/grilleSalaire.php');
require('model/groupeUtilisateur.php');
require('model/ligneFacture.php');
require('model/modelDocument.php');
require('model/passer.php');
require('model/pays.php');
require('model/personnel.php');
require('model/presence.php');
require('model/reporting.php');
require('model/salle.php');
require('model/sessionFormation.php');
require('model/service.php');
require('model/testSession.php');
require('model/typeConge.php');
require('model/typeFormation.php');
require('model/typePaiement.php');
require('model/ville.php');
require('model/salaire.php');
require('model/message.php');
require('library/sms.php');

include('controller/editAuthentification.php');
require('model/commentaire.php');
include 'controller/ajoutCommentaire.php';
require('library/dateConverter.php');

session_start();

// include('controller/envoiMessage.php');

/*EXPORT EXCEL*/
require('library/ExportController.php');
include'controller/excelExportGenerate.php';
/*FIN EXPORT EXCEL*/

$page=isset($_GET['c'])?$_GET['c']:'ac';

if(isset($_GET['unCon'])){
	unset($_SESSION['user']);
}


if(isset($_POST['connexion'])){
	$user=new authentification(null,null,null,null,null);
	if($user->getAuthentificationByLogin($_POST['identifiant'])){
		if($user->motDePasse==$_POST['motDePasse']){
			($_SESSION['user']=$user);
			$page='ac';
		}else $infoCon='mot de passe incorrect';
	}else $infoCon='identifiant incorrect';

}

if(isset($_POST['supprimer'])){
	if(supprimer($_POST['idSupprimer'],$_POST['tableSupprimer'])) $info='suppression succed';
}

if(isset($_SESSION['info'])) $info=$_SESSION['info'];
if(isset($_SESSION['infoCon'])) $infoCon=$_SESSION['infoCon'];
if(isset($_SESSION['error'])) $error=$_SESSION['error'];

if(!isset($_SESSION['user'])){
	if($page!='ins') $page=null;
}

switch($page?$page:null){
	case 'ins':
		include('controller/inscription.php');
		break;

	case 'lsf':
		include('controller/listeSessionFormation.php');
		break;

	case 'fsf':
		include('controller/ajoutSessionFormation.php');
		break;

	case 'ajpers':
		include('controller/ajoutPersonnel.php');
		break;

	case 'trb':
		include('controller/trombinoscope.php');
		break;

	case 'pres':
		include('controller/presence.php');
		break;

	case 'lst':
		include('controller/liste.php');
		break;

	case 'lstp':
		include('controller/listePersonnel.php');
		break;

	case 'sms':
		include('controller/envoiMessage.php');
		break;
	case 'stat':
		include('controller/statistique.php');
		break;

	case 'ac':
		include('controller/inscription.php');
		break;

	default:
		include('connexion.php');
		break;
}



?>
