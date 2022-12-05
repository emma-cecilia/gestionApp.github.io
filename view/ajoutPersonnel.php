<?php include'inc/template_start.php';?>
<!-- Page content -->
<div id="page-content" style="height:1000px">
<?php
if(isset($info)){
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
			<h1 class="text-center animation-fadeInQuickInv"><strong>PERSONNEL</strong></h1>
			<?php if(isset($lePersonnel)): /*icone commentaire*/?>
				<a class="pull-right" onclick="commenterPers(<?php echo $lePersonnel->id_personnel;?>)" href="#edit-comment" data-target="#edit-comment" data-toggle="modal" ><i class="fa fa-comments-o text-warning"><?php echo count(listeCommentairePersonnel($lePersonnel->id_personnel));?></i></a></li></a>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 ">
	<form action="" method="POST" id="form-contact">
		<input type="hidden" name="id_personnel" value='<?php if(isset($lePersonnel)) echo $lePersonnel->id_personnel;?>'/>
		<div class="form-group">
			<label for="">Service</label>
			<select name="service_personnel" class="form-control input-lg" >
			<?php foreach(listeDesServives() as $element){
				$id=$element->id_service;
				$contenu=$element->libelle;
				$ch=$id==$lePersonnel->id_service?'selected':'';
				echo"<option $ch value='$id'>$contenu</option>";
			}?>
			</select>
		</div>
		<div class="form-group">
			<label for="">Matricule</label>
			<input required type="text" id="" name="matricule_personnel" class="form-control input-lg" placeholder="Saisissez  .." value='<?php if(isset($lePersonnel)) echo $lePersonnel->matricule_pers;?>' />
		</div>
		<div class="form-group ">
			<label for="">Nom et prénom</label>
			<div class="input-group">
				<input required type="text" id="" name="nom_personnel" class="form-control input-lg" placeholder="Saisissez  .." value='<?php if(isset($lePersonnel)) echo $lePersonnel->nom_pers;?>' />
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input required type="text" id="" name="prenom_personnel" class="form-control input-lg" placeholder="Saisissez  .." value='<?php if(isset($lePersonnel)) echo $lePersonnel->prenom_pers;?>' />
			</div>
		</div>

		<div class="form-group">
			<label for="">Adresse</label>
			<div class="input-group">
				<input type="text" id="" name="adresse_personnel" class="form-control input-lg" placeholder="Saisissez votre adresse .." value='<?php if(isset($lePersonnel)) echo $lePersonnel->adresse_pers;?>' />
				<span class="input-group-addon"><i class="fa fa-home"></i></span>
				<input list="villeAdresse" type="text" id="" name="ville_adresse" class="form-control input-lg" placeholder="Saisissez votre ville .." value='<?php if(isset($lePersonnel)) echo $lePersonnel->ville_adresse;?>' />
				<datalist id="villeAdresse">
				  <?php foreach(listeDesVilles() as $element){
						$contenu=$element->libelle_vil;
						echo"<option value='$contenu'>";
					}?>
				</datalist>
			</div>
		</div>
		<div class="form-group">
			<label for="">Telephone</label>
			<div class="input-group">
				<input type="text" id="" name="tel_personnel" class="form-control input-lg" placeholder="Saisissez votre Numero de telephone .." value='<?php if(isset($lePersonnel)) echo $lePersonnel->tel_pers;?>' />
				<span class="input-group-addon"><i class="fa fa-phone"></i></span>
				<input type="text" id="" name="tel2_personnel" class="form-control input-lg" placeholder="Saisissez votre second Numero" value='<?php if(isset($lePersonnel)) echo $lePersonnel->tel2_pers;?>' />
			</div>
		</div>
		<div class="form-group">
			<label for="contact-email">Email</label>
			<input type="text" id="contact-email" name="email_personnel" class="form-control input-lg" placeholder="Veuillez saisir votre email.." value='<?php if(isset($lePersonnel)) echo $lePersonnel->email_pers;?>' />
		</div>
		<div class="form-group">
			<label for="">Date et Lieu naissance</label>
			<div class="input-group">
				<div class="input-daterange" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-start-view="3" >
					<input type="text" id="" name="date_nais_personnel" class="form-control" placeholder="Née le" value='<?php if(isset($lePersonnel)) echo $lePersonnel->date_naiss_pers;?>' />
				</div>
					<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
					<input list='villeNaiss' type="text" name="lieu_nais_personnel" class="form-control" placeholder="à" value='<?php if(isset($lePersonnel)) echo $lePersonnel->lieu_naiss_pers;?>'/>
					<datalist id="villeNaiss">
					  <?php foreach(listeDesVilles() as $element){
							$contenu=$element->libelle_vil;
							echo"<option value='$contenu'>";
						}?>
					</datalist>
			</div>
		</div>
		<div class="form-group">
			<label for="">Nombre d'enfants</label>
			<input type="number" id="" min="0" name="nombreEnfants_personnel" class="form-control input-lg" placeholder="Veuillez saisir le nombre de vos enfants.." value='<?php if(isset($lePersonnel)) echo $lePersonnel->nbr_enfant_pers;?>' />
		</div>
		<div class="form-group">
			<label for="">Numéro RIB</label>
			<input type="text" id="" name="numRIB_personnel" class="form-control input-lg" placeholder="Veuillez saisir votre RIB.." value='<?php if(isset($lePersonnel)) echo $lePersonnel->numRIB_pers;?>' />
		</div>
		<!--<div class="form-group">
			<label for="">Groupe Utilisateur</label>
			<select name="groupeUtilisateur_personnel" class="form-control input-lg" >
				<option value="1"></option>
			</select>
		</div>-->
		<div class="form-group">
			<label for="">Affectation</label>
			<select name="affectation_personnel" class="form-control input-lg" >
				<?php foreach(listeDesCampus() as $element){
					$id=$element->id_campus;
					$contenu=$element->libelle_camp.' ('.villeName($element->id_ville).')';
					$ch=$id==$lePersonnel->affectation?'selected':'';
					echo"<option $ch value='$id'>$contenu</option>";
				}?>
			</select>
		</div>
		<div class="form-group">
			<label for="">Banque</label>
			<select name="banque_personnel" class="form-control input-lg" >
				<option value="1">BPC</option>
				<option value="2">-autre-</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Compte GLPI</label>
			<select name="compteglpi_personnel" class="form-control input-lg" >
				<option value="1">glpi@genc.com</option>
			</select>
		</div>

		<div class="form-group">
			<button type="submit" name="<?php echo isset($lePersonnel)?'modifierPersonnel':'ajouterPersonnel';?>"  class="btn btn-lg btn-primary">Enregistrer</button>
		</div>
	</form>
	</div>
</div>
</div>
<!-- END Article Header -->
<?php include'inc/template_end.php';?>