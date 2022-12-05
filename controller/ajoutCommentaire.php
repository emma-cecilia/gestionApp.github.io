<?php
if(isset($_POST['ajoutComment'])){
	$commentaire=(isset($_POST['commentaire']) and $_POST['commentaire']!='')?$_POST['commentaire']:null;
	$idAuteur=(isset($_POST['idAuteur'])and $_POST['idAuteur']!='')?$_POST['idAuteur']:null;
	$dateCom=(isset($_POST['dateCom'])and $_POST['dateCom']!='')?$_POST['dateCom']:null;
	$idPersonnel=(isset($_POST['idPersonnel'])and $_POST['idPersonnel']!='')?$_POST['idPersonnel']:null;
	$idEtudiant=(isset($_POST['idEtudiant'])and $_POST['idEtudiant']!='')?$_POST['idEtudiant']:null;
	$idSession=(isset($_POST['idSession'])and $_POST['idSession']!='')?$_POST['idSession']:null;

	$comment=new Commentaire(
		null,
		$commentaire,
		$idAuteur,
		$dateCom,
		$idPersonnel,
		$idEtudiant,
		$idSession
	);
	// var_dump($comment);
	($comment->commentaireInBDD());
}
?>
