<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'project';
  $con = mysqli_connect($host , $user , $pass , $db);
//     $dsn = "mysql:host=$host;dbname=$db;user=$user;pass=$pass";


//     try{
//         $dbConn = new PDO($dsn , $user , $pass);
//         $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        // echo "Connection succecssful";
//         $sql = "SELECT * FROM users";
//         $users = $dbConn->query($sql);
//         foreach($users AS $user){
//         //      echo "<li>".$user["name"]."</li>";
//         }
      

//     }catch(PDOExecption $error){
//         echo $error->getCode();
//     }

?>
