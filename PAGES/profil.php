<?php
include 'header.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


include '../functions.php';
$functions= New functions();
$info=$functions->info_uti($_SESSION['user']['id']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $functions->profil($_SESSION['user']['id']);
    header("Location: profil.php");
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
                  <div class="row mb-4 justify-content-center">
                    <div class="col-sm-4">
                       <div class="form-group">
                         <?php
                         if ($info['image']!="") {
                           $uploads="../uploadimg/".$info['image'];

                         }else {
                           $uploads="../uploadimg/empty.jpg";

                         }
                          ?>
                         <img src="<?php echo $uploads; ?>" alt="" width="200px">
                         <input id="d" type="file" name="fileToUpload"  id="fileToUpload" disabled>

                       </div>
                    </div>
                  </div>
              <div class="row">
                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Nom</label>
                       <input id="d" type="text" class="form-control" name="nom" value="<?php echo $info['nom']; ?>"disabled required>
                    </div>
                 </div>
                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Prenom</label>
                       <input id="d" type="text" class="form-control" name="prenom" value="<?php echo $info['prenom']; ?>"disabled required>
                    </div>
                 </div>
                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Username</label>
                       <input id="d" type="text" class="form-control" name="username" value="<?php echo $info['username']; ?>"disabled required>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Email</label>
                       <input id="d" type="text" class="form-control" name="email"value="<?php echo $info['email']; ?>" disabled required>
                    </div>
                 </div>
                 <div class="col-sm">
                    <div class="form-group">
                       <label for="">Mot de passe</label>
                       <input type="password" class="form-control"  name="pass" value="<?php echo $info['pass']; ?>" disabled required>
                    </div>
                 </div>
                 <div class="col-sm-4">
                    <div class="form-group">
                       <label for="">Date De Naissance</label>
                       <input id="d" type="date" class="form-control" name="date_naiss" value="<?php echo $info['date_naiss']; ?>" disabled required>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-sm">
              <div class="d-grid gap-2 mt-4">
                <button id="c" class="btn btn-primary"  type="submit"><i class="fas fa-user-edit"></i></button>
                 <button id="d" class="btn btn-primary" type="submit" disabled>Enregistrer</button>
              </div>
            </div>
            </div>
              </form>
           </div>
        </div>
     </div>

  </body>
</html>
