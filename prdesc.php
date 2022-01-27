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
	
$select="Select * from prdesc where p_id=$id2";
$result=  mysqli_query($conn, $select);
$count=  mysqli_num_rows($result);	

$vv=0;	
	
	if(isset($_POST['add']))
    {  
		$val  = $_POST['val'];
		
		if($val==1)
		{
			$desc  = $_POST['desc'];
		
			$sql = "INSERT INTO prdesc (pr_format,pr_ldesc,p_name,p_id)
			VALUES ($val,'$desc','$id',$id2)";
			if (mysqli_query($conn, $sql))
			{
			echo "<script>
			alert('Successfully added to database');
			window.location.href='prdesc.php?id=$id&id2=$id2';
			</script>";
			}
			else
			{
			echo "Error: " . $sql . " " . mysqli_error($conn);
			}
		}
		else
		{
			$code  = $_POST['code'];
			$descp  = $_POST['descp'];
			$type  = $_POST['type'];
			$pack  = $_POST['pack'];
			$unit  = $_POST['unit'];
			$sql2 = "INSERT INTO prdesc (p_name,p_id,pr_format,pr_code,pr_cdesc,pr_type,pr_pack,pr_unit)
			VALUES ('$id',$id2,$val,'$code','$descp','$type','$pack','$unit')";
			if (mysqli_query($conn, $sql2))
			{
			echo "<script>
			alert('Successfully added to database');
			window.location.href='prdesc.php?id=$id&id2=$id2';
			</script>";
			}
			else
			{
			echo "Error: " . $sql2 . " " . mysqli_error($conn);
			}
			
			
		}
		
		/*	
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
		*/
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
	margin-left:305px;
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
      <div class="text"><a href="product.php">Product Description ></a> <?php echo $id; ?></div>
	 <div class="ht">
	<div class="al">
	<i class='bx bx-alarm-exclamation' style="color:red;"> Select the format that preferable for the description to be displayed </i>
	</div>
    <div class="bt"> 
	
	
	<?php
	if($count<=0)
	{
	?>
	<a href="#add" data-toggle="modal" data-backdrop="static" data-keyboard="false">
	<i class='bx bx-text bx-md' style="color:#4169E1"></i><span>Add Text Format</span>
	</a>&nbsp|&nbsp
	<a href="#add2" data-toggle="modal" data-backdrop="static" data-keyboard="false">
	<i class='bx bx-table bx-md' style="color:#4169E1"></i><span>Add Table Format</span>
	</a>
		</div>
	<?php
	}
	else{
			while($row3=mysqli_fetch_assoc($result))
			{
				$vv=$row3['pr_format'];
			}
	
			if($vv==1)
			{
			?>
			   <style>
			   .bt{
					display:inline;
					margin-left:450px;
					top:50px; 					
			   }
			   </style>
	
				<a href='prdescDel1.php?id=<?php echo $id; ?>&id2=<?php echo $id2; ?>' onclick="return confirm('Are you sure to delete?')">
				<i class='bx bx-text bx-md' style="color:red"></i><span style="color:red">Delete Text Format</span>
				</a>
				

	</div>
	</div>
				<div class="tab">
				<table class="table table-bordered table-striped" id="tablelist">
				<thead>
				<tr>
				<th>Description</th><th>Edit</th>
				</tr>
				</thead>
				<tbody>
				<?php 
					foreach ($result as $row2) {
						?>
						<tr id="<?php echo $row2['prdesc_id']; ?>">
							<td><?php echo nl2br($row2["pr_ldesc"]); ?></td>
							<td><a href="#edit1<?php echo $row2['prdesc_id'];?>" data-backdrop="static"  data-toggle="modal" data-keyboard="false"><i class='bx bxs-edit bx-md'></i></a></td>
						</tr>
						
						<?php 
						include('prdescEd1.php'); 
						}			
					?>
					</tbody>
				</table>  
				</div>	

				<?php
			}
			else if($vv==2)
			{
				?>
				
				<style>
			   .bt{
					display:inline;
					margin-left:300px;
					top:50px; 					
			   }
			   </style>
	
				<a href='prdescDel2.php?id=<?php echo $id; ?>&id2=<?php echo $id2; ?>' onclick="return confirm('Are you sure to delete?')">
				<i class='bx bx-table bx-md' style="color:red"></i><span style="color:red">Delete Table Format</span>
				</a>&nbsp|&nbsp
				<a href="#add2" data-toggle="modal" data-backdrop="static" data-keyboard="false">
				<i class='bx bx-table bx-md' style="color:#4169E1"></i><span>Add Description</span>
				</a>
				
				
					<div id="add2" class="modal fade">
					  <div class="modal-dialog">
					   <div class="modal-content" style="width:655px">
						<form method="post" action="prdesc.php?id=<?php echo $id;?>&id2=<?php echo $id2;?>">
						 <div class="modal-header">      
						  <h4 class="modal-title">Add Table Format
						  <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
						  </h4>
						 </div>
						 <div class="modal-body"> 

							<div class="form-group">
								<label style="font-weight:bold;font-size:14px">Item Code</label>
								<input type="text" class="form-control" name="code" id="" required />
							</div>
							<div class="form-group">
								<label style="font-weight:bold;font-size:14px">Description</label>
								<input type="text" class="form-control" name="descp" id="" required />
							</div>
							<div class="form-group">
								<label style="font-weight:bold;font-size:14px">Type</label>
								<input type="text" class="form-control" name="type" id="" required />
							</div>
							<div class="form-group">
								<label style="font-weight:bold;font-size:14px">Packing</label>
								<input type="text" class="form-control" name="pack" id="" required />
							</div>
							
							<div class="form-group">
								<label style="font-weight:bold;font-size:14px">Unit</label>
								<input type="text" class="form-control" name="unit" id="" required />
							</div>
						  
							<input type='hidden' name='val' value='2' />
						 </div>
						 <div class="modal-footer">
						  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						  <input type="submit" class="btn btn-success" name="add" value="Add">
						 </div>
						</form>
					   </div>
					  </div>
					 </div>

				<div class="tab">
				<table class="table table-bordered table-striped" id="tablelist">
				<thead>
				<tr>
					<th>Item Code</th><th>Description</th><th>Type</th><th>Packing</th><th>Unit</th><th>Edit</th><th>Delete</th>
				</tr>
				</thead>
				<tbody>
				<?php 
	
					foreach ($result as $row4) {
						?>
						<tr id="<?php echo $row4['prdesc_id']; ?>">
							<td><?php echo $row4["pr_code"]; ?></td>
							<td><?php echo $row4["pr_cdesc"]; ?></td>
							<td><?php echo $row4["pr_type"]; ?></td>
							<td><?php echo $row4["pr_pack"]; ?></td>
							<td><?php echo $row4["pr_unit"]; ?></td>
							<td><a href="#edit2<?php echo $row4['prdesc_id'];?>" data-backdrop="static"  data-toggle="modal" data-keyboard="false"><i class='bx bxs-edit bx-md'></i></a></td>	
							<td><a href='prdel.php?id=<?php echo $id;?>&id2=<?php echo $id2; ?>&id3=<?php echo $row4['prdesc_id']; ?>' ><i class='bx bx-no-entry bx-md'></i></a></td>
							<input type="hidden" value="<?php echo $row4["prdesc_id"]; ?>" id="item" name="item">	
						</tr>
						
						<?php 
						include('prdescEd2.php'); 
						}
				
					
					?>
					</tbody>
				</table>  
				</div>
				<?php
			}
				
	}
	?>


	
  


<br>	
  </section>

<div id="add" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content" style="width:655px">
    <form method="post" action="prdesc.php?id=<?php echo $id;?>&id2=<?php echo $id2;?>">
     <div class="modal-header">      
      <h4 class="modal-title">Add Text Format
      <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
	  </h4>
     </div>
     <div class="modal-body"> 

	<div class="form-group">
		<label style="font-weight:bold;font-size:14px">Product Description</label>
		<textarea class="form-control" name="desc" id="cf_message" style="max-width:100%;resize:none;"rows="20" cols="50"  required></textarea>
	</div>	
   	     <input type='hidden' name='val' value='1' />   
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-success" name="add" value="Add">
     </div>
    </form>
   </div>
  </div>
 </div>
 
 
<div id="add2" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content" style="width:655px">
    <form method="post" action="prdesc.php?id=<?php echo $id;?>&id2=<?php echo $id2;?>">
     <div class="modal-header">      
      <h4 class="modal-title">Add Table Format
      <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
	  </h4>
     </div>
     <div class="modal-body"> 

		<div class="form-group">
			<label style="font-weight:bold;font-size:14px">Item Code</label>
			<input type="text" class="form-control" name="code" id="" required />
		</div>
		<div class="form-group">
			<label style="font-weight:bold;font-size:14px">Description</label>
			<input type="text" class="form-control" name="descp" id="" required />
		</div>
		<div class="form-group">
			<label style="font-weight:bold;font-size:14px">Type</label>
			<input type="text" class="form-control" name="type" id="" required />
		</div>
		<div class="form-group">
			<label style="font-weight:bold;font-size:14px">Packing</label>
			<input type="text" class="form-control" name="pack" id="" required />
		</div>
		
		<div class="form-group">
			<label style="font-weight:bold;font-size:14px">Unit</label>
			<input type="text" class="form-control" name="unit" id="" required />
		</div>
      
	   	<input type='hidden' name='val' value='2' />
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


</html>