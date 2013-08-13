<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */
require_once __SITE_PATH . '/model/model.class.php';
Class helper{
    public $conn;
    
    public function __construct(){
        $model = new model;
        $model->__construct();
        $this->conn = $model->getConn();
    }
    
    public function __toString(){
        return "helper class@bond";
    }
    
    public function getConn(){
        return $this->conn;
    }
    
}


?>