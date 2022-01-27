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


$select="Select * from product Order By pos";
$result=  mysqli_query($conn, $select);
$count=  mysqli_num_rows($result);


if(isset($_POST['add']))
    {  
        $name  = $_POST['name'];
		$desc  = $_POST['desc'];
		$link  = $_POST['link'];

		$bimg=basename( $_FILES["bimg"]["name"]); 
		
		
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["bimg"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES["bimg"]["tmp_name"], $target_file);
			
        $sql = "INSERT INTO product (p_img,p_name,p_sdesc,p_link)
        VALUES ('$bimg','$name','$desc','$link')";
        if (mysqli_query($conn, $sql))
        {
		echo "<script>
		alert('Successfully added to database');
		window.location.href='product.php';
		</script>";
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

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
	margin-left:240px;
	top:50px;
}
.al{
	text-align:center;
	display:inline;

}

.tab{
	width:1050px;
	margin-left:18px;
	font-size:13px;
	margin-top:20px;
	margin-bottom:50dp;
	
}

.dataTables_wrapper { font-size: 12px;}
.modal-backdrop {
  z-index: -1;
}

.dot {
  height: 20px;
  width: 20px;
  background-color: #bbb;
  color:red;
  border-radius: 50%;
  display: inline-block;
}
</style>
 </head>
 <body>

<?php include 'sidenav.php'; ?>

  <section class="home-section">
      <div class="text">Product</div>
	  <div class="ht">
	<div class="al">
	<i class='bx bx-alarm-exclamation' style="color:red;"> Drag and drop table's column to change the position to be displayed (Set to Show All entries before dragging)</i>
	</div>
    <div class="bt"> 
	<a href="#add" data-toggle="modal" data-backdrop="static" data-keyboard="false">
	<i class='bx bxl-product-hunt bx-md' style="color:#4169E1"></i><span>Add Product</span>
	</a>

	</div>
	</div>

	<div class="tab">
	<table class="table table-bordered table-striped" id="tablelist" >
    <thead>
        <tr>
            <th>Product Image</th><th>Product Name &nbsp&nbsp<button class="dot" title="Click on the product name to get to add more product image for the product">?</button></th><th>Product Short Description</th><th>Product Link</th><th>Edit</th><th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($count<1){}else
        {
            foreach ($result as $row) {
                ?>
					<tr id="<?php echo $row['p_id']; ?>">
                    <td><img src="<?php echo 'images/'.$row["p_img"]; ?>" onclick="op2(this.id)" id="<?php echo 'images/'.$row["p_img"]; ?>" style="width:120px;height:120px;cursor:pointer;"></td>
                    <td><a href="prlist.php?id=<?php echo $row['p_name'];?>&id2=<?php echo $row['p_id'];?>"><?php echo $row["p_name"]; ?></a></td>
                    <td><?php echo nl2br($row["p_sdesc"]); ?><br><a href="prdesc.php?id=<?php echo $row['p_name'];?>&id2=<?php echo $row['p_id'];?>">View for Long Description</a></td>
					 <td><?php echo $row["p_link"]; ?></td>
					<td><a href="#edit<?php echo $row['p_id'];?>" data-backdrop="static"  data-toggle="modal" data-keyboard="false"><i class='bx bxs-edit bx-md'></i></a>
					</td>	
					
					<td><a href='productDelete.php?id=<?php echo $row["p_id"]; ?>' ><i class='bx bx-no-entry bx-md'></i></a></td>
					<input type="hidden" value="<?php echo $row["p_id"]; ?>" id="item" name="item">	
                     	
                </tr>
				
                <?php 
				include('productEdit.php'); 
            }
        }
        ?>
    </tbody>
</table>  
</div>
	  <br>     
  </section>


<div id="add" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content" style="width:535px">
    <form method="post" action="product.php" enctype="multipart/form-data">
     <div class="modal-header">      
      <h4 class="modal-title">Add New Product
      <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>

	  </h4>
     </div>
     <div class="modal-body"> 
	  <div class="form-group">
	  <label style="font-weight:bold;font-size:16px";>Product</label><br>
	    
	 <img id="preimg" onclick="op()" width="180px" height="180px"><br><br>
	 
     <input type="file" name="bimg" onchange="document.getElementById('preimg').src = window.URL.createObjectURL(this.files[0])" required>

	 <script>
	 function op(){
		 var img=document.getElementById("preimg");
		 window.open(img.src,"_blank");
	 }
	 </script>
      </div><br>
	  
	 
	   <div class="form-group">
       <label style="font-weight:bold;font-size:16px">Product Name</label>
       <input type="text" style="width:500px" class="form-control" name="name" required>
      </div>
	  
	  <div class="form-group">
       <label style="font-weight:bold;font-size:16px">Product Short Description</label>
         <textarea class="form-control" name="desc" id="cf_message" style="max-width:100%;resize:none;"rows="5" cols="50"  required></textarea>
      </div>
	  
	  
	  <div class="form-group">
       <label style="font-weight:bold;font-size:16px">Product Link</label>
       <input type="text" style="width:500px" class="form-control" name="link" required>
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
$(document).ready(function() {
    $('#tablelist').DataTable();
} );
$('#tablelist').DataTable({
    "ordering": false,
	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
});
 

</script>
<script>
  var $sortable = $( "#tablelist > tbody" );
  $sortable.sortable({
      stop: function ( event, ui ) {
          var parameters = $sortable.sortable( "toArray" );
          $.post("productPos.php",{value:parameters},function(result){
              alert(result);
          });
      }
  });
</script>
<script>
    function op2(img){
	//var img=document.getElementById("pre");
	window.open(img,"_blank");
	}
</script>
</html>