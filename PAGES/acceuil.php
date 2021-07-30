<?php
include_once('connection.php');
include_once('header.php');
include('nbr_onligne.php');
?>
<!DOCTYPE html>
<html>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>BLOG MAROC | Acceuil </title>
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
    <style>
    a.lien.p1 {
  color: #0c4a61 !important;
    }
    </style>
</head>
<body>

    <div id="wrapper">

        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                <?php 
                    $sql = "SELECT *, article.id as idart FROM article  JOIN categorie  on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id  ORDER BY article.id DESC LIMIT 3";
                    $res = mysqli_query($con,  $sql);
                    if (mysqli_num_rows($res) > 0) { 
                        while ($images = mysqli_fetch_assoc($res)) { 
                        ?>
                    <div class="left-side">
                        <div class="masonry-box post-media">
                        <a href="myblogs.php?idart=<?= $images['idart']?>"> <img class="imgart" src="../img_article/<?=$images['image_article']?>" alt="search" class="img-fluid">
                        <div class="hovereffect"></div>
                        </a>
                             
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="categorie.php" title=""><?= $images['type']?></a></span>
                                        <h4 ><a href="myblogs.php?idart=<?= $images['idart']?>" style=" color: white;"><?=$images['titre']?></a></h4>
                                        <small><a href="#"  style=" color: white;"><?php $d=$images['date_partage']; echo date("Y/m/d", strtotime("$d"));?></a></small>
                                        <small><a href="profil.php?userprofil=<?= $images['id_utilisateur'];?>" style=" color: white;">by <?=$images['username']?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                           
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
                        <!-- blog liste  -->
                            <div class="blog-list clearfix">
                                <?php 
                                $limit = 5;
                                $page=isset($_GET['page']) ? $_GET['page'] : 1;
                                $pages=($page - 1) * $limit ;
                                if(isset($_POST["submitsearch"])){
                                    $search=$_POST['search'];
                                    $sql= "SELECT  *, article.id as idart FROM article  JOIN categorie  on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id where texte like '%".$search."%' ORDER BY article.id ASC limit $pages , $limit";
                                }else{
                                    $sql= "SELECT  *, article.id as idart FROM article  JOIN categorie  on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id  ORDER BY article.id ASC limit $pages , $limit";
                                }
                                $res = mysqli_query($con,  $sql);
                                while ($images = mysqli_fetch_assoc($res)){
                                ?>
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="myblogs.php?idart=<?= $images['idart']?>" title="">
                                                <img src="../img_article/<?= $images['image_article']?>" alt="bolg" class="img-fluid" style="    height: 200px;">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <span class="bg-aqua"><a href="#" title=""><?= $images['type']?></a></span>
                                        <h4  style="font-size: 22px;"><a href="myblogs.php?idart=<?= $images['idart']?>" style="    color: #0c4a61;"><?= $images['titre']?></a></h4>
                                        <p><?= $images['sous_titre']?></p>
                                        <small><a href="#" title=""><?php $d=$images['date_partage']; echo date("Y/m/d", strtotime("$d"));?></a></small>
                                        <small><a href="profil.php?userprofil=<?= $images['id_utilisateur'];?>" title="">by <?= $images['username']?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                                 <?php }?>       
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <div class="row">
                            <div class="col-md-12">
                            <?php 
                                $sql= $con->QUERY("SELECT count(article.id) as idart FROM article  JOIN categorie  on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id");
                                $resultcount = $sql->fetch_all(MYSQLI_ASSOC); 
                                $total=$resultcount[0]['idart'];
                                $nombrepage= ceil($total / $limit); 
                                $previous = $page-1;
                                $next = $page +1 ;  
                            ?>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                    <li class="page-item">
                                            <a class="page-link" href="acceuil.php?page=<?= $previous; ?>">previous</a>
                                        </li>
                                        <?php for($i=1 ; $i<= $nombrepage ; $i++) : ?>
                                        <li class="page-item"><a class="page-link" href="acceuil.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                                        <?php endfor;?>
                                        <li class="page-item">
                                            <a class="page-link" href="acceuil.php?page=<?= $next; ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> 
                        </div> 
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Search</h2>
                                <form class="form-inline search-form" method="post">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search on the site">
                                    </div>
                                    <input type="submit" name="submitsearch" class="btn btn-primary" value="search">
                                    
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
                                                <li><a href="categorie_choix.php?typ=<?= $images['type']?>"><?= $images["type"];?> <span><?= $images["cont"];?></span></a></li>
                                        <?php }?>
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                            <div class="widget">
                                <h2 class="widget-title">Les article les plus aimer</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <?php 
                                        $populatart="SELECT * FROM article ORDER BY article.id ASC LIMIT 5";
                                        $respopular=mysqli_query($con,$populatart);
                                        while($popu=mysqli_fetch_assoc($respopular)){
                                        ?>
                                        <a href="myblogs.php?idart=<?= $popu['id']?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="../img_article/<?= $popu['image_article']?>" alt="bolg" class="img-fluid float-left">
                                                <h5 class="mb-1"><?= $popu['titre'];?></h5>
                                                <small><?php $d=$popu['date_partage']; echo date("Y/m/d", strtotime("$d"));?></small>
                                            </div>
                                        </a>
                                        <?php  }?>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->
                            <div class="widget">
                                <h2 class="widget-title">Contactez nous</h2>
                                <div class="instagram-wrapper clearfix">
                                    <a href="https://www.facebook.com/Search_website-106514364908222"><img src="../image/fb.jpg"  alt="" class="img-inta"></a>
                                    <a href="https://www.instagram.com/search_website/"><img src="../image/instagram.jpg" alt="" class="img-inta"></a>
                                    <a href="mailto:searchwebsite01@gmail.com"><img src="../image/email.png"  alt="" class="img-inta"></a>
                                    <a href="https://wa.me/00212619360008"><img src="../image/whatssap.jpg"  alt="" class="img-inta"></a>
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