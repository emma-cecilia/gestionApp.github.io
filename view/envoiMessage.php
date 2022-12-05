<?php include'inc/template_start.php';?>
<!-- Page content -->
<div id="page-content" style="height:1000px">
<?php
if(isset($info)) {
	echo"<span class='alert alert-success text-center animation-fadeIn col-sm-12'>$info</span>";
	// echo"<a href='?c=lsf' class='btn btn-info text-center animation-fadeIn'><i class='fa fa-reply'> afficher la liste</i></a>";
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
			<h1 class="text-center animation-fadeInQuickInv"><strong>Envoie de SMS</strong></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-2 col-lg-10 col-lg-offset-1 ">
		<form action="" method="POST" id="form-sms">
			<div class="form-group">
				<label for="">Objet et date d'envoie du méssage</label>
				<div class="input-group">
						<input type="text" id="objtext" name="objet" maxlength="50" class="form-control" placeholder="objet du méssage" value='<?php if(isset($objet)) echo $_POST['objet']; else echo"Info-GENC"; ?>' required />
						<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
						<div class="input" >
							<input type="date" id="" name="date_envoi" class="form-control" value='<?php echo date("Y-m-d");?>' readonly/>
						</div>
						<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						<div class="input" >
							<input type="time" id="" name="heure_envoi" class="form-control" value='<?php echo date("H:i");?>' readonly/>
						</div>
				</div>
			</div>
			<div class="form-group">
	      <label for="message">Message:</label>
	      <textarea maxlength="155" class="form-control" rows="5" id="message" name="message" onkeyup="$('#msgln').html($(this).val().length);$('.messageTest').html($(this).val());$('.SMSbtn').removeClass('hide');" placeholder="message de 155 caractères maximum..." required></textarea>
				nombre de cartère du message: <span id="msgln"></span>
	  	</div>
			<a class="btn btn-lg btn-warning" href="#edit-smsTest" data-target="#edit-smsTest" data-toggle="modal" ><i class="fa fa-user" aria-hidden="true"> tester sms ?</i></a>
			<div class="form-group">
				<!-- <button name="envoyerSMS"  class="btn btn-lg btn-info pull-right"><i class="fa fa-paper-plane" aria-hidden="true"> Envoyer</i></button> -->
				<a class="btn btn-lg btn-info pull-right" id='btnEnvoi' href="#edit-smsConfirm" data-target="#edit-smsConfirm" data-toggle="modal" ><i class="fa fa-paper-plane" aria-hidden="true"> Envoyer</i></a>
			</div>
		<div class="input-group col-sm-6 col-sm-offset-3">
			 <select onchange='filtreSms($(this).val())' data-placeholder="Filtrer les contacts..." class="form-control chosen-select" multiple tabindex="4">
				 <optgroup label="Statut">
					 <option value='SE'>Etudiant</option>
 				<?php foreach(listeDesServives() as $element){
 					$idC=$element->id_service;
 					$contenu=$element->libelle;
 					echo"<option value='S$idC'>$contenu</option>";
 				}?>
				</optgroup>
				<optgroup label="Campus">
				<?php foreach(listeDesCampus() as $element){
					$idC=$element->id_campus;
					$contenu=$element->libelle_camp.' ('.villeName($element->id_ville).')';
					echo"<option value='V$idC'>$contenu</option>";
				}?>
			</optgroup>
			 <?php foreach(listeDesCampus() as $elemt){
				 $idC=$elemt->id_campus;
				 $contenu=$elemt->libelle_camp.' ('.villeName($elemt->id_ville).')';
				 echo"<optgroup label='Classe: $contenu'>";
					 foreach(listeDesSessionFormationByCampus($idC) as $element){
						 $id=$element->id_sessionFormation;
						 $contenu=$element->classe;
						 echo"<option value='C$id'>$contenu</option>";
					 }
				 echo"</optgroup>";
			 }?>
			</select>
		</div>
<main id='smsFilter'>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<input type="hidden" id="messageListeEt" name="smsList" value=''/>
		<table id='listEt' class="table table-striped">
			<thead>
			<tr>
				<th colspan="5" class="text-center"> DESTINATAIRE (S) </th>
			</tr>
			<tr>
				<th>[<input type="checkbox" name="all" value="all" class="checkEt" id="checkAllEt" onclick="$('.checkEt').prop('checked', $(this).prop('checked'));">] Tous</th>
				<th>Statut</th>
				<th>Nom(s) et prénom(s)</th>
				<th>Téléphone</th>
				<th>Classe / Campus</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($listeContact as $membre):
				$cat=($membre['category']!=='E')?substr(serviceName($membre['category']),0,2):'Et';
				// echo $cat;
				?>
			<tr>
				<!-- <td><input class="checkEt" type="checkbox" name="" value="<?php echo $cat.''.$membre['id'];?>"></td> -->
				<td><input class="checkEt" type="checkbox" name="" value="<?php echo $membre['tel'];?>"></td>
				<td><?php echo ($membre['category']!=='E')?serviceName($membre['category']):'Etudiant';?></td>
				<td><?php echo $membre['name'];?></td>
				<td><?php echo $membre['tel'];?></td>
				<td><?php
					echo SessionFormationClasse($membre['classe'])?SessionFormationClasse($membre['classe']).' / ':'';
					echo campuseName($membre['campus']).' ('.campuseVilleName($membre['campus']).')';
				?></td>
			</tr>
			<?php endforeach;?>
			</tbody>
		</table>
</div>
</div>
</main>
	</form>
	</div>
</div>
</div>
<!-- END Article Header -->
<?php include'inc/template_end.php';?>