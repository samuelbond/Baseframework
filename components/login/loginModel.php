<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */

Class login_Model extends componentModel{
    
    public function __construct(){
        parent::__construct();
        $this->setTable("user");
    }
    
    public function findUser($user, $pass){
        if($query = $this->find("email = '$user' AND password = '$pass' ")){
            return $query;
        }
        else{
            return false;
        }
    }
    
    public function NewDatabase($db){
        $this->setNewDatabase($db);
        self::__construct();
    }
}

?>