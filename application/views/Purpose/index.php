<div id="content">
	<div id="page_wrapper" class="col-md-9">
		<div class="row">
		    <div class="col-lg-12">
		        <h3 class="page-header">Funding Purpose <a href="<?php echo CuConfig::$siteUrl?>addPurpose" class="btn btn-success" type="button">Add Purpose</a></h3>

		    </div>
		    <!-- /.col-lg-12 -->
		</div>
		<div class="row">
		    <div class="col-lg-12 panel_container">
		        <div class="panel panel-primary">
		            <div class="panel-heading">
		            	Purpose List
		            </div>
		            <!-- /.panel-heading -->
		            <div class="panel-body">
		            	<div class="dataTable_wrapper">
	                           <table id="purpose_list" class="display" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						                <th>Purpose Name</th>
						                <th>Type</th>
						                <th>Description</th>
						                <th>Delivery Date</th>
						                <th>Funds</th>
						                <th>Status</th>
						                <th></th>
						                <th></th>
						                <th></th>
						            </tr>
						        </thead>
						        <tfoot>
						        </tfoot>
						        <tbody>
						        <?php  foreach ($list as $key => $value) { 
						        	$date = date_create($value->delivery_date);
									$new_duedate = date_format($date,"F d, Y");
								?>
						            <tr>
						                <td><?= $value->name; ?></td>
						                <td><?= $value->type; ?></td>
						                <td><?= $value->description; ?></td>
						                <td><?= $new_duedate; ?></td>
						                <td><?= ($value->funds)?number_format($value->funds,2):'0.00'; ?></td>
						                <td>
						                	<?php if($value->isEnable){ ?>
						                	<a class="btn btn-success" href="<?php echo CuConfig::$siteUrl.'purpose/isenable/'.$value->purpose_id.'/0' ?>">Enable</a>
						                	<?php }else{ ?>
						                	<a class="btn btn-warning" href="<?php echo CuConfig::$siteUrl.'purpose/isenable/'.$value->purpose_id.'/1' ?>">Disable</a>
						                	<?php } ?>
						                </td>
						                <td><a class="btn btn-warning edit_purpose" data="{'id':'<?= $value->purpose_id ?>'}" href="javascript:void(0)">Edit</a></td>
						                <td><a class="btn btn-info" href="#">Details</a></td>
						                <td><a class="btn btn-danger remove_purpose" data="{'id':'<?= $value->purpose_id ?>'}" href="javascript:void(0)">Delete</a></td>
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