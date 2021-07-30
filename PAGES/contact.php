<?php
include 'header.php';
    if (isset($_POST['message'])) {
        $position_arobase = strpos($_POST['email'], '@');
        if ($position_arobase === false)
            echo '<p>Votre email doit comporter un arobase.</p>';
        else {
            $retour = mail("oum.bouzekraoui@gmail.com", 'Salut, nouveau message ', $_POST['message'], 'From: ' . $_POST['email']);
            if($retour)
                echo '<p>Votre message a été envoyé.</p>';
            else
                echo '<p>Erreur.</p>';
        }
    }
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<style>
a.lien.P5 {
  color: #0c4a61 !important;
    }
</style>
	<title>Search | Contact</title>
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
		<div class="contact100-map" style="background: url('../image/bg.jpg');     background-size: cover;"></div>

		<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(../image/green.jpg);">
				<span class="contact100-form-title-1">
					Contact Us
				</span>

				<span class="contact100-form-title-2">
					Feel free to drop us a line below!
				</span>
			</div>

			<form class="contact100-form validate-form" type="file" action="" method="post" enctype="multipart/form-data">
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Nom:</span>
					<input class="input100" type="text" name="name" placeholder="Entrer votre nom" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Email:</span>
					<input class="input100" type="email" name="email" placeholder="Entrer votre adresse email" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Phone is required">
					<span class="label-input100">Telephone:</span>
					<input class="input100" type="number" name="tele" placeholder="Entrer votre num de telephone"required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message:</span>
					<textarea class="input100" name="message" placeholder="Votre message ...."required></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Envoyer
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
 <?php include_once('footer.php') ?>
</body>
</html>
