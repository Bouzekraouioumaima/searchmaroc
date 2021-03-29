<?php
include 'header.php';
include_once('connection.php');

include 'functions.php';
$functions= New functions();
$info=$functions->info_uti($_SESSION['user']['id']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $functions->profil($_SESSION['user']['id']);
    header("Location: profil.php");
}

?>
<!DOCTYPE html>
<html  dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BLOG MAROC | PROFIL</title>
    <link href="../css/style_login.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<style>
img, svg {
    vertical-align: top;
    border-radius: 114px;
    height: 202px;
}
body:before {
    height: 144%;
    }
</style>
  
  </head>
  <body>

     <div class="main dashboard">
        <div class="content">
           <div class="container">
               <form type="file" action="" method="post" enctype="multipart/form-data">
                  <div class="card-body" style="top: 81%!important;">
                     <div class="row ">
                        <div class="col-sm" style="margin-top: -98px;">
                           <div class="form-group">
                              <?php
                                 if ($info['image']!="") {
                                    $uploads="../uploadimg/".$info['image'];

                                 }else {
                                    $uploads="../uploadimg/empty.jpg";

                                 }
                              ?>
                              <img src="<?php echo $uploads; ?>" alt="" width="200px">
                              <input id="d" type="file" name="fileToUpload"  id="fileToUpload" >
                           </div>
                        </div>
                       
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""class="titre_input">Nom</label>
                              <input id="d" type="text" class="form-control" name="nom" value="<?php echo $info['nom']; ?>" required>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""class="titre_input">Prenom</label>
                              <input id="d" type="text" class="form-control" name="prenom" value="<?php echo $info['prenom']; ?>" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""class="titre_input">Username</label>
                              <input id="d" type="text" class="form-control" name="username" value="<?php echo $info['username']; ?>" required>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""class="titre_input">Email</label>
                              <input id="d" type="text" class="form-control" name="email"value="<?php echo $info['email']; ?>"  required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""class="titre_input">Mot de passe</label>
                              <input type="password" class="form-control"  name="pass" value="<?php echo $info['pass']; ?>"  required>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <label for=""class="titre_input">Date De Naissance</label>
                              <input id="d" type="date" class="form-control" name="date_naiss" value="<?php echo $info['date_naiss']; ?>"  required>
                           </div>
                        </div>
                     </div>
                     <div class="row" style="padding-bottom: 47px;">
                        
                        <div class="col-sm">
                           <div class="d-grid gap-2 mt-4">
                              <button id="d" class="btnn" type="submit" >Enregistrer</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
              </form>
           </div>
        </div>
     </div>

  </body>
</html>
