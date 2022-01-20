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

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cleanware</title>
</head>
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
  margin: 18px;
}

.ht{
	margin-left:18px;
	position:relative;
	margin-top:-10px;
	
}
.bt{
	display:inline;
	margin-left:415px;
	top:50px;
}
.al{
	text-align:center;
	display:inline;

}
#tablelist{
	width:1050px;
	margin-left:18px;
	font-size:13px;
	margin-top:20px;
	background-color:#E0E0E0;
}

</style>
 </head>
 <body>

<?php include 'sidenav.php'; ?>

  <section class="home-section">
      <div class="text">Product</div>
	  <div class="ht">
	<div class="al">
	<i class='bx bx-alarm-exclamation' style="color:red;"> Drag and drop table's column to change the position of the banner to be displayed</i>
	</div>
    <div class="bt"> 
	<a href="#add" data-toggle="modal"data-backdrop="static" data-keyboard="false">
	<i class='bx bx-image-add bx-md' style="color:#4169E1"></i><span>Add Product</span>
	</a>
	
	</div>
	</div>
	<table class="table table-bordered table-striped" id="tablelist">
    <thead>
        <tr>
            <th>Banner &nbsp&nbsp<button class="dot" title="Click the image to preview full size image">?</button></th><th>Description</th><th>Date Added</th><th>Edit</th><th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($count<1){}else
        {
            foreach ($result as $row) {
                ?>
					<tr id="<?php echo $row['banner_id']; ?>">
                    <td><img src="<?php echo 'images/'.$row["banner_img"]; ?>" onclick="op2(this.id)" id="<?php echo 'images/'.$row["banner_img"]; ?>" style="width:150px;height:80px;cursor:pointer;"></td>
                    <td><?php echo $row["banner_desc"]; ?></td>
                    <td><?php echo $row["date_added"]; ?></td>
					
					<div class="et">
					<td><a href="#edit<?php echo $row['banner_id'];?>" data-backdrop="static"  data-toggle="modal" data-keyboard="false"><i class='bx bxs-edit bx-md'></i></a>
					</td>	
					
					<td><a href='bannerDelete.php?id=<?php echo $row["banner_id"]; ?>' ><i class='bx bx-no-entry bx-md'></i></a></td>
					<input type="hidden" value="<?php echo $row["banner_id"]; ?>" id="item" name="item">	
                     	
                </tr>
				
                <?php 
					include('bannerEdit.php'); 
            }
		
        }
        ?>
    </tbody>
</table>  
	     
  </section>



</body>
<script>
$(document).ready(function() {
    $('#tablelist').DataTable();
} );
$('#tablelist').DataTable({
    "ordering": false,
	"searching": false
});
</script>
</html>