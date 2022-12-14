<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>Application GENC</title>

	<meta name="description" content="GENCAPP is a Web Application designed on Bootstrap Admin Template">
	<meta name="author" content="pixelcave">
	<meta name="robots" content="noindex, nofollow">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Icons -->
	<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
	<link rel="shortcut icon" href="img/favicon.png">
	<link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
	<link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
	<link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
	<link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
	<link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
	<link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
	<link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
	<link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
	<!-- END Icons -->

	<!-- Stylesheets -->
	<!-- Bootstrap is included in its original form, unaltered -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Related styles of various icon packs and plugins -->
	<link rel="stylesheet" href="css/plugins.css">

	<!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
	<link rel="stylesheet" href="css/main.css">

	<!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

	<!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last)
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">-->
	<link rel="stylesheet" href="css/themes.css">
	<!-- END Stylesheets -->

	<!-- Modernizr (browser feature detection library) -->
	<script src="js/vendor/modernizr-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="backfrontassets/media/css/jquery.dataTables.css">
	<script type="text/javascript" language="javascript" src="backfrontassets/media/js/jquery.dataTables.js"></script>

	<!-- BOOTSTRAP CHOSEN-->
	<script src="backfrontassets/chosen/jquery.min.js"></script>
	<script src="backfrontassets/chosen/chosen.jquery.js"></script>
	<script>
	  $(function() {
		$('.chosen-select').chosen();
		$('.chosen-select-deselect').chosen({ allow_single_deselect: true });
	  });
	</script>
	<link rel="stylesheet" href="backfrontassets/chosen/chosen.css">
</head>
<body>
	<!-- Page Wrapper -->
	<!-- In the PHP version you can set the following options from inc/config file -->
	<!--
		Available classes:

		'page-loading'      enables page preloader
	-->
	<div id="page-wrapper" class="page-loading">
		<!-- Preloader -->
		<!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
		<!-- Used only if page preloader enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
		<div class="preloader">
			<div class="inner">
				<!-- Animation spinner for all modern browsers -->
				<div class="preloader-spinner themed-background hidden-lt-ie10"></div>

				<!-- Text for IE9 -->
				<h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
			</div>
		</div>
		<!-- END Preloader -->

		<!-- Page Container -->
		<!-- In the PHP version you can set the following options from inc/config file -->
		<!--
			Available #page-container classes:

			'sidebar-light'                                 for a light main sidebar (You can add it along with any other class)

			'sidebar-visible-lg-mini'                       main sidebar condensed - Mini Navigation (> 991px)
			'sidebar-visible-lg-full'                       main sidebar full - Full Navigation (> 991px)

			'sidebar-alt-visible-lg'                        alternative sidebar visible by default (> 991px) (You can add it along with any other class)

			'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
			'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

			'fixed-width'                                   for a fixed width layout (can only be used with a static header/main sidebar layout)

			'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links (You can add it along with any other class)
		-->
		<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
			<!-- Alternative Sidebar -->
			<div id="sidebar-alt" tabindex="-1" aria-hidden="true">
				<!-- Toggle Alternative Sidebar Button (visible only in static layout) -->
				<a href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"><i class="fa fa-times"></i></a>

				<!-- Wrapper for scrolling functionality -->
				<div id="sidebar-scroll-alt">
					<!-- Sidebar Content -->
						<?php if(isset($_SESSION['user'])) include('inc/sidebar_content.php');?>
					<!-- END Sidebar Content -->
				</div>
				<!-- END Wrapper for scrolling functionality -->
			</div>
			<!-- END Alternative Sidebar -->

			<!-- Main Sidebar -->
				<?php if(isset($_SESSION['user'])) include('inc/main_sidebar.php');?>
			<!-- END Main Sidebar -->

			<!-- Main Container -->
			<div id="main-container">
				<!-- Header -->
				<!-- In the PHP version you can set the following options from inc/config file -->
				<!--
					Available header.navbar classes:

					'navbar-default'            for the default light header
					'navbar-inverse'            for an alternative dark header

					'navbar-fixed-top'          for a top fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
						'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

					'navbar-fixed-bottom'       for a bottom fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
						'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
				-->
					<?php if(isset($_SESSION['user'])) include('inc/main_header.php');?>
				<!-- END Header -->

				<!-- Page content -->
				<!--
					Available classes when #page-content-sidebar is used:

					'inner-sidebar-left'      for a left inner sidebar
					'inner-sidebar-right'     for a right inner sidebar
				-->
				<!-- <div id="page-content" class="inner-sidebar-left"> -->
					<!-- Email Center Content -->
					<div class="block overflow-hidden">
						<!-- Message List -->
						<div id="message-list">
							<!-- Title -->
							<div class="block-title clearfix">
								<div class="block-options pull-right">
									<a href="?c" class="btn btn-effect-ripple btn-danger" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-times"></i></a>
								</div>
							</div>