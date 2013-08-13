<?php

/**
 * @author [bond]
 * @copyright 2012
 */

$file = __SITE_PATH.'/libraries/database.php';
include($file);
class databaseClass extends Database_Library
{
    /** MYSQL CONNECTION VARIABLES **/
    
    /** @Host Name eg: 'localhost' **/
    private $host = 'localhost';
    
    /** @Host Username **/
    private $user = 'root';
    
    /** @Host Password if required **/
    private $password = '';
    
    /** @Database Name **/
    private $db = 'moihj';
    
    private $connection;
    
    private $selectdb;
    
    public function connect()
    {
        try
        {
        
        $this->connection = mysql_connect($this->host, $this->user, $this->password);
        $this->selectdb = mysql_select_db($this->db);
        }
        catch (exception $e)
        {
            return $e;
        }
    }
    
    public function disconnect()
    {
        return $hello;
    }
    
    public function prepare($query)
    {
        
    }
    
    public function fetch($type = 'object')
    {}
    
}
?>