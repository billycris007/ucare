<div id="content">
	<div id="page_wrapper" class="col-md-9">
		<div class="row">
		    <div class="col-lg-12">
		        <h3 class="page-header">User <a href="<?php echo CuConfig::$siteUrl?>addUser" class="btn btn-success" type="button">Add User</a></h3>

		    </div>
		    <!-- /.col-lg-12 -->
		</div>
		<div class="row">
		    <div class="col-lg-12 panel_container">
		        <div class="panel panel-primary">
		            <div class="panel-heading">
		            	User List
		            </div>
		            <!-- /.panel-heading -->
		            <div class="panel-body">
		            	<div class="dataTable_wrapper">
	                           <table id="purpose_list" class="display" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						                <th>First Name</th>
						                <th>Family Name</th>
						                <th>Email</th>
						                <th>Type</th>
						                <th></th>
						                <th></th>
						            </tr>
						        </thead>
						        <tfoot>
						        </tfoot>
						        <tbody>
						        <?php  foreach ($list as $key => $value) { 
						        	switch($value->user_type){
						        		case 'superadmin':
						        			$user_type = "Super Admin";
						        			break;
						        		case 'organizationadmin':
						        			$user_type = "Organization Admin";
						        			break;
						        		default:
						        			$user_type = "User";
						        			break;
						        	}
						        ?>
						            <tr>
						                <td><?= $value->firstname; ?></td>
						                <td><?= $value->lastname; ?></td>
						                <td><?= $value->email; ?></td>
						                <td><?= $user_type; ?></td>
						                <td><a class="edit_user btn btn-warning" data="{'id':'<?= $value->user_id ?>'}" href="javascript:void(0)">Edit</a></td>
						                <td><a class="remove_user btn btn-danger" data="{'id':'<?= $value->user_id ?>'}" href="javascript:void(0)">Delete</a></td>
						            </tr>
						        <?php } ?>
						        </tbody>
						    </table>     
	                    </div>
		            </div>
		            <!-- /.panel-body -->
		        </div>
		        <!-- /.panel -->
		    </div>
		    <!-- /.col-lg-12 -->
		</div>
	</div>
</div>