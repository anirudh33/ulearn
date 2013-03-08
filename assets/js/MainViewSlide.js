/* 
 updated by : Kawaljeet Singh
 Date: 6, March 2013
 */




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
