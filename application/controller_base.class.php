<?php

Abstract Class baseController {

/*
 * @registry object
 */
 
/**
 *@access protected 
 * 
**/ 
protected $registry;
/**
 *@access protected 
 *@var contains mysqli connection handle 
**/
protected $mysqli;

function __construct($registry) {
	$this->registry = $registry;
     /*** auto load classes ***/
        $this->load();
    

  
}

/**
 * @all controllers must contain an index method
 */
abstract function index();
 
 
public function load(){
@spl_autoload_register(function ($class_name) {
    @list($class_name, $other) = @explode("_", $class_name);
    $class_name = strtolower($class_name);
   $filename = $class_name.$other. '.php';
    $file = __SITE_PATH . '/components/' .$class_name.'/'. $filename;
   
    
    try{
    if (file_exists($file) == false)
    {
      throw new Exception("class ".$class_name." not found, Crt404");
    }
    include ($file);
    }
    catch(Exception $ex){
    echo 'Caught Exception :: '.$ex->getMessage();
    }  
    

  
  
}); 
}



    

}

?>
