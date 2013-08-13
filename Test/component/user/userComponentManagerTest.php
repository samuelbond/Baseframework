<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */

 /*** define the site path ***/
$site_path = realpath("/wamp/www/mysite/");
define ('__SITE_PATH', $site_path);

require_once __SITE_PATH."/components/componentManager.php";
require_once __COMPONENT_PATH."/component.php";
require_once __COMPONENT_PATH."/componentModel.php";
require_once __COMPONENT_PATH."/user/user.php";
require_once __COMPONENT_PATH."/user/userModel.php";
require_once __COMPONENT_PATH."/user/userAccountManager.php";

class userComponentManagerTest extends PHPUnit_Framework_TestCase{
    
    public function testLoadComponent(){
        $manager = new user_ComponentManager('string');
        $expectedComponent = $manager->__toString();
        $manager->loadComponent();
        $componentObject = $manager->getComponent();
        $this->assertInstanceOf($expectedComponent, $componentObject, "failed to load component manager");
        
    }
    
    public function testGetComponent(){
    $manager = new user_ComponentManager('string');
    $expectedComponent = $manager->__toString();
    $this->assertNull($manager->getComponent());
    $manager->loadComponent();
    $componentObject = $manager->getComponent();
    $this->assertInstanceOf($expectedComponent, $componentObject, "failed to get component");
    }
    
    public function testLoadRequestedComponent(){
    $expectedComponent = "login";
    $manager = new user_ComponentManager($expectedComponent);
    $manager->loadRequestedComponent();
    $componentObject = $manager->getComponent();
    $this->assertInstanceOf($expectedComponent, $componentObject, "failed to load requested component");   
    }
}

?>