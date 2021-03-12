<?php
include_once('connection.php');
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../CSS/stylecategorie.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>
<body>

<?php 
        $sql = "SELECT * FROM categorie ORDER BY id DESC";
        $res = mysqli_query($con,  $sql);
        if (mysqli_num_rows($res) > 0) {?>
            <div class="catbody">
                    <?php	while ($images = mysqli_fetch_assoc($res)) {  ?>
                        <a href="http://www.azidem.com/transfert-professionnel.html" style="text-decoration: none;">
                            <div class="alb" style="background-image: url('../<?=$images['image_categorie']?>');     background-size: cover;">
                                <p class="type"><?= $images['type'];?> </p>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        <?php }?>
    </div>
    </div>
</body>
</html>