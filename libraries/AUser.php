<?php
/**
 *@author anirudh
 **************************** Creation Log *******************************
 * File Name 	- AUser.php
 * Description 	- Abstract User class holding functionalities
 * 					common to all users
 * Version      - 1.0
 * Created by	- Tanu trehan
 * Created on 	- March 08, 2013
 * **********************Update Log ***************************************
 * Sr.NO. Version Updated by 		Updated on	 	Description
 * -------------------------------------------------------------------------
 * 1		1.1	    Anirudh Pandita		April 07, 2013 	Messaging function added 
 * ************************************************************************
 */

abstract class AUser extends AModel
{

    /**
     *
     * @var Stores user id of user as given in userdetails table
     */
    protected $user_id;

    /**
     * @var unknown
     */
    protected $password;

    /**
     * @var unknown
     */
    protected $email;

    /**
     * @var unknown
     */
    protected $user_type;

    /**
     * @var unknown
     */
    protected $firstname;

    /**
     * @var unknown
     */
    protected $lastname;

    /**
     * @var unknown
     */
    protected $phone;

    /**
     * @var unknown
     */
    protected $dob;

    /**
     * @var unknown
     */
    protected $address;

    /**
     * @var unknown
     */
    protected $gender;

    /**
     * @var unknown
     */
    protected $profilepicture;

    /**
     * @var unknown
     */
    protected $languageid;

    /**
     * @var unknown
     */
    protected $status;

    /**
     * @var unknown
     */
    protected $id;

    /**
     * @var unknown
     */
    protected $qualification;

    /**
     * @var unknown
     */
    protected $createdby;

    /**
     * @var unknown
     */
    protected $updatedby;

    /**
     * @var unknown
     */
    protected $createdon;

    /**
     * @var unknown
     */
    protected $updatedon;

    /**
     *
     * @return User id of user (Teacher/Admin/Student)
     */
    public function getUser_id ()
    {
        return $this->user_id;
    }

    /**
     *
     * @param Sets $user_id
     *            of user (Admin/Teacher/Student)
     */
    public function setUser_id ($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return unknown
     */
    public function getEmail ()
    {
        return $this->email;
    }

    /**
     * @param unknown $email
     */
    public function setEmail ($email)
    {
        $this->email = $email;
    }

    /**
     * @return unknown
     */
    public function getPassword ()
    {
        return $this->password;
    }

    /**
     * @param unknown $password
     */
    public function setPassword ($password)
    {
        $this->password = $password;
    }

    /**
     * @return unknown
     */
    public function getUseType ()
    {
        return $this->user_type;
    }

    /**
     * @param unknown $user_type
     */
    public function setUserType ($user_type)
    {
        $this->user_type = $user_type;
    }

    /**
     * @return unknown
     */
    public function getid ()
    {
        return $this->id;
    }

    /**
     * @param unknown $id
     */
    public function setid ($id)
    {
        $this->id = $id;
    }

    /**
     * @return unknown
     */
    public function getFirstname ()
    {
        return $this->firstname;
    }

    /**
     * @param unknown $firstname
     */
    public function setFirstname ($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return unknown
     */
    public function getLastname ()
    {
        return $this->lastname;
    }

    /**
     * @param unknown $lastname
     */
    public function setLastname ($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return unknown
     */
    public function getPhone ()
    {
        return $this->phone;
    }

    /**
     * @param unknown $phone
     */
    public function setPhone ($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return unknown
     */
    public function getDOB ()
    {
        return $this->dob;
    }

    /**
     * @param unknown $dob
     */
    public function setDOB ($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return unknown
     */
    public function getgender ()
    {
        return $this->gender;
    }

    /**
     * @param unknown $gender
     */
    public function setgender ($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return unknown
     */
    public function getAddress ()
    {
        return $this->address;
    }

    /**
     * @param unknown $address
     */
    public function setAddress ($address)
    {
        $this->address = $address;
    }

    /**
     * @return unknown
     */
    public function getLanguageid ()
    {
        return $this->languageid;
    }

    /**
     * @param unknown $languageid
     */
    public function setLanguageid ($languageid)
    {
        $this->languageid = $languageid;
    }

    /**
     * @return unknown
     */
    public function getProfilePicture ()
    {
        return $this->profilepicture;
    }

    /**
     * @param unknown $profilepicture
     */
    public function setProfilePicture ($profilepicture)
    {
        $this->profilepicture = $profilepicture;
    }

    /**
     * @return unknown
     */
    public function getStatus ()
    {
        return $this->status;
    }

    /**
     * @param unknown $status
     */
    public function setStatus ($status)
    {
        $this->status = $status;
    }

    /**
     * @return unknown
     */
    public function getCreatedby ()
    {
        return $this->createdby;
    }

    /**
     * @param unknown $createdby
     */
    public function setCreatedby ($createdby)
    {
        $this->createdby = $createdby;
    }

    /**
     * @return unknown
     */
    public function getCreatedon ()
    {
        return $this->createdon;
    }

    /**
     * @param unknown $createdon
     */
    public function setCreatedon ($createdon)
    {
        $this->createdon = $createdon;
    }

    /**
     * @return unknown
     */
    public function getUpdatedon ()
    {
        return $this->createdon;
    }

    /**
     * @param unknown $updatedon
     */
    public function setUpdatedon ($updatedon)
    {
        $this->updatedon = $updatedon;
    }

    /**
     * @return unknown
     */
    public function getUpdatedby ()
    {
        return $this->updatedby;
    }

    /**
     * @param unknown $updatedby
     */
    public function setUpdatedby ($updatedby)
    {
        $this->updatedby = $updatedby;
    }

    /**
     * @return unknown
     */
    public function getQualification ()
    {
        return $this->qualification;
    }

    /**
     * @param unknown $qualification
     */
    public function setQualification ($qualification)
    {
        $this->qualification = $qualification;
    }
}
?>
