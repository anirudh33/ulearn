65


$(document).ready(function() {
	
	// Expand Panel
	
	$(document).ready(function(){
		
		$("div#panel").slideDown(1000);
		
			$("#toggle a").toggle();
		
		
		});
	
$("div#panel").mouseleave(function()
		{
			$("div#panel").slideUp(800);
			$("#toggle a").toggle();
		});
	
	
	$("#open").click(function(){
		$("div#panel").slideDown("slow");
	
	});
	
	// Collapse Panel
	
	$("#close").click(function(){
		$("div#panel").slideUp(800);
		});
			
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});		
		
});
