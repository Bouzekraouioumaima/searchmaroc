<?php
include_once('connection.php');
include 'header.php';
?>
<!doctype html>
<html>
<head>
<title>BLOG MAROC | CATEGORIE </title>
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
                             <img class="imgart" src="../uploadimg/<?=$images['image_categorie']?>" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <h4><a href="#" title="" style="font-size: 50px;"><?= $images['type']?></a></h4>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->
                    
                    <?php }}?>
                </div><!-- end masonry -->
            </div>
        </section>

    <?php include_once('footer.php');?>
</body>
</html>