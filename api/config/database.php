<?php 
  
class DataBase {
    
    # database credentials
    private $host      = "localhost";
    private $db_name   = "api_db";
    private $username  = "ssotehi";
    private $password  = "ssotehi";
    public  $connection;

    # get database connection
    public function getConnection() {

        $this->connection = null;
        
        try {

           $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username,$this->password);	
           $this->connection->exec("set names utf8");
        }
        catch (PDOException $exception) {      
           echo "Connection error: " . $exception->getMessage(); 
        }
        
    return $this->connection;
    }
 }

?>