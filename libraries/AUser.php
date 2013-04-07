<?php


abstract class AUser extends AModel
{

    protected $user_id;

    protected $password;

    protected $email;

    protected $user_type;

    protected $firstname;

    protected $lastname;

    protected $phone;

    protected $dob;

    protected $address;

    protected $gender;

    protected $profilepicture;

    protected $languageid;

    protected $status;

    protected $id;

    protected $qualification;

    protected $createdby;

    protected $updatedby;

    protected $createdon;

    protected $updatedon;

    public function __construct ()
    {
        parent::__construct();
    }

    public function getUser_id ()
    {
        return $this->user_id;
    }

    public function setUser_id ($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getEmail ()
    {
        return $this->email;
    }

    public function setEmail ($email)
    {
        $this->email = $email;
    }

    public function getPassword ()
    {
        return $this->password;
    }

    public function setPassword ($password)
    {
        $this->password = $password;
    }

    public function getUseType ()
    {
        return $this->user_type;
    }

    public function setUserType ($user_type)
    {
        $this->user_type = $user_type;
    }

    public function getid ()
    {
        return $this->id;
    }

    public function setid ($id)
    {
        $this->id = $id;
    }

    public function getFirstname ()
    {
        return $this->firstname;
    }

    public function setFirstname ($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname ()
    {
        return $this->lastname;
    }

    public function setLastname ($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getPhone ()
    {
        return $this->phone;
    }

    public function setPhone ($phone)
    {
        $this->phone = $phone;
    }

    public function getDOB ()
    {
        return $this->dob;
    }

    public function setDOB ($dob)
    {
        $this->dob = $dob;
    }

    public function getgender ()
    {
        return $this->gender;
    }

    public function setgender ($gender)
    {
        $this->gender = $gender;
    }

    public function getAddress ()
    {
        return $this->address;
    }

    public function setAddress ($address)
    {
        $this->address = $address;
    }

    public function getLanguageid ()
    {
        return $this->languageid;
    }

    public function setLanguageid ($languageid)
    {
        $this->languageid = $languageid;
    }

    public function getProfilePicture ()
    {
        return $this->profilepicture;
    }

    public function setProfilePicture ($profilepicture)
    {
        $this->profilepicture = $profilepicture;
    }

    public function getStatus ()
    {
        return $this->status;
    }

    public function setStatus ($status)
    {
        $this->status = $status;
    }

    public function getCreatedby ()
    {
        return $this->createdby;
    }

    public function setCreatedby ($createdby)
    {
        $this->createdby = $createdby;
    }

    public function getCreatedon ()
    {
        return $this->createdon;
    }

    public function setCreatedon ($createdon)
    {
        $this->createdon = $createdon;
    }

    public function getUpdatedon ()
    {
        return $this->createdon;
    }

    public function setUpdatedon ($updatedon)
    {
        $this->updatedon = $updatedon;
    }

    public function getUpdatedby ()
    {
        return $this->updatedby;
    }

    public function setUpdatedby ($updatedby)
    {
        $this->updatedby = $updatedby;
    }

    public function getQualification ()
    {
        return $this->qualification;
    }

    public function setQualification ($qualification)
    {
        $this->qualification = $qualification;
    }

    public function AddUser ()
    {}

    public function UpdateUser ()
    {}

    public function DeleteUser ()
    {}

    public function fetchUser ()
    {}

    public function showView ()
    {}
    
}
?>
