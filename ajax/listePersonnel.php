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
$campus = $_REQUEST["send"];
$liste=listeDesFormateursByAffectation($campus);
?>
<head>
	<script src="../backfrontassets/chosen/jquery.min.js"></script>
	<script src="../backfrontassets/chosen/chosen.jquery.js"></script>
	<script>
	$(function() {
		$('.chosen-select').chosen();
		$('.chosen-select-deselect').chosen({ allow_single_deselect: true });
	});
	</script>
	<link rel="stylesheet" href="../backfrontassets/chosen/chosen.css">
</head>

<select name="id1_formateur" class="form-control input-lg chosen-select" data-live-search="true" >
	<?php foreach($liste as $element){
		$id=$element->id_personnel;
		$contenu=$element->nom_pers.' '.$element->prenom_pers;
		$ch=$id==$laSessionFormation->id1_formateur?'selected':'';
		echo"<option $ch value='$id'>$contenu</option>";
	}?>
</select>
<span class="input-group-addon"><i class="fa fa-user-md"></i></span>
<select name="id2_formateur" class="form-control input-lg chosen-select" data-live-search="true" >
		<?php foreach($liste as $element){
		$id=$element->id_personnel;
		$contenu=$element->nom_pers.' '.$element->prenom_pers;
		$ch=$id==$laSessionFormation->id2_formateur?'selected':'';
		echo"<option $ch value='$id'>$contenu</option>";
	}?>
</select>