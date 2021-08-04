<?php
include_once('connection.php');
include 'header.php';
include('nbr_onligne.php');
?>
<!DOCTYPE html>
<html lang="fr">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Search | Article</title>
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="../css/font-awesome/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/acceuil/style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="../css/acceuil/colors.css" rel="stylesheet">

    <!-- Version Garden CSS for this template -->
    <link href="../css/acceuil/garden.css" rel="stylesheet">
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=610a974bc02a980019717e31&product=inline-share-buttons" async="async"></script>

</head>
<body>

    <div id="wrapper">
      <form  method="post"  action="">
        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                            <?php 
                    $sql = "SELECT * FROM article  JOIN categorie  on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id  where article.id=".$_GET['idart'];
                    $res = mysqli_query($con,  $sql);
                    if (mysqli_num_rows($res) > 0) { 
                        $images = mysqli_fetch_assoc($res);
                    }else{
                      header('Location :acceuil.php');
                     }
                        ?>
                        
                                <span class="color-green"><a href="#" title=""><?= $images['type']?></a></span>

                                <h3><?=$images['titre']?></h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="#" title=""><?php $d=$images['date_partage']; echo date("Y/m/d", strtotime("$d"));?></a></small>
                                    <small><a href="#" title="">par <?=$images['username']?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end title -->

                            <div class="single-post-media" >
                                <img src="../img_article/<?=$images['image_article']?>" alt="" class="img-fluid" style="    width: 795px; HEIGHT: 400px;">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <div class="pp">
                                    <h3><strong><?=$images['sous_titre']?></strong></h3>

                                    <p> <?=$images['texte']?></p>
                                </div><!-- end pp -->

                            </div><!-- end content -->
                            <div class="sharethis-inline-share-buttons"></div>
                            <div class="blog-title-area">
                                <div class="post-sharing">
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->
                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <div class="row"> 
                                    <div class="custombox clearfix">
                                        <h4 class="small-title">Voire autre article du même écrivain</h4>
                                        <div class="row">
                                                <?php 
                                                    $sqlmm = "SELECT *, article.id as idart FROM article  JOIN user on article.id_utilisateur= user.id  where user.id =".$images['id']." LIMIT 6";
                                                    $resmm = mysqli_query($con,  $sqlmm);
                                                    if (mysqli_num_rows($resmm) > 0) { 
                                                        while($memarticle = mysqli_fetch_assoc($resmm)){  ?>
                                                            <div class="col-lg-6">
                                                                <div class="blog-box">
                                                                    <div class="post-media">
                                                                        <a href="myblogs.php?idart=<?= $memarticle['idart']?>" title="">
                                                                            <img src=" ../img_article/<?=$memarticle['image_article'] ?>" alt="search" class="img-fluid comment">
                                                                            <div class="hovereffect">
                                                                                <span class=""></span>
                                                                            </div><!-- end hover -->
                                                                        </a>
                                                                    </div><!-- end media -->
                                                                    <div class="blog-meta">
                                                                        <h4><a href="myblogs.php?idart=<?= $memarticle['idart']?>" title=""><?=$memarticle['titre'] ?></a></h4>
                                                                        <small><a href="#" title=""><?=$memarticle['username'] ?></a></small>
                                                                        <small><a href="#" title=""><?php $d=$memarticle['date_partage']; echo date("Y/m/d", strtotime("$d"));?></a></small>
                                                                    </div><!-- end meta -->
                                                                </div><!-- end blog-box -->
                                                            </div><!-- end col -->
                                                <?php } }?> 
                                        </div><!-- end row -->
                                    </div><!-- end custom-box -->


                                    </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">5 commentaires</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                        <?php
                                            $sqlaffich = "SELECT * FROM action join user on user.id=action.id_utilisateur WHERE id_article= ".$_GET['idart']." LIMIT 5";
                                            $ressqlaffich=mysqli_query($con,$sqlaffich);
                                            while($res=mysqli_fetch_assoc($ressqlaffich)){
                                        ?>
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src=" ../uploadimg/<?=$res['image'] ?>" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name"><?= $res['username'];?></h4>
                                                    <p><?= $res['commentaire'];?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <?php }?>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Laisser un commentaire</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper">
                                            <textarea class="form-control" name="commentaire" placeholder="Votre commentaire"></textarea>
                                            <?php
                                        if(isset($_SESSION['user'])==null){?>
                                            <a href="identifier.php" class="btn btn-primary">Envoyer un commentaire</a>
                                       <?php }else{?>
                                            <button  name="submitbtn" type="submit" class="btn btn-primary">Envoyer un commentaire</button>
                                        <?php 
                                                if(isset($_POST['submitbtn'])){
                                                    $commt=$_POST['commentaire'];
                                                    $user=$_SESSION["user"]["id"];
                                                    $idart=$_GET['idart'];
                                                    $sqlcmt = 'INSERT INTO action(commentaire,id_article,id_utilisateur) VALUES ("'.$commt.'",'.$idart.','.$user.')';
                                                    if ($con->query($sqlcmt) === TRUE) {?>
                                                        <h3>bien onvoyer</h3>
                                                  <?php  } } } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Postes récents</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    <?php 
                                        $populatart="SELECT * FROM article ORDER BY article.id ASC LIMIT 5";
                                        $respopular=mysqli_query($con,$populatart);
                                        while($popu=mysqli_fetch_assoc($respopular)){
                                        ?>
                                        <a href="myblogs.php?idart=<?= $popu['id']?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="../uploadimg/<?= $popu['image_article']?>" alt="bolg" class="img-fluid float-left">
                                                <h5 class="mb-1"><?= $popu['titre'];?></h5>
                                                <small><?php $d=$popu['date_partage']; echo date("Y/m/d", strtotime("$d"));?></small>
                                            </div>
                                        </a>
                                        <?php  }?>

                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Catégories populaires</h2>
                                <div class="link-widget">
                                    <ul>
                                    <?php 
                                            $sql = "SELECT type , COUNT(article.id_categorie) AS 'cont' FROM article join categorie on article.id_categorie = categorie.id GROUP by type";
                                            $res = mysqli_query($con,  $sql);
                                            while ($images = mysqli_fetch_assoc($res)){
                                            ?>
                                                <li><a href="categorie_choix.php?typ=<?= $images['type']?>"><?= $images["type"];?> <span><?= $images["cont"];?></span></a></li>
                                        <?php }?>
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
      </form>  
    </div><!-- end wrapper -->
    <?php include_once('footer.php');?>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v10.0" nonce="c5NCpofS"></script>
</body>
</html>