<?php

class StudentController extends AController
{

    protected  $_requiredType = "student";

  
    public function showView ($data = array())
    {
        require_once $_SESSION["SITE_PATH"] . '/views/StudentViews/StudentView.php';
    }

    public function showSubStudentViews ($viewName)
    {
        require_once $_SESSION["SITE_PATH"] . '/views/StudentViews/StudentView.php';
    }

    public function editProfileClick ()
    {
        
            $this->createUser();
            $this->_objUser->fetchUser();
            /* Showing AdminView with teacher data */
            $this->showView($this->_objUser->getTdata());
        
    }

    public function editStudentClick ()
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $qualification = $_POST["qualification"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
        
        if ($this->isValidUser() == 1) {
            $this->createUser();
            
            $this->_objUser->editStudent($firstname, $lastname, $phone, $address, $qualification, $gender, $dob);
        }
    }

    public function registerCourseClick ()
    {
        $this->showSubStudentViews("registerCourse");
    }

    public function registerCourseButtonClick ()
    {
        $course_id = $_POST["course_id"];
        $student_id = $_POST["student_id"];
        
        if ($this->isValidUser() == 1) {
            $this->createUser();
            
            $this->_objUser->registerCourse($course_id, $student_id);
        }
    }

    public function messageClick ()
    {
        $this->showSubStudentViews("message");
    }

    public function writeMessage ()
    {
        $message_id = $_POST["message_id"];
        $body = $_POST["body"];
        $subject = $_POST["subject"];
        $sentfrom = $_POST["sentfrom"];
        $sentto = $_POST["sentto"];
        
        if ($this->isValidUser() == 1) {
            $this->createUser();
            
            $this->_objUser->messageSend($message_id, $body, $subject, $sentfrom, $sentto);
        }
    }

    public function downloadClick ()
    {
        $this->showSubStudentViews("download");
    }

    public function downloadFile ()
    {
        $this->createUser();
        $this->_objUser->downloadContent();
    }
}

?>