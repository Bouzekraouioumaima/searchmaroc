<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include_once('connection.php');
	
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: acceuil.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../img_article/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				session_start();
				$titre=$_POST['titre'];
				$sous_titre=$_POST['sous_titre'];
				$description=addslashes($_POST['description']);
				$utilisateur = $_SESSION["user"]["id"];
				$categorie=$_POST['categorie'];
				$image=$new_img_name;
				$sql="SELECT * FROM categorie where type ='$categorie'";
				$re = mysqli_query($con , $sql);
				while($resultat = mysqli_fetch_assoc($re)){
					$idcategorie=$resultat['id'];
				}
				$sqll="INSERT INTO article ( titre,sous_titre,id_utilisateur,id_categorie,texte,image_article) VALUES
				( '$titre', '$sous_titre',1,1,'$description','$image')";
				if(mysqli_query($con,$sqll)){
					header("Location: acceuil.php?azer");
				}else{
					header("Location: add_article.php?$description");
				}
		    }
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: acceuil.php?error=$em");
	}

}else {
	header("Location: acceuil.php");
}