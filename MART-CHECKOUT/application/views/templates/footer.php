	 <!-- Bootstrap Jquery & JavaScript -->
	 <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
		 

	 <script src="<?php echo base_url().'assets/bootstrap/jquery/jquery-3.3.1.slim.min.js'; ?>"></script>
	 
	 <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
	 
	 	 
 	<script type="text/javascript">
 		$('#confirm-delete').on('show.bs.modal', function(e) {
			
 		    $(this).find('.btn-confirm').attr('href', $(e.relatedTarget).data('href'));
			
 		    $(this).find('.modal-body').html("Are you sure you want to delete "+$(e.relatedTarget).data('message')+"?")
			
 		});
		
 	</script>
		
		<!-- datetimepicker CDN -->
		<!-- 
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/js/tempusdominus-bootstrap-4.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/css/tempusdominus-bootstrap-4.min.css" /> -->
		
		<script src="<?php echo base_url().'assets/bootstrap-datetimepicker/jquery/jquery-3.3.1.min.js'; ?>"></script>
		<script src="<?php echo base_url().'assets/bootstrap-datetimepicker/moment/moment-with-locales.js'; ?>"></script>
	
		<script src="<?php echo base_url().'assets/bootstrap-datetimepicker/js/tempusdominus-bootstrap-4.min.js'; ?>"></script>
		
	
   <script type="text/javascript">
       $(function () {
		   
		   	   
           $('#start').datetimepicker({
			   daysOfWeekDisabled: [0, 6],
			   icons: {
				   time: "fas fa-clock",
				   date: "fas fa-calendar-alt",
				   up: "fas fa-arrow-up",
				   down: "fas fa-arrow-down"
			   },
			   minDate: moment($('#date_pickup').val()), 
			   enabledHours: [ 9, 10, 11, 12, 13, 14, 15, 16, 17], //9 - 5
           });
           $('#end').datetimepicker({
			   daysOfWeekDisabled: [0, 6],
			   icons: {
				   time: "fas fa-clock",
				   date: "fas fa-calendar-alt",
				   up: "fas fa-arrow-up",
				   down: "fas fa-arrow-down"
			   },
			   enabledHours: [ 9, 10, 11, 12, 13, 14, 15, 16, 17], //9 - 5
			   minDate: moment($('#date_due').val()),
               useCurrent: false //Important! See issue #1075
           });
           $("#start").on("dp.change", function (e) {
               $('#due').data("DateTimePicker").minDate(e.date);
           });
           $("#end").on("dp.change", function (e) {
               $('#pickup').data("DateTimePicker").maxDate(e.date);
           });
		   
	   });
	   
	   
   </script>
		
		
</body>
</html>