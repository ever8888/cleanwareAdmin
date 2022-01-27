<?php
require_once "dbConnection.php";

$id=$_POST['id'];
$id2=$_POST['id2'];
$id3=$_POST['id3'];
$code  = $_POST['code'];
$descp  = $_POST['descp'];
$type  = $_POST['type'];
$pack  = $_POST['pack'];
$unit  = $_POST['unit'];


$query="update prdesc set pr_code='$code',pr_cdesc='$descp',pr_type='$type',pr_pack='$pack',pr_unit='$unit' where prdesc_id=$id3";

mysqli_query($conn, $query);
  

echo "<script>
		alert('Successfully edit');
		window.location.href='prdesc.php?id=$id&id2=$id2';
		</script>";
						
?>