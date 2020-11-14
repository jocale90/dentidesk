<?php  

 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "pass2020";  
 $database = "dentidesk";  
 
 require_once "../Controllers/UserController.php";


 try  
 {  
      $db = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      if(isset($_POST["login"]))  
      {  

           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {   
               $call = new UserController();
               $call->erromessage(1);
           }  
           else  
           {  
                $query = "SELECT name,email,password,profile_id,active FROM users WHERE email = :email AND password = :password";  
                $statement = $db->prepare($query);  
                $statement->execute( array('email' => $_POST["email"], 'password' => $_POST["password"] ) );
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                    
                    foreach ($statement as $row)
                    {
                         $_SESSION["name"] = $row["name"];  
                         $_SESSION["profile"] = $row["profile_id"]; 
                         $_SESSION["email"] = $row["email"];  

                         if($row["active"] == 2)
                         {
                              session_destroy(); 
                              $call = new UserController();
                              $call->erromessage(3);
                         }
                         else
                         {
                              header("location:../Views/main.php"); 
                         } 
                    }
                     
                }  
                else  
                {  
                    $call = new UserController();
                    $call->erromessage(2); 
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      echo $message = $error->getMessage();  
 }  


?>  