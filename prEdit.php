<!-- Edit Modal HTML -->
 <div class="modal fade" id="edit<?php echo $row['prlist_id']; ?>">
  <div class="modal-dialog" >
   <div class="modal-content" style="width:535px">
       <form method="POST" enctype="multipart/form-data" action="prUpdate.php">	

     <div class="modal-header">  
	  <h4 class="modal-title">Edit Product Image
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
	</h4>
     </div>
     <div class="modal-body"> 
	
	
	 <?php
$edit=mysqli_query($conn,"select * from prlist where prlist_id=".$row['prlist_id']);
$erow=$edit->fetch_assoc();
?>
	<div class="form-group">
	<label style="font-weight:bold;font-size:16px";>Product Image</label><br>
   
  <img id="<?php echo $erow['prlist_id']; ?>" onclick="opq(this.src)" width="180px" height="180px" src="<?php echo 'images/'.$erow['pr_img']; ?>"><br><br>
  <input type="file"  name="waimg" onchange="document.getElementById(<?php echo $erow['prlist_id']; ?>).src = window.URL.createObjectURL(this.files[0])">

	 <script>
	 function opq(img2){
		 //var img2=document.getElementById(<?php echo $erow['banner_id']; ?>);
		 window.open(img2,"_blank");
	 }
	 </script>
	 
	 </div>
	 
	   <div class="form-group">
       <label>Product Short Description</label>
       <input type="text" style="width:500px" name="desc" id="desc" class="form-control" value="<?php echo $erow['pr_sdesc']; ?>" required>
      </div>
	 
	  
	     <input type='hidden' name='id' value='<?php echo $erow['p_name'];?>' />
		 <input type='hidden' name='id2' value='<?php echo $erow['p_id'];?>' />
		 <input type='hidden' name='id3' value='<?php echo $erow['prlist_id'];?>' />

	 </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" name="save" class="btn btn-success" value="Save">
	  
     </div>

    </form>
	  <script>
$('#edit'+<?php echo $row['prlist_id']; ?>).on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();



})
</script>
   </div>
  </div>


 </div>