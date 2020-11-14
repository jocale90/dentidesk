<?php

    //require_once "../Router/Router.php";
    require_once "../Controllers/ValidatorController.php";
    require_once "../Models/Database.php";

?>    

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Vendor/css/style.css">
    <title>DentiDesk</title>
  </head>
    <div class="container">
        
        <div class="row">
            <div class="col">
                <img src="../Vendor/img/logo.png" />
            </div>
            <div class="col text-right">
                <?php echo "<b>Email</b>: ".$_SESSION['email']."\n"."<br>"."<b>Nombre</b>: ".$_SESSION['name'] ?>
            </div>
        </div>

        <div class="row" style="margin-top: 3em;">
            <div class="col-md-6 text-left">
            <?php if( $_SESSION['profile'] == 2 OR $_SESSION['profile'] == 1 )
            echo"
                <form method='get' action='../Router/router.php'>
                    <button type='submit' name='create' class='btn btn-primary'>  Crear Nuevo  </button>
                </from>";
            ?>
            <?php if( $_SESSION['profile'] == 3 )
            echo"
                    <button disable class='btn btn-primary' <a style='color: #ffffff;' href='#' data-toggle='tooltip' title='Solo Admin'>Crear Nuevo</a></button>
                ";
            ?>     
            </div>   
            <div class="col-md-6 text-right">
            <form method="get" action="../Router/router.php">
                <button type="submit" name="close" class="btn btn-alert">Close</button>
            </from>    
            </div>   
        </div>    

 

<div class="row" style="margin-top: 2em;">
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Created BY</th>
                    <th scope="col">Created AT</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
<tbody>

<?php
$sql = "SELECT u.active,u.user_id,u.name,u.email,u.phone,p.profile,u.creator,u.created_at
FROM users as u INNER JOIN profiles as p
ON u.profile_id = p.profile_id
WHERE u.user_id > 0
ORDER BY u.user_id ASC
"; 

$query = $db -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)
{ 
    foreach($results as $result)
    { 
        echo "<tr>
        <td>".$result -> user_id."</td>
        <td>".$result -> name."</td>
        <td>".$result -> email."</td>
        <td>".$result -> phone."</td>
        <td>".$result -> profile."</td>";
        
        if($result->active == 1)
        {
            echo "<td> Activo </td>";
        }
        else
        {
            echo "<td> Inactivo </td>";
        }
        
        echo "<td>".$result->creator."</td>
        
        <td>".$result->created_at."</td>";
        
        if($result->active == 1 && $_SESSION['profile'] == 1)
        {
                echo "<td><form method='post' action='../Router/Router.php'>
                <button type='submit' name='id_des' value='".$result->user_id."' class='btn btn-dark'> Desactivar </button>";
        }
        if($result->active <> 1 && $_SESSION['profile'] == 1)
        {
                echo "<td><form method='post' action='../Router/Router.php'>
                <button type='submit' name='id_act' value='".$result->user_id."' class='btn btn-dark'> Activar </button>";
        }
        if($_SESSION['profile'] <> 1)
        {
            echo "<td>
                    <button type='button' class='btn btn-secondary'><a style='color: #ffffff;' href='#' data-toggle='tooltip' title='Solo Admin'>Locked</a></button>  
                  </td>";
        }
        
        echo "</tr>";
    }
}

?>
</tbody>
</table>

</div>
</div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
    </script>


</body>
</html>