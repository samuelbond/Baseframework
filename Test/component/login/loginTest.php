<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */

 /*** define the site path ***/
$site_path = realpath("/wamp/www/mysite/");
define ('__SITE_PATH', $site_path);

//Dependanices
require_once __SITE_PATH."/Test/component/Component_Tests_DatabaseTestCase.php";
require_once __SITE_PATH."/components/component.php";
require_once __SITE_PATH."/components/componentModel.php";
require_once __SITE_PATH."/components/login/login.php";
require_once __SITE_PATH."/components/login/loginModel.php";

class loginTest extends Component_Tests_DatabaseTestCase{
    
    public function testLogin(){
     $login = new login;
     $username = "doe@example.com";
     $password = "samuel";
     $login->setUsername($username);
     $login->setPassword($password);
     $login->setNewDatabase("testdatabase");
     $login->login();
     $this->assertEquals($username, $_SESSION['user_id'], "Failed to login user");    
    }
    
    public function testIsUserLoggedIn(){
     $login = new login;
     $username = "doe@example.com";
     $password = "samuel";
     $login->setUsername($username);
     $login->setPassword($password);
     $login->setNewDatabase("testdatabase");
     $login->login();
     $value = $login->isUserLoggedIn();
     $this->assertTrue($value, "Failed to check if user is logged in");   
    }
    
    public function testLogout(){
     $login = new login;
     $username = "doe@example.com";
     $password = "samuel";
     $login->setUsername($username);
     $login->setPassword($password);
     $login->setNewDatabase("testdatabase");
     $login->login();
     $login->logout();
     $value = $login->isUserLoggedIn();   
     $this->assertFalse($value, "Failed to logout user"); 
    }
    
    public function testToString(){
        $login = new login;
        $value = "login";
        $this->assertEquals($value, $login->toString());
    }    
    
    public function getDataSet(){
        return $this->createXMLDataSet('../test-data/xmlUserTestData.xml');
    }

}
?>