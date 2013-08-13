<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */

Abstract class component{
    
    public function __construct(){
      $this->load();       

    }
    
    Abstract public function toString();
    
    
    public function load(){
    /*** auto load model classes ***/
    spl_autoload_register(function ($class_name) {
     list($folder, $other) = explode("_", $class_name);
     $folder = strtolower($folder);
   $filename = $folder.$other. '.php';
    $file = __SITE_PATH . '/components/' .$folder.'/'. $filename;
    try{
    if (file_exists($file) == false)
    {
       throw new Exception("class not found, Comp404");
       return false;
    }
    include ($file);
    }catch(Exception $ex){
    echo 'Caught Exception :: '.$ex->getMessage();
    }
  
});    
    }
    
}

?>