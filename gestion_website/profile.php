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
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Relation</a></li>
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
                      <button  class="buttonsupp" onclick ="myFunction()">Supprimer</button>
                    </div>
                   <?php }?>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
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
        window.location.href = "supprimerarticle.php";
      }else {
          alert('erreur');
      }
    }
</script>
</body>
</html>