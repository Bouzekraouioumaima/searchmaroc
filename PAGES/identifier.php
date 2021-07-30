<?php
include 'header.php';
include_once('connection.php');
$_SESSION["user"]=null;
if (isset($_POST["submit"])) {
    $user = $_POST['user'];
    $pass= $_POST['pass'];
    $sql = "select * from user where email='$user' and pass='$pass'" ;
    $result = $con->query($sql);
  if ($result->num_rows==1) {
    $data=$result->fetch_assoc();
    $_SESSION["user"]=$data;
    header("Location: acceuil.php");
exit();
  }else{
    header("Location: addarticle.php");
  }
}


 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<style>
a.lien.P3 {
  color: #0c4a61 !important;
    }
</style>
	<title>Search | Identifier</title>
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
					Identifier
				</span>

				<span class="contact100-form-title-2">
                <?php
                        if(isset($_GET['check'])){
                      ?>
                          <h3>Visiter votre email pour changer votre mot de passe</h3>
                      <?php   }elseif(isset($_GET['find'])){?>
                        <h3>Vous avez déjà un compte</h3>
                      <?php    }   ?>
				</span>
			</div>

			<form class="contact100-form validate-form" type="file" action="" method="post" enctype="multipart/form-data">
				<div class="wrap-input100 validate-input">
					<span class="label-input100">email:</span>
					<input class="input100" type="email" name="user" placeholder="Entrer votre email" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Mot de passe:</span>
					<input class="input100" type="password" name="pass" placeholder="Entrer votre mot de passe" required>
					<span class="focus-input100"></span>
				</div>
				<div class="container-contact100-form-btn">
                    <input type="submit" name="submit" value="Se connecter" class="contact100-form-btn" required>
				</div>
                <a href="inscrir.php">Vous n'avez pas un compte s'inscrir d'ici .</a></br></br>
                  <a href="forgot.php?forgot=<?php echo uniqid(true);?>">Vous avez oublier votre mot de passe.</a>
             
			</form>
		</div>
	</div>
 <?php include_once('footer.php') ?>
</body>
</html>
