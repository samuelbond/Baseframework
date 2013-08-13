<?php

/**
 * @author Samuel Bond
 * @copyright 2013
 */

require_once 'databaseUtil.php';
/**
 * Abstract Class for model class, model class should
 * implement the methods specified
 * @package Model
 * @version 1.5v
 */
Abstract Class db
{
    /**
     * Database Handle
     * @var Object
     */
    private $mysqlCon; 
    
    /**
     * Default Constructor
     * @return void
     */
    public function __construct(){
        
        
        $this->mysqlCon = databaseUtil::getInstance();
    }
    
    /**
     * Returns database connection handle
     * @return Mysqli Object
     */
    public function getMysqlCon(){
        return $this->mysqlCon;
    }
    
    /**
     * Change default database to new database 
     * @param string database name
     * @return void
     */
    public function setDataBase($db){
       $this->mysqlCon = databaseUtil::useNewDatabase($db); 
    }
    
    /**
    *  Inserts data into the default database table 
    *  if no table is specificed, else inserts data
    *  into specified table
    *  @param Array, Column name(s) and value(s)
    *  @param String, Table name
    *  @return boolean true; if successful 
    */
    Abstract public function save($data, $tableName = null);
    
    /**
     *  Finds tuples that match the query condition specified 
     *  and returns the result set.
     *  @param  String, Query condition
     *  @param  Array, Column name(s)
     *  @param  String, Table Name
     *  @return Object, result set
     *  @return boolean false, if an exception occurs
    **/
   Abstract public function find($condition, $data = null, $tableName = null);
   
   /**
     *  Runs an sql query, and returns a result set if the query was 
     *  a retrieval else it returns null if it was an insert, delete 
     *  or update.
     *  @param SQL Query, String
     *  @return result set, if select: Object
     *  @return null, if insert, delete or update
     *  @return boolean false, if an exception occurs
    **/
   Abstract public function runQuery($query);
   
   
   /**
     * Update tuple(s) where update condition
     * is true.
     * @param Array, colum(s) to update with values
     * @param String, Update condition
     * @param String, Table Name
     * @return boolean, true if update was done 
     * or false if update failed
    **/
    Abstract public function update($data, $condition, $tableName = null);

}

?>
