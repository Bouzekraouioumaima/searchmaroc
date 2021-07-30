<?php
include_once('connection.php');
include('nbr_onligne.php');
include 'header.php';
include 'functions.php';
if($_SESSION['user']==NULL){
	header('Location: identifier.php');
}
$functions= New functions();
$info=$functions->info_uti($_SESSION['user']['id']);
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
	<title>Search | Modifier profil</title>
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
					Modifier votre profil
                    <div class='img_profil'>
                    <?php
                                if ($info['image']!="") {
                                $uploads="../uploadimg/".$info['image'];

                                }else {
                                $uploads="../uploadimg/empty.jpg";

                                }
                            ?> 
                            <img src="<?php echo $uploads; ?>" alt="" style="width:130px;border-radius: 83px; height: 145px;border-style: double;">
                    </div>
				</span>
			</div>

			<form class="contact100-form validate-form" type="file" action="" method="post" enctype="multipart/form-data">
            <div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Photo:</span>
					<input class="input100" type="file" name="fileToUpload"  id="fileToUpload" value="cccc<?= $info['image'];?>" required>
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Nom:</span>
					<input class="input100" type="text" name="nom" value="<?= $info['nom'];?>" required>
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Prenom:</span>
					<input class="input100" type="text" name="prenom" value="<?= $info['prenom'];?>" required>
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Username:</span>
					<input class="input100" type="text" name="username" value="<?= $info['username'];?>" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Email:</span>
					<input class="input100" type="email" name="email" value="<?= $info['email'];?>" required>
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Mot de passe :</span>
					<input class="input100" type="password" name="pass" value="<?= $info['pass'];?>" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Date de naissence:</span>
					<input class="input100" type="date" name="date_naiss" value="<?= $info['date_naiss'];?>" required></input>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="submit">
						<span>
							Envoyer
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
                    <?php
                        if(isset($_POST['submit'])){
                            $update=$functions->profil($_SESSION['user']['id']);

                        }
                    ?>
				</div>
			</form>
		</div>
	</div>
 <?php include_once('footer.php') ?>
</body>
</html>
