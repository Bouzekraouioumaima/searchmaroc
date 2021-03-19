<?php
include_once('connection.php');
include 'header.php';

?>
<!DOCTYPE html>
<!--
Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>BLOG MAROC | AJOUTER ARTICLE</title>
	<script src="../ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="../css/style_add_article.css">
	<script src="../ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="../ckeditor/samples/css/samples.css">
	<link rel="stylesheet" href="../ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Try the latest sample of CKEditor 4 and learn more about customizing your WYSIWYG editor with endless possibilities.">
</head>
<body >
<form type="file" action="upload.php"
           method="post"
           enctype="multipart/form-data">
	<main>
		<div class="grid-container">
			<div class="champ">
				<table>
					<tr>
						<td>Titre</td>
						<td><input type="text" placeholder="enter le titre"  name="titre" required></td>
					</tr>
					<tr>
						<td>Sous Titre</td>
						<td><input type="text" placeholder="enter le sous titre" name="sous_titre" required></td>
					</tr>
					<tr>
						<td>Categorie</td>
						<td>
							<select name="categorie">
								<?php 
									$sql="SELECT * FROM categorie";
									$re = mysqli_query($con , $sql);
									while($resultat = mysqli_fetch_assoc($re)){
								?>
									<option><?= $resultat['type'];?></option>
								<?php }?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Image</td>
						<td><input type="file" 
                  name="my_image"></td>
					</tr>
				</table>
				
			</div>
			
				<div id="editor">
				<textarea id="editor" name="editor" ></textarea>
				</div>
				

           <input type="submit" 
                  name="submit"
                  value="Upload">
			
		</div>
	</main>
</form>
<script>
	CKEDITOR.replace('editor');
</script>

</body>
</html>
