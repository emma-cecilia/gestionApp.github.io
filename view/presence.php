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
		<div class="header-section clearfix">
			<h1 class="text-center animation-fadeInQuickInv"><strong>Gestion des présences</strong></h1>
		</div>
	</div>
</div>
<!--PRESENCE DU PERSONNEL-->
<div class="row">
	<div class="col-lg-offset-2 col-md-8">
		<ul class="nav nav-tabs nav-justified">
		  <li id='idP' onclick='$("#pers").fadeIn();$("#etu").hide();$(this).addClass("active");$("#idE").removeClass("active");' class="active"><a>Personnel</a></li>
		  <li id='idE' onclick='$("#etu").fadeIn();$("#pers").hide();$(this).addClass("active");$("#idP").removeClass("active");'><a>Etudiants</a></li>
		</ul>
	</div>
</div>
<div class="row">
<div id='pers' class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 site-block">
	<br/>
	<form action="" method="post" id="form-contact">
		
		<div class="form-group">
			<label for="id_personnel"></label>
			<select name="id_personnel" class="form-control input-lg" data-live-search="true" >
					<?php foreach(listeDuPersonel() as $element){
					$id=$element->id_personnel;
					$contenu=$element->nom_pers.' '.$element->prenom_pers;
					$ch=$id==$laPresence->id_personnel?'selected':'';
					echo"<option $ch value='$id'>$contenu</option>";
				}?>
			</select>
		</div>
		<div class="form-group">
			<label for="today-daterange">Date</label>
			<div class="input-daterange" data-date-format="yyyy-mm-dd">
				<input type="text" id="today-daterange" name="date_GP" class="form-control input-lg" value="<?php if(isset($laPresence)) echo $laPresence->date_GP; else echo date('Y-m-d');?>">
			</div>
		</div>
		<!--<div class="form-group">
			<label for="rep">Reporting</label>
			<input type="number" id="rep" value="" name="id_reporting" class="form-control input-lg" placeholder="Saisissez votre matricule SVP..">
		</div>-->
		<div class="form-group">
			<label for="arrive">Heure d'arrivée :</label>
			<input type="time" id="arrive" name="heure_arr_GP" class="form-control input-lg" value="<?php if(isset($laPresence)) echo $laPresence->heure_arr_GP; else echo date('H:i');?>"/>
		</div>
		<div class="form-group">
			<label for="depart_pause">Heure du départ en pause :</label>
			<input type="time" id="depart_pause" name="heure_dep_dem_GP" class="form-control input-lg" value="<?php if(isset($laPresence)) echo $laPresence->heure_dep_dem_GP; else echo date('H:i');?>"/>
		</div>
		<div class="form-group">
			<label for="arrive_pause">Heure du retour de la pause :</label>
			<input type="time" id="arrive_pause" name="heure_retour_GP" class="form-control input-lg" value="<?php if(isset($laPresence)) echo $laPresence->heure_retour_GP; else echo date('H:i');?>"/>
		</div>
		<div class="form-group">
			<label for="depart">Heure du départ :</label>
			<input type="time" id="depart" name="heure_dep_fin_GP" class="form-control input-lg" value="<?php if(isset($laPresence)) echo $laPresence->heure_dep_fin_GP; else echo date('H:i');?>"/>
		</div>
		<div class="form-group"> 
		  <label for="observation">Observation</label>
			<textarea id="observation" name="justificatifs" rows="6" class="form-control input-lg" placeholder="Une observation ?" value="<?php if(isset($laPresence)) echo $laPresence->justificatifs;?>"></textarea> 
		</div>
		<div class="form-group">
			<button id="" name="<?php echo isset($laPresence)?'modifierPresence':'ajouterPresence';?>" type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
		</div>
	</form>
</div>

<!--PRESENCE DES ETUDIANTS-->
<div id='etu' style='display:none' class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 site-block">
	<br/>
	<form action="" method="post" id="form-contact">
		
		<div class="form-group">
			<label for="id_etudiant"></label>
			<select name="id_etudiant" class="form-control input-lg" data-live-search="true" >
					<?php foreach(listeDesEtudiants() as $element){
					$id=$element->id_etudiant;
					$contenu=$element->nom_etud.' '.$element->prenom_etud;
					$ch=$id==$laPresence->id_etudiant?'selected':'';
					echo"<option $ch value='$id'>$contenu</option>";
				}?>
			</select>
		</div>
		<div class="form-group">
		<label for="today-daterange">Date</label>
			<div class="input-daterange" data-date-format="yyyy-mm-dd">
				<input type="text" id="today-daterange" name="date_GP" class="form-control input-lg" value="<?php if(isset($laPresence)) echo $laPresence->date_GP; else echo date('Y-m-d');?>">
			</div>
		</div>
		<!--<div class="form-group">
			<label for="rep">Reporting</label>
			<input type="number" id="rep" value="" name="id_reporting" class="form-control input-lg" placeholder="Saisissez votre matricule SVP..">
		</div>-->
		<div class="form-group">
			<label for="arrive">Heure d'arrivée :</label>
			<input type="time" id="arrive" name="heure_arr_GP" class="form-control input-lg" value="<?php if(isset($laPresence)) echo $laPresence->heure_arr_GP; else echo date('H:i');?>"/>
		</div>
		<div class="form-group">
			<label for="depart_pause">Heure du départ en pause :</label>
			<input type="time" id="depart_pause" name="heure_dep_dem_GP" class="form-control input-lg" value="<?php if(isset($laPresence)) echo $laPresence->heure_dep_dem_GP; else echo date('H:i');?>"/>
		</div>
		<div class="form-group">
			<label for="arrive_pause">Heure du retour de la pause :</label>
			<input type="time" id="arrive_pause" name="heure_retour_GP" class="form-control input-lg" value="<?php if(isset($laPresence)) echo $laPresence->heure_retour_GP; else echo date('H:i');?>"/>
		</div>
		<div class="form-group">
			<label for="depart">Heure du départ :</label>
			<input type="time" id="depart" name="heure_dep_fin_GP" class="form-control input-lg" value="<?php if(isset($laPresence)) echo $laPresence->heure_dep_fin_GP; else echo date('H:i');?>"/>
		</div>
		<div class="form-group"> 
		  <label for="observation">Observation</label>
			<textarea id="observation" name="justificatifs" rows="6" class="form-control input-lg" placeholder="Une observation ?" value="<?php if(isset($laPresence)) echo $laPresence->justificatifs;?>"></textarea> 
		</div>
		<div class="form-group">
			<button id="" name="<?php echo isset($laPresence)?'modifierPresence':'ajouterPresence';?>" type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
		</div>
	</form>
</div>
</div>
</div>
<?php include'inc/template_end.php';?>
<!-- END Article Header -->