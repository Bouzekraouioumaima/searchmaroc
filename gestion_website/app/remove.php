<?php

if(isset($_POST['id'])){
    require '../connection.php';
    $id = $_POST['id'];

    if(empty($id)){
       echo 0;
    }else {
        $stmt = "DELETE FROM todos WHERE id_todos=".$id;
        $res=mysqli_query($con,$stmt);
        if($res){
            echo 1;
        }else {
            echo 0;
        }
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}