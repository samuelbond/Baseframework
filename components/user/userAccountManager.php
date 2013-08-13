<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */
require_once __COMPONENT_PATH."/user/userComponentManager.php";
require_once __COMPONENT_PATH."/login/loginComponentManager.php";
Class user_AccountManager extends user{
    
    private $newDatabase = null;
    
    public function __construct(){
        parent::__construct();
        $login = new login;
    }
    
    public function loginUser($username, $password){
    $comMang = new user_ComponentManager("login");
    $comMang->loadRequestedComponent();
    $LoginComponent = $comMang->getComponent();
    $LoginComponent->setUsername($username);
    $LoginComponent->setPassword($password);
    if($LoginComponent->login()){
        return true;
    }
    else{
        return false;
    }
    }
    
    public function logoutUser(){
    $comMang = new user_ComponentManager("login");
    $comMang->loadRequestedComponent();
    $LoginComponent = $comMang->getComponent();
    $LoginComponent->logout();    
    }
    
    public function checkIfUserIsLoggedIn(){
    $comMang = new user_ComponentManager("login");
    $comMang->loadRequestedComponent();
    $LoginComponent = $comMang->getComponent();
    if($LoginComponent->isUserLoggedIn()){
        return true;
    }    
    else{
        return false;
    }
    }
    
    
    
    public function newUser($fname, $lname, $email, $pass, $street,$city, $post, $state, $country, $phone,$accoutType){
        $this->setFirstName($fname);
        $this->setLastName($lname);
        $this->setPassword($pass);
        $this->setEmail($email);
        $this->setStreet($street);
        $this->setState($state);
        $this->setCity($city);
        $this->setPostCode($post);
        $this->setCountry($country);
        $this->setPhone($phone);
        $this->setStatus(0);
        $this->setAccountType($accoutType);
        
        if($this->newDatabase != null){
            $this->changeDb();
        }
        
        if($this->registerUser()){
            return true;
        }
        else{
            return false;
        }
    }
    
    
    public function getUserDetails($userEmail){
         if($this->newDatabase != null){
            $this->changeDb();
        }
        $this->getUser($userEmail);
    }
    
    public function updateUserProfile($fname, $lname, $email, $street,$city, $post, $state, $country, $phone, $userEmail){
        $this->setFirstName($fname);
        $this->setLastName($lname);
        $this->setEmail($email);
        $this->setStreet($street);
        $this->setState($state);
        $this->setCity($city);
        $this->setPostCode($post);
        $this->setCountry($country);
        $this->setPhone($phone);
        
         if($this->newDatabase != null){
            $this->changeDb();
        }
        
        if($this->updateUser($userEmail)){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function deleteUserAccount($user){
        $this->setEmail($user);
        if($this->newDatabase != null){
            $this->changeDb();
        }
        if($this->deleteUser()){
            return true;
        }
        else{
            return false;
        }
        
    }
    
    public function changeDb(){
        $this->useAnotherDatabase($this->newDatabase);
    }
    
    public function setNewDatabase($db){
        $this->newDatabase = $db;
    }

}

?>