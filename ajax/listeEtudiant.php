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
$send = $_REQUEST["send"];
$idSession=(explode(";",$send)[0])?(explode(";",$send)[0]):null;
$campus=(explode(";",$send)[1]);
$formation=(explode(";",$send)[2]);
$liste=listeEtudiantSansSessionByCF($idSession,$campus,$formation);
?> 
<table id='listEt' class="table table-striped">
<thead>
<tr>
	<th>[<input type="checkbox" name="all" value="all" class="check" id="checkAll">]</th>
	<th>nom</th>
	<th>prenom</th>
</tr>
</thead>
<tbody>
<?php foreach($liste as $lEtudiant):?>
<tr>
	<td><input <?php if(isset($idSession)) echo (in_array($lEtudiant,listeEtudiantSession($idSession)))?'checked':'';?> class="check" type="checkbox" name="inscrit" value="<?php echo $lEtudiant->id_etudiant;?>"></td>
	<td><?php echo $lEtudiant->nom_etud;?></td>
	<td><?php echo $lEtudiant->prenom_etud;?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>