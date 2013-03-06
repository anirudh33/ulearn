				/* javascript for tabs */
       
		
            $(document).ready(function() {

                //Default Action
                $(".tab_content").hide(); //Hide all content
                $("ul.tabs li:first").addClass("active").show(); //Activate first tab
                $(".tab_content:first").show(); //Show first tab content
			
                //On Click Event
                $("ul.tabs li").click(function() {
                    $("ul.tabs li").removeClass("active"); //Remove any "active" class
                    $(this).addClass("active"); //Add "active" class to selected tab
                    $(".tab_content").hide(); //Hide all tab content
                    var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                    $(activeTab).fadeIn(); //Fade in the active content
                    return false;
                });

            });
            /*   javasript for validation     */
            
            $(document).ready(function() {
			 
                $('#submit').click(function() { 
		 
                    $(".error").hide();
                    var hasError = false;
                    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    var passwordval = $("#pwd").val();
                    var emailaddressVal = $("#log").val();

				
                    if(emailaddressVal == '' && passwordval=='') {
                        $("#log").after('<span class="error">Email required.</span>');
                        $("#pwd").after('<span class="error"> Password required.</span>');
			            
                        hasError = true;
                    }



                    else if(emailaddressVal == '') {
                        $("#log").after('<span class="error">Email required.</span>');
                        hasError = true;
                    }
                    else if(passwordval == '') 
                    {		        
		        	
                        $("#pwd").after('<span class="error">Please enter your password.</span>');
                        hasError = true;
                    }
                    else if(!emailReg.test(emailaddressVal)) {
                        $("#log").after('<span class="error">Not valid.</span>');
                        hasError = true;
                    }

		        
                    if(hasError == true) { return false; }
		 
                });
            });

        
