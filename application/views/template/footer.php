    <!-- jQuery -->
    <script src="<?php echo CuConfig::$siteUrl?>assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo CuConfig::$siteUrl?>assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo CuConfig::$siteUrl?>assets/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo CuConfig::$siteUrl?>assets/js/sb-admin-2.js"></script>

    <!-- Date Picker -->
    <script src="<?php echo CuConfig::$siteUrl?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

	<!-- datatable -->    
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <!-- custom -->    
    <script src="<?php echo CuConfig::$siteUrl?>assets/js/custom.js"></script>

    <script type="text/javascript">
	//Date picker
	var base_url = "<?php echo CuConfig::$siteUrl?>";
    $('#datepicker').datepicker({
      autoclose: true
    });

    $('#purpose_list').DataTable();

</script>
</body>

</html>