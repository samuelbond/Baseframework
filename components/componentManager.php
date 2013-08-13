<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */
 /*** define the component path ***/
$site_path = __SITE_PATH."/components";
define ('__COMPONENT_PATH', $site_path);


Interface componentManager{
    
    public function __construct($component);
    
    public function loadComponent();
    
    public function getComponent();
    
    
} 

?>