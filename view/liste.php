<?php include'inc/template_start.php';?>
<!-- Page content -->
<div class="container" style="height:1000px">
<?php
if(isset($info)) {
	echo"<span class='alert alert-success text-center animation-fadeIn col-sm-12'>$info</span>";
	unset($_SESSION['info']);
}
if(isset($error)) {
	echo"<span class='alert alert-danger text-center animation-fadeIn col-sm-12'>$error</span>";
	unset($_SESSION['error']);
}
?>
<div class="row">
	<div class="col-sm-12">
		<a href='?c=ins' class="btn btn-primary">Ajouter un étudiant</a>
		<div class="input-group col-sm-8 col-sm-offset-2">
			 <select onchange='filtreEtudiant($(this).val())' data-placeholder="Filtre: Statut et Classe" class="form-control chosen-select" multiple tabindex="4">
			  <optgroup label="Statut">
					<option value="SInscrit">Inscrit</option>
					<option value="SEn attente">En attente</option>
					<option value="Spréinscription">Les préinscrition</option>
			  </optgroup>
				<optgroup label="Ville">
			 <?php foreach(listeDesVilles() as $element){
				 $id=$element->id_ville;
				 $contenu=$element->libelle_vil;
				 echo"<option value='V$id'>$contenu</option>";
			 }?>
			 </optgroup>
				<?php foreach(listeDesCampus() as $elemt){
					$idC=$elemt->id_campus;
					$contenu=$elemt->libelle_camp.' ('.villeName($elemt->id_ville).')';
					echo"<optgroup label='Campus: $contenu'>";
						foreach(listeDesSessionFormationByCampus($idC) as $element){
							$id=$element->id_sessionFormation;
							$contenu=$element->classe;
							echo"<option value='C$id'>$contenu</option>";
						}
					echo"</optgroup>";
				}?>
			</select>
		</div>
		<h1 class="text-info text-center"><u>Liste des étudiants</u>.</h1>
		<main id="EtFilter">
		<table class="table dtable table-striped">
			<thead>
			<tr>
				<th>nom</th>
				<th>prenom</th>
				<th>téléphone</th>
				<th>email</th>
				<th>classe/Campus</th>
				<th>note</th>
				<th>statut</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach(listeDesEtudiants() as $lEtudiant):
					$nbrComment=count(listeCommentaireEtudiant($lEtudiant->id_etudiant));
				?>
			<tr>
				<td><?php echo $lEtudiant->nom_etud;?></td>
				<td><?php echo $lEtudiant->prenom_etud;?></td>
				<td><?php echo $lEtudiant->tel_etud.'<br>'.$lEtudiant->tel2_etud;?></td>
				<td><?php echo $lEtudiant->email_etud;?></td>
				<td><?php echo SessionFormationClasse($lEtudiant->sessionformation_id_sessionformation)."<br>".SessionFormationCampus($lEtudiant->sessionformation_id_sessionformation);?></td>
								<td><?php echo $lEtudiant->note_finale?$lEtudiant->note_finale:'-';?></td>
				<td><?php echo $lEtudiant->statut_etud;?></td>
				<td style="text-align:center">
					<?php echo '<a href="?c=ins&id='.$lEtudiant->id_etudiant.'">';?><i class="fa fa-pencil-square-o"></i></a>
					<a onclick="supprLoad(<?php echo $lEtudiant->id_etudiant;?>,'etudiant')" href="#edit-supprimer" data-target="#edit-supprimer" data-toggle="modal" ><i class="fa fa-trash-o text-danger"></i></a>
					<a onclick="commenterEt(<?php echo $lEtudiant->id_etudiant;?>)" href="#edit-comment" data-target="#edit-comment" data-toggle="modal" ><i class="fa fa-comments-o text-warning"><?php echo $nbrComment;?></i></a></li></a>
				</td>
			</tr>
			<?php endforeach;?>
			</tbody>
		  </table>
				<i class="fa fa-download" aria-hidden="true">télécharger: </i><br />
				<a href='?c=lst' class="text-danger"><i class="fa fa-file-excel-o" aria-hidden="true">Excel</i></a><br />
				<a href='?c=lst' class="text-info"><i class="fa fa-file-pdf-o" aria-hidden="true">Pdf</i></a>
			</main>

</div>
</div>
</div>
<?php include'inc/template_end.php';?>