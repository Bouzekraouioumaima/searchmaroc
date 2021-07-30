<?php
include_once('connection.php');
include 'header.php';
include('nbr_onligne.php');
?>
<!doctype html>
<html>
<head>
<title>BLOG MAROC | Catégorie </title>
<style>
    .first-section {
        margin-top: 0 !important;
    padding: 31px !important;
    width: 71%;
    margin-top: 19px;
    padding: 0;
    border-bottom: 0;
    margin-left: auto;
    margin-right: auto;
}
</style>
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
<section class="section first-section">
            <h1 style="    color: #0c4a61;text-align: center;margin: 38px;font-size: 39px;font-family: revert;"> Les article de méme catégorie</h1>
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                <?php 
                $type=$_GET['typ'];
                $sql = "SELECT *, article.id as idart FROM article JOIN categorie on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id where type= '".$type."' ORDER BY article.id ASC limit 9";
                $res = mysqli_query($con,  $sql);
                while ($images = mysqli_fetch_assoc($res)){
                        ?>
                   <div class="blog-box row" style="margin-bottom: 24px;">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="myblogs.php?idart=<?= $images['idart']?>" title="">
                                                <img src="../uploadimg/<?= $images['image_article']?>" alt="" class="img-fluid" style="height: 221px;">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <span class="bg-aqua"><a href="myblogs.php?idart=<?= $images['idart']?>" title=""><?= $images['type']?></a></span>
                                        <h4><a href="myblogs.php?idart=<?= $images['idart']?>" title=""><?= $images['titre']?></a></h4>
                                        <p><?= $images['sous_titre']?></p>
                                        <small><a href="#" title=""><?php $d=$images['date_partage']; echo date("Y/m/d", strtotime("$d"));?></a></small>
                                        <small><a href="profil.php?userprofil=<?= $images['id_utilisateur'];?>" title="">by <?= $images['nom']?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                    
                    <?php }?>
                </div><!-- end masonry -->
            </div>
        </section>

    <?php include_once('footer.php');?>
</body>
</html>