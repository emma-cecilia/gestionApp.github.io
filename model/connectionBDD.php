<?php
function connectionBDD(){
	try{
		$bdd = new PDO("mysql:host=localhost;dbname=".DB_NAME.";charset=utf8",DB_USER,DB_PASSWORD);
	}catch(Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	return $bdd;
}
function supprimer($id,$table){
	$bdd=connectionBDD();
	switch($table){
		case'sessionFormation':
			$requete = $bdd->prepare("UPDATE sessionformation SET supprimer=1 WHERE id_sessionFormation = :id");
			break;
		
		default:
			$requete = $bdd->prepare("UPDATE $table SET supprimer=1 WHERE id_$table = :id");
			break;
	}
	return $requete->execute(array(':id'=>$id));
}
function lastId($table){
	$bdd=connectionBDD();
	$requete = $bdd->prepare("SELECT id_$table FROM $table ORDER BY id_$table DESC");
	$requete->execute();
	$retour=$requete->fetch();
	return intval($retour[0]);
}
?>
