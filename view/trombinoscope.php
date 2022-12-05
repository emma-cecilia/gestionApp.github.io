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
			<h1 class="text-center animation-fadeInQuickInv"><strong>TROMBINOSCOPE du personnel</strong></h1>
			<hr>
		</div>
	</div>
</div>
<div class="row"><br></div>
<div class="row">
<?php foreach(listeDuPersonel() as $element):?>
	<div class="container change col-sm-2">
	  <img src="img/icon180.png" class="img-thumbnail" alt="photo" width="100%">
	  <h4 class="text-center"><?php echo $element->nom_pers.'<br>'.$element->prenom_pers;?></h4>
	</div>
<?php endforeach;?>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="header-section clearfix">
			<h1 class="text-center animation-fadeInQuickInv"><strong>TROMBINOSCOPE des étudiants</strong></h1>
			<hr>
		</div>
	</div>
</div>
<div class="row"><br></div>
<div class="row">
<?php foreach(listeDesEtudiants() as $element):?>
	<div class="container change col-sm-2">
	  <img src="img/icon180.png" class="img-thumbnail" alt="photo" width="100%">
	  <h4 class="text-center"><?php echo $element->nom_etud.'<br>'.$element->prenom_etud;?></h4>
	</div>
<?php endforeach;?>
</div>
</div>
<script>
	$( document ).ready(function() {
    var trombiElement = document.querySelectorAll(".change");
    var nbrElement=trombiElement.length;
			for (i = 0; i < nbrElement; i++){
				trombiElement[i].style.height='300px';
			}
	});
</script>
<?php include'inc/template_end.php';?>