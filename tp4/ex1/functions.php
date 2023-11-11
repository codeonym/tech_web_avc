<?php

/* *** MYSQLI */ 
  // INSERT SINGLE QUERY
  function mysqli_insert_query($query,$conn){
    if(mysqli_query($conn,$query)){
      echo "<br>Data Inserted Successfully<br>";
    }else {
      echo "<br>Something Went Wrong<br>";
    }
  }

  // INSERT MULTIPLE QUERIES
  function mysqli_insert_multi_query($query,$conn){
    if(mysqli_multi_query($conn,$query)){
      echo "<br>Data Inserted Successfully<br>";
    }else {
      echo "<br>Something Went Wrong<br>";
    }
  }

  // DATA SELECTION
  function mysqli_select_query($query,$conn){
    try {

    
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
      echo "<table border=1> cellspacing=none";
      echo "<tr> 
                <td>ID</td>
                <td>FIRST NAME</td>
                <td>LAST NAME</td>
                <td>EMAIL</td>
                <td>REGISTRATION DATE</td>
            </tr>";
      while($row=mysqli_fetch_array($result)){
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['firstname']."</td>
                <td>".$row['lastname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['reg_date']."</td>
              </tr>";
      }
      echo "</table>";
    }else {
      echo "result : 0 <br>";
    }
    
  }catch(Exception $e){
    echo "result :".$e->getMessage();
  }
  }

  // DATA DELETION
  function mysqli_delete_query($query,$conn){
    if(mysqli_query($conn,$query)){
      $effectedrows=mysqli_affected_rows($conn);
      if($effectedrows > 0 ){
        echo "affected rows: ".$effectedrows."<bR>";
      }else {
        echo "No Rows Where Effected <br>";
            }
    }

  }

  /* *** END MYSQLI */ 
/* *** MYSQLI (OBJ) */ 
  // INSERT SINGLE QUERY
  function mysqli_obj_insert_query($query,$conn){
    if($conn->query($query)){
      echo "<br>Data Inserted Successfully<br>";
    }else {
      echo "<br>Something Went Wrong<br>";
    }
  }
  // INSERT MULTIPLE QUERY
  function mysqli_obj_multi_insert_query($query,$conn){
    if($conn->multi_query($query)){
      echo "<br>Data Inserted Successfully<br>";
    }else {
      echo "<br>Something Went Wrong<br>";
    }
  }
  // DATA SELECTION
  function mysqli_obj_select_query($query,$conn){
    try {

    
    $result=$conn->query($query);
    if($result->num_rows>0){
      echo "<table border=1 cellspacing=none>";
      echo "<tr> 
                <td>ID</td>
                <td>FIRST NAME</td>
                <td>LAST NAME</td>
                <td>EMAIL</td>
                <td>REGISTRATION DATE</td>
            </tr>";
      while($row=$result->fetch_assoc()){
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['firstname']."</td>
                <td>".$row['lastname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['reg_date']."</td>
              </tr>";
      }
      echo "</table>";
    }else {
      echo "result : 0 <br>";
    }
    
  }catch(Exception $e){
    echo "result :".$e->getMessage();
  }
  }
  // DATA DELETION
function mysqli_obj_delete_query($query,$conn){
    if($conn->query($query)){
      $effectedrows=$conn->affected_rows;
      if($effectedrows > 0 ){
        echo "affected rows: ".$effectedrows."<bR>";
      }else {
        echo "No Rows Where Effected <br>";
            }
    }

  }


    /* *** END MYSQLI (OBJ) */ 
/* *** PDO */
?>