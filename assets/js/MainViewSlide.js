$(document).ready(function() {
	
	// Expand Panel
	$("#open").click(function(){
		$("div#panel").slideDown("slow");
	
	});	
	

$("div#panel").mouseleave(function()
		{
			$("div#panel").slideUp(800);
			$("#toggle a").toggle();
		});
	// Collapse Panel
	$("#close").click(function(){
		$("div#panel").slideUp("slow");	
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});		
		
});
