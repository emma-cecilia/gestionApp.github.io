<div id="sidebar">
<!-- Sidebar Brand -->
<div id="sidebar-brand" class="themed-background">
	<a href="" class="sidebar-title">
		<i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide">Application<strong>GENC</strong></span>
	</a>
</div>
<!-- END Sidebar Brand -->

<!-- Wrapper for scrolling functionality -->
<div id="sidebar-scroll">
	<!-- Sidebar Content -->
	<div class="sidebar-content">
		<!-- Sidebar Navigation -->
		<ul class="sidebar-nav">
			<li>
				<a href=""><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
			</li>
			<li class="sidebar-separator">
				<i class="fa fa-ellipsis-h"></i>
			</li>
			<li>
				<a href="" class="sidebar-nav-menu <?php  echo (isset($_GET['c']))?'open':'';?>"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-rocket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Scolarité</span></a>
				<ul>
					<li>
						<a href="?c=lst" <?php  echo (isset($_GET['c']) && ($_GET['c']=='lst'))?'class="active"':'';?>>Liste Etudiant</a>
					</li>
					<li>
						<a href="?c=lstp" <?php  echo (isset($_GET['c']) && ($_GET['c']=='lstp'))?'class="active"':'';?>>Liste Personel</a>
					</li>
					<li>
						<a href="?c=lsf" <?php  echo (isset($_GET['c']) && ($_GET['c']=='lsf'))?'class="active"':'';?>>Liste Formation</a>
					</li>
					<li>
						<a href="?c=trb" <?php  echo (isset($_GET['c']) && ($_GET['c']=='trb'))?'class="active"':'';?>>Trombinoscope</a>
					</li>
					<li>
						<a href="?c=sms" <?php  echo (isset($_GET['c']) && ($_GET['c']=='sms'))?'class="active"':'';?>>Message</a>
					</li>
				</ul>
			</li>
		</ul>
		<!-- END Sidebar Navigation -->
	</div>
	<!-- END Sidebar Content -->
</div>
<!-- END Wrapper for scrolling functionality -->

<!-- Sidebar Extra Info -->

<!-- END Sidebar Extra Info -->
</div>
