<div id="content">
	<div id="page_wrapper" class="col-md-9">
		<div class="row">
		    <div class="col-lg-12">
		        <h3 class="page-header">Organization <a href="<?php echo CuConfig::$siteUrl?>addOrganization" class="btn btn-success" type="button">Add Organization</a></h3>

		    </div>
		    <!-- /.col-lg-12 -->
		</div>
		<div class="row">
		    <div class="col-lg-12 panel_container">
		        <div class="panel panel-primary">
		            <div class="panel-heading">
		            	Organization List
		            </div>
		            <!-- /.panel-heading -->
		            <div class="panel-body">
		            	<div class="dataTable_wrapper">
	                           <table id="purpose_list" class="display" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						            	<th></th>
						                <th>Organization Name</th>
						                <th>Organization Description</th>
						                <th></th>
						                <th></th>
						            </tr>
						        </thead>
						        <tfoot>
						        </tfoot>
						        <tbody>
						        <?php  foreach ($list as $key => $value) { ?>
						            <tr>
						                <td><?= $value->org_image; ?></td>
						                <td><?= $value->org_name; ?></td>
						                <td><?= $value->org_description; ?></td>
						                <td><a class="edit_org btn btn-warning" data="{'id':'<?= $value->org_id ?>'}" href="javascript:void(0)">Edit</a></td>
						                <td><a class="remove_org btn btn-danger" data="{'id':'<?= $value->org_id ?>'}" href="javascript:void(0)">Delete</a></td>
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