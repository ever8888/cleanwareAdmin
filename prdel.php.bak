<?php
require_once "dbConnection.php";

?>
 
<?php
	$id=$_REQUEST['id'];
	$id2=$_REQUEST['id2'];
	$id3=$_REQUEST['id3'];
	$query = "DELETE FROM prlist WHERE prlist_id =$id3";
			
   if (mysqli_query($conn, $query)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
   
   
echo "<script>
		alert('Successfully delete from database');
		window.location.href='prlist.php?id=$id&id2=$id2';
		</script>";
   

?>