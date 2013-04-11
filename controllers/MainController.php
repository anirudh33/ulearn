<?php
/*
 * *************************** Creation Log ******************************* 
 * File Name 	- MainController.php 
 * Description 	- Main Controller Version - 1.0 
 * Created by	- Anirudh Pandita Created on - March 01, 2013 
 * **********************Update Log ***************************************
 * Sr.NO. Version Updated by Updated on Description 
 * ------------------------------------------------------------------------- 
 * 1 	1.0 	Anirudh Pandita March 08, 2013 paths corrected 
 * 2 	1.0 	Kawaljeet Singh March 15, 2013 Registration 
 * 3 	1.0 	Ujjwal Rawlley 	April 04, 2013 Mailing for contact us 
 * 4    1.0     Anirudh Pandita April 04, 2013 Comments done
 * 5	1.0		Ujjwal Rawlley	April 10, 2013 Validations on Contact Us
 * ************************************************************************
 */

/* The Main controller for showing the Main View */
class MainController
{
    /* Any messages to be shown to user */
    private $_message='';
    
    /* Guess: To check if authentication done or not
     * @todo anirudh: find usage
     */
    private $_authenticationStatus = 0;
	
    
    /*Gets the value of variable private $_authenticationStatus */
    public function getAuthenticationStatus ()
    {
        return $this->_authenticationStatus;
    }

    /*Sets the value of variable private $_authenticationStatus*/
    public function setauthenticationStatus ($authenticationStatus)
    {
        $this->_authenticationStatus = $authenticationStatus;
    }

    /*Gets the value of variable private private $_message */
    public function getMessage ()
    {
        return $this->_message;
    }

    /*Sets the value of variable private private $_message */
    public function setMessage ($message)
    {
        $this->_message = $message;
        $this->setCustomMessage("ErrorMessage", $_message);
    }

    /* Shows home page */
    public function showMainView ()
    {
    	$lang=Language::getinstance();
        require_once "views/MainView.php";        
    }
		
	/* Starts login procedure by fetching username, password from POST */
	public function initiateLogin() {
		$authObject = new Authenticate ();
		
		/* Validate username password */
		$authObject->validateLogin ();
		
		/* Getting rid of sql injection */
		$fieldEmail = mysql_real_escape_string ( $_POST ["fieldEmail"] );
		$fieldPassword = mysql_real_escape_string ( $_POST ["fieldPassword"] );
		
		$objInitiateUser = new InitiateUser ();
		
		$this->setAuthenticationStatus ( $objInitiateUser->login ( $fieldEmail, $fieldPassword ) );
		
		if ($this->getAuthenticationStatus () == 1) {
			/* Visitor date, ip, email logged */
			$authObject->logIP ();
			$this->showUserPanel ();
		}
	}
    
    /* Shows respective User Panel (Admin/Teacher/Student) depending 
     * on user type logged in */
    public function showUserPanel ()
    {
    	$controllerName = ucfirst($_SESSION["userType"]) . "Controller";
        $objController = new $controllerName();
       
        $objController->process();
        
    }
    
    /* Change language called on clicking the desired language on mainview */
    public function setLanguageClick ()
    {
        $objInitiateUser = new InitiateUser();
        
        $objInitiateUser->setLanguage($_REQUEST["language"]);
    }
    
    /* Method called on clicking the register button on homepage slider */
    public function registerClick ()
    {        
        $this->showRegisterView();
    }

    /* Shows new user registration page */
    public function showRegisterView ()
    {
    	$authObject= new Authenticate();
    	$authObject->addRegistrationCount(10000);
        require_once "./views/RegistrationView.php";
    }

