<!-- Edit Modal HTML -->
 <div class="modal fade" id="edit<?php echo $row['p_id']; ?>">
  <div class="modal-dialog" >
   <div class="modal-content" style="width:535px">
       <form method="POST" enctype="multipart/form-data" action="productUpdate.php">	

     <div class="modal-header">  
	  <h4 class="modal-title">Edit Product
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
	</h4>
     </div>
     <div class="modal-body"> 
	
	
	 <?php
$edit=mysqli_query($conn,"select * from product where p_id=".$row['p_id']);
$erow=$edit->fetch_assoc();
?>
	<div class="form-group">
	<label style="font-weight:bold;font-size:16px";>Product<span style="color:red;font-size:11px;"> *Click the image to preview full size image</span></label><br>
   
  <img id="<?php echo $erow['p_id']; ?>" onclick="opq(this.src)" width="180px" height="180px" src="<?php echo 'images/'.$erow['p_img']; ?>"><br><br>
  <input type="file"  name="waimg" onchange="document.getElementById(<?php echo $erow['p_id']; ?>).src = window.URL.createObjectURL(this.files[0])">

	 <script>
	 function opq(img2){
		 //var img2=document.getElementById(<?php echo $erow['banner_id']; ?>);
		 window.open(img2,"_blank");
	 }
	 </script>
	 
	 </div>
	 
	 <div class="form-group">
       <label>Product Name</label>
       <input type="text" style="width:500px" name="name" id="name" class="form-control" value="<?php echo $erow['p_name']; ?>" required>
      </div>
	 
	   <div class="form-group">
       <label>Product Short Description</label>
       <input type="text" style="width:500px" name="desc" id="desc" class="form-control" value="<?php echo $erow['p_sdesc']; ?>" required>
      </div>
	  
	  
	  	   <div class="form-group">
       <label>Product Link</label>
       <input type="text" style="width:500px" name="link" id="link" class="form-control" value="<?php echo $erow['p_link']; ?>" required>
      </div>
	  
	  
	     <input type='hidden' name='id' value='<?php echo $erow['p_id'];?>' />

	 </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" name="save" class="btn btn-success" value="Save">
	  
     </div>

    </form>
	  <script>
$('#edit'+<?php echo $row['p_id']; ?>).on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();



})
</script>
   </div>
  </div>


 </div>