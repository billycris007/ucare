<div id="page_wrapper" class="col-md-9">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">User</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-primary">
	            <div class="panel-heading">
	            	Add User
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	            	<form id="frm" role="form" action="<?= CuConfig::$siteUrl?>addUser" method="POST">
	            		<input id="e" name="e" value="1" type="hidden">
                        <div class="form-group">
                            <label>First Name <span class="text-danger"> *</span></label>
                            <input required class="form-control" name="firstname" value="<?php echo isset($data[0])?$data[0]->firstname:''; ?>">
                        </div>

                        <div class="form-group">
                            <label>Last Name <span class="text-danger"> *</span></label>
                            <input required class="form-control" name="lastname" value="<?php echo isset($data[0])?$data[0]->lastname:''; ?>">
                        </div>

                        <div class="form-group">
                            <label>Email <span class="text-danger"> *</span></label>
                            <input type="email" required class="form-control" name="email" value="<?php echo isset($data[0])?$data[0]->email:''; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Type <span class="text-danger"> *</span></label>
                            <select required class="form-control" name="user_type" value="<?php echo isset($data[0])?$data[0]->user_type:'user'; ?>">
                                <option value="superadmin">Super Admin</option>
                                <option value="organizationadmin">Organization Admin</option>
                                <option value="user">Users</option>
                            </select>
                        </div>


                        <div class="form-group pull-right">
                            <button class="btn btn-primary" type="submit">SAVE</button>
                        	<a href="<?php echo CuConfig::$siteUrl?>user" class="btn btn-danger" type="reset">CANCEL</a>
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
