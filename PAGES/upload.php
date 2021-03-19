<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include_once('connection.php');
	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";
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
				$img_upload_path = '../uploadimg/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				
				$titre=$_POST['titre'];
				$sous_titre=$_POST['sous_titre'];
				$content=$_POST['editor'];
				$utilisateur = 1;
				$categorie=2;
				$image=$new_img_name;
				$sqll="INSERT INTO article ( titre,sous_titre,id_utilisateur,id_categorie,texte,image_article) VALUES
				( '$titre', '$sous_titre','$utilisateur', '$categorie','$content','$image')";
				if(mysqli_query($con,$sqll)){
					echo 'good';
				}else{
					echo 'erreur';
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