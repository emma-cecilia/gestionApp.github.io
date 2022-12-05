<?php
if(isset($_GET['excel'])){
	switch ($_GET['c']) {
		case 'lst':
					$liste=listeDesEtudiants();
					if(isset($_POST['excelList'])){
						$liste = array();$listExcel=explode(',',$_POST['excelList']);
						foreach ($listExcel as $value) {
							$et=new etudiant();$et->getEtudiantById($value);
							$liste[]=$et;
						}
					}
					foreach ($liste as $key => $value) {
						$value->tel_etud.=($value->tel2_etud)?' / '.$value->tel2_etud:null;
						$value->ville_form_etud=SessionFormationCampus($value->sessionformation_id_sessionformation);
						$value->vague_form_etud=TypeFormationInfo($value->vague_form_etud);
						$value->sessionformation_id_sessionformation=SessionFormationClasse($value->sessionformation_id_sessionformation);
					}

					$liste2 = array();
					foreach ($liste as $et) {
						$ed = array(
							'NOM'=>array('val'=>$et->nom_etud),
							'PRENOM'=>array('val'=>$et->prenom_etud),
							'MAIL'=>array('val'=>$et->email_etud),
							'TEL'=>array('val'=>$et->tel_etud),
							'ADRESSE'=>array('val'=>$et->adresse_etud),
							'DATE SESSION'=>array('val'=>($et->date_sessionForm_etud)),
							'DATE INSCRIPTION'=>array('val'=>$et->date_insc_sess_etud),
							'CAMPUS FORMATION'=>array('val'=>$et->ville_form_etud),
							'VAGUE'=>array('val'=>$et->vague_form_etud),
							'STATUT'=>array('val'=>$et->statut_etud),
							'DATE NAISSANCE'=>array('val'=>$et->date_nais_etud),
							'LIEU NAISSANCE'=>array('val'=>$et->lieu_nais_etud),
							'SESSION'=>array('val'=>$et->sessionformation_id_sessionformation),
							'VILLE'=>array('val'=>$et->ville_adresse),
							'NOTE FINALE'=>array('val'=>$et->note_finale)
							);
							$liste2[]=$ed;
					}
			break;

			case 'lstp':
					$liste=listeDuPersonel();
					if(isset($_POST['excelList'])){
						$liste = array();$listExcel=explode(',',$_POST['excelList']);
						foreach ($listExcel as $value) {
							$et=new personnel();$et->getPersonnelById($value);
							$liste[]=$et;
						}
					}
					foreach ($liste as $key => $value) {
						$value->id_service=serviceName($value->id_service);
						$value->affectation=campuseName($value->affectation).' ('.campuseVilleName($value->affectation).')';
					}
					// $entete = array('NOM','PRENOM','MAIL','TEL','ADRESSE','DATE NAISSANCE','LIEU NAISSANCE',
					// 			'MATRICULE','ENFANTS','RIB',null,'AFFECTATION','SERVICE','TEL2','RESIDENCE'
					// 	);
						$liste2 = array();
						foreach ($liste as $et) {
							$ed = array(
								'NOM'=>array('val'=>$et->nom_pers),
								'PRENOM'=>array('val'=>$et->prenom_pers),
								'MAIL'=>array('val'=>$et->email_pers),
								'TEL'=>array('val'=>$et->tel_pers.($et->tel2_pers?' / '.$et->tel2_pers:'')),
								'ADRESSE'=>array('val'=>$et->adresse_pers),
								'DATE NAISSANCE'=>array('val'=>$et->date_naiss_pers),
								'LIEU NAISSANCE'=>array('val'=>$et->lieu_naiss_pers),
								'MATRICULE'=>array('val'=>$et->matricule_pers),
								'ENFANTS'=>array('val'=>$et->nbr_enfant_pers),
								'RIB'=>array('val'=>$et->numRIB_pers),
								'AFFECTATION'=>array('val'=>$et->id_groupeUtilisateur),
								'STATUT'=>array('val'=>$et->affectation),
								'SERVICE'=>array('val'=>$et->id_service),
								'VILLE RESIDENCE'=>array('val'=>$et->ville_adresse)
								);
								$liste2[]=$ed;
						}
			break;

			case 'lsf':
					$liste=listeDesSessionFormation();
					if(isset($_POST['excelList'])){
						$liste = array();$listExcel=explode(',',$_POST['excelList']);
						foreach ($listExcel as $value) {
							$et=new SessionFormation();$et->getSessionFormationById($value);
							$liste[]=$et;
						}
					}
					foreach ($liste as $key => $value) {
						$value->id1_formateur=personnelName($value->id1_formateur);
						$value->id2_formateur=personnelName($value->id2_formateur);
						$value->id_campus=campuseName($value->id_campus).' ('.campuseVilleName($value->id_campus).')';
						$value->id_typeFormation=TypeFormationInfo($value->id_typeFormation);
					}
					// $entete = array('DATE DEBUT','DATE FIN','FORMATEUR 1',
					//'FORMATEUR 2','CAMPUS','TYPE','CLASSE');
					$liste2 = array();
					foreach ($liste as $et) {
						$ed = array(
							'DATE DEBUT'=>array('val'=>$et->date_debut),
							'DATE FIN'=>array('val'=>$et->date_fin),
							'FORMATEUR N°1'=>array('val'=>$et->id1_formateur),
							'FORMATEUR N°2'=>array('val'=>$et->id2_formateur),
							'CAMPUS'=>array('val'=>$et->id_campus),
							'TYPE'=>array('val'=>$et->id_typeFormation),
							'CLASSE'=>array('val'=>$et->classe)
							);
							$liste2[]=$ed;
					}
			break;

		default:

			break;
	}

	ExportController::excelExport($liste2);
}
?>
