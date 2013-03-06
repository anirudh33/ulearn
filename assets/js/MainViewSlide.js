$(document).ready(function() {
	
	// Expand Panel
	$('#open').click(function() {
		$('div#panel').slideToggle('slow', function() {
			
			
			
			$("#toggle a").toggle();
			
			
			
		});
		});
	
	
	$('#close').click(function() {
		$('div#panel').slideToggle('slow', function() {
			

			
			$("#toggle a").toggle();
		});
		});
		
});
