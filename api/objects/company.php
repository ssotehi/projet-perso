<?php
  
class Company {    // company object
   
    // database connection and table name
    private $connection;
    private $table_name = "companies";
    
    // object properties
    public $id;
    public $name;
    public $created;
    
    // constructor
    public function __construct($db) {
        $this->connection = $db;
    }

    // used by select drop-down list
    public function readAll() {
        
        // select all data
        $query = "SELECT
                    id, name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";
 
        $stmt = $this->connection->prepare( $query );
        $stmt->execute();

        return  $stmt;
    }

    // used by select drop-down list
    public function read() {
 
        // select all data
        $query = "SELECT
                id, name
            FROM
                " . $this->table_name . "
            ORDER BY
                name";
 
        $stmt = $this->connection->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
}

?>