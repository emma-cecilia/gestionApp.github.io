						</div>
					</div>
					<!-- END Email Center Content -->
				</div>
				<!-- END Page Content -->
			</div>
			<!-- END Main Container -->
		</div>
		<!-- END Page Container -->
	</div>
	<!-- END Page Wrapper -->

	<!-- Compose Modal -->
		<?php include('inc/modal.php');?>
	<!-- END Compose Modal -->

	<!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>
			<script src="backfrontassets/jasny/js/bootstrap.min.js"></script>
			<script src="backfrontassets/jasny/js/jasny-bootstrap.min.js"></script>

	<!-- Load and execute javascript code used only in this page -->
	<script src="js/pages/appEmail.js"></script>
			<script>
			function loadList(campus,formation){
			var idSess="<?php echo isset($_GET['id'])?($_GET['id']):null;?>";
			var send=idSess+';'+campus+';'+formation;
			$.ajax({
			 url : 'ajax/listeEtudiant.php',
			 type : 'GET',
			 data : 'send='+send,
			 dataType : 'html',
			 success : function(code_html, statut){
				 // $(code_html).appendTo("#listEt");
				 $("#listEt").html($(code_html));
			 },

			 error : function(resultat, statut, erreur){

			 },

			 complete : function(resultat, statut){

			 }

			});
			}
			function filtrePersonel(val){
			// alert(val);
			var send=val;
			$.ajax({
			 url : 'ajax/filtrePersonel.php',
			 type : 'GET',
			 data : 'send='+send,
			 dataType : 'html',
			 success : function(code_html, statut){
				 // $(code_html).appendTo("#listEt");
				 $("#PersFilter").html($(code_html));
			 },

			 error : function(resultat, statut, erreur){

			 },

			 complete : function(resultat, statut){

			 }

			});
			}
			function filtreEtudiant(val){
			// alert(val);
			var send=val;
			$.ajax({
			 url : 'ajax/filtreEtudiant.php',
			 type : 'GET',
			 data : 'send='+send,
			 dataType : 'html',
			 success : function(code_html, statut){
				 $("#EtFilter").html($(code_html));
			 },

			 error : function(resultat, statut, erreur){

			 },

			 complete : function(resultat, statut){

			 }

			});
			}
			function filtreFormation(val){
			// alert(val);
			var send=val;
			$.ajax({
			 url : 'ajax/filtreFormation.php',
			 type : 'GET',
			 data : 'send='+send,
			 dataType : 'html',
			 success : function(code_html, statut){
				 $("#ForFilter").html($(code_html));
			 },

			 error : function(resultat, statut, erreur){

			 },

			 complete : function(resultat, statut){

			 }

			});
			}
			function filtreSms(val){
			// alert(val);
			var send=val;
			$.ajax({
			 url : 'ajax/filtreSms.php',
			 type : 'GET',
			 data : 'send='+send,
			 dataType : 'html',
			 success : function(code_html, statut){
				 $("#smsFilter").html($(code_html));
			 },

			 error : function(resultat, statut, erreur){

			 },

			 complete : function(resultat, statut){

			 }

			});
			}
			function loadListPers(campus){
			$.ajax({
			 url : 'ajax/listePersonnel.php',
			 type : 'GET',
			 data : 'send='+campus,
			 dataType : 'html',
			 success : function(code_html, statut){
				 $("#listPers").html($(code_html));
			 },

			 error : function(resultat, statut, erreur){

			 },

			 complete : function(resultat, statut){

			 }

			});
			}

			//APPEL AJAX LISTE COMMENTAIRES
			function loadCommentaires(id,statut){
				 $.ajax({
				   url : 'ajax/listeCommentaire.php',
				   type : 'POST',
				   data : 'send='+id+','+statut,
				   dataType : 'html',

					 start : function(code_html, statut){
						 $("#commentTable").html('<i class="fa-li fa fa-spinner fa-spin"></i>');
					 },

				   success : function(code_html, statut){
					   $("#commentTable").html($(code_html));
				   },

				   error : function(resultat, statut, erreur){

				   },

				   complete : function(resultat, statut){

				   }

				});
			}
			//FIN APPEL AJAX LISTE COMMENTAIRES

			// Lorsqu'un lien a.tab est cliqué
			$('.dtable').DataTable( {
			"info":     false
			} );
			$("#checkAll").click(function () {
			$(".check").prop('checked', $(this).prop('checked'));
			});
			var listeInsc = new Array();
			$(".check").change(function (){
			var selected_value = []; // initialize empty array
			$(".check:checked").each(function(){
			selected_value.push($(this).val());
			});
			// console.log(selected_value);
			$('#inscriptionList').val(selected_value);
			});
			/* FOR SMS PAGE: LIST CHECK ETUDIANT AND PERSONNEL*/
			$(".checkEt").change(function (){
			var selected_value = []; // initialize empty array
			$(".checkEt:checked").each(function(){
			selected_value.push($(this).val());
			});
			// console.log(selected_value);
			$('#messageListeEt').val(selected_value);
			});

			// $(".checkPers").change(function (){
			// 	var selected_value = []; // initialize empty array
			// 	$(".checkPers:checked").each(function(){
			// 		selected_value.push($(this).val());
			// 	});
			// 	// console.log(selected_value);
			// 	$('#messageListePers').val(selected_value);
			// });

			</script>
</body>
</html>
