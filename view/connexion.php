<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>Application GENC</title>

	<meta name="description" content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
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
	<script>
	body{background: #eee url(img/sativa.png);}
	html,body{
		position: relative;
		height: 100%;
	}

	.login-container{
		position: relative;
		width: 300px;
		margin: 80px auto;
		padding: 20px 40px 40px;
		text-align: center;
		background: #fff;
		border: 1px solid #ccc;
	}

	#output{
		position: absolute;
		width: 300px;
		top: -75px;
		left: 0;
		color: #fff;
	}

	#output.alert-success{
		background: rgb(25, 204, 25);
	}

	#output.alert-danger{
		background: rgb(228, 105, 105);
	}


	.login-container::before,.login-container::after{
		content: "";
		position: absolute;
		width: 100%;height: 100%;
		top: 3.5px;left: 0;
		background: #fff;
		z-index: -1;
		-webkit-transform: rotateZ(4deg);
		-moz-transform: rotateZ(4deg);
		-ms-transform: rotateZ(4deg);
		border: 1px solid #ccc;

	}

	.login-container::after{
		top: 5px;
		z-index: -2;
		-webkit-transform: rotateZ(-2deg);
		 -moz-transform: rotateZ(-2deg);
		  -ms-transform: rotateZ(-2deg);

	}

	.avatar{
		width: 100px;height: 100px;
		margin: 10px auto 30px;
		border-radius: 100%;
		border: 2px solid #aaa;
		background-size: cover;
	}

	.form-box input{
		width: 100%;
		padding: 10px;
		text-align: center;
		height:40px;
		border: 1px solid #ccc;;
		background: #fafafa;
		transition:0.2s ease-in-out;

	}

	.form-box input:focus{
		outline: 0;
		background: #eee;
	}

	.form-box input[type="text"]{
		border-radius: 5px 5px 0 0;
		text-transform: lowercase;
	}

	.form-box input[type="password"]{
		border-radius: 0 0 5px 5px;
		border-top: 0;
	}

	.form-box button.login{
		margin-top:15px;
		padding: 10px 20px;
	}

	.animated {
	  -webkit-animation-duration: 1s;
	  animation-duration: 1s;
	  -webkit-animation-fill-mode: both;
	  animation-fill-mode: both;
	}

	@-webkit-keyframes fadeInUp {
	  0% {
		opacity: 0;
		-webkit-transform: translateY(20px);
		transform: translateY(20px);
	  }

	  100% {
		opacity: 1;
		-webkit-transform: translateY(0);
		transform: translateY(0);
	  }
	}

	@keyframes fadeInUp {
	  0% {
		opacity: 0;
		-webkit-transform: translateY(20px);
		-ms-transform: translateY(20px);
		transform: translateY(20px);
	  }

	  100% {
		opacity: 1;
		-webkit-transform: translateY(0);
		-ms-transform: translateY(0);
		transform: translateY(0);
	  }
	}

	.fadeInUp {
	  -webkit-animation-name: fadeInUp;
	  animation-name: fadeInUp;
	}

	</script>
	
</head>
<body>
<div class="container">
	<div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
                <form action="" method="">
                    <input name="user" type="text" placeholder="username">
                    <input type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                </form>
            </div>
        </div>
        
</div>
</body>