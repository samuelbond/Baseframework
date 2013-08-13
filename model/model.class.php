<?php

require_once  __SITE_PATH . '/model/' . 'db.class.php';
/**
 * Model Class for sub-model classes
 * 
 * Model class that provides CRUD access
 * to all applications model.
 * @package Model
 * @author Samuel Bond
 * @version 1.0
 * @access public
 * @copyright 2013
 */
class model extends db{
    /**
     * Default Database Table
     * 
     * @var string Table Name
     */
    private $table = "search";
    /**
     * Database Connection Handle
     * 
     * @var Object Mysqli
     */
    private $conn;
    /**
     * Database Connection Handle
     * 
     * @var Object Mysqli
     */
    private $mysqli;
    
    /**
     * Default Constructor
     * 
     * @return void
     */
    public function __construct(){
        parent::__construct();
        $this->mysqli = $this->getMysqlCon();
    }
    
/**
 *  Inserts data into the default database table 
 *  if no table is specificed, else inserts data
 *  into specified table
 * 
 *  @param Array, Column name(s) and value(s)
 *  @param String, Table name
 *  @return boolean true; if successful 
**/
    public function save($data, $tableName = null){
     //Intialization
     ////////////////////////////
     $data_size = sizeof($data);
     $counter = 0;
     $DML_Stmt = "";
     $colums = "";
     $values = "";
     ////////////////////////////
     //Definations 
     ///////////////////////////
     foreach ($data as $key => $value){
        $colums .= $key.((($counter+1) == $data_size) ? "" : ", ");
        $values .= "'".$value."'".((($counter+1) == $data_size) ? "" : ", ");
        $counter++;
     }
    $DML_Stmt = "INSERT INTO ".(($tableName === null) ? $this->table : $tableName)." (".$colums.") values (".$values.")";
    ////////////////////////////
    //Query
    if($query = $this->mysqli->query($DML_Stmt)){
        return true;
    }

    
    return false;    
    }

/**
 *  Finds tuples that match the query condition specified 
 *  and returns the result set.
 * 
 *  @param  String, Query condition
 *  @param  Array, Column name(s)
 *  @param  String, Table Name
 *  @return Object, result set
 *  @return boolean false, if an exception occurs
**/

   public function find($condition, $data = null, $tableName = null){
     //Intialization
     ////////////////////////////
     @$data_size = sizeof($data);
     $counter = 0;
     $DML_Stmt = "";
     $colums = "";
     ////////////////////////////
     //Definations 
     ///////////////////////////
     if($data != null)
     foreach ($data as $value){
        $colums .= $value.((($counter+1) == $data_size) ? "" : ", ");
        $counter++;
     }
     
    $DML_Stmt = "SELECT ".(($data === null) ? "*" : $colums) ." FROM ".(($tableName === null) ? $this->table : $tableName)
    ." WHERE ".$condition;
    ////////////////////////////
    //Query

    if($query = $this->mysqli->query($DML_Stmt)){
        $this->mysqli->store_result();
        return $query;
    }
    
    return false;    
    }
    
/**
 *  Runs an sql query, and returns a result set if the query was 
 *  a retrieval else it returns null if it was an insert, delete 
 *  or update.
 * 
 *  @param SQL Query, String
 *  @return result set, if select: Object
 *  @return null, if insert, delete or update
 *  @return boolean false, if an exception occurs
**/
    
    public function runQuery($query){
        if ( $action = $this->mysqli->query($query) ){
            
            $this->mysqli->store_result();
            if(@$action->num_rows > 0){
                return $action;
            }
            if($this->mysqli->affected_rows > 0){
                return null;
            }
            
            
        }
        return false;
    }
    
    
/**
 * Update tuple(s) where update condition is true.
 * 
 * @param Array, colum(s) to update with values
 * @param String, Update condition
 * @param String, Table Name
 * @return boolean, true if update was done or false if update failed
**/
    
    
    public function update($data, $condition, $tableName = null){
        //Intialization
     ////////////////////////////
     $data_size = sizeof($data);
     $counter = 0;
     $DML_Stmt = "";
     $colums = "";
     ////////////////////////////
     //Definations 
     ///////////////////////////
     foreach ($data as $key => $value){
        $colums .= $key." = '".$value."'".((($counter+1) == $data_size) ? "" : ", ");
        $counter++;
     }
    $DML_Stmt = "UPDATE ".(($tableName === null) ? $this->table : $tableName)." SET ".$colums." WHERE ".$condition;
    ////////////////////////////
    //Query

    if($query = $this->mysqli->query($DML_Stmt)){
        return true;
    }
    
    return false;    
    }
    
    /**
     * Set Database Table
     * 
     * @param String Table Name
     * @return void
     */
    public function setTable($value){
        $this->table = $value;
    }

    /**
     * Get Mysqli Object
     * 
     * @return Mysqli Object
     */
    public function getConn(){
        return $this->mysqli;
    }
    
    
    /**
     * Sets new Database
     * 
     * @param string Database Name
     * @return void
     */
    public function setNewDatabase($database){
        parent::setDataBase($database);
        $this->mysqli = $this->getMysqlCon();
    }
}


?>