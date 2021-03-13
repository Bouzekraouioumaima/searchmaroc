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
  background-color: #ab0505;
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
  color: #112b1d;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
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
</head>
<body>

<div class="topnav" id="myTopnav">
<a href="index.html" style="    margin: 0 !important;"><img src="../image/logo.png" alt="Blog maroc" style="width: 100px;"></a>
  <a href="#home" >Acceuil</a>
  <a href="#news">Categorie</a>
  <a href="#contact">profil</a>
  <a href="#about">Inscrire</a>
  <a href="#about">Identifier</a>
  <a href="#about">Deconnecter</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
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
