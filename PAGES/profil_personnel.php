<?php

include_once('connection.php');
include('nbr_onligne.php');
include_once('header.php');
include 'functions.php';
if($_SESSION['user']==NULL){
	header('Location: identifier.php');
}
$functions= New functions();
$info=$functions->info_uti($_SESSION['user']['id']);
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // $functions->profil($_SESSION['user']['id']);
 //   header("Location: profil.php");
//}

                               
?>

<!doctype html>
<html>
    <head>
    <link href="../css/styl_profil.css" rel="stylesheet">
    <link href="../css/acceuil/style.css" rel="stylesheet">
    <link href="../css/acceuil/bootstrap.css" rel="stylesheet">
    <link href="../css/acceuil/garden.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
        button{
            border: darkslategrey;
    background-color: #e2e2e2;
        }
            @media (max-width: 989px) {
                .card.p-3 {
    width: 100% !important;
}
    }
    .article{
        width: 85%;
    margin-left: auto;
    margin-top: 27px;
    }
    .styled-table {
        border-collapse: collapse;
    margin: 25px 0;
    /* font-size: 0.9em; */
    font-family: sans-serif;
    WIDTH: 100%;
    box-shadow: 0 0 20px rgb(0 0 0 / 15%);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
div#myDIV , div#myDIV2 {
    position: absolute;
    top: 49%;
    left: 26%;
    display: none;
}
.number1{
    color:black;
}
.btn_abonne{
    float: right;
    margin: 26px;
    background-color: #f06c34;
    color: wheat;
    font-size: 19px;
    border-radius: 3px;
}
.abon{
    background-color:gray !important;
}
@media (max-width: 989px) {
    div#myDIV, div#myDIV2 {
    top: 57% !important;
    left: 0 !important;
}
    }
        </style>
    </head>
    <body>
    
        <div class="container mt-5 d-flex justify-content-center">
            
                <div class="card p-3" style="width: 59% ;">
                    <div class="d-flex align-items-center row">
                        <div class="image col-sm-12 col-md-6">
                            <?php
                                if ($info['image']!="") {
                                $uploads="../uploadimg/".$info['image'];

                                }else {
                                $uploads="../uploadimg/empty.jpg";

                                }
                            ?>    
                            <img src="<?php echo $uploads; ?>" alt="" width="200px"> 
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <h4 class="mb-0 mt-0"><?= $info['nom'] ; echo ' '.$info['prenom']?></h4> <span><?= $info['username']?></span>
                            <div class="bg-primary d-flex justify-content-between rounded text-white stats" style="  background-color: #e2e2e2!important;padding: 5px 10px;">
                                <?php
                                    $user=$_SESSION['user']['id'];
                                    $sqlnb="SELECT  count(DISTINCT article.id) as nb_article, COUNT(DISTINCT abonne.id) as follow from article join user on article.id_utilisateur=user.id join abonne on abonne.id_utilisateur=user.id where user.id=".$user;
                                    $resnb=mysqli_query($con,$sqlnb);
                                    $nb_art=mysqli_fetch_assoc($resnb);
                                ?>
                                <div class="d-flex flex-column"> <span class="articles" style="color : black;">Articles</span> <span class="number1"><?= $nb_art['nb_article']?></span> </div>
                                <div class="d-flex flex-column"> <span class="followers"><button onclick="myFunction('myDIV')">Abonnés</button></span> <span class="number1"><?= $nb_art['follow']?></span> </div>
                                <?php
                                    $user=$_SESSION['user']['id'];
                                    $sqlnb="SELECT count(abonne.id_utilisateur_abone) as abonnement FROM `abonne` WHERE id_utilisateur_abone=".$user;
                                    $resnb=mysqli_query($con,$sqlnb);
                                    $nb_art=mysqli_fetch_assoc($resnb);
                                ?>
                                <div class="d-flex flex-column"> <span class="articles"><button onclick="myFunction('myDIV2')">Abonnements</button></span> <span class="number1"><?= $nb_art['abonnement']?></span> </div>
                            </div>
                            <div class="button mt-2 d-flex flex-row align-items-center">
                                <a class="btn btn-sm btn-primary w-100 ml-2" href='modifier_profil.php'>Modifier</a> 
                            </div>
                        </div>
                    </div>
                    </div>
            
            

                </div>
                <div class="article">
                    <?php 
                        $id=$info['id'];
                        $sql = "SELECT * FROM article JOIN categorie on article.id_categorie= categorie.id JOIN user on article.id_utilisateur= user.id where user.id=$id ORDER BY article.id ASC ";
                        $res = mysqli_query($con,  $sql);
                        while ($images = mysqli_fetch_assoc($res)){
                        ?>
                        <div class="blog-box row" style="    width: 100%;">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="myblogs.php?idart=<?= $images['id']?>" title="">
                                        <img src="../img_article/<?= $images['image_article']?>" alt="" class="img-fluid" style="height: 100%;">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <span class="bg-aqua" ><a href="#" title=""><?= $images['type']?></a></span>
                                <h4><a href="myblogs.php?idart=<?= $images['idart']?>" title="" style="color: black;"><?= $images['titre']?></a></h4>
                                <p><?= $images['sous_titre']?></p>
                                <small><a href="#" title="" style="color: #013d1b;"><?php $d=$images['date_partage']; echo date("Y/m/d", strtotime("$d"));?></a></small>
                                
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                        <hr class="invis">
                        <?php }?>
                </div>
                <form method="post" >
                    <div class="p2 card p-3 " style="width: 37% ;margin-left: auto;margin-right: auto;" id="myDIV">
                        <boutton onclick="myFunction('myDIV')" ><img src="../image/faux.png" alt="" class="img-fluid" style="height: 40px;border-radius: 59px;width: 45px;float: right;"></boutton>
                        <div class="mn">
                            <table class="styled-table">
                                <tr>
                                <th style="text-align:center;">abonnés</th>
                                </tr>
                                <?php
                                $sqlabonne="SELECT * FROM abonne join user on abonne.id_utilisateur_abone=user.id WHERE abonne.id_utilisateur= ".$user;
                                $resabonne=mysqli_query($con,$sqlabonne);
                                while($aff=mysqli_fetch_assoc($resabonne)){
                                ?>
                                <tr>
                                    <td> 
                                <?php if($aff['image'] !=""){?>
                                    <img src="../img_article/<?= $aff['image']?>" alt="" class="img-fluid" style="height: 82px;border-radius: 59px;width: 82px;">
                                <?php }else {?>
                                    <img src="../img_article/empty.jpg" alt="" class="img-fluid" style="height: 82px;border-radius: 59px;width: 82px;">   
                                <?php }echo $aff['username'];?>
                                <?php 
                                    $sql="SELECT * FROM abonne WHERE  id_utilisateur =".$aff['id']." and id_utilisateur_abone = ".$user;
                                    $res=mysqli_query($con,$sql);
                                    if($ress=mysqli_fetch_assoc($res) == ""){?>
                                        <input class="btn_abonne" name="ajouter" type="submit" value="S'abonner"> 
                                        <?php
                                    if(isset($_POST['ajouter'])){
                                        $ajoutersql="INSERT INTO abonne( id_utilisateur,id_utilisateur_abone) VALUES (".$aff['id'].",".$user.")";
                                        $resajouter=mysqli_query($con,$ajoutersql);
                                    } 
                                ?>
                                <?php } ?>
                                </td>
                                
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                    <div class="p3 card p-3 " style="width: 37% ;margin-left: auto;margin-right: auto;" id="myDIV2">
                        <boutton onclick="myFunction('myDIV2')" ><img src="../image/faux.png" alt="" class="img-fluid" style="height: 40px;border-radius: 59px;width: 45px;float: right;"></boutton>
                        <div class="mn">
                            <table class="styled-table">
                                <tr>
                                <th>abonnement</th>
                                </tr>
                                <?php
                                $sqlabonnement="SELECT *, abonne.id as abb FROM abonne join user on abonne.id_utilisateur=user.id WHERE abonne.id_utilisateur_abone= ".$user;
$nb=1;
                                $resabonnement=mysqli_query($con,$sqlabonnement);
                                while($affment=mysqli_fetch_assoc($resabonnement)){
                                ?>
                                    <tr>
                                        <td>
                                        <?php if($affment['image'] !=""){?>
                                          <a href="myblogs.php?idart=<?= $affment['id']?>">
                                            <img src="../uploadimg/<?= $affment['image']?>" alt="" class="img-fluid" style="height: 82px;border-radius: 59px;width: 82px;">
                                          </a >  
                                        <?php }else {?>
                                            <a href="myblogs.php?idart=<?= $affment['id']?>">
                                                <img src="../uploadimg/empty.jpg" alt="" class="img-fluid" style="height: 82px;border-radius: 59px;width: 82px;">
                                             </a>   
                                        <?php } echo $affment['username']; echo $affment['abb'];?>
                                            <a href="supprimer.php?idspp=<?= $affment['abb'];?>" class="btn_abonne abon">abonné(e)</a>
                                        
                                        </td>
                                    </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </form>
        </div>
    
<?php include_once('footer.php') ?>
<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
    </body>
</html>