
/*
 * *************************** Creation Log ******************************* 
 * File Name - RegistrationView.js 
 * Description - Validation
 * Version - 1.0 Created by - Kawaljeet Singh Created on - March 20, 2013 
 * *************************************************************************** 

 */


/*  -----------------------Javascript For Registration Validation ---------------------*/



$(document).ready(function() {


	 
    $('#button').click(function() { 

    	
		
        $(".error").hide();
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
var coursenameval =$("#coursename").val();
var lessonnoval =$("#lesson_no").val();
var lessonnameval =$("#lesson_name").val();
var dobval =$("#dob").val();

        if(emailaddressVal == '' && passwordval=='') {
            $("#email").val('Email required');
            $("#password").after('*');
            
            hasError = true;
        }
        
        
        else if(emailaddressVal == '') {
            $("#email").val('Email required');
            hasError = true;
        }
        else if(passwordval == '') 
        {		        
    	
            $("#password").after('*');
            hasError = true;
        }
        else if(!emailReg.test(emailaddressVal)) {
            $("#email").val('Not valid.');
            hasError = true;
        }

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
        if(captchaval == '') 
        {		        
        	
        
            $("#captcha_code").val('Fill Code');
            hasError = true;
        }
      
        
        if(repeatpasswordval == '') 
      {		        
    		
          $("#repeatpassword").after('*');
           hasError = true;
       }
        if(repeatemailaddressVal == '') 
        {		        
    		
           $("#repeatemail").val('Email required');
            hasError = true;
        }


        
        
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
        
      
        
       
        if(dobval == '') 
        {		        
    	
            $("#dob").val('DOB required');
            hasError = true;
        }
        
        if(coursenameval == '') 
        {		        
    	
            $("#coursename").val('Course name required');
            hasError = true;
        }


        if(qualificationval == '') 
        {		        
    	
            $("#qualification").val('Qualification required');
            hasError = true;
        }
        if(dateval == '') 
        {		        
    	
            $("#datepicker").val('Date required');
            hasError = true;
        }
       
        if(hasError == true) { return false; }
      
    });
   
});



