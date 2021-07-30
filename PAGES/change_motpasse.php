<?php

include 'header.php'; 
include_once('connection.php');
include('nbr_onligne.php');
$_SESSION["user"]=null;
if (isset($_POST["submit"])) {
    $pass1 = $_POST['pass'];
    $pass2= $_POST['pass1'];
    if($pass1 == $pass2){
      echo 'test';
      $email=$_GET['email'];
      $sql = "UPDATE user SET pass='".$pass1."' WHERE email='".$email."'" ;
      $result = $con->query($sql);
        header("Location: identifier.php");
    }else{
      header('Location: http://localhost/BLOG/PAGES/changer_password.php?$email='.$email.'&pass='.$newpssword.'');
    }
}  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<style>
.label-input100 {
    text-align: center !important;
    width: 98px !important;
}
a.lien.P5 {
  color: #0c4a61 !important;
    }
</style>
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

		<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(../image/green.jpg);">
				<span class="contact100-form-title-1">
					Changez votre mot de passe
				</span>
			</div>

			<form class="contact100-form validate-form" type="file" action="" method="post" enctype="multipart/form-data">
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">mot de passe:</span>
					<input class="input100" type="text" name="pass" placeholder="Entrer votre mot de passe" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Confirmer votre mot de passe:</span>
					<input class="input100" type="text" name="pass1" placeholder="Confirmer votre mot de passe" required>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<input class="contact100-form-btn"  type="submit" name="submit" value="Changer" >
				</div>
			</form>
		</div>
	</div>
 <?php include_once('footer.php') ?>
</body>
</html>
