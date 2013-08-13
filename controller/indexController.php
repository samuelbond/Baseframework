<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */

class indexController extends baseController{
    
    public function index(){
        $login = new login;
        $man = new user_ComponentManager('class');
        echo $man->__toString();
        $acct = new user_AccountManager;
        
        $acct->loginUser("sam", "pass");
        @session_start();
        echo hash("sha512", "samuel")."<br />";
        $_SESSION['user'] = "sam";
        echo $_SESSION['user'];
        $_SESSION['user'] = "null";
      if(isset($_SESSION['user'])){
        echo "session is set but it's null";
      }
        unset($_SESSION['user']);
        
        $test = new user;
        $test->toString();
        echo "<br />";
        $text = "User_Model";
        list($folder, $other) = explode("_", $text);
        $folder = strtolower($folder);
        echo "Folder Name is ".$folder." and filename is ".$folder.$other."<br />";
        $array = array("one", "five");
        $arry = array("key" => "value", "anotherKey" => "anotherValue");
        echo count($array);
        echo count($arry);
        echo "Yes am Alive";
        $this->registry->template->show("index");
//        $data = array("fname" => "sam", "lname" => "bond");
//        $this->model->find("fname = 'sam' AND lname = 'bond' ORDER BY fname",null,"users");
//        echo "<br />";
//        $this->model->save($data,"users");
//        echo "<br />";
//        $this->model->update($data,"id = '24f5hy'","users");
           
    }
}

?>