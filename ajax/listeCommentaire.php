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

require('../library/dateConverter.php');

// get the id parameter from URL
$id = explode(',',$_REQUEST["send"])[0];
$statut = explode(',',$_REQUEST["send"])[1];
// $id=10;
switch($statut){
	case'et':
		// $commentList='etudiant';
		$commentList=listeCommentaireEtudiant($id);
	break;
	case'pers':
		// $commentList='personnel';
		$commentList=listeCommentairePersonnel($id);
	break;
	case'sess':
		// $commentList='sessionFormation';
		$commentList=listeCommentaireFormation($id);
	break;
}
$_SESSION["commentaireDate"]=null;
// var_dump($commentList);
?>
<table class="table dtable table-striped">
  <?php foreach ($commentList as $index => $contenu):
		$auteur=new authentification(null,null,null,null,null);
		$auteur->getAuthentificationById($contenu->id_Auteur);
		$date=explode(' ',$contenu->date_com)[0];
		$date=dateConverter($date);
		$insert=$_SESSION["commentaireDate"]!=$date;
		$time=explode(' ',$contenu->date_com)[1];
  ?>
		<?php if($insert):?>
		<tr>
			<th class="bg-primary" colspan='2'>
				<?php echo "<center><i class='fa fa-calendar' aria-hidden='true'>".($date?$date:null).'</i></center>';
        $_SESSION["commentaireDate"]=$date;?>
			</th>
		</tr>
		<?php endif; ?>
		<tr>
				<td class="bg-info">
					<?php echo "<i class='fa fa-clock-o' aria-hidden='true'>".($time?$time:null).'</i>'; ?>
					<br />
					<?php echo "<i class='fa fa-user-circle-o' aria-hidden='true'>".($auteur->nom?$auteur->nom:null).'</i>'; ?>
				</td>
				<td class="bg-success"><?php echo ($contenu->commentaire?$contenu->commentaire:null);?></td>
		</tr>
    <?php endforeach; ?>
</table>
