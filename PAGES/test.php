<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include 'functions.php';
  $functions= New functions();
  $functions->add();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
	
	<script src="../ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="../css/style_add_article.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </head>
  <body>

     <div class="main dashboard">
        <div class="content">
           <div class="container">
                <form type="file" action="" method="post" enctype="multipart/form-data">
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
				
				</table>
				
			</div>
			
				<div id="editor">
				<textarea id="editor" name="editor" ></textarea>
				</div>
              <div class="row">

                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Photo</label><br>
                       <input type="file" name="fileToUpload"  id="fileToUpload">

                    </div>
                 </div>
              </div>
              <div class="d-grid gap-2 mt-4">
                 <button class="btn btn-primary" type="submit">ENREGISTRER</button>
              </div>
              </form>
           </div>
        </div>
     </div>
	 <script>
	CKEDITOR.replace('editor');
</script>
  </body>
</html>
