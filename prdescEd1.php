<!-- Edit Modal HTML -->
 <div class="modal fade" id="edit1<?php echo $row2['prdesc_id']; ?>">
  <div class="modal-dialog" >
   <div class="modal-content" style="width:535px">
       <form method="POST" action="prdescUpd1.php">	

     <div class="modal-header">  
	  <h4 class="modal-title">Edit Description (Text Format)
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
	</h4>
     </div>
     <div class="modal-body"> 
	
	
	 <?php
	$edit=mysqli_query($conn,"select * from prdesc where prdesc_id=".$row2['prdesc_id']);
	$erow=$edit->fetch_assoc();
?>
	 
	  
	  	<div class="form-group">
		<label style=>Description</label>
		<textarea class="form-control" name="desc"  style="max-width:100%;resize:none;" rows="20" cols="50" required><?php echo $erow['pr_ldesc']; ?></textarea>
		</div>
	
	
	
	
	
	<input type='hidden' name='id' value='<?php echo $erow['p_name'];?>' />
	<input type='hidden' name='id2' value='<?php echo $erow['p_id'];?>' />

	 </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" name="save" class="btn btn-success" value="Save">
	  
     </div>

    </form>
	  <script>
$('#edit1'+<?php echo $row2['prdesc_id']; ?>).on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();

})
</script>
   </div>
  </div>


 </div>


 