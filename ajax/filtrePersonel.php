 <?php
  date_default_timezone_set('Africa/Brazzaville');
require('../config.php');
require('../model/connectionBDD.php');

require('../model/affectation.php');
require('../model/authentification.php');
require('../model/banque.php');
require('../model/campus.php');
require('../model/client.php');
require('../model/compteGLPI.php');
require('../model/conge.php');
require('../model/enseigner.php');
require('../model/etudiant.php');
require('../model/exercer.php');
require('../model/facture.php');
require('../model/figurer.php');
require('../model/fonction.php');
require('../model/fournisseur.php');
require('../model/grilleSalaire.php');
require('../model/groupeUtilisateur.php');
require('../model/ligneFacture.php');
require('../model/modelDocument.php');
require('../model/passer.php');
require('../model/pays.php');
require('../model/personnel.php');
require('../model/presence.php');
require('../model/reporting.php');
require('../model/salle.php');
require('../model/sessionFormation.php');
require('../model/service.php');
require('../model/testSession.php');
require('../model/typeConge.php');
require('../model/typeFormation.php');
require('../model/typePaiement.php');
require('../model/ville.php');
require('../model/salaire.php');
require('../model/commentaire.php');

// get the id parameter from URL
$filtre = explode(',',$_REQUEST["send"]);
$Sfiltre=$Afiltre=array();
foreach($filtre as $element){
($SF=strrchr($element,'S')?substr(strrchr($element,'S'), 1):null);
if($SF) $Sfiltre[]=$SF;
($AF=strrchr($element,'A')?substr(strrchr($element,'A'), 1):null);
if($AF) $Afiltre[]=$AF;
}
// var_dump($Sfiltre);
// var_dump($Afiltre);
($liste=listeDuPersonel());

$newListe = array();
	if ($Sfiltre && $Afiltre) {
		foreach($liste as $element) {
			$service=$element->id_service;
			$affectation=$element->affectation;
		if(in_array($service, $Sfiltre) && in_array($affectation, $Afiltre)) $newListe[]=$element;

		}
	}
	elseif($Sfiltre) {
		$newListe = array();
		foreach($liste as $element) {
			$service=$element->id_service;
		if(in_array($service, $Sfiltre)) $newListe[]=$element;

		}
	}
	elseif($Afiltre) {
		$newListe = array();
		foreach($liste as $element) {
			$affectation=$element->affectation;
		if(in_array($affectation, $Afiltre)) $newListe[]=$element;

		}
	}
if($newListe || $filtre[0]!='null') $liste=$newListe;
?>
<table class="table dtable table-striped">
<thead>
<tr>
	<th>Service</th>
	<th>affectation</th>
	<th>matricule</th>
	<th>nom et prenom</th>
	<th>téléphone</th>
	<th>email</th>
	<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($liste as $element):
  $nbrComment=count(listeCommentairePersonnel($element->id_personnel));
?>
<tr>
	<td><?php echo serviceName($element->id_service);?></td>
	<td><?php echo campuseName($element->affectation).' ('.campuseVilleName($element->affectation).')';?></td>
	<td><?php echo $element->matricule_pers;?></td>
	<td><?php echo $element->nom_pers.'<br>'.$element->prenom_pers;?></td>
	<td><?php echo $element->tel_pers.'<br>'.$element->tel2_pers;?></td>
	<td><?php echo $element->email_pers;?></td>

	<td style="text-align:center">
		<?php echo '<a href=?c=ajpers&id='.$element->id_personnel.'>';?><i class="fa fa-pencil-square-o"></i></a>
		<a onclick="supprLoad(<?php echo $element->id_personnel;?>,'personnel')" href="#edit-supprimer" data-target="#edit-supprimer" data-toggle="modal" ><i class="fa fa-trash-o text-danger"></i></a>
    <a onclick="commenterPers(<?php echo $element->id_personnel;?>)" href="#edit-comment" data-target="#edit-comment" data-toggle="modal" ><i class="fa fa-comments-o text-warning"><?php echo $nbrComment;?></i></a>
	</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<script> $('.dtable').DataTable(); </script>
