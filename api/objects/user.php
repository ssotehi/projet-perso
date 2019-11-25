<?php

class User {

	// database connection and table name
    private $connection;
    private $table_name = "users";

    // object properties
    public $id;
    public $name;
    public $login;
    public $password;
    public $company_id;
    public $company_name;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db) {
        $this->connection = $db;
    }

  // read users
  function read() {
 
      // select all query
      $query = "SELECT
                c.name as company_name, u.id, u.name, u.login, u.password, u.company_id, u.created
            FROM
                " . $this->table_name . " u
                LEFT JOIN
                    companies c
                        ON u.company_id = c.id
            ORDER BY
                u.created DESC";
 
      // prepare query statement
      $stmt = $this->connection->prepare($query);
 
      // execute query
      $stmt->execute();
 
      return $stmt;
  }

  // create user
  function create() {
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, login=:login, password=:password, company_id=:company_id, created=:created";
 
    // prepare query
    $stmt = $this->connection->prepare($query);

    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->login=htmlspecialchars(strip_tags($this->login));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->company_id=htmlspecialchars(strip_tags($this->company_id));
    $this->created=htmlspecialchars(strip_tags($this->created));

    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":login", $this->login);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":company_id", $this->company_id);
    $stmt->bindParam(":created", $this->created);

    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
  }


  // update the product
  function update() {
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                login = :login,
                password = :password,
                company_id = :company_id
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->connection->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->login=htmlspecialchars(strip_tags($this->login));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->company_id=htmlspecialchars(strip_tags($this->company_id));
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind new values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':login', $this->login);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':company_id', $this->company_id);
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
  }
  
  // delete the user
  function delete() {
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
    // prepare query
    $stmt = $this->connection->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
   }

   // used when filling up the update product form
   function readOne() {
 
    // query to read single record
    $query = "SELECT
                c.name as company_name, u.id, u.name, u.login, u.password, u.company_id, u.created
            FROM
                " . $this->table_name . " u
                LEFT JOIN
                    companies c
                        ON u.company_id = c.id
            WHERE
                u.id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->connection->prepare( $query );
 
    // bind id of user to be updated
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->name = $row['name'];
    $this->login = $row['login'];
    $this->password = $row['password'];
    $this->company_id = $row['company_id'];
    $this->company_name = $row['company_name'];
    $this->created = $row['created'];
  }
}

?>