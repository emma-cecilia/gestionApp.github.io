<header class="navbar navbar-inverse navbar-fixed-top">
<!-- Left Header Navigation -->
<ul class="nav navbar-nav-custom">
	<!-- Main Sidebar Toggle Button -->
	<li>
		<a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
			<i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
			<i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
		</a>
	</li>
	<!-- END Main Sidebar Toggle Button -->

	<!-- Header Link -->
	<li class="hidden-xs animation-fadeInQuick">
		<a href=""><strong>ACCUEIL</strong></a>
	</li>
	<!-- END Header Link -->
</ul>
<!-- END Left Header Navigation -->

<!-- Right Header Navigation -->
<ul class="nav navbar-nav-custom pull-right">
	<!-- Search Form -->
	<li>
		<form action="" method="post" class="navbar-form-custom">
			<input type="hidden" id="top-search" name="top-search" class="form-control" placeholder="Search..">
		</form>
	</li>
	<!-- END Search Form -->

	<!-- Alternative Sidebar Toggle Button -->
	<li>
		<a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');this.blur();">
			<i class="gi gi-settings"></i>
		</a>
	</li>
	<!-- END Alternative Sidebar Toggle Button -->

	<!-- User Dropdown -->
	<li class="dropdown">
		<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
			<img src="img/placeholders/avatars/avatar9.jpg" alt="avatar">
		</a>
		<ul class="dropdown-menu dropdown-menu-right">
			<li class="dropdown-header">
				<strong>
				<?php
					echo isset($_SESSION['user'])?$_SESSION['user']->statut:'Erreur';
					echo '<br>';
					echo isset($_SESSION['user'])?$_SESSION['user']->nom:'veuillez vous reconnecter!';
				?>
				</strong>
			</li>
			<!--
			<li>
				<a href="">
					<i class="fa fa-inbox fa-fw pull-right"></i>
					Messagerie
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa fa-pencil-square fa-fw pull-right"></i>
					Profil
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa fa-picture-o fa-fw pull-right"></i>
					Gestion
				</a>
			</li>
			<li class="divider"><li>
			<li>
				<a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');">
					<i class="gi gi-settings fa-fw pull-right"></i>
					Configuration
				</a>
			</li>
			<li>
				<a href="">
					<i class="gi gi-lock fa-fw pull-right"></i>
					sortir
				</a>
			</li>-->
			<li>
				<a href="?unCon">
					<i class="fa fa-power-off fa-fw pull-right"></i>
					Déconnection
				</a>
			</li>
		</ul>
	</li>
	<!-- END User Dropdown -->
</ul>
<!-- END Right Header Navigation -->
</header>