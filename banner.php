<?php
//#C1eAn^waRe
session_start();
?>
<?php

if($_SESSION['status']!="Active")
{
    header("location:login.php");
}

 if(isset($_POST['add']))
    {  

        $name  = $_POST['fname'];
	
        $sql = "INSERT INTO product(p_name) VALUES ('$name')";
        if (mysqli_query($con, $sql))
        {
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($con);
        }
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cleanware Dashboard</title>
</head>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body 
{
	font-family: "Times New Roman", Times, serif;
	background-color: #F5F5F5;
}

.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden;
  padding-top: 20px;
  
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #111;
  display:block;
  background-color:white;
  
}
.fit{
	margin-left:-20px;
	margin-top:-15px;
}


.dash{
	background-color:#F5F5F5;
	pointer-events: none;
	cursor: default;
	font-weight: bold;
	
	border-left: 1px solid blue;
	border-top: 1px solid black;
	border-bottom: 1px solid black;
}


@media screen and (max-height: 350px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.navbar a:hover{
  background-color: grey;
}

.box{
	margin-left:1260px;
}
  </style>
 </head>
 <body>



 <div class="sidenav">
 <div class="fit">
 <a href="index.php"><div class="btn2" ></div>
<img src="images/slogo.png" style="width:98%;">
</a>
</div>
   <br>
   <a href="index.php" ><i class="fa fa-dashboard" ></i>&nbsp&nbsp Dashboard</a>
   <a href="" class="dash"><i class="fa fa-list-alt"></i>&nbsp&nbsp Banner</a>
   <a href="product.php"><i class="fa fa-user"></i>&nbsp&nbsp&nbsp Product</a>
</div>

<div class="navbar" style="height:50px;padding-top:0px;">
<div class="box">
    <a href="logout.php">
    <i class="fa fa-sign-out"></i>
</div> 
</div>





</body>

</html>