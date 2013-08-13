<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */

require_once __COMPONENT_PATH."/componentManager.php";
require_once __COMPONENT_PATH."/user/user.php";
require_once __COMPONENT_PATH."/user/userModel.php";
require_once __COMPONENT_PATH."/user/userAccountManager.php";

Class user_ComponentManager implements componentManager{
    
    private $component;
    private $requestedComponent;
    
    public function __toString(){
        return "user_AccountManager";
    }
    
    public function __construct($component){
     $this->requestedComponent = $component;     
    }
    
    public function loadComponent(){
        $account = new user_AccountManager;
        $this->component = $account;
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