/* Creation Log

File Name                   -  RegistrationView2.js
Description                 -  new user registration page
Version                     -  1.0
Created by                  -  Kawaljeet Singh
Created on                  -  March 19, 2013
* **************************** Update Log ********************************
Sr.NO.        Version        Updated by           Updated on          Description
-------------------------------------------------------------------------

* ************************************************************************
*/
/*-----------Jquery validation for Registration   ---------------*/
 
(function($,W,D)
{
	
   var JQUERY4U = {};

    
    //when the dom has loaded setup form validation rules
    $(document).ready(function($) {
    
    	/*
   	$("#email").keyup(function() {
    		var name = $('#email').val();
    		if(name=="")
    		{
    		$("#error").html("");
    		}
    		else
    		{
    		$.ajax({
    		type: "POST",
    		url: "models/Registration.php",
    		data: "name="+ name ,
    		success: function(html){
    		$("#error").html(html);
    		}
    		});
    		return false;
    		}
    		});
    	
    	*/
    	   	
    	
    	
    	$.validator.addMethod("loginRegex", function(value, element) {
            return this.optional(element) || /^[a-z\-]+$/i.test(value);
        });

    	$.validator.addMethod("url", function(value, element) {
            return this.optional(element) || !(/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i.test(value));
        });
    	
    	$.validator.addMethod("script", function(value, element) {
            return this.optional(element) || !(/(<([^>]+)>)/i.test(value));
        });

    	$("#register-form").validate({
            rules: {
            
            firstname: {
            	loginRegex: true,
            	 required: true,
            	 url:true,
            	 script: true,
            	

            },
            lastname: {
            	loginRegex: true,
            	 required: true,
            	 url:true,
            	 script: true,

            },
            
            date:{
            	required:true,
            	
            },
                email: {
                    required: true,
                    email: true,
                   
                    script: true,
                    
                },
                repeatemail: {
                    required: true,
                    email: true,
                   
                    script: true,
                    equalTo: "#email"
                },
                
                password: {
                    required: true,
                    minlength: 5,
                    url:true,
                    script: true,
                },
                repeatpassword: {
                    required: true,
                    minlength: 5,
                    url:true,
                    script: true,
                    equalTo: "#password"
                },
                phone: {
                    required: true,
                    
                    url:true,
                    script: true,
                    number:true,
                    minlength: 10,
                },
                
                captcha_code: {
                    required: true,
                    url:true,
                    script: true,
                   
                },
               
		 address: {
                    required: true,
                    url:true,
                    script: true,
                   
                },
                agree: "required"
            },
            messages: {
                firstname:
                {required:"Please enter your firstname",
                	loginRegex:"firstname must contain only letters.",
                	url:"Url not allowed",
                	script:"Dont use script here",
                },
                	lastname: 
                	{required:"Please enter your lastname",
                		loginRegex:"firstname must contain only letters.",	
                		url:"Url not allowed",
                		script:"Dont use script here",
                	},
                	
                date:
                {required:"Please enter your date of birth",
                
                },
                	address: "Please enter your address",
                phone: {
                    required: "Please provide a phoneno",
                    minlength: "Your phone must be at least 10 characters long",
                    url:"Url not allowed",
                    number:"only numbers allowed",
                    script:"Dont use script here",
                },
                address: {
                	url:"Url not allowed",
                	script:"Dont use script here",
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    url:"Url not allowed",
                    script:"Dont use script here",
                },
                repeatpassword: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    url:"Url not allowed",
                    script:"Dont use script here",
                    equalTo:"value should be same ",
                    
                },
                repeatemail: {
                	email:"Please enter a valid email address",
                	equalTo:"value should be same ",
                	script:"Dont use script here",
                },
                email: {
                	email:"Please enter a valid email address",
                	
                	script:"Dont use script here",
                }
                
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        
 	
        
    });

})(jQuery, window, document);
