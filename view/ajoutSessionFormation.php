<?php include'inc/template_start.php';?>
<!-- Page content -->
<div id="page-content" style="height:1000px">
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
<!-- Article Header -->
<div class="content-header">
<div class="row">
	<div class="col-sm-10">
		<div class="header-section clearfix">
			<h1 class="text-center animation-fadeInQuickInv"><strong>Session de Formation</strong></h1>
			<?php if(isset($laSessionFormation)): /*icone commentaire*/?>
				<a class="pull-right" onclick="commenterSess(<?php echo $laSessionFormation->id_sessionFormation;?>)" href="#edit-comment" data-target="#edit-comment" data-toggle="modal" ><i class="fa fa-comments-o text-warning"><?php echo count(listeCommentaireFormation($laSessionFormation->id_sessionFormation));?></i></a></li></a>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 ">
	<form action="" method="POST" id="form-contact">
		<input type="hidden" id="id_sessionFormation" name="id_sessionFormation" value='<?php if(isset($laSessionFormation)) echo $laSessionFormation->id_sessionFormation;?>' />
		<div class="form-group">
			<label for="classe">Nom de la classe</label>
			<input required type="text" id="" name="classe" class="form-control input-lg" placeholder="Saisissez la classe" value='<?php if(isset($laSessionFormation)) echo $laSessionFormation->classe;?>' />
		</div>
		<div class="form-group">
			<label for="">Session</label>
			<div class="input-group">
				<div class="input-daterange" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-start-view="3" >
					<input type="text" id="" name="date_debut" class="form-control" placeholder="Début de la session" value='<?php if(isset($laSessionFormation)) echo $laSessionFormation->date_debut;?>' />
				</div>
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<div class="input-daterange" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-start-view="3" >
						<input type="text" id="" name="date_fin" class="form-control" placeholder="Fin de la session" value='<?php if(isset($laSessionFormation)) echo $laSessionFormation->date_fin;?>' />
					</div>
			</div>
		</div>
		<div class="form-group">
			<label for="">Campus et Type de la formation</label>
			<div class="input-group">
					<select id="id_campus" name="id_campus" class="form-control input-lg" onchange='loadList($(this).val(),$("#id_typeFormation").val());loadListPers($(this).val());' <?php if($laSessionFormation) echo'disabled'?>>
						<?php foreach(listeDesCampus() as $element){
							$id=$element->id_campus;
							$contenu=$element->libelle_camp.' ('.villeName($element->id_ville).')';
							$ch=$id==$laSessionFormation->id_campus?'selected':'';
							echo"<option $ch value='$id'>$contenu</option>";
						}?>
					</select>
					<span class="input-group-addon"><i class="fa fa-university"></i></span>
					<select id="id_typeFormation" name="id_typeFormation" class="form-control input-lg" onchange='loadList($("#id_campus").val(),$(this).val())' <?php if($laSessionFormation) echo'disabled'?>>
							<?php foreach(listeDesTypeFormation() as $element){
							$id=$element->id_typeFormation;
							$contenu=$element->libelle_typForm.' ('.$element->prix_typForm.')';
							$ch=$id==$laSessionFormation->id_typeFormation?'selected':'';
							echo"<option $ch value='$id'>$contenu</option>";
						}?>
					</select>
			</div>
		</div>
		<div class="form-group">
			<label for="">Formateurs</label>
			<div id='listPers' class="input-group">
				<select name="id1_formateur" class="form-control input-lg chosen-select" data-live-search="true" >
					<?php foreach(listeDesFormateursByAffectation(isset($laSessionFormation)?$laSessionFormation->id_campus:1) as $element){
						$id=$element->id_personnel;
						$contenu=$element->nom_pers.' '.$element->prenom_pers;
						$ch=$id==$laSessionFormation->id1_formateur?'selected':'';
						echo"<option $ch value='$id'>$contenu</option>";
					}?>
				</select>
				<span class="input-group-addon"><i class="fa fa-user-md"></i></span>
				<select name="id2_formateur" class="form-control input-lg chosen-select" data-live-search="true" >
						<?php foreach(listeDesFormateursByAffectation(isset($laSessionFormation)?$laSessionFormation->id_campus:1) as $element){
						$id=$element->id_personnel;
						$contenu=$element->nom_pers.' '.$element->prenom_pers;
						$ch=$id==$laSessionFormation->id2_formateur?'selected':'';
						echo"<option $ch value='$id'>$contenu</option>";
					}?>
				</select>
			</div>
		</div>
		<input type="hidden" id="inscriptionList" name="inscriptionList" value='<?php echo isset($listeDesInscrits)?$listeDesInscrits:null;?>'/>
		<table id='listEt' class="table table-striped">
			<thead>
			<tr>
				<th>[<input type="checkbox" name="all" value="all" class="check" id="checkAll">]</th>
				<th>nom</th>
				<th>prenom</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach(listeEtudiantSansSessionByCF(isset($_GET['id'])?$_GET['id']:null,isset($laSessionFormation)?$laSessionFormation->id_campus:1,isset($laSessionFormation)?$laSessionFormation->id_typeFormation:1) as $lEtudiant):?>
			<tr>
				<td><input <?php if(isset($_GET['id'])) echo (in_array($lEtudiant,listeEtudiantSession($_GET['id'])))?'checked':'';?> class="check" type="checkbox" name="inscrit" value="<?php echo $lEtudiant->id_etudiant;?>"></td>
				<td><?php echo $lEtudiant->nom_etud;?></td>
				<td><?php echo $lEtudiant->prenom_etud;?></td>
			</tr>
			<?php endforeach;?>
			</tbody>
		  </table>

		<div class="form-group">
			<button type="submit" name="<?php echo isset($laSessionFormation)?'modifierSessionFormation':'ajouterSessionFormation';?>"  class="btn btn-lg btn-primary">Enregistrer</button>
		</div>
	</form>
	</div>
</div>
</div>
<!-- END Article Header -->
<?php include'inc/template_end.php';?>