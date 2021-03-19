<?php
session_start();
if($_SESSION['user']== null){
 
}else{
  if ($_SESSION['user']['image']!="") {
    $uploads="../uploadimg/".$_SESSION['user']['image'];
  
  }else {
    $uploads="../uploadimg/empty.jpg";
  
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </head>
  <body>
    <div id="main">
  <div class="container">
    <div class="row">
       <div class="col-sm">
    <div  style="margin-top:5px;margin-bottom:20px;">
      <img src="../image/icon1.png" style="width: 60px;margin-bottom:15px">
      <h4>Blog Maroc</h4>
    </div>
  </div>
  <div class="col-sm">
<div  style="margin-top:15px;margin-bottom:30px;">

</div>
</div>
</div>
    <nav>
      <div class="nav-fostrap">
        <title>Home</title>
        <ul>
          <li><a href="acceuil.php"><i class="fas fa-home"></i> Acceuil</a></li>
          <li><a href=""><i class="fab fa-blogger"></i> Catégories<span class="arrow-down"></span></a>
            <ul class="dropdown">
              <li><a href="">Sport</a></li>
              <li><a href="">Music</a></li>
              <li><a href="">Fights</a></li>
              <li><a href="">Travels</a></li>
            </ul>
          </li>
          <li><a href="profil.php"><i class="fas fa-users"></i> Profil</a></li>
          <li><a href=""><i class="fas fa-feather-alt"></i> My Blogs</a></li>
          <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> S'identifier<span class="arrow-down"></span></a>
            <ul class="dropdown">
              <li><a href="inscription.php"><i class="fas fa-prescription-bottle-alt"></i> S'inscrire</a></li>
            </ul>
          </li>
          <li><a href="">Contactez-nous<span class="arrow-down"></span></a>
            <ul class="dropdown">
              <li><a href=""><i class="fas fa-envelope-square"></i> Email</a></li>
              <li><a href=""><i class="fab fa-facebook-square"></i> Facebook</a></li>
              <li><a href=""><i class="fab fa-instagram"></i> Instagram</a></li>
            </ul>
          </li>
          <li style="margin-left: 150px;">
          <img src="<?php echo $uploads; ?>"size="20" height="30" width="30"style="border-radius: 50%; HEIGHT: auto;OBJECT-FIT: cover;" alt="">
        <h7>  <?php echo $_SESSION['user']['username'];?></h7>
          <span class="arrow-down"></span>
          <ul class="dropdown" >
            <li><a href=""><i class="fas fa-question-circle"></i> Page d'aide</a></li>
            <li><a href=""><i class="fas fa-cog"></i> Réglage</a></li>
            <li ><a href="index.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
          </ul>
          </li>
        </ul>
      </div>
      <div class="nav-bg-fostrap">
        <div class="navbar-fostrap"> <span></span> <span></span> <span></span> </div>
        <a href="" class="title-mobile">Blog Maroc</a>
      </div>
    </nav>
    <div class='content'>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('.navbar-fostrap').click(function(){
      $('.nav-fostrap').toggleClass('visible');
      $('body').toggleClass('cover-bg');
    });
  });

</script>
  </body>
</html>
