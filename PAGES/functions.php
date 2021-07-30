<?php
/**
 *
 */
include_once('connection.php');
class functions
{
  public function uploadimg($image_name)
  {
    $target_dir = "../uploadimg/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $extension  = pathinfo( $_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION ); // jpg
    $filetosave=$image_name.time().'.'.$extension;
    $target_file = $target_dir . $filetosave;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      $uploadOk = 0;
    }

    // Check file size


    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        return $filetosave;
      } else {
        return "";
      }
    }
  }

  public function add()
  {
    $con=mysqli_connect("localhost","root","","blog");
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $nom = $_POST['nom'];
    $prenom= $_POST['prenom'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $date_naiss = $_POST['date_naiss'];
    $image=$this->uploadimg($nom);
    //test email 
    $sqltest="SELECT * FROM user WHERE email = '$email'";
    $test=mysqli_query($con, $sqltest);
    $row=mysqli_num_rows($test);
    if($row!=0){
      header("Location: identifier.php?find=true");
      exit();
    }
    $sql = 'INSERT INTO user(nom, prenom,username,email,pass,image,date_naiss)
    VALUES ("'.$nom.'","'.$prenom.'","'.$username.'","'.$email.'","'.$pass.'", "'.$image.'","'.$date_naiss.'")';

      if ($con->query($sql) === TRUE) {
           
                header("Location: identifier.php");
                exit();
          
      }
}

public function info_uti($id)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "blog";

  // Create connection
  $con = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }


   $sql = 'select * from user where id='.$id;
   $result = $con->query($sql);
   $row = $result->fetch_assoc();
   return $row;
}
public function profil($id)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "blog";

  // Create connection
  $con = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  $nom = $_POST['nom'];
  $prenom= $_POST['prenom'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $date_naiss = $_POST['date_naiss'];
  $image=$this->uploadimg($nom);
  if($_FILES['fileToUpload']['name'] != "")
  {
    
    $sql = 'update user set nom="'.$nom.'",prenom="'.$prenom.'",username="'.$username.'",email="'.$email.'",pass="'.$pass.'",image="'.$image.'",date_naiss="'.$date_naiss.'" where id="'.$id.'" ';
    $res=mysqli_query($con,$sql);
    return true;
  }else {
    $sql = 'update user set nom="'.$nom.'",prenom="'.$prenom.'",username="'.$username.'",email="'.$email.'",pass="'.$pass.'",date_naiss="'.$date_naiss.'" where id="'.$id.'" ';
    $res=mysqli_query($con,$sql);
    return true;
  }
    if ($con->query($sql) === TRUE) {
      //header("Refresh:0");
    }
}

}

 ?>
