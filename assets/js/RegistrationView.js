
/*
 * *************************** Creation Log ******************************* 
 * File Name - RegistrationView.js 
 * Description - Validation
 * Version - 1.0 Created by - Kawaljeet Singh Created on - March 20, 2013 
 * *************************************************************************** 

 */


/*  -----------------------Javascript For Registration Validation ---------------------*/

function isurl(id)
    {   
		var a=$("#"+id).val();
		
      
         var RegExp = /^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/;
            if(RegExp.test(a)){
            	$("#"+id).after("UrL not ");
            }else{
                alert("fail");
            }

    }

    function isscript(id)
    {   
            var RegExp = /(<([^>]+)>)/gi;
            if(RegExp.test(id)){
                alert("success");
            }else{
                alert("fail");
            }
    }

    function isEmpty(id)
    {
        if(id=='')
        {

           
    }else
    {
    }
       
    }

$(document).ready(function() {

    $('#register').click(function() { 

    	
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var passwordval = $("#password").val();
        var emailaddressVal = $("#email").val();
		var firstnameval=$("#firstname").val();
		var lastnameval=$("#lastname").val();
		var qualificationval=$("#qualification").val();
		var dateval=$("#datepicker").val();
		var repeatpasswordval = $("#repeatpassword").val();
        var repeatemailaddressVal = $("#repeatemail").val();
        var captchaval=$("#captcha_code").val();

        

        if(emailaddressVal == '' && passwordval=='') {
            $("#email").after('Email required');
            $("#password").after('password required');
            
            hasError = true;
        }
        
        
        else if(emailaddressVal == '') {
            $("#email").after('Email required');
            hasError = true;
        }
        else if(passwordval == '') 
        {		        
    	
            $("#password").after('password required');
            hasError = true;
        }
        else if(!emailReg.test(emailaddressVal)) {
            $("#email").after('Not valid.');
            hasError = true;
        }

        if(firstnameval == '') 
        {		        
    	
            $("#firstname").after('Firstname required');
            hasError = true;
        }
        if(lastnameval == '') 
        {		        
    	
            $("#lastname").after('Lastname required');
            hasError = true;
        }
        if(captchaval == '') 
        {		        
        	
        
            $("#captcha_code").after('Fill Code');
            hasError = true;
        }
      
        
        if(repeatpasswordval == '') 
      {		        
    		
          $("#repeatpassword").after('password required');
           hasError = true;
       }
        if(repeatemailaddressVal == '') 
        {		        
    		
           $("#repeatemail").after('Email required');
            hasError = true;
        }
                             
                 
        
        if(dateval == '') 
        {		        
    	
            $("#datepicker").after('Date required');
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



