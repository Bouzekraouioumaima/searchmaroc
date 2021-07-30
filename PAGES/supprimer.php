<?php
include_once('connection.php');
if(isset($_GET['idspp'])){
    $sqlsupprimer='DELETE FROM abonne WHERE abonne.id = '.$_GET['idspp'];
    $ressuprimer=mysqli_query($con,$sqlsupprimer);
    header('Location: profil_personnel.php');
}
if(isset($_GET['idspp2'])){
    $sql="SELECT * FROM abonne WHERE abonne.id=".$_GET['idspp2'];
    $res=mysqli_query($con,$sql);
    $aa=mysqli_fetch_assoc($res);
    $id=$aa['id_utilisateur'];
    $sqlsupprimer='DELETE FROM abonne WHERE abonne.id = '.$_GET['idspp2'];
    $ressuprimer=mysqli_query($con,$sqlsupprimer);
    header('Location: profil.php?userprofil='.$id);
}

?>