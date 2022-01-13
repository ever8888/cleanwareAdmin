<?php
//database connection
$db_name="cleanware";
$username="root";
$password="";
$servername="localhost";

/*
$db_name="epiz_30794725_cleanware";
$username="epiz_30794725";
$password="7ddcNzuhI5cE";
$servername="sql304.epizy.com";
*/

//connection
$conn=mysqli_connect($servername,$username,$password,$db_name);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>