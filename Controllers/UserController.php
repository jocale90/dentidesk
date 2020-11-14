<?php



class UserController 
{

    public static function createUser($name,$email,$phone,$password,$profile_id,$creator,$created_at)
    {
        include_once "../Models/Database.php";
        $sql="insert into users(name,email,phone,password,profile_id,creator,created_at)
                 values (:name,:email,:phone,:password,:profile_id,:creator,:created_at)";
        $sql = $db->prepare($sql);
        
        $sql->bindParam(':name',$name,PDO::PARAM_STR, 25);
        $sql->bindParam(':email',$email,PDO::PARAM_STR, 25);
        $sql->bindParam(':phone',$phone,PDO::PARAM_STR,25);
        $sql->bindParam(':password',$password,PDO::PARAM_STR,25);
        $sql->bindParam(':profile_id',$profile_id,PDO::PARAM_STR, 25);
        $sql->bindParam(':creator',$creator,PDO::PARAM_STR, 25);
        $sql->bindParam(':created_at',$created_at,PDO::PARAM_STR);
        $sql->execute();
        
        $lastInsertId = $db->lastInsertId();
        if($lastInsertId>0)
        {
            header("location:../Views/main.php");  
        }
        else
        {
            echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador </div>";
            print_r($sql->errorInfo()); 
        }
    }

    public static function closeSession()
    {
        session_start();  
        session_destroy();  
        $host  = $_SERVER['HTTP_HOST'];
        $root = "index.php";
        return header("Location: http://$host/dentidesk/$root");
    }

    public static function desactivar($id)
    {
        include_once "../Models/Database.php";
        $db->query("update users set active = 2 where user_id=$id");  
        return header("Location: ../Views/main.php");
    }
    public static function activar($id)
    {
        include_once "../Models/Database.php";
        $db->query("update users set active = 1 where user_id=$id");  
        return header("Location: ../Views/main.php");
    }
    public static function erromessage($num)
    {
        return header("Location: ../Views/error.php?num=$num");
    }
    
}

?>