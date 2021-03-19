<?php
include 'header.php';
include_once('connection.php');
$_SESSION["user"]=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass= $_POST['pass'];
    $sql = "select * from user where username='$user' and pass=md5('$pass')" ;
    $result = $conn->query($sql);
  if ($result->num_rows==1) {
    $data=$result->fetch_assoc();
    $_SESSION["user"]=$data;
    header("Location: index.php");
exit();
  }
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="../css/style_login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class="container login-form" >
      <div class="content log">

          <div class="card-body">
              <form class="" action="" method="post">
                  <div class="form-group">
                      <label  for="" ><h2>Username</h2></label>
                      <input  type="text" class="form-control" name="user" value="" required>
                  </div>
                  <div class="form-group">
                      <label for=""><h2>Mot de passe</h2></label>
                      <input type="password" class="form-control" name="pass" value="">
                  </div>
                  <input type="submit" name="" value="Se connecter" class="btnn" required>
              </form>
          </div>
      </div>

    </div>
    </div>
  </body>
</html>
