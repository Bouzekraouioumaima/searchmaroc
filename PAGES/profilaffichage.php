<?php
include 'header.php';
include_once('connection.php');

include 'functions.php';
$functions= New functions();
$info=$functions->info_uti($_SESSION['user']['id']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $functions->profil($_SESSION['user']['id']);
    header("Location: profil.php");
}

?>
<!DOCTYPE html>
<html  dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BLOG MAROC | PROFIL</title>
    <link href="../css/style_login.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<style>
img, svg {
    vertical-align: top;
    border-radius: 114px;
    height: 202px;
}
</style>
  }
  </head>
  <body>

     <div class="main dashboard">
        <div class="content">
           <div class="container">
               <form type="file" action="" method="post" enctype="multipart/form-data">
                  <div class="card-body" >
                  <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
          <img src="<?php echo $uploads; ?>" alt="" width="200px">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3><?php echo $info['username']; ?></h3>
           
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Nom:</strong> <span><?php echo $info['nom']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Prenom:</strong> <span><?php echo $info['prenom']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Username:</strong> <span><?php echo $info['username']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $info['email']; ?></span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Nombre d'abonner:</strong> <span>30</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Nombre d'article:</strong> <span>Master</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Date d'anniversaire:</strong> <span>email@example.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                </ul>
              </div>
            </div>
            <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p>
          </div>
        </div>
                  </div>
               </div>
              </form>
           </div>
        </div>
     </div>

  </body>
</html>
