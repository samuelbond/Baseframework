<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */

require_once __SITE_PATH . '/libraries/helpers/' . 'dataHelper.php';

Class login extends component{
    private $username;
    private $password;
    protected $helper;
    protected $loginModel;
    private $newDatabase = null;
    
    public function __construct(){
        $this->helper = new dataHelper;
        $this->loginModel = new login_Model;
        @session_start();
    }
    
    public function toString(){
        return "login";
    }
    
    protected function isUser(){
        if($result = $this->loginModel->findUser($this->username,$this->password)){
            if($result->num_rows > 0){
                return true;
            }
        }
        return false;
    }
    
    protected function startSession(){
        $_SESSION['user_id'] = $this->username;
    }
    
    public function isUserLoggedIn(){
    if(isset($_SESSION['user_id'])){
        if($_SESSION['user_id'] === null){
            return false;
        }
        else{
        return true;
        }
    }
    return false;    
    }
    
    public function login(){
        if($this->newDatabase != null){
        $this->useAnotherDatabase();
        }
        if($this->isUser()){
            $this->startSession();
            return true;
        }
        return false;
    }
    
    public function logout(){
        if($this->isUserLoggedIn()){
            $_SESSION['user_id'] = null;
            unset($_SESSION['user_id']);
        }
    }
    
     /**
     * Set Username
     * @return void
     **/
    public function setUsername($value){
        $this->username = $this->helper->sanitize($value);
    }
    
    /**
     * Get Username
     * @return string
     **/
    public function getUsername(){
        return $this->username;
    }
    
    /**
     * Set Password
     * @return void
     **/
    public function setPassword($value){
        $this->password = $this->helper->hashString($value);
    }
    
    public function useAnotherDatabase(){
        $this->loginModel->NewDatabase($this->newDatabase);
    }
    
    public function setNewDatabase($db){
        $this->newDatabase = $db;
    }
}

?>