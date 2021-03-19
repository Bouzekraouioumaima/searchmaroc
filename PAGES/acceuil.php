<?php
include_once('connection.php');
include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Blog / Maroc</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Design fonts -->
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
</head>
<body>

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form class="form-inline">
                        <input type="text" class="form-control" placeholder="Qu'est-ce que tu cherches ?">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div><!-- end top-search -->

        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                <?php 
                    $sql = "SELECT * FROM article  JOIN categorie  on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id  ORDER BY article.id DESC LIMIT 3";
                    $res = mysqli_query($con,  $sql);
                    if (mysqli_num_rows($res) > 0) { 
                        while ($images = mysqli_fetch_assoc($res)) { 
                        ?>
                    <div class="left-side">
                        <div class="masonry-box post-media">
                             <img class="imgart" src="../uploadimg/<?=$images['image_article']?>" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="categorie.php" title=""><?= $images['type']?></a></span>
                                        <h4><a href="garden-single.html" title=""><?=$images['titre']?></a></h4>
                                        <small><a href="garden-single.html" title=""><?php $d=$images['date_partage']; echo date("Y/m/d", strtotime("$d"));?></a></small>
                                        <small><a href="#" title="">by <?=$images['nom']?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->
                    
                    <?php }}?>
                </div><!-- end masonry -->
            </div>
        </section>

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
                                <?php 
                                $sql = "SELECT * FROM article  JOIN categorie  on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id  ORDER BY article.id ASC ";
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
                                        <span class="bg-aqua"><a href="garden-category.html" title=""><?= $images['type']?></a></span>
                                        <h4><a href="garden-single.html" title=""><?= $images['titre']?></a></h4>
                                        <p><?= $images['sous_titre']?></p>
                                        <small><a href="garden-single.html" title=""><?php $d=$images['date_partage']; echo date("Y/m/d", strtotime("$d"));?></a></small>
                                        <small><a href="#" title="">by <?= $images['nom']?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                                 <?php }?>       
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <!--<div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> end col
                        </div> end row -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Search</h2>
                                <form class="form-inline search-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search on the site">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                                    <ul>
                                        <?php 
                                            $sql = "SELECT type , COUNT(article.id_categorie) AS 'cont' FROM article join categorie on article.id_categorie = categorie.id GROUP by type";
                                            $res = mysqli_query($con,  $sql);
                                            while ($images = mysqli_fetch_assoc($res)){
                                            ?>
                                                <li><a href="#"><?= $images["type"];?> <span><?= $images["cont"];?></span></a></li>
                                        <?php }?>
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Contactez nous</h2>
                                <div class="instagram-wrapper clearfix">
                                    <a href="#"><img src="../image/fb.jpg" alt="" class="img-inta"></a>
                                    <a href="#"><img src="../image/instagram.jpg" alt="" class="img-inta"></a>
                                    <a href="#"><img src="../image/email.png" alt="" class="img-inta"></a>
                                     </div><!-- end Instagram wrapper -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

       <?php include_once('footer.php') ?>
        
    </div><!-- end wrapper -->
</body>
</html>