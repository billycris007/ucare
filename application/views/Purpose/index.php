<div id="page_wrapper" class="col-md-10">
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Funding Purpose</h1>
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
	            	<form role="form">
                        <div class="form-group">
                            <label>Purpose Name <span class="text-danger"> *</span></label>
                            <input required class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Type <span class="text-danger"> *</span></label>
                            <select required class="form-control">
                                <option>Fire</option>
                                <option>Typhoon</option>
                                <option>Earthquake</option>
                                <option>Flood</option>
                            </select>
                        </div>
                        <div class="form-group">
			                <label>Due Date <span class="text-danger"> *</span></label>

			                <div class="input-group date">
			                  	<div class="input-group-addon">
			                    	<i class="fa fa-calendar"></i>
			                  	</div>
			                  	<input required type="text" id="datepicker" class="form-control pull-right">
			                </div>
			            </div>

			            <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control"></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit Button</button>
                        <button class="btn btn-danger" type="reset">Reset Button</button>
                    </form>
	            </div>
	            <!-- /.panel-body -->
	        </div>
	        <!-- /.panel -->
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
</div>
