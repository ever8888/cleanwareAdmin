<?php
//#C1eAn^waRe
session_start();
?>
<?php

if($_SESSION['status']!="Active")
{
    header("location:login.php");
}
//connection
require_once "dbConnection.php";

	if(isset($_POST['add']))
    {  
        $desc  = $_POST['desc'];

		$bimg=basename( $_FILES["bimg"]["name"],".png"); 
		
		
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["bimg"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES["bimg"]["tmp_name"], $target_file);
			
        $sql = "INSERT INTO banner (banner_img,banner_desc)
        VALUES ('$bimg','$desc')";
        if (mysqli_query($conn, $sql))
        {	
	 
		header("location:banner.php");	
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($conn);
        }
		
		
		
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cleanware</title>
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<link rel="stylesheet" href=
"https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />

<!--jQuery library file -->
<script type="text/javascript"
	src="https://code.jquery.com/jquery-3.5.1.js">
</script>

<!--Datatable plugin JS library file -->
<script type="text/javascript" src=
"https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<style>
.home-section{
  position: relative;
  background: #E4E9F7;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}
.sidebar.open ~ .home-section{
  left: 250px;
  width: calc(100% - 250px);
}
.home-section .text{
  display: inline-block;
  color: #11101d;
  font-size: 25px;
  font-weight: 500;
  margin: 18px
}
.ht{
	margin-left:18px;
	position:relative;
	margin-top:-10px;
}
.bt{
	display:inline;
	margin-left:330px;
	top:50px;
}
.al{
	text-align:center;
	display:inline;
}

</style>
 </head>
 <body>

<?php include 'sidenav.php'; ?>

<section class="home-section">
    <div class="text">Banner</div>
	<br>
	<div class="ht">
	<div class="al">
	<i class='bx bx-alarm-exclamation' style="color:red;"> Drag and drop table's column to change the position of the banner to be displayed</i>
	</div>
    <div class="bt"> 
	<a href="#add" data-toggle="modal"data-backdrop="static" data-keyboard="false">
	<i class='bx bx-image-add bx-md' style="color:#4169E1"></i><span>Add Banner</span>
	</a>
	
	</div>
	</div>
	

	

	
	
	
</section>
 <div id="add" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content" style="width:535px">
    <form method="post" action="banner.php" enctype="multipart/form-data">
     <div class="modal-header">      
      <h4 class="modal-title">Add New Banner
      <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>

	  </h4>
     </div>
     <div class="modal-body"> 
	  <div class="form-group">
	  <label style="font-weight:bold;font-size:16px";>Banner<span style="color:red;font-size:11px;"> *Click the image to preview full size image</span></label><br>
	    
	 <img id="preimg2" onclick="op()" width="500px" height="150px"><br><br>
	 
      <input type="file" name="bimg" onchange="document.getElementById('preimg2').src = window.URL.createObjectURL(this.files[0])" required>

	 <script>
	 function op(){
		 var img=document.getElementById("preimg2");
		 window.open(img.src,"_blank");
     
	 }
	 </script>
      </div><br>
	  
	 
	   <div class="form-group">
       <label style="font-weight:bold;font-size:16px">Banner Description</label>
       <input type="text" style="width:500px" class="form-control" name="desc" placeholder="Enter banner description" required>
      </div>
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-success" name="add" value="Add">
     </div>
    </form>
   </div>
  </div>
 </div>
</body>
<script>
$('#add').on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();
	$('#preimg2').removeAttr('src');  
})
</script>

</html>