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
    	
    	$.validator.addMethod("loginRegex", function(value, element) {
            return this.optional(element) || /^[a-z0-9\-]+$/i.test(value);
        });

    	$.validator.addMethod("url", function(value, element) {
            return this.optional(element) || !(/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i.test(value));
        }, "firstname must contain only letters, numbers, or dashes.");
    	
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
                email: {
                    required: true,
                    email: true,
                    url:true,
                    script: true,
                },
                password: {
                    required: true,
                    minlength: 5,
                    url:true,
                    script: true,
                },
                phone: {
                    required: true,
                    minlength: 10,
                    url:true,
                    script: true,
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
                	loginRegex:"firstname must contain only letters, numbers, or dashes.",
                	url:"Url not allowed",
                	script:"Dont use script here",
                },
                	lastname: 
                	{required:"Please enter your lastname",
                		loginRegex:"lastname must contain only letters, numbers, or dashes.",	
                		url:"Url not allowed",
                		script:"Dont use script here",
                	},
                	
                date: "Please enter your date of birth",
                address: "Please enter your address",
                phone: {
                    required: "Please provide a phoneno",
                    minlength: "Your phone must be at least 10 characters long",
                    url:"Url not allowed",
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