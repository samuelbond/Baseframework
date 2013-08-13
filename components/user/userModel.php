<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */


Class user_Model extends componentModel{
    
    public function __construct(){
      $this->setTable("user");
      parent::__construct();  
    }
    
    public function addUser($data){
        if($this->save($data)){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function getUser($userEmail){
        if($query = $this->find("email = '$userEmail'")){
            return $query;
        }
        else
        return false;
    }
    
    public function editUser($data, $userEmail){
    if($this->update($data, "email = '$userEmail'")){
        return true;
    }
    else
    return false;    
    }
    
    public function deleteUser($userEmail){
    if($this->runQuery("DELETE FROM user WHERE email = '$userEmail'") === null){
      return true;  
    }
    else
    return false;    
    }
    
    public function getAllUsers(){
        if($query = $this->runQuery("SELECT * FROM user")){
            return $query;
        }
        else
        return false;
    }
    
    public function NewDatabase($db){
        $this->setNewDatabase($db);
        self::__construct();
    }
    
    
    
    
}


 ?>