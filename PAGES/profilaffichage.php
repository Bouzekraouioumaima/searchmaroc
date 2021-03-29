<?php
include 'header.php';
include_once('connection.php');

include 'functions.php';
$functions= New functions();
if($_SESSION['user']['id'] != NULL){
  $info=$functions->info_uti($_SESSION['user']['id']);
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $functions->profil($_SESSION['user']['id']);
      header("Location: profil.php");
  }
}else{
  header("location: login.php");
}


?>
<!DOCTYPE html>
<html  dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BLOG MAROC | PROFIL</title>
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet"> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap core css -->
    <link href="../css/acceuil/bootstrap.css" rel="stylesheet">
    
    <!-- FontAwesome Icons core css -->
    <link href="../css/acceuil/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/acceuil/style.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="../css/acceuil/colors.css" rel="stylesheet">

    <!-- Version Garden css for this template -->
    <link href="../css/acceuil/garden.css" rel="stylesheet">
    <link href="../css/style_login.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<style>

body {
    background: white!important;
}
body:before {
    content: "";
    background: #00000000!important;
    }
    .titreprofil{
    font-size: 51px;
    font-family: 'Droid Sans';
    text-align: center;
        margin-bottom: 35px;
}
.imgprofil{
    vertical-align: top;
    border-radius: 114px;
    height: 202px;
}
.wd{
  display: flex;
    width: 91%;
    text-align: center;
}
@media screen and (max-width: 600px){
    .card {
        margin-top: 18%!important;
        }
        }
        .card {
        padding: 28px;
        border-radius: 15px;
        position: absolute;
        padding: 20px;
        color: black;
    }
</style>
  
  </head>
  <body>

     <div class="main dashboard">
        <div class="content">
           
               <form type="file" action="" method="post" enctype="multipart/form-data">
                  <div class="card" style=" margin-top: 71px; width: 100%;    height: 100%;">
                  <div class="row">
                  <div class="wd">
                    <div class="col-lg-4" data-aos="fade-right">
                      <div class="col-sm-12">
                          <img class="imgprofil" src="<?php echo $uploads; ?>" alt="" width="200px">
                      </div>
                      <div class="col-sm-12">
                          
                          <button class="abn"><a href="profil.php">Modifier</a></button>
                      </div>
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                      <h3 class="titreprofil"><?php echo $info['username']; ?></h3>
                      <div class="row">
                        <div class="col-lg-6">
                          <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Nom:</strong> <span><?php echo $info['nom']; ?></span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Prenom:</strong> <span><?php echo $info['prenom']; ?></span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Username:</strong> <span><?php echo $info['username']; ?></span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Date d'anniversaire:</strong> <span><?php echo $info['date_naiss']; ?></span></li>
                          </ul>
                        </div>
                        <div class="col-lg-6">
                          <ul>
                          <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $info['email']; ?></span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Nombre d'abonner:</strong> <span>30</span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Nombre d'article:</strong> <span>Master</span></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <section class="section wb">
                          <div class="container">
                              <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="page-wrapper">
                                          <div class="blog-list clearfix">
                                              <?php 
                                              $id=$info['id'];
                                              $sql = "SELECT * FROM article JOIN categorie on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id where user.id=$id ORDER BY article.id ASC ";
                                              $res = mysqli_query($con,  $sql);
                                              while ($images = mysqli_fetch_assoc($res)){
                                              ?>
                                              <div class="blog-box row">
                                                  <div class="col-md-4">
                                                      <div class="post-media">
                                                          <a href="garden-single.html" title="">
                                                              <img src="../uploadimg/<?= $images['image_article']?>" alt="" class="img-fluid" style="height: 100%;">
                                                              <div class="hovereffect"></div>
                                                          </a>
                                                      </div><!-- end media -->
                                                  </div><!-- end col -->

                                                  <div class="blog-meta big-meta col-md-8">
                                                      <span class="bg-aqua" ><a href="garden-category.html" title=""><?= $images['type']?></a></span>
                                                      <h4><a href="garden-single.html" title="" style="color: black;"><?= $images['titre']?></a></h4>
                                                      <p><?= $images['sous_titre']?></p>
                                                      <small><a href="garden-single.html" title="" style="color: #013d1b;"><?php $d=$images['date_partage']; echo date("Y/m/d", strtotime("$d"));?></a></small>
                                                      <small><a href="#" title="" style="color: #013d1b;">by <?= $images['nom']?></a></small>
                                                  </div><!-- end meta -->
                                              </div><!-- end blog-box -->
                                              <hr class="invis">
                                              <?php }?>       
                                          </div><!-- end blog-list -->
                                      </div>
                                      
                                  </div><!-- end col -->

                              </div><!-- end row -->
                          </div><!-- end container -->
                      </section>
                            </div>
                        </div>
               </form>
      
    </div>
     </div>

  </body>
</html>
