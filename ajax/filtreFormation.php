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
$Tfiltre=$Cfiltre=array();
foreach($filtre as $element){
($TF=strrchr($element,'T')?substr(strrchr($element,'T'), 1):null);
if($TF) $Tfiltre[]=$TF;
($CF=strrchr($element,'C')?substr(strrchr($element,'C'), 1):null);
if($CF) $Cfiltre[]=$CF;
}

// var_dump($filtre);
// var_dump($Tfiltre);
// var_dump($Cfiltre);
// exit;

($liste=listeDesSessionFormation());

$newListe = array();
	if ($Tfiltre && $Cfiltre) {
		foreach($liste as $element) {
			$type=$element->id_typeFormation;
			$campus=$element->id_campus;
		if(in_array($type, $Tfiltre) && in_array($campus, $Cfiltre)) $newListe[]=$element;

		}
	}
	elseif($Tfiltre) {
		foreach($liste as $element) {
			$type=$element->id_typeFormation;
		if(in_array($type, $Tfiltre)) $newListe[]=$element;

		}
	}
	elseif($Cfiltre) {
		foreach($liste as $element) {
			$campus=$element->id_campus;
		if(in_array($campus, $Cfiltre)) $newListe[]=$element;

		}
	}
if($newListe || $filtre[0]!='null') ($liste=$newListe);
?>
<table class="table dtable table-striped">
<thead>
<tr>
	<th>Campus</th>
	<th>Classe</th>
	<th>Type</th>
	<th>Date début</th>
	<th>Date fin</th>
	<th>Formateurs</th>
	<th>Effectif</th>
	<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($liste as $element):
  $nbrComment=count(listeCommentaireFormation($element->id_sessionFormation));
?>
<tr>
	<td><?php echo campuseName($element->id_campus).' ('.campuseVilleName($element->id_campus).')';?></td>
	<td><?php echo ($element->classe);?></td>
	<td><?php echo TypeFormationInfo($element->id_typeFormation);?></td>
	<td><?php echo $element->date_debut;?></td>
	<td><?php echo $element->date_fin;?></td>
	<td><?php echo personnelName($element->id1_formateur).'<br/>'.personnelName($element->id2_formateur);?></td>
	<td><?php echo count(listeEtudiantSession($element->id_sessionFormation));?></td>

	<td style="text-align:center">
		<?php echo '<a href=?c=fsf&id='.$element->id_sessionFormation.'>';?><i class="fa fa-pencil-square-o"></i></a>
		<a onclick="supprLoad(<?php echo $element->id_sessionFormation;?>,'sessionFormation')" href="#edit-supprimer" data-target="#edit-supprimer" data-toggle="modal" ><i class="fa fa-trash-o text-danger"></i></a>
    <a onclick="commenterSess(<?php echo $element->id_sessionFormation;?>)" href="#edit-comment" data-target="#edit-comment" data-toggle="modal" ><i class="fa fa-comments-o text-warning"><?php echo $nbrComment;?></i></a>
	</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<script> $('.dtable').DataTable(); </script>
