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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<style>
body{
margin: 0; height: 100%; overflow: hidden;
}

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
</style>

<body>

<?php include 'sidenav.php';?>

  <section class="home-section">
      <div class="text">Dashboard</div>
	 
	  <div class="gr" style="width:1060px;height:885px;margin-left:18px;">
  <canvas id="myChart" ></canvas>
  </div>

 
  </section>

</body>
<?php
$year = date('Y');
$a=0;
$b=0;
$c=0;
$d=0;
$e=0;
$f=0;
$g=0;
$h=0;
$i=0;
$j=0;
$k=0;
$l=0;
$fc="SELECT * FROM web where year='$year' AND month=1";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$a=$row['count'];
}

$fc="SELECT * FROM web where year='$year' AND month=2";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$b=$row['count'];
}


$fc="SELECT * FROM web where year='$year' AND month=3";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$c=$row['count'];
}

$fc="SELECT * FROM web where year='$year' AND month=4";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$d=$row['count'];
}

$fc="SELECT * FROM web where year='$year' AND month=5";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$e=$row['count'];
}

$fc="SELECT * FROM web where year='$year' AND month=6";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$f=$row['count'];
}

$fc="SELECT * FROM web where year='$year' AND month=7";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$g=$row['count'];
}

$fc="SELECT * FROM web where year='$year' AND month=8";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$h=$row['count'];
}

$fc="SELECT * FROM web where year='$year' AND month=9";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$i=$row['count'];
}

$fc="SELECT * FROM web where year='$year' AND month=10";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$j=$row['count'];
}

$fc="SELECT * FROM web where year='$year' AND month=11";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$k=$row['count'];
}

$fc="SELECT * FROM web where year='$year' AND month=12";
$test=	 mysqli_query($conn, $fc);
while($row=mysqli_fetch_assoc($test))
{
	$l=$row['count'];
}




?>
<script>
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
	'July',
	'August',
	'September',
	'October',
	'November',
	'December',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Product Page Visitors ',
      backgroundColor: 'rgb(255,0,0)',
      borderColor: 'rgb	(25,25,112)',
      data: [<?php echo $a;?>, <?php echo $b;?>, <?php echo $c;?>, <?php echo $d;?>, <?php echo $e;?>, <?php echo $f;?>, <?php echo $g;?>,
	  <?php echo $h;?>,<?php echo $i;?>,<?php echo $j;?>,<?php echo $k;?>,<?php echo $l;?>],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
		 scale: {
    ticks: {
      precision: 0
	}
		 }
	}
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
 
 
</html>