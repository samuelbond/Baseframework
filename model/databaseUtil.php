<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */


class databaseUtil
{

/** Declare instance **/
private static $instance = NULL;

/** MYSQL CONNECTION VARIABLES **/
    
    /** @Host Name eg: 'localhost' **/
    const hosts = 'localhost';
    
    /** @Host Username **/
    const user = 'root';
    
    /** @Host Password if required **/
    const password = '';
    
    /** @Database Name **/
    const db = 'mydb';
    
    /** Mysqli Connection Handle **/
    private $mysqli;
/**
*
* the constructor is set to private so
* so nobody can create a new instance using new
*
*/
public function __construct() {
}

/**
*
* Return DB instance or create intitial connection
*
* @return object (MYSQLI)
*
* @access public
*
* */
  
    
public static function getInstance(){
if(!self::$instance){
    self::$instance = new mysqli(self::hosts,self::user, self::password, self::db); 
       
    if(self::$instance->connect_errno){
        self::$instance = new mysqli("127.0.0.1",self::user, self::password, $this->db);
        if(self::$instance->connect_errno){
            exit(1);
        }
    }
    self::$instance->set_charset("utf8");
}  

return self::$instance;
}
    
/**
*
* Like the constructor, we make __clone private
* so nobody can clone the instance
*
* */
public function __clone(){
} 

public static function useNewDatabase($value){
    if(self::$instance){
        self::$instance->close();
    }
    
    self::$instance = new mysqli(self::hosts, self::user, self::password, $value);
    self::$instance->set_charset("utf8");
    return self::$instance;
}

}
?>
