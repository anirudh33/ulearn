<?php

class TeacherController extends AController
{

    protected  $_requiredType = "teacher";

    public function showView ($data = array())
    {
        require_once $_SESSION["SITE_PATH"] . '/views/TeacherViews/TeacherView.php';
    }

    public function showSubTeacherViews ($viewName)
    {
        require_once $_SESSION["SITE_PATH"] . '/views/TeacherViews/TeacherView.php';
    }

    public function editProfileClick ()
    {
        
            $this->createUser();
            $this->_objUser->fetchUser();
            /* Showing Teacher View with teacher data */
            $this->showView($this->_objUser->getTdata());
       
    }

    public function editTeacherClick ()
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
            
            $this->_objUser->editTeacher($firstname, $lastname, $phone, $address, $qualification, $gender, $dob);
        }
    }

    public function addCourseClick ()
    {
        $this->showSubTeacherViews("addCourse");
    }

    public function addCourseButtonClick ()
    {
        $course_id = $_POST["course_id"];
        $coursename = $_POST["coursename"];
        $description = $_POST["description"];
        
        if ($this->isValidUser() == 1) {
            $this->createUser();
            
            $this->_objUser->addCourse($course_id, $coursename, $description);
        }
    }

    public function registerCourseClick ()
    {
        $this->showSubTeacherViews("registerCourse");
    }

    public function registerCourseButtonClick ()
    {
        $course_id = $_POST["course_id"];
        $teacher_id = $_POST["teacher_id"];
        
        if ($this->isValidUser() == 1) {
            $this->createUser();
            
            $this->_objUser->registerCourse($course_id, $teacher_id);
        }
    }

    public function messageClick ()
    {
        $this->showSubTeacherViews("message");
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

    public function uploadClick ()
    {
        $this->showSubTeacherViews("upload");
    }

    public function uploadFile ()
    {
        $this->createUser();
        $this->_objUser->uploadContent();
    }
}
?>