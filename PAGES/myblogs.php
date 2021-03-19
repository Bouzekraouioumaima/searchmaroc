<?php
include 'header.php';
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "blog";

  // Create connection
  $con = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  ?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../CSS/stylecategorie.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
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
<!-- Bootstrap core CSS -->
<link href="../css/acceuil/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="../css/acceuil/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../css/acceuil/style.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="../css/acceuil/colors.css" rel="stylesheet">

<!-- Version Garden CSS for this template -->
<link href="../css/acceuil/garden.css" rel="stylesheet">
</head>
<body>

  <?php
      $id=$_SESSION['user']['id'];
      $sql = "SELECT * FROM article  where id_utilisateur=$id  ORDER BY id DESC ";
      $res = mysqli_query($con,  $sql);
      if (mysqli_num_rows($res) > 0) {
          while ($images = mysqli_fetch_assoc($res)) {
          ?>
      <div class="left-side">
          <div class="masonry-box post-media">
               <img class="imgart" src="../<?=$images['image_article']?>" alt="" class="img-fluid">
               <div class="shadoweffect">
                  <div class="shadow-desc">
                      <div class="blog-meta">
                          <h4><a href="garden-single.html" title=""><?=$images['titre']?></a></h4>
                          <small><a href="garden-single.html" title=""><?php $d=$images['date_partage']; echo date("Y/m/d", strtotime("$d"));?></a></small>
                      </div><!-- end meta -->
                  </div><!-- end shadow-desc -->
              </div><!-- end shadow -->
          </div><!-- end post-media -->
      </div><!-- end left-side -->

      <?php }}?>
  </div><!-- end masonry -->
</div>
</section>
</body>
</html>
