<?php
//#C1eAn^waRe
session_start();
?>
<?php

if($_SESSION['status']!="Active")
{
    header("location:login.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cleanware</title>
</head>
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
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
</style>
 </head>
 <body>

<?php include 'sidenav.php'; ?>

  <section class="home-section">
      <div class="text">Product</div>
  </section>



</body>

</html>