jQuery('document').ready(function($){

	// Attach a function to the 'click' event for our links
	$('a.ajax_link').click(function(){
		// Instantiate some variables
		var user, data;
		
		// Use jQuery attr() function to grab the HREF value of the link		
		user = $(this).attr('href');

		// Chop off the '#' from the HREF. There are lots of ways to do this, substr() is just an example
		user = user.substr(1);
		
		// Good practice to put our data into an object for an AJAX call, as we may well want to pass more than one parameter to our script in practice
		data = {'user':user};

		// Use jQuery's built in AJAX function to take the pain out of AJAX!
		$.ajax({
			type: 'POST', // GET is available if we prefer
			url: '/lsna/main.php',
			data: data, // this is the data object populated above
			success: function(data){
				// This function runs if the PHP script is successfully called
				// Here we are simply populating a specified div with the HTML that our script has sent back to us
				$('#data_box').html(data);
			}
		});
		
		// Always think about using return false on a click event to stop the screen from jumping
		return false;
	});


});