<?php



require_once __SITE_PATH . '/libraries/helpers/' . 'dataHelper.php';
/**
 * User Class component to add, edit, delete and get 
 * user
 * @package component
 * @subpackage user
 * @author Samuel Bond
 * @copyright 2013
 */
Class user extends component{
    /**
     * User First Name
     * @var string
     **/
    private $firstName;
    /**
     * User last Name
     * @var string
     **/
    private $lastName;
     /**
     * User Email
     * @var string
     **/
    private $email;
     /**
     * User Street Address
     * @var string
     **/
    private $street;
     /**
     * User City
     * @var string
     **/
    private $city;
     /**
     * User State
     * @var string
     **/
    private $state;
     /**
     * User post code or zip code
     * @var string
     **/
    private $postCode;
     /**
     * User country
     * @var string
     **/
    private $country;
     /**
     * User phone 
     * @var string
     **/
    private $phone;
     /**
     * User Status
     * @var string
     **/
    private $status;
     /**
     * User Account Type
     * @var string
     **/
    private $accountType;
     /**
     * User Password
     * @var string
     **/
    private $password;
     /**
     * Helper class
     * @var Object
     **/
    protected $helper;
     /**
     * User Model class
     * @var Object
     **/
    protected $userModel;
    
    public function __construct(){
        $this->helper = new dataHelper;
        $this->userModel = new user_Model;
    }
    
    
    public function toString(){
       return 'user';
    }
    
    protected function registerUser(){
    $newUser = array("firstName" => $this->firstName, "lastName" => $this->lastName, "email" => $this->email, 
    "street" => $this->street, "city" => $this->city, "state" => $this->state, "postCode" => $this->postCode,
    "country" => $this->country, "phone" => $this->phone, "status" => $this->status, "password" => $this->password,
    "accountType" => $this->accountType);
    
    if($this->userModel->addUser($newUser)){
        return true;
    }else{
        return false;
    }
       
    }
    
    protected function updateUser($user){
    $newData = array("firstName" => $this->firstName, "lastName" => $this->lastName, "email" => $this->email, 
    "street" => $this->street, "city" => $this->city, "state" => $this->state, "postCode" => $this->postCode,
    "country" => $this->country, "phone" => $this->phone, "status" => $this->status );
    
    if($this->userModel->editUser($newData,$user)){
        return true;
    }
    else{
        return false;
    }
    }
    
    protected function getUser($user){
        if($result = $this->userModel->getUser($user)){
            while($row = $result->fetch_assoc()){
                $this->firstName = $row['firstName'];
                $this->lastName = $row['lastName'];
                $this->email = $row['email'];
                $this->phone = $row['phone'];
                $this->street = $row['street'];
                $this->state = $row['state'];
                $this->status = $row['status'];
                $this->country = $row['country'];
                $this->city = $row['city'];
                $this->postCode = $row['postCode'];
                $this->accountType = $row['accountType'];
            }
        }
    }
    

    
    protected function deleteUser(){
        if($this->userModel->deleteUser($this->email)){
            return true;
        }
        else{
            return false;
        }
    }
    
    
    /**
     * Get FirstName
     * @return string
     **/
    public function getFirstName(){
        return $this->firstName;
    }
    
    /**
     * Set FirstName
     * @return void
     **/
    public function setFirstName($value){
    $this->firstName = $this->helper->sanitize($value);
    }
    
    /**
     * Get LastName
     * @return string
     **/
    public function getLastName(){
        return $this->lastName;
    }
    
    /**
     * Set LastName
     * @return void
     **/
    public function setLastName($value){
    $this->lastName = $this->helper->sanitize($value);
    }
    
    /**
     * Get Email
     * @return string
     **/
    public function getEmail(){
        return $this->email;
    }
    
    /**
     * Set Email
     * @return void
     **/
    public function setEmail($value){
    $this->email = $this->helper->sanitize($value);
    }
    
    
    /**
     * Get Street
     * @return string
     **/
    public function getStreet(){
        return $this->street;
    }
    
    /**
     * Set Street
     * @return void
     **/
    public function setStreet($value){
    $this->street = $this->helper->sanitize($value);
    }
    
    /**
     * Get City
     * @return string
     **/
    public function getCity(){
        return $this->city;
    }
    
    /**
     * Set City
     * @return void
     **/
    public function setCity($value){
    $this->city = $this->helper->sanitize($value);
    }
    
    /**
     * Get State
     * @return string
     **/
    public function getState(){
        return $this->state;
    }
    
    /**
     * Set State
     * @return void
     **/
    public function setState($value){
    $this->state = $this->helper->sanitize($value);
    }
    
    /**
     * Get PostCode
     * @return string
     **/
    public function getPostCode(){
        return $this->postCode;
    }
    
    /**
     * Set PostCode
     * @return void
     **/
    public function setPostCode($value){
    $this->postCode = $this->helper->sanitize($value);
    }
    
    /**
     * Get Country
     * @return string
     **/
    public function getCountry(){
        return $this->country;
    }
    
    /**
     * Set Country
     * @return void
     **/
    public function setCountry($value){
    $this->country = $this->helper->sanitize($value);
    }
    
    /**
     * Get Phone
     * @return string
     **/
    public function getPhone(){
        return $this->phone;
    }
    
    /**
     * Set Phone
     * @return void
     **/
    public function setPhone($value){
    $this->phone = $this->helper->sanitize($value);
    }
    
    /**
     * Get Status
     * @return string
     **/
    public function getStatus(){
        return $this->status;
    }
    
    /**
     * Set Status
     * @return void
     **/
    public function setStatus($value){
    $this->status = $this->helper->sanitize($value);
    }
    
    /**
     * Get Account Type
     * @return string
     **/
    public function getAccountType(){
        return $this->accountType;
    }
    
    /**
     * Set Account type
     * @return void
     **/
    public function setAccountType($value){
    $this->accountType = $this->helper->sanitize($value);
    }
    
    /**
     * Set Password
     * @return void
     **/
    public function setPassword($value){
        $this->password = $this->helper->hashString($value);
    }
    
    public function useAnotherDatabase($db){
        $this->userModel->NewDatabase($db);
    }
    
    
}

?>