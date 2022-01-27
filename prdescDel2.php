<?php
require_once "dbConnection.php";

?>
 
<?php
	$id=$_REQUEST['id'];
	$id2=$_REQUEST['id2'];
	$query = "DELETE FROM prdesc";
			
   if (mysqli_query($conn, $query)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   
   
echo "<script>
		alert('Successfully delete from database');
		window.location.href='prdesc.php?id=$id&id2=$id2';
		</script>";
   

?>