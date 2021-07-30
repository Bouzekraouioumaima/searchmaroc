<?php

if(isset($_POST['id'])){
    require '../connection.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 'error';
    }else {
        $todos = "SELECT id_todos, checked FROM todos WHERE id_todos=".$id;
        $res=mysqli_query($con,$todos);
        $todo=mysqli_fetch_assoc($res);
        $uId = $todo['id_todos'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = "UPDATE todos SET checked=$uChecked WHERE id_todos=".$uId;
        $resquery=mysqli_query($con,$res);

        if($resquery){
            echo $checked;
        }else {
            echo "error";
        }
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}