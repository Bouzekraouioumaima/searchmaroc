<?php
include 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $position_arobase = strpos($_POST['email'], '@');
   if ($position_arobase === false)
       echo '<p>Votre email doit comporter un arobase.</p>';
   else {
      $headers="MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .='From: ' . $_POST['email'];
      $msg="<html><head></head><body><h1>Vous avez inscrie dans </h1><a href='http://localhost/BLOG/PAGES/login.php' style='font-size:20px'>bog maroc</a></body></html>";
       $retour = mail($_POST['email'], "blog maroc", $msg, $headers);
       if($retour)
           echo '<p>Votre message a été envoyé.</p>';
       else
           echo '<p>Erreur.</p>';
   }
  include 'functions.php';
  $functions= New functions();
  $functions->add();
  
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<style>
a.lien.P4 {
  color: #0c4a61 !important;
    }
</style>
	<title>Search | Inscrir</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/font_awesome/font-awesome.min.css">
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="contact100-map" style="background: url('../image/login.jpg');     background-size: cover;"></div>

		<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(../image/green.jpg);">
				<span class="contact100-form-title-1">
					S'inscrir
				</span>

				<span class="contact100-form-title-2">
				Créer un compte 
				</span>
			</div>

			<form class="contact100-form validate-form" type="file" action="" method="post" enctype="multipart/form-data">
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Photo:</span>
					<input class="input100" type="file" name="fileToUpload"  id="fileToUpload" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Nom:</span>
					<input class="input100" type="text" name="nom" placeholder="Entrer votre nom" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Phone is required">
					<span class="label-input100">Prenom:</span>
					<input class="input100" type="text" name="prenom" placeholder="Entrer votre prenom"required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Username:</span>
					<input class="input100" type="text" name="username" placeholder="Entrer votre username"required>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Email:</span>
					<input class="input100" type="email" name="email" placeholder="Entrer votre email"required>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Mot de passe:</span>
					<input class="input100" type="password" name="pass" placeholder="Entrer votre mot de passe"required>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Date De Naissance:</span>
					<input class="input100" type="date" name="date_naiss" required>
					<span class="focus-input100"></span>
				</div>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit" >ENREGISTRER</button>
				</div>
				<a href="identifier.php">Vous avez déjà un compte s'identifier d'ici .</a>
			</form>
		</div>
	</div>
 <?php include_once('footer.php') ?>
</body>
</html>
