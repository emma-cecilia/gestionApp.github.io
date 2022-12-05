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
		<a href='?c=ajpers' class="btn btn-primary">Ajouter un Personnel</a>
		<div class="input-group col-sm-8 col-sm-offset-2">
			 <select onchange='filtrePersonel($(this).val())' data-placeholder="Filtre: Service et Affectation" class="form-control chosen-select" multiple tabindex="4">
				<optgroup label="Service">
				<?php foreach(listeDesServives() as $element){
					$idC=$element->id_service;
					$contenu=$element->libelle;
					echo"<option value='S$idC'>$contenu</option>";
				}?>
				</optgroup>
				<optgroup label="Affectation">
				<?php foreach(listeDesCampus() as $element){
					$idC=$element->id_campus;
					$contenu=$element->libelle_camp.' ('.villeName($element->id_ville).')';
					echo"<option value='A$idC'>$contenu</option>";
				}?>
				</optgroup>
			</select>
		</div>
		<h1 class="text-info text-center"><u>Liste du Personnel</u>.</h1>
		<main id="PersFilter">
		<table class="table dtable table-striped">
			<thead>
			<tr>
				<th>Service</th>
				<th>affectation</th>
				<th>matricule</th>
				<th>nom</th>
				<th>prenom</th>
				<th>téléphone</th>
				<th>email</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach(listeDuPersonel() as $element):
					$nbrComment=count(listeCommentairePersonnel($element->id_personnel));
				?>
			<tr>
				<td><?php echo serviceName($element->id_service);?></td>
				<td><?php echo campuseName($element->affectation).' ('.campuseVilleName($element->affectation).')';?></td>
				<td><?php echo $element->matricule_pers;?></td>
				<td><?php echo $element->nom_pers;?></td>
				<td><?php echo $element->prenom_pers;?></td>
				<td><?php echo $element->tel_pers.'<br>'.$element->tel2_pers;?></td>
				<td><?php echo $element->email_pers;?></td>

				<td style="text-align:center">
					<?php echo '<a href=?c=ajpers&id='.$element->id_personnel.'>';?><i class="fa fa-pencil-square-o"></i></a></li></a>
					<a onclick="supprLoad(<?php echo $element->id_personnel;?>,'personnel')" href="#edit-supprimer" data-target="#edit-supprimer" data-toggle="modal" ><i class="fa fa-trash-o text-danger"></i></a></li></a>
					<a onclick="commenterPers(<?php echo $element->id_personnel;?>)" href="#edit-comment" data-target="#edit-comment" data-toggle="modal" ><i class="fa fa-comments-o text-warning"><?php echo $nbrComment;?></i></a></li></a>
				</td>
			</tr>
			<?php endforeach;?>
			</tbody>
		  </table>
			<i class="fa fa-download" aria-hidden="true">télécharger: </i><br />
			<a href='?c=lstp' class="text-danger"><i class="fa fa-file-excel-o" aria-hidden="true">Excel</i></a><br />
			<a href='?c=lstp' class="text-info"><i class="fa fa-file-pdf-o" aria-hidden="true">Pdf</i></a>
		</main>
</div>
</div>
</div>
<?php include'inc/template_end.php';?>
