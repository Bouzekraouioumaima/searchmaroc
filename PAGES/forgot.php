<?php
include 'header.php';
include_once('connection.php');
include('nbr_onligne.php');

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $sql = "select * from user where email='".$email."'" ;
    $result = $con->query($sql);
    if ($result->num_rows==1) {
        /*envoyer une variable en get */ 
        $nb=50;
        $newpssword=bin2hex(openssl_random_pseudo_bytes($nb));
        $sqlupdate="UPDATE user SET pass='".$newpssword."' WHERE email='".$email."'";
        $rest=$con->query($sqlupdate);
        /*envoyer un email pour chonger le mot de passe*/
        $headers="MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .='From: ' . $_POST['email'];
        $msg="<html><head></head><body><h1> Click ici pour modifier votre mot de passe </h1><a href='http://localhost/BLOG/PAGES/change_motpasse.php?email=$email' style='font-size:20px'>bog maroc</a></body></html>";
        $retour = mail($_POST['email'], "blog maroc", $msg, $headers);
            if($retour){
                echo '<p>Votre message a été envoyé.</p>';
			 } else{
                echo '<p>Erreur.</p>';
                exit();}
    }else{
        header("Location: inscrir.php");
    }
}


 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Search | Changement de mot de passe</title>
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

		<div class="wrap-contact100" style="width: 713px !important;">
			<div class="contact100-form-title" style="background-image: url(../image/green.jpg);">
				<span class="contact100-form-title-1">
                 Avez vous oublier votre mot de passe?
				</span>

				<span class="contact100-form-title-2">
                Tu peux recuperer votre mot de passe d'ici
				</span>
			</div>

			<form class="contact100-form validate-form" method="post">
				<div class="wrap-input100 validate-input">
					<span class="label-input100">Email:</span>
					<input class="input100" type="email" name="email" placeholder="Entrer votre email " required>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
                    <input type="submit" name="submit" value="OK" class="contact100-form-btn" required></br>
				</div>
			</form>
		</div>
	</div>
 <?php include_once('footer.php') ?>
</body>
</html>
