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
	margin-left:405px;
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
      <div class="text"><a href="product.php">Product ></a> <?php echo $id; ?></div>
	  <div class="ht">
	<div class="al">
	<i class='bx bx-alarm-exclamation' style="color:red;"> Drag and drop table's column to change the position of the product to be displayed</i>
	</div>
    <div class="bt"> 
	<a href="#add" data-toggle="modal" data-backdrop="static" data-keyboard="false">
	<i class='bx bxl-product-hunt bx-md' style="color:#4169E1"></i><span>Add Product</span>
	</a>

	</div>
	</div>

	<div class="tab">

</div>
	  <br>     
  </section>





</body>
<script>
$(document).ready(function() {
    $('#tablelist').DataTable();
} );
$('#tablelist').DataTable({
    "ordering": false,

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