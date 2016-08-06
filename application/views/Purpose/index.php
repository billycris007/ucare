<div id="page_wrapper" class="col-md-10">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">Funding Purpose <a href="<?php echo CuConfig::$siteUrl?>purpose/addPurpose" class="btn btn-success" type="button">Add Purpose</a></h3>

	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<div class="row">
	    <div class="col-lg-12">
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
					                <th></th>
					                <th></th>
					                <th></th>
					            </tr>
					        </thead>
					        <tfoot>
					        </tfoot>
					        <tbody>
					        <?php  foreach ($list as $key => $value) { ?>
					            <tr>
					                <td><?= $value->name; ?></td>
					                <td><?= $value->type; ?></td>
					                <td><?= $value->description; ?></td>
					                <td><?= $value->delivery_date; ?></td>
					                <td><?= ($value->funds)?number_format($value->funds,2):'0.00'; ?></td>
					                <td><a href="#">Edit</a></td>
					                <td><a href="#">Details</a></td>
					                <td><a href="<?= CuConfig::$siteUrl.'purpose/removePurpose/'.$value->purpose_id ?>">Delete</a></td>
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
