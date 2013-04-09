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
						
						//anirudh	@todo - not working
						$.validator.addMethod("cnameRegex", function(value,
								element) {
							return this.optional(element)
									|| /^[a-z' '\-]+$/i.test(value);
						});
						$.validator
								.addMethod(
										"url",
										function(value, element) {
											return this.optional(element)
													|| !(/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/i
															.test(value));
										},
										"firstname must contain only letters, numbers, or dashes.");

						$.validator.addMethod("script",
								function(value, element) {
									return this.optional(element)
											|| !(/(<([^>]+)>)/i.test(value));
								});

						$("#form")
								.validate(
										{
											rules : {

												firstname : {
													loginRegex : true,
													required : true,
													url : true,
													script : true

												},
												dateISO : {
													required : true,
													script : true,
													url : true,
													date : true
												},

												lastname : {
													loginRegex : true,
													required : true,
													url : true,
													script : true

												},
												phone : {
														
													number:true,
													url : true,
													script : true,
													minlength:10,
													maxlength:10
												},
												address: {
													addressRegex:true,
								                    url:true,
								                    script: true
								                   
								                }
											},
											messages : {
												firstname : {
													required : "Please enter your Firstname",
													loginRegex : "Firstname must contain only letters",
													url : "Url not allowed",
													script : "Dont use script here",
												},
												lastname : {
													required : "Please enter your lastname",
													loginRegex : "lastname must contain only letters, numbers, or dashes.",
													url : "Url not allowed",
													script : "Dont use script here",
												},

												dateISO : {
													required : "Please enter your date of birth",
													url : "Url not allowed",
													script : "Dont use script here"
												},
												phone: {
												
												minlength: "Your phone must be at least 10 characters long",
							                    maxlength: "Not more than 10 characters",
							                    url:"Url not allowed",
							                    number:"Only numbers allowed",
							                    script:"Dont use script here",
												},
												
												address: {
								                    url:	"URL not allowed",
								                    script: "Script isnt allowed",
								                    addressRegex: "Only alphabets, numbers and , - / . are allowed "
								                }

											},
											submitHandler : function(form) {
												form.submit();
											}
										});

						$("#uploadform")
								.validate(
										{
											rules : {

												lesson_name : {
													loginRegex : false,
													required : true,
													url : true,
													script : true,

												},
												lesson_no : {
													number : true,
													required : true,
													url : true,
													script : true,

												}
											},
											messages : {
												lesson_name : {
													required : "Please enter your lessonname",
													loginRegex : "lessonname must contain only letters, numbers, or dashes.",
													url : "Url not allowed",
													script : "Dont use script here",
												},
												lesson_no : {
													required : "Please enter your lessonno",
													number : "lesson no must be only number",
													url : "Url not allowed",
													script : "Dont use script here",
												}

											},
											submitHandler : function(form) {
												form.submit();
											}
										});

						$("#writeform")
								.validate(
										{
											rules : {

												subject : {
													cnameRegex : true,
													required : true,
													url : true,
													script : true,

												},
												body : {
													loginRegex : false,
													required : true,
													url : true,
													script : true,

												}
											},
											messages : {
												subject : {
													required : "Please enter your subject",
													cnameRegex : "subject must contain only letters, numbers, or dashes.",
													url : "Url not allowed",
													script : "Dont use script here",
												},
												body : {
													required : "Please enter your message",
													loginRegex : "message must contain only letters, numbers, or dashes.",
													url : "Url not allowed",
													script : "Dont use script here",
												}

											},
											submitHandler : function(form) {
												form.submit();
											}
										});

						$("#addform")
								.validate(
										{
											rules : {

												coursename : {
													cnameRegex : true,
													required : true,
													url : true,
													script : true

												},
												description: {
														
													script: true,
													url:true
										}

											},
											messages : {
												coursename : {
													required : "Please enter your coursename",
													cnameRegex : "coursename must contain only letters, numbers, or dashes.",
													url : "Url not allowed",
													script : "Dont use script here",
												},
											description: {
												
												script: "Script not allowed",
												url:"URL not allowed"
											}

											},
											submitHandler : function(form) {
												form.submit();
											}
										});

					});

})(jQuery, window, document);
