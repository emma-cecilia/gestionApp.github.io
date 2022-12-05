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
		<a href='?c=fsf' class="btn btn-primary">Ajouter une Session</a>
		<div class="input-group col-sm-8 col-sm-offset-2">
			 <select onchange='filtreFormation($(this).val())' data-placeholder="Filtre: Type de formation et Campus" class="form-control chosen-select" multiple tabindex="4">
				<optgroup label="Type de formation">
				<?php foreach(listeDesTypeFormation() as $element){
					$id=$element->id_typeFormation;
					$contenu=$element->libelle_typForm;
					echo"<option value='T$id'>$contenu</option>";
				}?>
				</optgroup>
				<?php foreach(listeDesVilles() as $element){
					$idV=$element->id_ville;
					$contenu=$element->libelle_vil;
					echo"<optgroup label='Ville: $contenu'>";
						foreach(listeDesCampusByVille($idV) as $element){
							$id=$element->id_campus;
							$contenu=$element->libelle_camp;
							echo"<option value='C$id'>$contenu</option>";
						}
					echo"</optgroup>";
				}?>
			</select>
		</div>
		<h1 class="text-info text-center"><u>Liste des Sessions</u>.</h1>
		<main id='ForFilter'>
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
				<?php foreach(listeDesSessionFormation() as $element):
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
					<?php echo '<a href=?c=fsf&id='.$element->id_sessionFormation.'>';?><i class="fa fa-pencil-square-o"></i></a></li></a>
					<a onclick="supprLoad(<?php echo $element->id_sessionFormation;?>,'sessionFormation')" href="#edit-supprimer" data-target="#edit-supprimer" data-toggle="modal" ><i class="fa fa-trash-o text-danger"></i></a></li></a>
					<a onclick="commenterSess(<?php echo $element->id_sessionFormation;?>)" href="#edit-comment" data-target="#edit-comment" data-toggle="modal" ><i class="fa fa-comments-o text-warning"><?php echo $nbrComment;?></i></a></li></a>
				</td>
			</tr>
			<?php endforeach;?>
			</tbody>
		  </table>
			<i class="fa fa-download" aria-hidden="true">télécharger: </i><br />
			<a href='?c=lsf&excel=true' class="text-danger"><i class="fa fa-file-excel-o" aria-hidden="true">Excel</i></a><br />
			<a href='?c=lsf' class="text-info"><i class="fa fa-file-pdf-o" aria-hidden="true">Pdf</i></a>
		</main>
</div>
</div>
</div>
<?php include'inc/template_end.php';?>
