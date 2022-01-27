<?php
require_once "dbConnection.php";

$id=$_POST['id'];
$id2=$_POST['id2'];
$desc=$_POST['desc'];


$query="update prdesc set pr_ldesc='$desc'";

mysqli_query($conn, $query);
  

echo "<script>
		alert('Successfully edit');
		window.location.href='prdesc.php?id=$id&id2=$id2';
		</script>";
						
?>