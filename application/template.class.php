<?php

Class Template {

/*
 * @the registry
 * @access private
 */
private $registry;

/*
 * @Variables array
 * @access private
 */
private $vars = array();

/**
 *
 * @constructor
 *
 * @access public
 *
 * @return void
 *
 */
function __construct($registry) {
	$this->registry = $registry;

}


 /**
 *
 * @set undefined vars
 *
 * @param string $index
 *
 * @param mixed $value
 *
 * @return void
 *
 */
 public function __set($index, $value)
 {
        $this->vars[$index] = $value;
 }


function show($name, $bit = false) {
	$path = __SITE_PATH . '/views' . '/' . $name . '.php';
    $headPath = __SITE_PATH . '/views/header.php';
    $footPath = __SITE_PATH . '/views/footer.php';
    $adminHead = __SITE_PATH . '/views/admin/header.php';
    $adminFoot = __SITE_PATH . '/views/admin/footer.php';;
	try
    {
    if (file_exists($path) == false)
	{
		throw new Exception('Template Page not found, Please Contact the Web Administrator ');
		return false;
	}

	// Load variables
	foreach ($this->vars as $key => $value)
	{
		$$key = $value;
	}
    
  //if(!$bit) include ($headPath);
  //else include ($adminHead);
	include ($path); 
  //if(!$bit) include ($footPath);
  //else include ($adminFoot);              
    }
    catch(Exception $e)
    {
        
        include ($error_path);
         echo '
         <h1 style="font-size:17pt; color:#333; margin-left:220px;">Caught exception: ', 
         $e->getMessage(), '</h1><p></p><i style="color:red;">*Please check your information and try again, 
         if you still get this page, please contact the Administrator with the error code @ADMIN EMAIL </i>';
         
    }
}


}

?>
