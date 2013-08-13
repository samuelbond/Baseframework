<?php

 /*** include the controller class ***/
 include __SITE_PATH . '/application/' . 'controller_base.class.php';

 /*** include the registry class ***/
 include __SITE_PATH . '/application/' . 'registry.class.php';

 /*** include the router class ***/
 include __SITE_PATH . '/application/' . 'router.class.php';

 /*** include the template class ***/
 include __SITE_PATH . '/application/' . 'template.class.php';
  /*** include the component class ***/
 include __SITE_PATH . '/components/' . 'component.php';
 /*** include the component class ***/
 include __SITE_PATH . '/components/' . 'componentModel.php';
 
  /*** include the component class ***/
 include __SITE_PATH . '/libraries/helpers/' . 'helper.php';
   /*** include the component class ***/
 include __SITE_PATH . '/components/' . 'componentManager.php';


 /*** auto load model classes ***/
spl_autoload_register(function ($class_name) {
   $filename = strtolower($class_name) . '.class.php';
    $file = __SITE_PATH . '/model/' . $filename;

    if (file_exists($file) == false)
    {
        return false;
    }
  include ($file);
});

 /*** a new registry object ***/
 $registry = new registry;


?>
