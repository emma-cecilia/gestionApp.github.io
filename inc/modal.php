<!-- Modal SUPPRESSION-->
<div id="edit-supprimer" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="text-danger">Suppression</h4>
  </div>
  <div class="modal-footer">
	<form action="" method="POST" >
		<input type="hidden" name="idSupprimer" id="idSupprimer" />
		<input type="hidden" name="tableSupprimer" id="tableSupprimer" />
		<button type="submit" name="supprimer" class="btn btn-effect-ripple btn-danger pull-left">SUPPRIMER</button>
	</form>
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
<script>
function supprLoad(id,table){
	// alert(id+table);
	$('#idSupprimer').val(id);
	$('#tableSupprimer').val(table);
}
</script>

<!-- Modal SMS TEST -->
<div id="edit-smsTest" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3 class="text-default"><i class="fa fa-user">Tester le message sur mon numéro!</i></h3>
  </div>
  <div class="modal-footer">
	<form action="" method="POST" >
		<div class="form-group">
			<div class="input-group">
					<input type="text" id="" name="objet" maxlength="50" class="form-control objet" placeholder="objet du méssage" value='Info-GENC sms test' required />
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
      <textarea class="form-control messageTest" rows="5" id="messageTest" name="message" readonly>!!ATTENTION!!
				Vous devez saisir préalablement votre message</textarea>
  	</div>
		<div class="form-group">
			<input type="text" maxlength="09" class="form-control" name="monNum" placeholder='<?php echo'Exemple : '.defaultNum;?>' required/>
			<button name="testerSMS" id="testerSMS"  class="btn btn-lg btn-sucess hide SMSbtn"><i class="fa fa-paper-plane-o" aria-hidden="true"> envoyer Test</i></button>
		</div>
	</form>
  </div>
</div>
</div>

<!-- Modal SMS CONFIRMATION -->
<div id="edit-smsConfirm" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3 class="text-default"><i class="fa fa-users">Confirmer l'envoi des messages!</i></h3>
  </div>
  <div class="modal-footer">
	<form action="" method="POST" >
		<div class="form-group">
			<div class="input-group">
					<input type="text" id="objConf" name="objet" maxlength="50" class="form-control objet" placeholder="objet du méssage" required />
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
      <textarea class="form-control messageTest" rows="5" id="messageTest" name="message" readonly>!!ATENTION!!
				Vous devez saisir préalablement votre message</textarea>
  	</div>
		<div class="form-group">
			<input type="hidden" id="messageList" name="smsList" value=''/>
			<button name="envoyerSMS" id="envoyerSMS"  class="btn btn-lg btn-success hide SMSbtn"><i class="fa fa-paper-plane" aria-hidden="true"> JE confirme!</i></button>
		</div>
	</form>
	<script>
		$('#btnEnvoi').click(function(){
				$('#objConf').val($('#objtext').val());
				$('#messageList').val($('#messageListeEt').val());
		});
	</script>
  </div>
</div>
</div>

<!-- Modal COMMENTAIRE-->
<div id="edit-comment" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h3 class="text-warning"><i class="fa fa-comments-o text-warning">les commentaires</i></h3>
	<main  id='commentTable'>
		aucun commentaire
	</main>
  </div>
  <div class="modal-footer">
	<form action="" method="POST" >
		<input type="hidden" name="idAuteur" id="idAuteur" value="<?php echo $_SESSION['user']->id_authentication; ?>"/>
		<input type="hidden" name="idEtudiant" id="idEtudiant"/>
		<input type="hidden" name="idPersonnel" id="idPersonnel"/>
		<input type="hidden" name="idSession" id="idSession"/>
		<input type="hidden" name="dateCom" value="<?php echo date('Y-m-d H:i:s'); ?>"/>
		<textarea name="commentaire" class="form-control" placeholder="saisir ici le nouveau commentaire." required></textarea>
		<button type="submit" name="ajoutComment" class="btn btn-effect-ripple btn-warning pull-rigth">Ajouter</button>
	</form>
	<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
  </div>
</div>
</div>
<script>
	function commenterEt(idEt){
		loadCommentaires(idEt,'et');
		$('#idEtudiant').val(idEt);
	}
	function commenterPers(idPers){
			loadCommentaires(idPers,'pers');
			$('#idPersonnel').val(idPers);
	}
	function commenterSess(idSess){
		loadCommentaires(idSess,'sess');
		$('#idSession').val(idSess);
	}

	function supprLoad(id,table){
		// alert(id+table);
		$('#idSupprimer').val(id);
		$('#tableSupprimer').val(table);
	}
</script>
<!-- FIN Modal COMMENTAIRE-->
