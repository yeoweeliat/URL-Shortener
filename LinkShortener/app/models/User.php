<?php

class User{
    
    private $username;
    private $password;
    private $gender;
    private $email;
    
    
    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

}