<?php
include_once('connection.php');
include('nbr_onligne.php');
include 'header.php';
if($_SESSION['user']==NULL){
	header('Location: identifier.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Search | Ecrire article</title>
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
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

</head>
<body>


	<div class="container-contact100">
		<div class="contact100-map" style="background: url('../image/art.jpg');     background-size: cover;"></div>

		<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(../image/green.jpg);">
				<span class="contact100-form-title-1">
					Ecrire une article
				</span>

				<span class="contact100-form-title-2">
					etre libre d'exprimer
				</span>
			</div>

			<form class="contact100-form validate-form"  type="file" action="upload.php" method="post" enctype="multipart/form-data">
				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Titre:</span>
					<input class="input100" type="text" name="titre" placeholder="Entrer le titre" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Sous titre:</span>
					<input class="input100" type="text" name="sous_titre" placeholder="Entrer le sous titre" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" >
					<span class="label-input100">Categorie:</span>
					<select class="input100" name="categorie" style="margin-top: 17px;">
								<?php 
									$sql="SELECT * FROM categorie";
									$re = mysqli_query($con , $sql);
									while($resultat = mysqli_fetch_assoc($re)){
								?>
									<option name="categorie"><?= $resultat['type'];?></option>
								<?php }?>
							</select>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Image:</span>
					<div class="inputtt"><input type="file"  style="margin-top: 19px;" name="my_image"></div>
					<span class="focus-input100"></span>
				</div>
                <div id="editor">
				<textarea class="form-control" name="description" required id="editor1"></textarea>
				</div>
				<div class="container-contact100-form-btn">
					
					<input type="submit"  name="submit" class="contact100-form-btn" style=" width: 208px; margin-top: 23px;" value="Ajouter blog">
				</div>
			</form>
		</div>
	</div>
    <script>
	  CKEDITOR.replace( 'editor1' );
</script>
 <?php include_once('footer.php') ?>
</body>
</html>
