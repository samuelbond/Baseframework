<?php
/**
 * @author Samuel Bond
 * @copyright 2013
 **/
 
 /*
 *---------------------------------------------------------- 
 * CONTROLLER HELPER
 *----------------------------------------------------------
 * 
 * This helper class provides extra features for contoller  
 * classes.
 * 
 */
require_once __SITE_PATH . '/libraries/helpers/' . 'helper.php';
class dataHelper extends helper{
    public $mysqli;
    
    public function __construct(){
        parent::__construct();
        $this->mysqli = $this->getConn();
    }
   
public function __toString(){
    return "dataHelper::".parent::__toString();
}

public function sanitize($value){
    $newValue = $this->mysqli->real_escape_string($value);
        return $newValue;
}   


public function hashString($value,$sha512=true,$sha1=false,$sha256=false){
    if($sha512){
        return hash("sha512", $value);
    }
    elseif($sha1){
        return hash("sha1", $value);
    }
    elseif($sha256){
        return hash("sha256", $value);
    }
}






}

?>