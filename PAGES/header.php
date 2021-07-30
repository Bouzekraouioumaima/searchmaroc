<?php
  session_start();
  
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  background-color: #f06c34;
  width: 100%;
  height: 58px;
  z-index: 99;
}

.topnav a {
  font-family: math;
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 24px;
    text-decoration: none;
    font-size: 24px;
    padding-bottom: 0;
   
}

.topnav a:hover {
  color: #0c4a61 !important;
}

.topnav .icon {
  display: none;
}
.menu {
    display: flex;
    justify-content: center;
}
.logo{
  color: #0c4a61;
    font-size: 30px;
    font-family: 'FontAwesome';
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
  .menu {
    display: block;
    background: #f06c34;
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
      <a href="acceuil.php" style="display: flex;"><img src="https://img.icons8.com/windows/32/000000/search--v1.png" style="width: 34px; height: 34px;"/><div class="logo">SEARCH</div></a>

      <a class="lien p1" href="acceuil.php"> Acceuil</a>
      <a class="lien P2"href="categorie.php">Catégories</a>
      <?php  if ( !isset($_SESSION["user"])) {?>
        <a   href="identifier.php">Ecrire article </a>
          <a class="lien P3" href="identifier.php"> S'identifier</a>
          <a  class="lien P4" href="inscrir.php">S'inscrire</a>
          <a  class="lien P5" href="contact.php">Contacez-nous</a>
      <?php } else {?>
          <a  class="lien P3" href="addarticle.php">Ecrire article </a>
          <a  class="lien P5" href="contact.php">Contacez-nous</a>
          <a  class="lien P6" href="deconnecter.php"> Déconnection</a>
          <a  class="lien P7" href="profil_personnel.php"><img src="<?php echo $uploads; ?>" style="width: 40px;margin-bottom:10px;border-radius: 50%; HEIGHT: 40PX;OBJECT-FIT: cover;">Profil</a>
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
