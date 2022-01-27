<!-- Edit Modal HTML -->
 <div class="modal fade" id="edit2<?php echo $row4['prdesc_id']; ?>">
  <div class="modal-dialog" >
   <div class="modal-content" style="width:535px">
       <form method="POST" action="prdescUpd2.php">	

     <div class="modal-header">  
	  <h4 class="modal-title">Edit Description (Table Format)
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
	</h4>
     </div>
     <div class="modal-body"> 
	
	
	 <?php
	$edit=mysqli_query($conn,"select * from prdesc where prdesc_id=".$row4['prdesc_id']);
	$erow=$edit->fetch_assoc();
?>
	 
	 <div class="form-group">
			<label style="font-weight:bold;font-size:14px">Item Code</label>
			<input type="text" class="form-control" name="code" id="" value="<?php echo $erow['pr_code']; ?>" required />
		</div>
		<div class="form-group">
			<label style="font-weight:bold;font-size:14px">Description</label>
			<input type="text" class="form-control" name="descp" id="" value="<?php echo $erow['pr_cdesc']; ?>" required />
		</div>
		<div class="form-group">
			<label style="font-weight:bold;font-size:14px">Type</label>
			<input type="text" class="form-control" name="type" id=""  value="<?php echo $erow['pr_type']; ?>" required />
		</div>
		<div class="form-group">
			<label style="font-weight:bold;font-size:14px">Packing</label>
			<input type="text" class="form-control" name="pack" id="" value="<?php echo $erow['pr_pack']; ?>" required />
		</div>
		
		<div class="form-group">
			<label style="font-weight:bold;font-size:14px">Unit</label>
			<input type="text" class="form-control" name="unit" id=""  value="<?php echo $erow['pr_unit']; ?>" required />
		</div>
	 
	

	
	<input type='hidden' name='id' value='<?php echo $erow['p_name'];?>' />
	<input type='hidden' name='id2' value='<?php echo $erow['p_id'];?>' />
	<input type='hidden' name='id3' value='<?php echo $erow['prdesc_id'];?>' />

	 </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" name="save" class="btn btn-success" value="Save">
	  
     </div>

    </form>
	  <script>
$('#edit2'+<?php echo $row2['prdesc_id']; ?>).on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();

})
</script>
   </div>
  </div>


 </div>
