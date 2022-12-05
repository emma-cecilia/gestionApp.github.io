<div class="sidebar-content">
	<!-- Profile -->
	<div class="sidebar-section">
		<h2 class="text-light">Profil</h2>
		<form id='userForm' action="" method="post" class="form-control-borderless" onsubmit="">
		<input type="hidden" name="id_authentication" value="<?php echo $_SESSION['user']->id_authentication;?>" required >
			<div class="form-group">
				<label for="side-profile-name">Nom</label>
				<input type="text" id="side-profile-name" name="nom" class="form-control" value="<?php echo $_SESSION['user']->nom;?>" required>
			</div>
			<div class="form-group">
				<label for="side-profile-identifiant">Identifiant</label>
				<input type="text" id="side-profile-identifiant" name="identifiant" class="form-control" value="<?php echo $_SESSION['user']->identifiant;?>" required>
			</div>
			<div class="form-group">
				<label for="side-profile-statut">Statut</label>
				<input type="text" readonly id="side-profile-statut" name="statut" class="form-control" value="<?php echo $_SESSION['user']->statut;?>" required>
			</div>
			<div class="form-group">
				<label for="side-profile-password">Nouveau mot de passe</label>
				<input type="password" id="password" name="motDePasse" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="side-profile-password-confirm">Confirmer le mot de passe</label>
				<input type="password"  id="password-confirm" name="motDePasse1" class="form-control" required>
			</div>
			<div class="form-group remove-margin">
				<button type="submit" class="btn btn-effect-ripple btn-primary" onclick="if($('#password').val()!=$('#password-confirm').val()){$('#userForm').submit(function(){return false;});alert('Erreur Modification Utilisateur!');}" name="modifierUser">Enregistrer</button>
			</div>
		</form>
	</div>
	<!-- END Profile -->

	<!-- Settings -->
	<div class="sidebar-section">
		<h2 class="text-light">Configurer</h2>
		<form action="index.html" method="post" class="form-horizontal form-control-borderless" onsubmit="return false;">
			<div class="form-group">
				<label class="col-xs-7 control-label-fixed">Notifications</label>
				<div class="col-xs-5">
					<label class="switch switch-success"><input type="checkbox" checked><span></span></label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-7 control-label-fixed">Profil Générale</label>
				<div class="col-xs-5">
					<label class="switch switch-success"><input type="checkbox" checked><span></span></label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-7 control-label-fixed">Activation API</label>
				<div class="col-xs-5">
					<label class="switch switch-success"><input type="checkbox"><span></span></label>
				</div>
			</div>
			<div class="form-group remove-margin">
				<button type="submit" class="btn btn-effect-ripple btn-primary" onclick="App.sidebar('close-sidebar-alt');">Enregistrer</button>
			</div>
		</form>
	</div>
	<!-- END Settings -->
</div>
