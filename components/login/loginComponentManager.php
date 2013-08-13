<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */

require_once __COMPONENT_PATH."/componentManager.php";
require_once __COMPONENT_PATH."/login/login.php";
require_once __COMPONENT_PATH."/login/loginModel.php";

Class login_ComponentManager implements componentManager{
    
    private $component;
    private $requestedComponent;
    
    public function __construct($component){
    $this->requestedComponent = $component;    
    }
    
    public function __toString(){
        return "login";
    }
    
    public function loadComponent(){
    $login = new login;
    $this->component = $login;    
    }
    
     public function getComponent(){
        return $this->component;
    }
    
    public function loadRequestedComponent(){
     $class = $this->requestedComponent."_ComponentManager";
     $comMan = new $class("class");
     $comMan->loadComponent();
     $this->component = $comMan->getComponent();   
    }

}

?>