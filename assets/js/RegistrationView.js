
/*
 * *************************** Creation Log ******************************* 
 * File Name - RegistrationView.js 
 * Description - Validation
 * Version - 1.0 Created by - Kawaljeet Singh Created on - March 20, 2013 
 * *************************************************************************** 

 */


/*  -----------------------Javascript For Registration Validation ---------------------*/

function isUrl(id)
    {   
	 
		var a=$("#"+id).val();
		
      
         var RegExp = /^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/;
            if(RegExp.test(a)){
            	
            	$("#"+id).after("wrong entry");
            	document.getElementById(id).style.borderColor="#FF0000";
            }
            
            
    }


	function empty(id)
	{
		document.getElementById(id).style.borderColor="";
		
	}
    function isScript(id)
    {   
    	var a=$("#"+id).val();
            var RegExp = /(<([^>]+)>)/gi;
            if(RegExp.test(a)){
            	$("#"+id).after("wrong entry");
            	document.getElementById(id).style.borderColor="#FF0000";
            }
    }

   
    function isEmpty(id)
    {
   		var a=$("#"+id).val();
        	
            if(a=='')
            {
            	$("#"+id).val("Required");
            	document.getElementById(id).style.borderColor="#FF0000";

        }
            
    }
   

$(document).ready(function() {

    $('#register').click(function() { 

    	
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailaddressVal = $("#email").val();
		var dateval=$("#datepicker").val();
		var firstnameval=$("#firstname").val();
		var lastnameval=$("#lastname").val();
		var phoneval=$("#phone").val();
		
		
		if(dateval == '') 
        {		        
    	
            $("#datepicker").val('Required');
            document.getElementById("datepicker").style.borderColor="#FF0000";
            hasError = true;
        }
		
		
		
        if(!emailReg.test(emailaddressVal)) {
            $("#email").val('Not valid.');
            document.getElementById("email").style.borderColor="#FF0000";
            hasError = true;
        }

        if(firstnameval=='') 
        {		        
    	
       // alert("fdfdfdfgfdggfhh");
            $("#firstname").val('Required');
            document.getElementById("firstname").style.borderColor="#FF0000";
            hasError = true;
        }
        
        if(lastnameval=='') 
        {		        
    	
            $("#lastname").val('Required');
            document.getElementById("lastname").style.borderColor="#FF0000";
            hasError = true;
        }
        if(phoneval=='')
        	{
        	$("#phone").val("Required");
        	document.getElementById("phone").style.borderColor="#FF0000";
        	}
        
        if(addressval == '') 
        {		        
    	
            $("#address").val('Required');
            document.getElementById("address").style.borderColor="#FF0000";
            hasError = true;
        }
        
        
       
        if(hasError == true) {
             	
        	
        	return false; 
        }
        else {
          	$('#frmForm').submit();
    	return true;
    }
                   
    });
    
   
    
    $('#edit').click(function() { 

    	$(".error").hide();
        var hasError = false;
        
		var firstnameval=$("#firstname").val();
		var lastnameval=$("#lastname").val();
		var qualificationval=$("#qualification").val();
			
        var dobval =$("#dob").val();

       

        if(firstnameval == '') 
        {		        
    	
            $("#firstname").val('Firstname required');
            hasError = true;
        }
        if(lastnameval == '') 
        {		        
    	
            $("#lastname").val('Lastname required');
            hasError = true;
        }
       
                                    
           if(dobval == '') 
        {		        
    	
            $("#dob").val('DOB required');
            hasError = true;
        }
        
         if(qualificationval == '') 
        {		        
    	
            $("#qualification").val('Qualification required');
            hasError = true;
        }
       
        if(hasError == true) {
             	return false; 
        }
        else {
              	$('#frmForm').submit();
        	return true;
        }
                   
    });
    
    
    
    /*------------------Add Course View Javascript-------------------*/
    
    
    $('#addCourse').click(function() { 

    	$(".error").hide();
        var hasError = false;
        
        var coursenameval =$("#coursename").val();
        
        if(coursenameval == '') {		        
    	    $("#coursename").val('Course name required');
            hasError = true;
        }

        if(hasError == true) {
          	return false; 
        } 
        
        else {
              	$('#form').submit();
        	return true;
        }
        
                           
    });
    
    $('#button').click(function() { 

    	$(".error").hide();
        var hasError = false;
        
        var lessonnoval =$("#lesson_no").val();
        var lessonnameval =$("#lesson_name").val();
        
        if(lessonnoval == '') 
        {		        
    	
            $("#lesson_no").val('Lesson no required');
            hasError = true;
        }
        
        if(lessonnameval == '') 
        {		        
    	
            $("#lesson_name").val('Lesson name required');
            hasError = true;
        }

        if(hasError == true) {
          	return false; 
        } 
        
        else {
              	$('#Form').submit();
        	return true;
        }
        
                           
    });
   
});



