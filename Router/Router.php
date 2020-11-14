<?php
//RUTAS METODOS DE LA CLASE USERCONTROLLER
require_once "../Controllers/ValidatorController.php";
require_once "../Controllers/UserController.php";


/*-------------------------------------------
---------- RUTAS DE TIPO POST----------------
-------------------------------------------*/

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['register']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $profile_id=$_POST['profile_id'];
        $creator=$_SESSION["name"];
        date_default_timezone_set('America/Santiago');
        $created_at = date('Y-m-d');
        $call = new  UserController();
        $call ->createUser($name,$email,$phone,$password,$profile_id,$creator,$created_at);
    }
}

/*-------------------------------------------
---------- RUTAS DE TIPO GET----------------
-------------------------------------------*/

if($_SERVER['REQUEST_METHOD'] == "GET")
{

    if(isset($_GET['create']))
    {
        header("location: ../Views/create.php");  
    }

    if(isset($_GET['close']))
    {
        $call = new  UserController();
        $call ->closeSession();
    }

    if(isset($_GET['id_act']))
    {
        $id = $_GET['id_act']; 
        $call = new  UserController();
        $call ->activar($id);       
    }

    if(isset($_GET['id_des']))
    {
        $id = $_GET['id_des'];
        $call = new  UserController();
        $call ->desactivar($id);

    }
}

?>