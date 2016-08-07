<div id="page_wrapper" class="col-md-9">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">Organization</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-primary">
	            <div class="panel-heading">
	            	Add Organization
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	            	<form id="frm" role="form" action="<?= CuConfig::$siteUrl?>addOrganization" method="POST">
	            		<input id="e" name="e" value="1" type="hidden">
                        <div class="form-group">
                            <label>User <span class="text-danger"> *</span></label>
                            <select required class="form-control" name="user_id" value="<?php echo isset($data[0])?$data[0]->type:''; ?>">
                               <?php foreach($users as $user){ ?> 
                                <option value="<?= $user->user_id; ?>"><?= $user->firstname.' '.$user->lastname; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Organization Name <span class="text-danger"> *</span></label>
                            <input required class="form-control" name="org_name" value="<?php echo isset($data[0])?$data[0]->org_name:''; ?>">
                        </div>
                        
			            <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="org_desc"><?php echo isset($data[0])?$data[0]->org_description:''; ?></textarea>
                        </div>

                        <div class="form-group pull-right">
                            <button class="btn btn-primary" type="submit">SAVE</button>
                        	<a href="<?php echo CuConfig::$siteUrl?>organization" class="btn btn-danger" type="reset">CANCEL</a>
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
