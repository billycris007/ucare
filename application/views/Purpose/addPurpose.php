<div id="page_wrapper" class="col-md-9">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">Funding Purpose</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-primary">
	            <div class="panel-heading">
	            	Add Purpose
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	            	<form id="frm" role="form" action="<?= CuConfig::$siteUrl?>purpose/addPurpose" method="POST">
	            		<input id="e" name="e" value="1" type="hidden">
                        <div class="form-group">
                            <label>Purpose Name <span class="text-danger"> *</span></label>
                            <input required class="form-control" name="p_name" value="<?php echo isset($data[0])?$data[0]->name:''; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Type <span class="text-danger"> *</span></label>
                            <select required class="form-control" name="p_type" value="<?php echo isset($data[0])?$data[0]->type:''; ?>">
                                <option>Fire</option>
                                <option>Typhoon</option>
                                <option>Earthquake</option>
                                <option>Flood</option>
                            </select>
                        </div>
                        <div class="form-group">
			                <label>Delivery Date <span class="text-danger"> *</span></label>
			                <?php
			                if(isset($data[0])){
			                	$date = date_create($data[0]->delivery_date);
								$new_duedate = date_format($date,"m/d/Y");
							}else{
								$new_duedate = '';
							}

			                ?>
			                <div class="input-group date">
			                  	<div class="input-group-addon">
			                    	<i class="fa fa-calendar"></i>
			                  	</div>
			                  	<input required type="text" id="datepicker" name="p_duedate" value="<?= $new_duedate; ?>" class="form-control pull-right">
			                </div>
			            </div>

			            <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="p_desc"><?php echo isset($data[0])?$data[0]->description:''; ?></textarea>
                        </div>

                        <div class="form-group pull-right">
                            <button class="btn btn-primary" type="submit">SAVE</button>
                        	<a href="<?php echo CuConfig::$siteUrl?>purpose" class="btn btn-danger" type="reset">CANCEL</a>
                        </div>
                        
                    </form>
	            </div>
	            <!-- /.panel-body -->
	        </div>
	        <!-- /.panel -->
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
</div>
