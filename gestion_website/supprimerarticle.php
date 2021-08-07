<?php
include_once('connection.php');
$sql = "delete from article where id =".$_GET['id'];
$res = mysqli_query($con ,$sql);
if($_GET['page'] == "article"){
    header('Location:table_article.php');  
}else{
    header('Location:profile.php?id_user='.$_GET['id_user']);
}

?>