    /* @todo kawal: Usage unknown... dont use confirm check box send mail directly
     * and use phpmailer */
    public function confirm()
    {
    	$email=$_GET['email'];
    	$pass=$_GET['passkey'];
    	$obj = new Registration();
    	$obj->confirmEmail($email,$pass);
    }
    
/************************************** Contact Us Mailing Function *************************************************/
    /* @todo ujjwal: use phpmailer */
    public function sendmail()
	{
		$authObject= new Authenticate();
		$authObject->validatecontactme();
		if(isset($_POST["message"]))
		{
		$message=$_POST["message"];
		$from=$_POST["email"];
		$email="ujjwal.rawlley@osscube.com";
		$name=$_POST["name"];
		
		$mail = new PHPMailer ();
		$mail->IsSMTP (); // enable SMTP
		$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->Username = "kawaljeet.singh@osscube.com";
		$mail->Password = "waheguru123";
		//$mail->SetFrom (  "Rasmus Lerdorf" );
		$mail->Subject = "Contact Me".$from;
		$mail->Body = "My Name is =>".$name."<br>Message=>".$message;
		$mail->AddAddress ($email);
		//$mail->MsgHTML ( "dnkjvvnjvcv" );
		
		if (! $mail->Send ()) {
			
			$this->setCustomMessage("ErrorMessage", "Mail Not Sent");
			//exit ();
			unset($_POST["message"]);
			unset($_POST["email"]);
			unset($_POST["name"]);
			header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
			//$this->showMainView();
		} else {
			$this->setCustomMessage("SuccessMessage", "Mail sent, it  will take some time");
			//exit ();
			header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
			//$this->showMainView();
			
		}
		
		}
		else {
			$this->setCustomMessage("SuccessMessage", "iuiuyiuMail sent, it  will take some time");
			//exit ();
			header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
			//$this->showMainView();
			
		}
	
	
	    }
    public function ajaxEmailExists()
    {
    	if(isset($_POST['email']))
    	{
    		$email=$_POST['email'];
    		$obj1=new Registration();
    		$verify=$obj1->verifyEmail($email);
    		if($verify)
    		{
    			echo "Email already Exists";
    			//$this->setCustomMessage("ErrorMessage","email already exists");
    			
    		}
    
    	}
    }
    
public function setCustomMessage($messageType,$message)
    {
    	if(isset( $_SESSION ["$messageType"]))
    	{
    		$_SESSION ["$messageType"] .= $message."<br>";
    	}
       else 
       { 
       	$_SESSION ["$messageType"]=$message."<br>";
       }
    }
    /* Called when user submits the registration form */
    public function registerUser ()
    {
    	
    	
    	$authObject= new Authenticate();
    	$authObject->validateRegistration();
        $email = $_POST["email"];
        $password = $_POST["password"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $qualification = $_POST["qualification"];
        $gender = $_POST["gender"];
        $date = $_POST["date"];
        $usertype = $_POST["usertype"];
        $status='2';
        $profilepicture = addslashes(file_get_contents
        ($_FILES["profilepicture"]["tmp_name"]));
        $confirm_code=md5(uniqid(rand()));
 
        
        $message = "http://localhost/ulearn/branches/development/index.php?method=confirm&controller=Main&passkey=$confirm_code&email=$email";
        
        $mail = new PHPMailer ();
	$mail->IsSMTP (); // enable SMTP
	$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = "kawaljeet.singh@osscube.com";
	$mail->Password = "waheguru123";
	//$mail->SetFrom (  "Rasmus Lerdorf" );
	$mail->Subject = "Confirmation Mail from Ulearn";
	 $mail->Body = $message;
	$mail->AddAddress ($email);
	//$mail->MsgHTML ( "dnkjvvnjvcv" );
	
    if (! $mail->Send ()) {
			
			$this->setCustomMessage("ErrorMessage", "Mail Not Sent");
			
		}	
		else {
			$this->setCustomMessage("SuccessMessage", "Mail sent,");
			
			
		}
	
		
		if ($_POST ["usertype"] == "student") {
			// echo"student";
			$obj = new Registration ();
			$obj->newStudentRegistration ( $email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code );
		} elseif ($_POST ["usertype"] == "teacher") {
			$obj = new Registration ();
			$obj->newTeacherRegistration ( $email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code );
		}
		/*@todo anirudh: Count no of times registration done from this ip */
		
	}
	
	/* Logs out the user by destroying session */
	public function logout() {
		if (file_exists ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/adminprofile" . $_SESSION ['userID'] . ".jpeg" ) or file_exists ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/studentprofile" . $_SESSION ['userID'] . ".jpeg" ) or file_exists ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/teacherprofile" . $_SESSION ['userID'] . ".jpeg" )) {
			unlink ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/adminprofile" . $_SESSION ['userID'] . ".jpeg" );
			unlink ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/studentprofile" . $_SESSION ['userID'] . ".jpeg" );
			unlink ( $_SESSION ["DOMAIN_PATH"] . "/assets/images/Views/profilepics/teacherprofile" . $_SESSION ['userID'] . ".jpeg" );
		}
		session_destroy ();
		header ( "Location:" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
	}
	public function unsetMessages()
	{
	    unset($_SESSION["SuccessMessage"]);
	    unset($_SESSION["ErrorMessage"]);
	    unset($_SESSION["NoticeMessage"]);
	    echo '1';
	}
}
?>
