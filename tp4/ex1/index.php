<?php
require("./functions.php");


// MYSQLI procedural
function mysqli_proc()
{
  $server="localhost";
  $dbname="SMIS6-2023";
  $username="root";
  $password="root";
  $tablename="Etudiants_SMI6";



  $conn=mysqli_connect($server,$username,$password,$dbname);

if(!$conn){
  die("Failed To Connect To Server");
}

// $query="INSERT INTO  $tablename (firstname,lastname,email) values('bouarour','ayoub','bouarourayoub0@gmail.com')";
// mysqli_insert_query($query,$conn);

// $query="INSERT INTO  $tablename (firstname,lastname,email) values('boukdiri','hamza','hamzabo@gmail.com')";
// mysqli_insert_query($query,$conn);

// $query="INSERT INTO  $tablename (firstname,lastname,email) values('ramdani','nourdinne','nourddineRAM@outlook.com')";
// mysqli_insert_query($query,$conn);

// $query="INSERT INTO  $tablename (firstname,lastname,email) values('test0','test0','test0@outlook.com');";
// $query.="INSERT INTO  $tablename (firstname,lastname,email) values('test1','test1','test1@outlook.com');";
// $query.="INSERT INTO  $tablename (firstname,lastname,email) values('test2','test2','test2@outlook.com');";
// $query.="INSERT INTO  $tablename (firstname,lastname,email) values('test3','test3','test3@outlook.com');";
// mysqli_insert_multi_query($query,$conn);

// $query="SELECT * FROM  $tablename;";
// mysqli_select_query($query,$conn);

// $email="test0@outlook.com";
// $query = "DELETE FROM $tablename WHERE email='$email'";
// mysqli_delete_query($query,$conn);
mysqli_close($conn);
}

function mysqli_oop(){
  $server="localhost";
  $dbname="SMIS6-2023";
  $username="root";
  $password="root";
  $tablename="Etudiants_SMI6";

  $conn= new mysqli($server,$username,$password,$dbname);
  if($conn->connect_error){
    die("Error connecting to sql server");
  }


  /* ** SINGLE INSERTION */
// $query="INSERT INTO  $tablename (firstname,lastname,email) values('bouarour-POO','ayoub-POO','bouarourayoubPOO0@gmail.com')";
// mysqli_obj_insert_query($query,$conn);

// $query="INSERT INTO  $tablename (firstname,lastname,email) values('boukdiri-POO','hamza-POO','hamzabPOOo@gmail.com')";
// mysqli_obj_insert_query($query,$conn);


/* ** MULTIPLE INSERTION */
// $query="INSERT INTO  $tablename (firstname,lastname,email) values('test0TEST-POO','test0-POO','test0POO@outlook.com');";
// $query.="INSERT INTO  $tablename (firstname,lastmname,email) values('testTEST1POO','test1-POO','testPOO1@outlook.com');";
// $query.="INSERT INTO  $tablename (firstname,lastname,email) values('testTEST2POO','test2-POO','testPOO2@outlook.com');";
// $query.="INSERT INTO  $tablename (firstname,lastname,email) values('testTEST3POO','test3-POO','testPOO3@outlook.com');";
// mysqli_obj_multi_insert_query($query,$conn);

/* ** DATA SELECTION */
// $query="SELECT * FROM  $tablename;";
// mysqli_obj_select_query($query,$conn);

/* ** DATA DELETION */
// $email="test0@outlook.com";
// $query = "DELETE FROM $tablename WHERE email='$email'";
// mysqli_delete_query($query,$conn);

$conn->close();
}

function PDOconnect(){
  $server="localhost";
  $dbname="SMIS6-2023";
  $username="root";
  $password="root";
  $tablename="Etudiants_SMI6";

  try{
    $pdo=new PDO('mysql:host='.$server.';dbname='.$dbname,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
    echo "connected";
    
  }catch(PDOException $e){
    echo "Error: ".$e->getMessage();
    exit;
  }
// $stmt=$pdo->prepare("INSERT INTO  $tablename (firstname,lastname,email) values(:firstname,:lastname,:email)");

// $firstname="hi";
// $lastname="hiho";
// $email="hi@hi.hi";

// $stmt->bindParam(":firstname",$firstname);
// $stmt->bindParam(":lastname",$lastname);
// $stmt->bindParam(":email",$email);

// $firstname="hi2";
// $lastname="hiho2";
// $email="hi@hi.hi2";

// if($stmt->execute()) echo "<br>success";
// else echo "<br>failed";

// $stmt=$pdo->prepare("SELECT * FROM $tablename;");
// if($stmt->execute()) {
//   $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
//   if($stmt->rowCount() > 0){
//     echo "<table border=1 cellspacing=none> ";
//       echo "<tr> 
//                 <td>ID</td>
//                 <td>FIRST NAME</td>
//                 <td>LAST NAME</td>
//                 <td>EMAIL</td>
//                 <td>REGISTRATION DATE</td>
//             </tr>";
//       foreach($results as $row){
//         echo "<tr>
//                 <td>".$row['id']."</td>
//                 <td>".$row['firstname']."</td>
//                 <td>".$row['lastname']."</td>
//                 <td>".$row['email']."</td>
//                 <td>".$row['reg_date']."</td>
//               </tr>";
//       }
//       echo "</table>";
//   }

// }


}



// mysqli_proc();
// mysqli_oop();
PDOconnect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

</body>
</html>