<!-- toast plugin -->
<link rel="stylesheet"
	href="assets/plugins/toast/src/main/resources/css/jquery.toastmessage.css"
	type="text/css" media="screen">
<script
	src="assets/plugins/toast/src/main/javascript/jquery.toastmessage.js"
	type="text/javascript"></script>

	
<!-- Showing errors/success/notice messages using toast -->

	
	<!-- Hidden text boxes to store any messages -->
<input type="hidden" id="hdnTextError" name="hdnTextError"
	value='<?php if(isset($_SESSION["ErrorMessage"])){echo $_SESSION["ErrorMessage"];}?>'>

<input type="hidden" id="hdnTextSuccess" name="hdnTextSuccess"
	value='<?php if(isset($_SESSION["SuccessMessage"])){echo $_SESSION["SuccessMessage"];}?>'>

<input type="hidden" id="hdnTextNotice" name="hdnTextNotice"
	value='<?php if(isset($_SESSION["NoticeMessage"])){echo $_SESSION["NoticeMessage"];}?>'>
	
<script type="text/javascript">

$(document).ready(function(){

	var error=$("#hdnTextError").val();
	var success=$('#hdnTextSuccess').val();
	var notice=$('#hdnTextNotice').val();
	if(error!='') {
	    
		$().toastmessage({
		sticky : false,
		position: 'top-right',
		stayTime: 30000
		});
		
		$().toastmessage('showErrorToast', error);
		
	}
	if(success!='') {
		
		$().toastmessage({
			sticky : false,
			position: 'top-right',
			stayTime: 8000			
			});
		
			$().toastmessage('showSuccessToast', success);
	}
	if(notice!='') {
		
		$().toastmessage({
			sticky : false,
			position: 'top-right',
			stayTime: 8000			
			});
		
			$().toastmessage('showNoticeToast', notice);
	}	

	fncLoad();
});

function fncLoad() {
	//Unsetting messages in session using ajax call
    	$.ajax({ 
    	     type: "GET",
    	     url: 'index.php?method=unsetMessages&controller=Main',          
    	                           
    	       success: function(dataReceived){
    
    	    	  
    
    		       
//     		       dataReceived=dataReceived.charAt(dataReceived.length-1);
//     		       alert(dataReceived);
//     	           if($.trim(dataReceived)=='1') {
    	        	   
//     	           } else {
//     	               alert("Cant call unsetMessages");
    	               
//     	           }
     	       }
    	   });
	}

</script>




	