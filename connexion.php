<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>GENC APP</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <body>
<div class="container">
	<section id="content">
		<form action="" method="POST">
			<h1>GENC_APP</h1>
			<?php
				if(isset($infoCon)) echo"<h4 style='color:red'>$infoCon</h4>";
				unset($_SESSION['infoCon']);
				?>
			<div>
				<input type="text" name="identifiant" placeholder="Identifiant" required="" id="username" />
			</div>
			<div>
				<input type="password" name="motDePasse" placeholder="Mot de passe" required="" id="password" />
			</div>
			<div>
				<input type="submit" name="connexion" value="Se connecter" />
				<a href="">Mot de passe oublié?</a>
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="index.php?c=ins">s'inscrire sur la liste d'attente</a>
		</div>
	</section><!-- content -->
</div><!-- container -->
</body>
  
    <script src="js/index.js"></script>

</body>
</html>
