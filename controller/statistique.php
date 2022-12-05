<?php

 $liste_etudiant=listeDesEtudiants();
 $liste_personnel=listeDuPersonel();
 $effectif=count($liste_etudiant);
 $effectif_perso=count($liste_personnel);
 
 //Les tableaux
  
  $meilleurTest= new etudiant();
  
  foreach($liste_etudiant as $etudiant){
	 if($meilleurTest->note_test < $etudiant->note_test)
		$meilleurTest = $etudiant;
  } 
  $listeMeilleur= array();
  $meilleurNote= new etudiant();
  
  //Notes
  foreach($liste_etudiant as $etudiant){
	 if($meilleurNote->note_finale < $etudiant->note_finale)
		$meilleurNote = $etudiant;	
  } 
  foreach($liste_etudiant as $etudiant){
	 if($meilleurNote->note_finale == $etudiant->note_finale)
		$listeMeilleur[] = $etudiant;	
  }
  $effecNote=count($listeMeilleur);
  
   $listeMeilleurtest=array();	
   $bestTest= new etudiant();
   
   //Test
  foreach($liste_etudiant as $etudiant){
	 if($bestTest->note_test < $etudiant->note_test)
		$bestTest = $etudiant;	
  } 
	
  foreach($liste_etudiant as $etudiant){
	 if($bestTest->note_test == $etudiant->note_test)
		$listeMeilleurtest[] = $etudiant;
  } 
   $effecTest=count($listeMeilleurtest);
   
 include('view/statistique.php');
?>