<?php
include 'header.php';
 
    if (isset($_POST['message'])) {
        $position_arobase = strpos($_POST['email'], '@');
        if ($position_arobase === false)
            echo '<p>Votre email doit comporter un arobase.</p>';
        else {
            $retour = mail("oum.bouzekraoui@gmail.com", $_POST['subject'], $_POST['message'], 'From: ' . $_POST['email']);
            if($retour)
                echo '<p>Votre message a été envoyé.</p>';
            else
                echo '<p>Erreur.</p>';
        }
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
body:before {
    height: 123%;
}
</style>
  
  </head>
  <body>

     <div class="main dashboard">
        <div class="content">
           <div class="container">
               <form type="file" action="" method="post" enctype="multipart/form-data">
                  <div class="card-body" style="top:67%!important;">
                  <h4> Blog MAROC</h4>
                   <h1 style="margin-bottom: 62px;">Contactez-nous</h1>
                   <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                            <input type="text"  class="form-control" name="name" placeholder="Name...." required>  
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <input type="text"  class="form-control" name="email" placeholder="Email...." required>  
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <input type="text"  class="form-control" name="tele" placeholder="Telephone...." required>  
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-sm">
                            <input type="text" class="form-control" style="width: 88%; margin: 0 auto;" name="subject" placeholder="Sujet..." required>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message..." rows="10" cols="30" style="height: 180px;" name="message" required></textarea>
                            </div>
                        </div>
                   </div>
                     <div class="row" style="padding-bottom: 47px;">
                        <div class="col-sm">
                           <div class="d-grid gap-2 mt-4">
                              <input class="btnn" type="submit" name="submit" value="Envoyer" >
                           </div>
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
