<?php
session_start();
$_SESSION['user']="";
// Finalement, on détruit la session.
session_destroy();
if($_SESSION['user']==""){
    header("Location: acceuil.php");
}

?>