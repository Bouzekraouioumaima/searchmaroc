<?php
session_start();
include_once('connection.php');
include 'nav.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>
<style>
.buttonsupp{
  COLOR: white;
    background-color: red;
    padding: 11px;
    border-radius: 9px;
}
</style>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
 
<div class="wrapper">
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php
                  $sql="SELECT * FROM user WHERE id= ".$_GET['id_user'];
                  $res=mysqli_query($con,$sql);
                  $resfinal=mysqli_fetch_assoc($res);
                  if ($resfinal['image']!="")
                   {
                    $uploads="../uploadimg/".$resfinal['image'];
                   }else {
                    $uploads="../uploadimg/empty.jpg";
                  }
                  ?>
                  <img class="profile-user-img img-fluid img-circle" src="<?= $uploads;?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $resfinal['username'];?></h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  <?php
                      $sqlnb="SELECT  count(DISTINCT article.id) as nb_article, COUNT(DISTINCT abonne.id) as follow from article join user on article.id_utilisateur=user.id join abonne on abonne.id_utilisateur=user.id where user.id=".$_GET['id_user'];
                      $resnb=mysqli_query($con,$sqlnb);
                      $nb_art=mysqli_fetch_assoc($resnb);
                  ?>
                    <b>Abonnée</b> <a class="float-right"><?= $nb_art['follow'];?></a>
                  </li>
                  <li class="list-group-item">
                    <?php
                     $sqlnb2="SELECT count(abonne.id_utilisateur_abone) as abonnement FROM `abonne` WHERE id_utilisateur_abone=".$_GET['id_user'];
                     $resnb2=mysqli_query($con,$sqlnb2);
                     $nb_art2=mysqli_fetch_assoc($resnb2);
                    ?>
                    <b>Abonnement</b> <a class="float-right"><?= $nb_art2['abonnement']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Article</b> <a class="float-right"><?= $nb_art['nb_article']?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">info user</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong> Email</strong>
                <p class="text-muted"><?= $resfinal['email'];?> </p>
                <hr>
                <strong>Nom</strong>
                <p class="text-muted"><?= $resfinal['nom'];?></p>
                <hr>
                <strong>Prenom</strong>
                <p class="text-muted"><?= $resfinal['prenom'];?>  </p>
                <hr>
                <strong> Date naissance</strong>
                <p class="text-muted"><?= $resfinal['date_naiss'];?></p>
                <hr>
                <strong>Date inscription</strong>
                <p class="text-muted"><?= $resfinal['date_inscription'];?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Article</a></li>
                   <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Contact</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <?php 
                  $sqll = "SELECT *,article.id as idarticle FROM article JOIN categorie on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id where user.id=".$_GET['id_user'];
                  $ress = mysqli_query($con,  $sqll);
                  while($images = mysqli_fetch_assoc($ress)){
                  ?>
                    <div class="post">
                      <div class="user-block">
                        <span class="username">
                         <h2 style="text-align:center;"><?= $images['titre'];?></h2>
                        </span>
                        <img src="../img_article/<?=$images['image_article']?>" style="    display: block; margin-left: auto;margin-right: auto;float: none;height: 343px;width: 540px;" alt="Photo">
                        <H4><?= $images['sous_titre'];?></H4>
                      </div>
                      <!-- /.user-block -->
                      <p><?= $images['texte'];?>
                      </p>
                      <?PHP 
                        $idarticlesupp=$images['idarticle'];
                      ?>
                      <button  class="buttonsupp" onclick ="myFunction()">Supprimer</button>
                    </div>
                   <?php }?>
                    <!-- /.post -->
                  </div>

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Titre :</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Titre">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Message :</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Message"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.html';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
    function myFunction(){
      var aler =confirm ("tu veux vraiment supprimer cette article");
      if(aler == true){
        window.location.href = "supprimerarticle.php?id="+<?= $idarticlesupp?>+"&id_user="+<?= $_GET['id_user']; ?>;
      }
    }
</script>
</body>
</html>
