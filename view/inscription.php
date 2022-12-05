<?php include'inc/template_start.php';?>
<!-- Page content -->
<div id="page-content" style="height:1000px">
<!-- Article Header -->
<div class="content-header">
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
	<div class="col-sm-10">
		<div class="header-section clearfix">
			<h1 class="text-center animation-fadeInQuickInv"><strong>Inscription</strong></h1>
			<?php if(isset($lEtudiant)): /*icon commentaire*/?>
				<a class="pull-right" onclick="commenterEt(<?php echo $lEtudiant->id_etudiant;?>)" href="#edit-comment" data-target="#edit-comment" data-toggle="modal" ><i class="fa fa-comments-o text-warning"><?php echo count(listeCommentaireEtudiant($lEtudiant->id_etudiant));?></i></a></li></a>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 ">
	<form action="" method="POST" id="form-contact">
		<input type="hidden" name="id_etudiant" value='<?php if(isset($lEtudiant)) echo $lEtudiant->id_etudiant;?>' />
		<div class="form-group">
			<label for="contact-name">Nom et prénom</label>
			<div class="input-group">
				<input required type="text" id="contact-name" name="nom_etudiant" class="form-control input-lg" placeholder="Saisissez votre nom .." value='<?php if(isset($lEtudiant)) echo $lEtudiant->nom_etud;?>' />
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input required type="text" id="contact-name" name="prenom_etudiant" class="form-control input-lg" placeholder="Saisissez votre prenom .." value='<?php if(isset($lEtudiant)) echo $lEtudiant->prenom_etud;?>' />
			</div>
		</div>

		<div class="form-group">
			<label for="contact-name">Adresse</label>
			<div class="input-group">
				<input type="text" id="contact-name" name="adresse_etudiant" class="form-control input-lg" placeholder="Saisissez votre adresse .." value='<?php if(isset($lEtudiant)) echo $lEtudiant->adresse_etud;?>' />
				<span class="input-group-addon"><i class="fa fa-home"></i></span>
				<input list="villeAdresse" type="text" id="" name="ville_adresse" class="form-control input-lg" placeholder="Saisissez votre ville .." value='<?php if(isset($lEtudiant)) echo $lEtudiant->ville_adresse;?>' />
				<datalist id="villeAdresse">
				  <?php foreach(listeDesVilles() as $element){
						$contenu=$element->libelle_vil;
						echo"<option value='$contenu'>";
					}?>
				</datalist>
			</div>
		</div>
		<div class="form-group">
			<label for="contact-name">Telephones</label>
			<div class='input-group'>
				<input type="text" id="contact-name" name="tel_etudiant" class="form-control input-lg" placeholder="Saisissez votre premier Numero" value='<?php if(isset($lEtudiant)) echo $lEtudiant->tel_etud;?>' />
				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
				<input type="text" id="contact" name="tel2_etudiant" class="form-control input-lg" placeholder="Saisissez votre second Numero" value='<?php if(isset($lEtudiant)) echo $lEtudiant->tel2_etud;?>' />
			</div>
		</div>
		<div class="form-group">
			<label for="contact-email">Email</label>
			<input type="text" id="contact-email" name="email_etudiant" class="form-control input-lg" placeholder="Veuillez saisir votre email.." value='<?php if(isset($lEtudiant)) echo $lEtudiant->email_etud;?>' />
		</div>
		<div class="form-group">
					<label for="contact-name">Date et Lieu naissance</label>
					<div class="input-group">
						<div class="input-daterange" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-start-view="3" >
							<input type="text" id="" name="date_nais_etudiant" class="form-control" placeholder="Née le" value='<?php if(isset($lEtudiant)) echo $lEtudiant->date_nais_etud;?>' />
						</div>
							<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
							<input list='villeNaiss' type="text" name="lieu_nais_etudiant" class="form-control" placeholder="à" value='<?php if(isset($lEtudiant)) echo $lEtudiant->lieu_nais_etud;?>'/>
							<datalist id="villeNaiss">
							  <?php foreach(listeDesVilles() as $element){
									$contenu=$element->libelle_vil;
									echo"<option value='$contenu'>";
								}?>
					</datalist>
					</div>
		</div>
		<div class="form-group">
					<label for="contact-name">Test: date, lieu, note</label>
					<div class="input-group">
						<div class="input-daterange" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-start-view="3" >
							<input type="text" name="date_test_etudiant" placeholder="date" class="form-control input-lg" value='<?php if(isset($lEtudiant)) echo $lEtudiant->date_test_etud;?>' <?php if(!isset($_SESSION['user'])) echo'disabled';?>/>
						</div>
						<span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
						<select name="ville_test_etudiant" id="" class="form-control input-lg" >
							<?php foreach(listeDesCampus() as $element){
								$id=$element->id_campus;
								$contenu=$element->libelle_camp.' ('.villeName($element->id_ville).')';
								$ch=$id==$lEtudiant->ville_test_etud?'selected':'';
								echo"<option $ch value='$id'>$contenu</option>";
							}?>
						</select>
						<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
						<input type="number" min='0' name="note_test" placeholder="note au test" class="form-control input-lg" value='<?php if(isset($lEtudiant)) echo $lEtudiant->note_test;?>' <?php if(!isset($_SESSION['user'])) echo'disabled';?>/>
					</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-bookmark"> <label for="">La Classe</label></i></span>
				<select name="sessionformation_id_sessionformation" class="form-control input-lg col-sm-12" <?php if(!isset($_SESSION['user'])) echo'disabled';?>/>
					<option value=''>-aucune-</option>
					<?php foreach(listeDesSessionFormation() as $element){
					$id=$element->id_sessionFormation;
					$contenu=$element->classe.' du campus '.campuseName($element->id_campus).' ('.campuseVilleName($element->id_campus).')';
					$ch=$id==$lEtudiant->sessionformation_id_sessionformation?'selected':'';
					echo"<option $ch value='$id'>$contenu</option>";
				}?>
			</select>
			</div>
		</div>

		<div class="form-group">
					<label for="">Formation: date, lieu, note finale</label>
					<div class="input-group">
						<div class="input-daterange" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-start-view="3" >
							<input type="text" name="date_sessionForm_etudiant" placeholder="date de la formation" class="form-control input-lg" value='<?php if(isset($lEtudiant)) echo $lEtudiant->date_sessionForm_etud;?>' <?php if(!isset($_SESSION['user'])) echo'disabled';?>/>
						</div>
						<span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
						<select name="ville_form_etudiant" class="form-control input-lg" >
							<?php foreach(listeDesCampus() as $element){
								$id=$element->id_campus;
								$contenu=$element->libelle_camp.' ('.villeName($element->id_ville).')';
								$ch=$id==$lEtudiant->ville_form_etud?'selected':'';
								echo"<option $ch value='$id'>$contenu</option>";
							}?>
						</select>
						<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
						<input type="number" min='0' name="note_finale" placeholder="note finale" class="form-control input-lg" value='<?php if(isset($lEtudiant)) echo $lEtudiant->note_finale;?>' <?php if(!isset($_SESSION['user'])) echo'disabled';?>/>
					</div>
		</div>

		<div class="form-group">
			<label for="">Type de formation et statut</label>
			<div class="input-group">
				<select name="vague_form_etudiant" class="form-control input-lg" value='<?php if(isset($lEtudiant)) echo $lEtudiant->vague_form_etud;?>'/>
					<?php foreach(listeDesTypeFormation() as $element){
					$id=$element->id_typeFormation;
					$contenu=$element->libelle_typForm.' ('.$element->prix_typForm.')';
					$ch=$id==$lEtudiant->vague_form_etud?'selected':'';
					echo"<option $ch value='$id'>$contenu</option>";
				}?>
			</select>
			<span class="input-group-addon"><i class="fa fa-users"></i></span>
				<select name="statut_etudiant" class="form-control input-lg" value='<?php if(isset($lEtudiant)) echo $lEtudiant->statut_etud;?>' <?php if(!isset($_SESSION['user'])) echo'disabled';?>/>
					<option <?php if(isset($lEtudiant)) echo $lEtudiant->statut_etud=='En attente'?'selected':'';?> value="En attente">En attente</option>
					<option <?php if(isset($lEtudiant)) echo $lEtudiant->statut_etud=='Inscrit'?'selected':'';?> value="Inscrit">Inscrit</option>
					<option <?php if(isset($lEtudiant)) echo $lEtudiant->statut_etud=='préinscription'?'selected':'';if(!isset($_SESSION['user'])) echo'selected';?> value="préinscription">Préinscription</option>
				</select>
			</div>
		</div>
		<div class="form-group">
		  <label for="observation">Observation</label>
			<textarea id="observation" name="commentaire" rows="6" class="form-control input-lg" placeholder="Un commentaire ?"><?php if(isset($lEtudiant)) echo $lEtudiant->commentaire;?></textarea>
		</div>
		<div class="form-group">
			<button type="submit" name="<?php echo isset($lEtudiant)?'modifierEtudiant':'ajouterEtudiant';?>"  class="btn btn-lg btn-primary">Enregistrer</button>
		</div>
	</form>
	</div>
</div>
</div>
<!-- END Article Header -->
<?php include'inc/template_end.php';?>