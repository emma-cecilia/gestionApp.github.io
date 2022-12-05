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

// get the id parameter from URL
$filtre = explode(',',$_REQUEST["send"]);
$Sfiltre=$Vfiltre=$Cfiltre=array();
foreach($filtre as $element){
($SF=strrchr($element,'S')?substr(strrchr($element,'S'), 1):null);
if($SF) $Sfiltre[]=$SF;
($VF=strrchr($element,'V')?substr(strrchr($element,'V'), 1):null);
if($VF) $Vfiltre[]=$VF;
($CF=strrchr($element,'C')?substr(strrchr($element,'C'), 1):null);
if($CF) $Cfiltre[]=$CF;
}
$group = array();
/* GROUPPE PAR NOM*/
if($Sfiltre) foreach ($Sfiltre as $value) {
  if($value==='E') $group[]='Etudiant';
  else $group[]=serviceName($value);
}
if($Vfiltre) foreach ($Vfiltre as $value) {
  $group[]=campuseName($value).'('.campuseVilleName($value).')';
}
if($Cfiltre) foreach ($Cfiltre as $value) {
  $group[]=SessionFormationClasse($value);
}
// $group=implode(",",$group);
/*GROUPE PAR CODE*/
$group=implode(",",$filtre);
$group=str_replace("S","service#",$group);
$group=str_replace("V","campus#",$group);
$group=str_replace("C","session#",$group);
/*FIN GROUP*/

// var_dump($group);
// var_dump($filtre);
// var_dump($Sfiltre);
// var_dump($Vfiltre);
// var_dump($Cfiltre);
// exit;

$listeEt=listeDesEtudiants();
$listePers=listeDuPersonel();
$liste = array();
$contact = array();

foreach ($listeEt as $Et) {
	$contact['id']=$Et->id_etudiant;
	$contact['category']='E';
	$contact['campus']=$Et->ville_form_etud;
	$contact['classe']=$Et->sessionformation_id_sessionformation;

	$contact['name']=$Et->nom_etud.' '.$Et->prenom_etud;
	$contact['tel']=$Et->tel_etud?$Et->tel_etud:'';

	$liste[]=$contact;
}

foreach ($listePers as $Pers) {
	$contact['id']=$Pers->id_personnel;
	$contact['category']=$Pers->id_service;
	$contact['campus']=$Pers->affectation;
  $contact['classe']=null;
  $contact['classes']=personnelClasse($Pers->id_personnel);

	$contact['name']=$Pers->nom_pers.' '.$Pers->prenom_pers;
	$contact['tel']=$Pers->tel_pers?$Pers->tel_pers:'';

	$liste[]=$contact;
}
// var_dump($liste);exit;

$newListe = array();
	if ($Sfiltre && $Cfiltre && $Vfiltre) {
		foreach($liste as $element) {
			$statut=$element['category'];
			$classe=$element['classe'];
      $ville=$element['campus'];
		if(in_array($statut, $Sfiltre) && in_array($classe, $Cfiltre) && in_array($ville, $Vfiltre)) $newListe[]=$element;
    if(isset($element['classes']))
      foreach($element['classes'] as $cl) {
        if(in_array($statut, $Sfiltre) && in_array($cl, $Cfiltre) && in_array($ville, $Vfiltre)) $newListe[]=$element;
      }
		}
	}
	elseif($Sfiltre && $Vfiltre) {
		foreach($liste as $element) {
			$statut=$element['category'];
      $ville=$element['campus'];
		if(in_array($statut, $Sfiltre) && in_array($ville, $Vfiltre)) $newListe[]=$element;

		}
	}
	elseif($Cfiltre && $Vfiltre) {
		foreach($liste as $element) {
			$classe=$element['classe'];
      $ville=$element['campus'];
		if(in_array($classe, $Cfiltre) && in_array($ville, $Vfiltre)) $newListe[]=$element;
    if(isset($element['classes']))
      foreach($element['classes'] as $cl) {
        if(in_array($cl, $Cfiltre) && in_array($ville, $Vfiltre)) $newListe[]=$element;
      }

		}
	}
	elseif ($Sfiltre && $Cfiltre) {
		foreach($liste as $element) {
			$statut=$element['category'];
			$classe=$element['classe'];
		if(in_array($statut, $Sfiltre) && in_array($classe, $Cfiltre)) $newListe[]=$element;
    if(isset($element['classes']))
      foreach($element['classes'] as $cl) {
        if(in_array($statut, $Sfiltre) && in_array($cl, $Cfiltre)) $newListe[]=$element;
      }
		}
	}
	elseif($Sfiltre) {
		foreach($liste as $element) {
			$statut=$element['category'];
		if(in_array($statut, $Sfiltre)) $newListe[]=$element;

		}
	}
	elseif($Vfiltre) {
		foreach($liste as $element) {
			$ville=$element['campus'];
		if(in_array($ville, $Vfiltre)) $newListe[]=$element;

		}
	}
	elseif($Cfiltre) {
		foreach($liste as $element) {
			$classe=$element['classe'];
		if(in_array($classe, $Cfiltre)) $newListe[]=$element;
    if(isset($element['classes']))
      foreach($element['classes'] as $cl) {
        if(in_array($cl, $Cfiltre)) $newListe[]=$element;
      }

		}
	}
if($newListe || $filtre[0]!='null') ($liste=$newListe);
// var_dump($liste);exit;
?>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
    <input type="hidden" id="" name="smsListGroup" value='<?php echo $group;?>'/>
		<input type="hidden" id="messageListeEt" name="smsList" value=''/>
		<table id='listEt' class="table table-striped">
			<thead>
			<tr>
				<th colspan="5" class="text-center"> DESTINATAIRE (S) </th>
			</tr>
			<tr>
				<th>[<input type="checkbox" name="all" value="all" class="checkEt" id="checkAllEt" onclick="$('.checkEt').prop('checked', $(this).prop('checked'));">] Tous</th>
				<th>Statut</th>
				<th>Nom(s) et prénom(s)</th>
				<th>Téléphone</th>
				<th>Classe / Campus</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($liste as $membre):
				$cat=($membre['category']!=='E')?substr(serviceName($membre['category']),0,2):'Et';
				// echo $cat;
				?>
			<tr>
				<!-- <td><input class="checkEt" type="checkbox" name="" value="<?php echo $cat.''.$membre['id'];?>"></td> -->
				<td><input class="checkEt" type="checkbox" name="" value="<?php echo $membre['tel'];?>"></td>
				<td><?php echo ($membre['category']!=='E')?serviceName($membre['category']):'Etudiant';?></td>
				<td><?php echo $membre['name'];?></td>
				<td><?php echo $membre['tel'];?></td>
				<td><?php
					echo SessionFormationClasse($membre['classe'])?SessionFormationClasse($membre['classe']).' / ':'';
					echo campuseName($membre['campus']).' ('.campuseVilleName($membre['campus']).')';
				?></td>
			</tr>
			<?php endforeach;?>
			</tbody>
		</table>
</div>
</div>
<script>
$(".checkEt").change(function (){
  var selected_value = []; // initialize empty array
  $(".checkEt:checked").each(function(){
    selected_value.push($(this).val());
  });
  // console.log(selected_value);
  $('#messageListeEt').val(selected_value);
});
</script>
