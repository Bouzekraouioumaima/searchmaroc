<?php
include 'header.php';
include_once('connection.php');
$_SESSION["user"]=null;
if (isset($_POST["submit"])) {
    $user = $_POST['user'];
    $pass= $_POST['pass'];
    $sql = "select * from user where username='$user' and pass='$pass'" ;
    $result = $con->query($sql);
  if ($result->num_rows==1) {
    $data=$result->fetch_assoc();
    $_SESSION["user"]=$data;
    header("Location: acceuil.php");
exit();
  }else{
    header("Location: add_article.php");
  }
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <style>
  h2{
    font-size: 24px !important;
  }
  @media screen and (max-width: 600px){
      body:before {
          height: 103%!important;
      }
      .card-body {
        top: 56%!important;
        !important
      }
}
  </style>
    <meta charset="utf-8">
    <title>BLOG MAROC | LOGIN</title>
    <link href="../css/style_login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class="container login-form" >
      <div class="content log">

          <div class="card-body" style="width: 48%;" >
              <form class="" action="" method="post">
                  <div class="form-group">
                      <label  for=""  ><h2 class="titre_input">Username</h2></label>
                      <input  type="text" class="form-control" name="user" value="" required>
                  </div>
                  <div class="form-group">
                      <label for=""><h2 class="titre_input">Mot de passe</h2></label>
                      <input type="password" class="form-control" name="pass" value="" required>
                  </div>
                  <input type="submit" name="submit" value="Se connecter" class="btnn" required></br>
                  <a href="inscription.php">Vous n'avez pas un compte s'inscrir d'ici .</a>
              </form>
          </div>
      </div>

    </div>
    </div>
  </body>
</html>
