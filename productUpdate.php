<?php
require_once "dbConnection.php";
$id=$_POST['id'];
$name=$_POST['name'];
$desc=$_POST['desc'];
$link=$_POST['link'];


if($_FILES['waimg']['name']==''){
	
	$que="Select p_img from product where p_id=$id";
	$test=	 mysqli_query($conn, $que);
	while($row3 = mysqli_fetch_array($test))
    {
				
   		$ig=$row3["p_img"];			
	}
	
	$waimg=$ig;
	
}
else
{
	$waimg=basename( $_FILES["waimg"]["name"]); 	
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["waimg"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	move_uploaded_file($_FILES["waimg"]["tmp_name"], $target_file);
}


	
 
$query="update product set p_img='$waimg',p_name='$name',p_sdesc='$desc',p_link='$link' where p_id=$id";

mysqli_query($conn, $query);
  
 
header('location:product.php');
			
?>