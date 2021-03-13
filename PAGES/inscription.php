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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </head>
  <body>

     <div class="main dashboard">
        <div class="content">
           <div class="container">
                <form type="file" action="" method="post" enctype="multipart/form-data">
              <div class="row">
                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Nom</label>
                       <input type="text" class="form-control" name="nom" value="" required>
                    </div>
                 </div>
                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Prenom</label>
                       <input type="text" class="form-control" name="prenom" value="" required>
                    </div>
                 </div>
                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Username</label>
                       <input type="text" class="form-control" name="username" value="" required>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Email</label>
                       <input type="text" class="form-control" name="email" value="" required>
                    </div>
                 </div>
                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Mot de passe</label>
                       <input type="password" class="form-control" name="pass" value="" required>
                    </div>
                 </div>
                 <div class="col-sm-4">
                    <div class="form-group">
                       <label for="">Date De Naissance</label>
                       <input type="date" class="form-control" name="date_naiss" value="" required>
                    </div>
                 </div>
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

  </body>
</html>
