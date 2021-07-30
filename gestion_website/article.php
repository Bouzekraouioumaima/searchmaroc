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
  <title>AdminLTE 3 | Widgets</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    .img_art{
      width: 896px;
    height: 525px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      

        <!-- =========================================================== -->

        <!-- /.row -->

        <div class="row">
          <div class="col-md-12" style="    margin-top: 22px;">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <?php 
                  $sql = "SELECT * FROM article  JOIN categorie  on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id  where article.id=".$_GET['idart_pub'];
                  $res = mysqli_query($con,  $sql);
                  if (mysqli_num_rows($res) > 0) { 
                      $images = mysqli_fetch_assoc($res);
                  }else{
                    header('Location :acceuil.php');
                   }
                   if ($images['image']!="")
                   {
                    $uploads="../uploadimg/".$images['image'];
                   }else {
                    $uploads="../uploadimg/empty.jpg";
                  }
                  ?>
                  <img class="img-circle" src="<?= $uploads;?>" alt="User Image">
                  <span class="username"><a href="#"><?=$images['username']?></a></span>
                  <span class="description">Partagé publiquement-<?php $d=$images['date_partage']; echo date("Y/m/d", strtotime("$d"))?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <h2 style="text-align:center;"><?=$images['titre'] ?></h2>
                <img class="img-fluid pad img_art" src="../img_article/<?=$images['image_article']?>" alt="Photo">
                <h4><?=$images['sous_titre'] ?></h4>
                <p><?= $images['texte']?></p>
                <?php
                $sql="SELECT count(*) as nb FROM action WHERE id_article =".$_GET['idart_pub'];
                $res=mysqli_query($con,$sql);
                $ress=mysqli_fetch_assoc($res);
                ?>
                <span class="float-right text-muted"><?= $ress['nb']?> - Commantaire</span>
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments">
              <?php
                    $sqlaffich = "SELECT * FROM action join user on user.id=action.id_utilisateur WHERE id_article= ".$_GET['idart_pub']."";
                    $ressqlaffich=mysqli_query($con,$sqlaffich);
                    while($res=mysqli_fetch_assoc($ressqlaffich)){
              ?>
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="../uploadimg/<?=$res['image'] ?>" alt="User Image">

                  <div class="comment-text">
                    <span class="username">  <?= $res['username'];?>  </span>
                    <?= $res['commentaire'];?>
                  </div>
                  <!-- /.comment-text -->
                </div>
                <?php } ?>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
