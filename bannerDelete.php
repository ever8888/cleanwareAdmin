<?php
require_once "dbConnection.php";

?>
 
<?php
	$id=$_REQUEST['id'];
	$query = "DELETE FROM banner WHERE banner_id =$id";
			
   if (mysqli_query($conn, $query)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   
   
echo "<script>
		alert('Successfully delete from database');
		window.location.href='banner.php';
		</script>";
   

?>