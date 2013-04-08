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

(function($, W, D) {

	var JQUERY4U = {};

	//when the dom has loaded setup form validation rules
	$(document)
			.ready(
					function($) {

						$.validator.addMethod("loginRegex", function(value,
								element) {
							return this.optional(element)
									|| /^[a-z]+$/i.test(value);
						});
						//anirudh
						$.validator.addMethod("addressRegex", function(value,
								element) {
							return this.optional(element)
									|| /^[a-z' '0-9',''-'"\/"'.']+$/i.test(value);
						});

						$.validator
								.addMethod(
										"url",
										function(value, element) {
											return this.optional(element)
													|| !(/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i
															.test(value));
										});

						$.validator.addMethod("script",
								function(value, element) {
									return this.optional(element)
											|| !(/(<([^>]+)>)/i.test(value));
								});

						$.validator
								.addMethod(
										"checkemail",
										function(value, element) {
											$
													.ajax({
														type : "POST",
														url : 'index.php?method=ajaxEmailExists&controller=Main',
														data : "email=" + email,
														success : function(
																dataReceived) {

															//$("#error").html(dataReceived);
														}
													});
										});

						$("#register-form")
								.validate(
										{
											rules : {

												firstname : {
													loginRegex : true,
													required : true,
													url : true,
													script : true,

												},
												lastname : {
													loginRegex : true,
													required : true,
													url : true,
													script : true,

												},

												date : {
													script : true,
													url : true,
													date : true

												},
												email : {
													required : true,
													email : true,
													checkemail : true,
													script : true,

												},
												repeatemail : {
													required : true,
													email : true,
													script : true,
													equalTo : "#email"
												},

												password : {
													required : true,
													minlength : 5,
													url : true,
													script : true,
												},
												repeatpassword : {
													required : true,
													minlength : 5,
													url : true,
													script : true,
													equalTo : "#password"
												},
												phone : {
													url : true,
													script : true,
													number : true,
													minlength : 10,
													maxlength : 10
												},

												captcha_code : {
													required : true,
													url : true,
													script : true,

												},

												address : {
													url : true,
													script : true,
													addressRegex: true

												},
												agree : "required"
											},
											messages : {
												firstname : {
													required : "Please enter your firstname",
													loginRegex : "Firstname must contain only letters.",
													url : "Url not allowed",
													script : "Dont use script here",
												},
												lastname : {
													required : "Please enter your lastname",
													loginRegex : "Firstname must contain only letters.",
													url : "Url not allowed",
													script : "Dont use script here",
												},

												date : {
													
													url : "Url not allowed",
													script : "Dont use script here",
													date : "Date format not correct"
													},
													
												address : {
													url:	"URL not allowed",
								                    script: "Script isnt allowed",
								                    addressRegex: "Only alphabets, numbers and , - / . are allowed "
													
												},
												phone : {
													required : "Please provide a phoneno",
													minlength : "Your phone must be at least 10 characters long",
													maxlength : "Not more than 10 characters",
													url : "Url not allowed",
													number : "Only numbers allowed",
													script : "Dont use script here",
												},
												address : {
													url : "Url not allowed",
													script : "Dont use script here",
												},
												password : {
													required : "Please provide a password",
													minlength : "Your password must be at least 5 characters long",
													url : "Url not allowed",
													script : "Dont use script here",
												},
												repeatpassword : {
													required : "Please provide a password",
													minlength : "Your password must be at least 5 characters long",
													url : "Url not allowed",
													script : "Dont use script here",
													equalTo : "value should be same ",

												},
												repeatemail : {
													email : "Please enter a valid email address",
													equalTo : "value should be same ",
													script : "Dont use script here",
												},
												email : {
													checkemail : "Email already exists",
													email : "Please enter a valid email address",

													script : "Dont use script here",
												}

											},
											submitHandler : function(form) {
												form.submit();
											}
										});

					});

})(jQuery, window, document);
