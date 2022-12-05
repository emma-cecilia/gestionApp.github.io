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
$Sfiltre=$Cfiltre=array();
foreach($filtre as $element){
($SF=strrchr($element,'S')?substr(strrchr($element,'S'), 1):null);
if($SF) $Sfiltre[]=$SF;
($CF=strrchr($element,'C')?substr(strrchr($element,'C'), 1):null);
if($CF) $Cfiltre[]=$CF;
($VF=strrchr($element,'V')?substr(strrchr($element,'V'), 1):null);
if($VF) $Vfiltre[]=$VF;
}

($liste=listeDesEtudiants());

$newListe = array();

if ($Sfiltre && $Cfiltre && $Vfiltre) {
  foreach($liste as $element) {
    $statut=$element->statut_etud;
    $session=$element->sessionformation_id_sessionformation;
    $ville=$element->ville_form_etud;
  if(in_array($statut, $Sfiltre) && in_array($session, $Cfiltre) && in_array($ville, $Vfiltre)) $newListe[]=$element;

  }
}
elseif($Sfiltre && $Cfiltre) {
  foreach($liste as $element) {
    $statut=$element->statut_etud;
    $session=$element->sessionformation_id_sessionformation;
  if(in_array($statut, $Sfiltre) && in_array($session, $Cfiltre)) $newListe[]=$element;

  }
}
elseif($Vfiltre && $Cfiltre) {
  foreach($liste as $element) {
    $ville=$element->ville_form_etud;
    $session=$element->sessionformation_id_sessionformation;
  if(in_array($ville, $Vfiltre) && in_array($session, $Cfiltre)) $newListe[]=$element;

  }
}
elseif($Sfiltre && $Vfiltre) {
  foreach($liste as $element) {
    $statut=$element->statut_etud;
    $ville=$element->ville_form_etud;
  if(in_array($statut, $Sfiltre) && in_array($ville, $Vfiltre)) $newListe[]=$element;

  }
}
elseif($Sfiltre) {
  foreach($liste as $element) {
    $statut=$element->statut_etud;
  if(in_array($statut, $Sfiltre)) $newListe[]=$element;

  }
}
elseif($Cfiltre) {
  foreach($liste as $element) {
    $session=$element->sessionformation_id_sessionformation;
  if(in_array($session, $Cfiltre)) $newListe[]=$element;

  }
}
elseif($Vfiltre) {
  foreach($liste as $element) {
      $ville=$element->ville_form_etud;
  if(in_array($ville, $Vfiltre)) $newListe[]=$element;

  }
}

if($newListe || $filtre[0]!='null') ($liste=$newListe);
?>
<table class="table dtable table-striped">
<thead>
<tr>
	<th>Nom</th>
	<th>Prénom</th>
	<th>téléphone</th>
	<th>email</th>
	<th>classe et Campus</th>
	<th>note</th>
	<th>statut</th>
	<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($liste as $lEtudiant):
  $nbrComment=count(listeCommentaireEtudiant($lEtudiant->id_etudiant));
?>
<tr>
	<td><?php echo $lEtudiant->nom_etud;?></td>
	<td><?php echo $lEtudiant->prenom_etud;?></td>
	<td><?php echo $lEtudiant->tel_etud.'<br>'.$lEtudiant->tel2_etud;?></td>
	<td><?php echo $lEtudiant->email_etud;?></td>
	<td><?php echo SessionFormationClasse($lEtudiant->sessionformation_id_sessionformation)."<br>".SessionFormationCampus($lEtudiant->sessionformation_id_sessionformation);?></td>
	<td><?php echo ($lEtudiant->note_finale?$lEtudiant->note_finale:'--').'/'.($lEtudiant->total_note_finale?$lEtudiant->total_note_finale:'--');?></td>
	<td><?php echo $lEtudiant->statut_etud;?></td>
	<td style="text-align:center">
		<?php echo '<a href=?c=ins&id='.$lEtudiant->id_etudiant.'>';?><i class="fa fa-pencil-square-o"></i></a>
		<a onclick="supprLoad(<?php echo $lEtudiant->id_etudiant;?>,'etudiant')" href="#edit-supprimer" data-target="#edit-supprimer" data-toggle="modal" ><i class="fa fa-trash-o text-danger"></i></a>
    <a onclick="commenterEt(<?php echo $lEtudiant->id_etudiant;?>)" href="#edit-comment" data-target="#edit-comment" data-toggle="modal" ><i class="fa fa-comments-o text-warning"><?php echo $nbrComment;?></i></a>
	</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<script> $('.dtable').DataTable(); </script>
