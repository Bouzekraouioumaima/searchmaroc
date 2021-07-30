<?php
include_once('connection.php');
include 'header.php';
include('nbr_onligne.php');
?>
<!doctype html>
<html>
<head>
<style>
 a.lien.P2 {
  color: #0c4a61 !important;
    }
.lienn{
    font-size: 50px;
    color: #f06c34 !important;
}
.lienn:hover{
    color: #0c4a61 !important;
}
.ttl{
    text-align: center;
    margin: 38px;
    font-size: 44px;
    font-family: 'FontAwesome';
    color: #abdff0;
    text-decoration: underline;
}
</style>
<title>Search | Catégorie</title>
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
            <h1  class="ttl"> Toutes les catégories</h1>
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                <?php 
                    $sql = "SELECT * FROM categorie ORDER BY id DESC";
                    $res = mysqli_query($con,  $sql);
                    if (mysqli_num_rows($res) > 0) { 
                        while ($images = mysqli_fetch_assoc($res)) { 
                        ?>
                    <div class="left-side">
                        <div class="masonry-box post-media">
                        <a href="categorie_choix.php?typ=<?= $images['type']?>"> <img class="imgart" src="../uploadimg/<?=$images['image_categorie']?>" alt="categorie blog" class="img-fluid"></a>
                            
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <h4><a href="categorie_choix.php?typ=<?= $images['type']?>" class="lienn" ><?= $images['type']?></a></h4>
                                        

                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->
                    
                    <?php }}?>
                </div><!-- end masonry -->
            </div>
        </section>

    <?php include_once('footer.php');?>
</body>
</html>