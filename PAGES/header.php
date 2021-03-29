<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #013d1b;
  MARGIN-BOTTOM: 15PX;
  width: 100%;
  z-index: 99;
}

.topnav a {
  font-family: math;
    margin-top: 15px;
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 24px;
    text-decoration: none;
    font-size: 27px;
    padding-bottom: 0;
    padding-top: 5px;
   
}

.topnav a:hover {
  color: #ab0505 !important;
}

.topnav .icon {
  display: none;
}
.menu {
    display: flex;
    justify-content: center;
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
  .menu {
    display: block;
}
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}
</style>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>

<div class="topnav" id="myTopnav">
  
    <?php 
    if( isset($_SESSION['user']) ){
      if ($_SESSION['user']['image']!="")
      {
       $uploads="../uploadimg/".$_SESSION['user']['image'];
      }else {
       $uploads="../uploadimg/empty.jpg";
     }
    }
      
     ?> 
     <div class="menu">
      <a><img src="../image/icon1.png" style="width: 40px;margin-bottom:10px;border-radius: 50%; HEIGHT: 40PX;OBJECT-FIT: cover;"></a>

      <a class="lien" href="acceuil.php"><i class="fas fa-home"></i> Acceuil</a>
      <a class="lien"href="categorie.php"><i class="fab fa-blogger"></i> Catégories</a>
      <?php  if ( !isset($_SESSION["user"])) {?>
        <a  class="lien" href="login.php"><i class="fas fa-plus-circle"></i>Ecrire article </a>
          <a class="lien" href="login.php"><i class="fas fa-sign-in-alt"></i> S'identifier</a>
          <a  class="lien" href="inscription.php"><i class="fas fa-prescription-bottle-alt"></i> S'inscrire</a>
          <a  class="lien" href="contact.php"><i class="fas fa-feather-alt"></i> Contacez-nous</a>
      <?php } else {?>
          <a  class="lien" href="add_article.php"><i class="fas fa-plus-circle"></i>Ecrire article </a>
          <a  class="lien" href="contact.php"><i class="fas fa-feather-alt"></i> Contacez-nous</a>
          <a  class="lien" href="deconnecter.php"><i class="fas fa-sign-out-alt"></i> Déconnection</a>
          <a  class="lien" href="profilaffichage.php"><img src="<?php echo $uploads; ?>" style="width: 40px;margin-bottom:10px;border-radius: 50%; HEIGHT: 40PX;OBJECT-FIT: cover;">Profil</a>
      <?php } ?>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>
