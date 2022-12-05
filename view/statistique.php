<?php include'inc/template_start.php';?>
<!-- Contact -->
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
<!-- Page content -->
                    <div id="page-content">
                        <!-- First Row -->
						<marquee>GENC en Marche, allons seulement.</marquee>
                        <div class="row">
                            <!-- Simple Stats Widgets -->
							<div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-left clearfix">
                                        <div class="widget-icon pull-left themed-background-primary">
                                           <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                        </div>
                                        <h2 class="widget-heading h3">
                                            <strong>Effectif Personnel: <span  class="text-danger" data-toggle="counter" data-to="<?php echo $effectif_perso;?>"></span></strong>
                                        </h2>
                                        <span class="text-muted"></span>
										
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-left clearfix">
                                        <div class="widget-icon pull-left themed-background-primary">
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-primary">
                                            <strong>Effectif Etudiant: <span class="text-danger" data-toggle="counter" data-to="<?php echo $effectif;?>"></span></strong>
                                        </h2>
                                        <span class="text-muted"></span>
										
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-left clearfix">
                                        <div class="widget-icon pull-left themed-background-primary">
                                            <i class="gi gi-briefcase" aria-hidden="true"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-primary">
                                            <strong>Meilleur note au test :<span class="text-danger" data-toggle="counter" data-to="<?php echo $meilleurTest->note_test;?>"></span></strong>
                                        </h2>
                                        <span class="text-muted"></span>
										
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-left clearfix">
                                        <div class="widget-icon pull-left themed-background-primary">
                                            <i class="gi gi-wallet aria-hidden=true"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-primary">
                                            <strong><?php echo $meilleurNote->nom_etud.'<br/>'.$meilleurNote->prenom_etud.' : ';?><span class="text-danger" data-toggle="counter" data-to="<?php echo $meilleurNote->note_test;?>"></span></strong>
                                        </h2>
                                        <span class="text-muted"></span>
										
                                    </div>
                                </a>
                            </div>
                            <!-- END Simple Stats Widgets -->
                        </div>
                        <!-- END First Row -->
                        <!-- Second Row -->
						<div class="row">
                            <div class="col-sm-4">
                                <!-- Project Widget -->
                                <div class="widget">
                                    <div class="widget-content border-bottom">
                                        <span class="pull-right text-primary">Effectif : <strong class="text-danger"><?php echo $effecNote;?></strong></span>
                                      Compus de Brazzaville et Pointe Noire
										<h1 class="widget-heading h3"><b>La(ou les) meilleur(s) notes</b></h1>
                                    </div>
									
									<?php foreach($listeMeilleur as $element):?>
										<a href="javascript:void(0)" class="widget-content themed-background-muted text-center clearfix">
											<img src="img/placeholders/avatars/avatar6.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar pull-left">
											<h2 class="widget-heading h3 text-left text-success"><strong><?php echo $element->nom_etud; ?></strong> </h2>
											<h2 class="widget-heading h3 text-primary"><strong class="text-danger">Note : <?php echo $element->note_finale;?></strong> </h2>
											<strong><hr/></strong>
											<!--<div class="progress progress-striped progress-mini active">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
											</div>-->
										</a>
                                   <?php endforeach;?>
								   
                                    <div class="widget-content widget-content-full border-top">
                                        <div class="row text-center">
                                            <div class="col-xs-6 push-inner-top-bottom border-right">
                                                <i class="fa fa-check-circle-o"></i> On Time
                                            </div>
                                            <div class="col-xs-6 push-inner-top-bottom">
                                                <i class="fa fa-clock-o"></i> 17 Days
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Project Widget -->
                            </div>
                                       <div class="col-sm-4">
                                <!-- Project Widget -->
                                <div class="widget">
                                    <div class="widget-content border-bottom">
                                        <span class="pull-right text-primary">Effectif : <strong class="text-danger"><?php echo $effecTest;?></strong></span>
                                      Compus de Brazzaville et Pointe Noire
										<h1 class="widget-heading h3"><b>Les meilleurs notes du test</b> </h1>
                                    </div>
									<?php foreach($listeMeilleurtest as $element):?>
										<a href="javascript:void(0)" class="widget-content themed-background-muted text-center clearfix">
											<img src="img/placeholders/avatars/avatar6.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar pull-left">
											<h2 class="widget-heading h3 text-left text-success"><strong><?php echo $element->nom_etud;?></strong></h2>
											<h2 class="widget-heading h3 text-Primary"><strong class="text-danger">Note : <?php echo $element->note_test; ?></strong> </h2>
										   <strong><hr/></strong>
										   <!--<div class="progress progress-striped progress-mini active">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
											</div>-->
										</a>
									<?php endforeach;?>
                                    <div class="widget-content widget-content-full border-top">
                                        <div class="row text-center">
                                            <div class="col-xs-6 push-inner-top-bottom border-right">
                                                <i class="fa fa-check-circle-o"></i> On Time
                                            </div>
                                            <div class="col-xs-6 push-inner-top-bottom">
                                                <i class="fa fa-clock-o"></i> 17 Days
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Project Widget -->
                            </div>
                            <div class="col-sm-4">
                                <!-- Story Widget -->
                                <div class="widget">
                                    <div class="widget-content">
                                        <span class="pull-right text-muted">En vedette</span>
                                        Récit
                                    </div>
                                    <div class="widget-image">
                                        <img src="img/placeholders/photos/photo9.jpg" alt="image">
                                        <div class="widget-image-content">
                                            <h2 class="widget-heading"><a href="page_ready_article.html" class="text-light"><strong>Le voyage qui a changé ma vie</strong></a></h2>
                                            <h3 class="widget-heading text-light-op h4">Cela a changé ma façon de penser</h3>
                                        </div>
                                        <i class="gi gi-airplane"></i>
                                    </div>
                                    <div class="widget-content widget-content-full text-dark">
                                        <div class="row text-center">
                                            <div class="col-xs-4 push-inner-top-bottom border-right">
                                                <i class="fa fa-heart-o"></i> 9.5k
                                            </div>
                                            <div class="col-xs-4 push-inner-top-bottom border-right">
                                                <i class="fa fa-eye"></i> 76k
                                            </div>
                                            <div class="col-xs-4 push-inner-top-bottom">
                                                <i class="fa fa-share-alt"></i> 7.2k
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Story Widget -->
                            </div>
                        </div>
                        
                        <!-- END Second Row -->

                        <!-- Third Row -->
                        <div class="row">
                            <div class="col-sm-6 col-lg-8">
                                <!-- Chart Widget -->
                                <div class="widget">
                                    <div class="widget-content border-bottom">
                                        <span class="pull-right text-muted">Compus Brazzaville 2017</span>
                                        
										 Voici le graphique qui Affiche les statistiques des étudiants par Année
                                    </div>
                                    <div class="widget-content border-bottom themed-background-muted">
                                        <!-- Flot Charts (initialized in js/pages/readyDashboard.js), for more examples you can check out http://www.flotcharts.org/ -->
                                        <div id="chart-classic-dash" style="height: 393px;"></div>
										
                                    </div>
                                    <div class="widget-content widget-content-full">
                                        <div class="row text-center">
                                            <div class="col-xs-4 push-inner-top-bottom border-right">
                                                <h3 class="widget-heading"><i class="gi gi-wallet text-dark push-bit"></i> <br><small>Lites des projets en courre</small></h3>
                                            </div>
                                            <div class="col-xs-4 push-inner-top-bottom">
                                                <h3 class="widget-heading"><i class="gi gi-cardio text-dark push-bit"></i> <br><small>Projets en courre</small></h3>
                                            </div>
                                            <div class="col-xs-4 push-inner-top-bottom border-left">
                                                <h3 class="widget-heading"><i class="gi gi-life_preserver text-dark push-bit"></i> <br><small>3k+ Tickets</small></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Chart Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <!-- Stats User Widget -->
                                <a href="page_ready_profile.html" class="widget">
                                    <div class="widget-content border-bottom text-dark">
                                        <span class="pull-right text-muted">This week</span>
                                        Featured Author
                                    </div>
                                    <div class="widget-content border-bottom text-center themed-background-muted">
                                        <img src="img/placeholders/avatars/avatar13@2x.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x">
                                        <h2 class="widget-heading h3 text-dark">Anna Wigren</h2>
                                        <span class="text-muted">
                                            <strong>Logo Designer</strong>, Sweden
                                        </span>
                                    </div>
                                    <div class="widget-content widget-content-full-top-bottom">
                                        <div class="row text-center">
                                            <div class="col-xs-6 push-inner-top-bottom border-right">
                                                <h3 class="widget-heading"><i class="gi gi-briefcase text-dark push-bit"></i> <br><small>35 Projects</small></h3>
                                            </div>
                                            <div class="col-xs-6 push-inner-top-bottom">
                                                <h3 class="widget-heading"><i class="gi gi-heart_empty text-dark push-bit"></i> <br><small>5.3k Likes</small></h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END Stats User Widget -->

                                <!-- Mini Widgets Row -->
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="javascript:void(0)" class="widget">
                                            <div class="widget-content themed-background-info text-light-op text-center">
                                                <div class="widget-icon">
                                                    <i class="fa fa-facebook"></i>
                                                </div>
                                            </div>
                                            <div class="widget-content text-dark text-center">
                                                <strong>98k</strong><br>Followers
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="javascript:void(0)" class="widget">
                                            <div class="widget-content themed-background-danger text-light-op text-center">
                                                <div class="widget-icon">
                                                    <i class="fa fa-database"></i>
                                                </div>
                                            </div>
                                            <div class="widget-content text-dark text-center">
                                                <strong>15</strong><br>
                                                Active Servers
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- END Mini Widgets Row -->
                            </div>
                        </div>
                        <!-- END Third Row -->
                    </div>
                    <!-- END Page Content -->
</div>             <script>$(function(){ ReadyDashboard.init(); });</script>
</div>
</div>
<?php include'inc/template_end.php';?>