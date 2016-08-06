	<footer>
		<nav class="navbar navbar-inverse navbar-bottom">
	        <div class="container"> 
	         	<p class="text-center">Powered By: <strong>UCare Company</strong></p> 
	        </div>
	    </nav>
	</footer>
</body> 
<!-- Script to Activate the Carousel -->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script> 
	$(document).ready(function() {
	  $('#media').carousel({
	    pause: true,
	    interval: false,
	  });
	});

  $('.carousel').carousel({
      interval: 5000 //changes the speed
  })
</script>
</html>