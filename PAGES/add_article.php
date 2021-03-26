<?php
include_once('connection.php');
include 'header.php';
if($_SESSION['user']==NULL){
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<!--
Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
-->
<html>
<head>
	<meta charset="utf-8">
	<title>BLOG MAROC | AJOUTER ARTICLE</title>
	<link href="../css/style_login.css" rel="stylesheet">
<link rel="stylesheet" href="../css/style_add_article.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Try the latest sample of CKEditor 4 and learn more about customizing your WYSIWYG editor with endless possibilities.">
</head>
<body >
<form type="file" action="upload.php"
           method="post"
           enctype="multipart/form-data">
	<main>
		<div class="grid-container card-body" style=" top: 73%; width: 83%; height: 115%;">
			<div class="champ">
						<div class="tt">Titre</div>
						<div class="inputtt"><input type="text" placeholder="enter le titre"  name="titre" required></div>
					
						<div class="tt">Sous Titre</div>
						<div class="inputtt"><input type="text" placeholder="enter le sous titre" name="sous_titre" required></div>
					
						<div class="tt">Categorie</div>
						
							<select class="inputtt" name="categorie">
								<?php 
									$sql="SELECT * FROM categorie";
									$re = mysqli_query($con , $sql);
									while($resultat = mysqli_fetch_assoc($re)){
								?>
									<option name="categorie"><?= $resultat['type'];?></option>
								<?php }?>
							</select>
						
						<div class="tt">Image</div>
						<div class="inputtt"><input type="file"  style="margin-top: 19px;" name="my_image"></div>
					
			</div>
			
				<div id="editor">
				<textarea class="form-control" name="description" required id="editor1"></textarea>
				</div>
				

           <input type="submit"  name="submit" class="btnn" style=" width: 208px; margin-top: 23px;" value="Ajouter blog">
			
		</div>
	</main>
</form>
<script>
	  CKEDITOR.replace( 'editor1' );
</script>

</body>
</html>
