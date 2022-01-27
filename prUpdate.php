<?php
require_once "dbConnection.php";
$id=$_POST['id'];
$id2=$_POST['id2'];
$id3=$_POST['id3'];
$desc=$_POST['desc'];


if($_FILES['waimg']['name']==''){
	
	$que="Select pr_img from prlist where prlist_id=$id3";
	$test=	 mysqli_query($conn, $que);
	while($row3 = mysqli_fetch_array($test))
    {
				
   		$ig=$row3["pr_img"];			
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


	
 
$query="update prlist set pr_img='$waimg',pr_sdesc='$desc' where prlist_id=$id3";

mysqli_query($conn, $query);
  
 
echo "<script>
		alert('Successfully edit');
		window.location.href='prlist.php?id=$id&id2=$id2';
		</script>";
			
?>