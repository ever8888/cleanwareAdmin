<?php
require_once "dbConnection.php";
$id=$_POST['id'];
$desc=$_POST['desc'];


if($_FILES['waimg']['name']==''){
	
	$que="Select banner_img from banner where banner_id=$id";
	$test=	 mysqli_query($conn, $que);
	while($row3 = mysqli_fetch_array($test))
    {
				
   		$ig=$row3["banner_img"];			
	}
	
	$waimg=$ig;
	
}
else
{
	$waimg=basename( $_FILES["waimg"]["name"],".png"); 	
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["waimg"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	move_uploaded_file($_FILES["waimg"]["tmp_name"], $target_file);
}


	
 
$query="update banner set banner_img='$waimg',banner_desc='$desc' where banner_id=$id";

mysqli_query($conn, $query);
  
 
header('location:banner.php');
			
?>