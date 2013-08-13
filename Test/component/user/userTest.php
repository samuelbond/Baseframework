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
require_once __SITE_PATH."/components/user/user.php";
require_once __SITE_PATH."/components/user/userModel.php";
require_once __SITE_PATH."/components/user/userAccountManager.php";
class userTest extends Component_Tests_DatabaseTestCase{
    
    public function testAccountManagerNewUser(){
        $user = new user_AccountManager;
        $user->setNewDatabase("testdatabase");
        $fname = "John";
        $lname = "Smith";
        $city = "Budapest";
        $street = "Lajos utca 14";
        $state = "Hajdu-bihar";
        $post = "1807";
        $phone = "+3652444444";
        $email = "john@email.com";
        $country = "Hungary";
        $acctType = "A";
        $pass = "samuel";
        
        $value = 2;
        
        if(!$user->newUser($fname, $lname, $email, $pass, $street, $city, $post, $state, $country, $phone,$acctType)){
            $value = -1;
        }
        $this->assertEquals($value, $this->getConnection()->getRowCount('user'),"Registration of new user failed");
    }
    
    
    public function testAccountManagerUpdateUserProfile(){
        $user = new user_AccountManager;
        $user->setNewDatabase("testdatabase");
        $fname = "John";
        $lname = "Doe";
        $city = "Budapest";
        $street = "Hatvan utca 6";
        $state = "Hajdubihar";
        $post = "11087";
        $phone = "+3652555444";
        $email = "doejohn@example.com";
        $country = "Hungary";
        $oldEmail = "doe@example.com";
        $isFalse = false;
        if(!$user->updateUserProfile($fname,$lname,$email,$street,$city,$post,$state,$country,$phone,$oldEmail)){
            $isFalse = true;
        }
        
         $queryTable = $this->getConnection()->createQueryTable("user", "SELECT email, firstName, 
                                                                lastName, street, city, state, postCode,
                                                                phone, country FROM user WHERE email = '$email' ");
                                                                
        if($isFalse == false) 
        $expectedTable = $this->createXMLDataSet('../test-data/expectedUserTestData.xml')->getTable("user");
        else $expectedTable = "Failed";
        
         $this->assertTablesEqual($expectedTable, $queryTable);
        
    }
    
    public function testAccountManagerGetUserDetails(){
        $user = new user_AccountManager;
        $user->setNewDatabase("testdatabase");
        $fname = "John";
        $lname = "Doe";
        $city = "Budapest";
        $street = "Hatvan utca 6";
        $state = "Hajdubihar";
        $post = "11087";
        $phone = "+3652555555";
        $email = "doe@example.com";
        $country = "Hungary";
        $expectedUserDetail = array($email, $fname, $lname, $city, $street, $state, $post, $phone, $country);    
        $user->getUserDetails($email);
        
        $userDetail = array($user->getEmail(), $user->getFirstName(), $user->getLastName(), $user->getCity(), 
                            $user->getStreet(), $user->getState(), $user->getPostCode(), $user->getPhone(), 
                            $user->getCountry());
        
        $this->assertEquals($expectedUserDetail, $userDetail,"Failed to get user details");
        
    }
    
    public function testAccountManagerDeleteUserAccount(){
        $user = new user_AccountManager;
        $user->setNewDatabase("testdatabase");
        $email = "doe@example.com";
        
        $value = 0;
        
        if(!$user->deleteUserAccount($email)){
            $value = "failed";
        }
        
    $this->assertEquals($value, $this->getConnection()->getRowCount('user'),"Failed to delete user account");
    }
    
    public function createReport(){
        
    }
    
    public function getDataSet(){
        return $this->createXMLDataSet('../test-data/xmlUserTestData.xml');
    }
    
    
}

?>