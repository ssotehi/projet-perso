<?php
  
include_once('database.php');

function getAll(){
   
// DATABASE connection
global $db;
$db = getConnection();

// prepare query 
$query = $db->prepare(selectUsers());        // SQL query, list users    
$query->execute(array());                    // execute query

echo "<h1>List of all users.</h1>".
     "<table><tr><th>Id</th><th>Pseudo</th><th>Email</th><th>Password</th></tr>";
while($data = $query->fetch()){
   echo "<tr>
          <td>".$data['id']."</td>
          <td>".$data['pseudo']."</td>
          <td>".$data['email']."</td>
          <td>".$data['password']."</td>
          </tr>";
}
   echo "</table>";
}


getAll();
?>
