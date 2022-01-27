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


$id=$_REQUEST['id'];
$id2=$_REQUEST['id2'];
	
$select="Select * from prlist Where p_id=$id2 Order By pos ";
$result=  mysqli_query($conn, $select);
$count=  mysqli_num_rows($result);	
	
	
	if(isset($_POST['add']))
    {  
		$desc  = $_POST['desc'];

		$pimg=basename( $_FILES["pimg"]["name"]); 
		
		
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["pimg"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file);
			
        $sql = "INSERT INTO prlist (pr_img,pr_sdesc,p_id,p_name)
        VALUES ('$pimg','$desc',$id2,'$id')";
        if (mysqli_query($conn, $sql))
        {
		echo "<script>
		alert('Successfully added to database');
		window.location.href='prlist.php?id=$id&id2=$id2';
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
	margin-left:246px;
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
      <div class="text"><a href="product.php">Product Image ></a> <?php echo $id; ?></div>
	 <div class="ht">
	<div class="al">
	<i class='bx bx-alarm-exclamation' style="color:red;"> Drag and drop table's column to change the position to be displayed (Set to Show All entries before dragging)</i>
	</div>
    <div class="bt"> 
	<a href="#add" data-toggle="modal" data-backdrop="static" data-keyboard="false">
	<i class='bx bx-image-add bx-md' style="color:#4169E1"></i><span>Add Image</span>
	</a>
	</div>
	</div>

	<div class="tab">
<table class="table table-bordered table-striped" id="tablelist" >
    <thead>
        <tr>
            <th>Product Image</th><th>Product Short Description</th><th>Edit</th><th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($count<1){}else
        {
            foreach ($result as $row) {
                ?>
					<tr id="<?php echo $row['prlist_id']; ?>">
                    <td><img src="<?php echo 'images/'.$row["pr_img"]; ?>" onclick="op2(this.id)" id="<?php echo 'images/'.$row["pr_img"]; ?>" style="width:80px;height:80px;cursor:pointer;"></td>
					<td><?php echo $row["pr_sdesc"]; ?></td>
					<td><a href="#edit<?php echo $row['prlist_id'];?>" data-backdrop="static"  data-toggle="modal" data-keyboard="false"><i class='bx bxs-edit bx-md'></i></a>
					</td>	
					
					<td><a href='prDelete.php?id=<?php echo $id;?>&id2=<?php echo $id2; ?>&id3=<?php echo $row['prlist_id']; ?>' ><i class='bx bx-no-entry bx-md'></i></a></td>
					<input type="hidden" value="<?php echo $row["prlist_id"]; ?>" id="item" name="item">	
                     	
                </tr>
				
                <?php 
				include('prEdit.php'); 
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
    <form method="post" action="prlist.php?id=<?php echo $id;?>&id2=<?php echo $id2;?>" enctype="multipart/form-data">
     <div class="modal-header">      
      <h4 class="modal-title">Add New Product Image
      <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>

	  </h4>
     </div>
     <div class="modal-body"> 
	  <div class="form-group">
	  <label style="font-weight:bold;font-size:16px";>Product Image</label><br>
	    
	 <img id="preimg" onclick="op()" width="180px" height="180px"><br><br>
	 
     <input type="file" name="pimg" onchange="document.getElementById('preimg').src = window.URL.createObjectURL(this.files[0])" required>

	 <script>
	 function op(){
		 var img=document.getElementById("preimg");
		 window.open(img.src,"_blank");
	 }
	 </script>
      </div><br>
	  
	  <div class="form-group">
		<label style="font-weight:bold;font-size:16px">Product Image Short Description</label>
		<input type="text" id="desc" name="desc"  style="width:500px" class="form-control" maxlength="15"><br><br>
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
	"lengthMenu": [[4, 25, 50, -1], [4, 25, 50, "All"]]
});
 

</script>
<script>
  var $sortable = $( "#tablelist > tbody" );
  $sortable.sortable({
      stop: function ( event, ui ) {
          var parameters = $sortable.sortable( "toArray" );
          $.post("prPos.php",{value:parameters},function(result){
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