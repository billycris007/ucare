<?php
	foreach ($list as $row) {?> 
	<div class="modal fade" id="updatePurpose<?php echo $row->purpose_id;?>" tab-index="-1" role="dialog">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header text-center"><h3>Update<br><b><?php echo $row->name;?></b></h3></div>
	            <div class="modal-body">
	            	<form action="<?php echo base_url().'addPurposeUpdate'?>" method="POST" enctype="multipart/form-data">
		                <div class="panel-body">         
		                    <div class="form-group">
		                        <label>Description:</label>
		                        <textarea class="form-control" rows="3" name="description"></textarea>
		                    </div>  
		                    <!-- <div class="form-group">
		                    	<input type="file" name="userfile"/>
		                    </div>    -->
							<input type="hidden" name="purpose_img_id" value="<?php echo $row->purpose_id?>"/> 
		                    <div class="pull-right">
		                        <button class="btn btn-default" type="reset">Clear All</button>
		                        <button class="btn btn-primary" type="submit">Update</button>
		                    </div>
		                </div> 
		            </form>
	            </div>
	        </div>
	    </div>
	</div> 
<?php }
?>