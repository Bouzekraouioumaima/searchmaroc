<?php

$temps_session = 30;
$temps_actuel=date("U");
$ip_user=$_SERVER['REMOTE_ADDR'];

$req_ip_exist="SELECT * FROM enligne WHERE ip_user ='".$ip_user."'";
$res=mysqli_query($con,$req_ip_exist);
$num_row = mysqli_num_rows($res);
if($num_row == 0){
    $add_ip = "INSERT INTO enligne (time , ip_user) VALUES ( ".$temps_actuel.", '".$ip_user."')";
    $res_add =mysqli_query($con,$add_ip);
}else{
    $update_ip = "UPDATE onligne SET time = ".$temps_actuel." WHERE ip_user = '".$ip_user."'";
    $exic = mysqli_query($con,$update_ip);
}

$session_delete_time = $temps_actuel - $temps_session;
$del_ip="delete from enligne where time < ".$session_delete_time;
$exict=mysqli_query($con,$del_ip);

$show_user_nbr = "SELECT * FROM enligne";
$res_show=mysqli_query($con,$show_user_nbr);
$count_users=mysqli_num_rows($res_show);

$_SESSION['user_enligne']=$count_users;
?>