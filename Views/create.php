<?php

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
        </div>
        <div class="row" style="margin-top: 2em;">
            <div class="col">

<form method='POST' action='../Router/Router.php'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nombre</label>
      <input type="text" name="name" required="required" class="form-control" placeholder="nombre">
    </div>
    <div class="form-group col-md-6">
      <label>Correo</label>
      <input type="email" required="required" name="email" class="form-control"  placeholder="email">
    </div>
    <div class="form-group col-md-6">
      <label>Telefono</label>
      <input type="text" name="phone" required="required" class="form-control" id="name" placeholder="telefono">
    </div>
    <div class="form-group col-md-6">
      <label>password</label>
      <input type="password" name="password" required="required" class="form-control" id="name" placeholder="password">
    </div>
    <div class="form-group col-md-6">
      <label>Perfil</label>
        <select name="profile_id" class="form-control">
                <?php
                  $sql = "SELECT * FROM profiles"; 
                  $query = $db -> prepare($sql); 
                  $query -> execute(); 
                  $results = $query -> fetchAll(PDO::FETCH_OBJ); 

                  if($query -> rowCount() > 0)
                  { 
                      foreach($results as $result)
                      { 
                          echo "<option value=".$result->profile_id.">".$result->profile."</option>";
                      }
                  }
                ?>
        </select>        
    </div>
  </div>
  <button type="submit" name="register" class="btn btn-primary">Registrar</button>
</form>
<br>
<div class="row">
  <div class="col">
    <button type="button" class="btn btn-primary"><a href="http://localhost/dentidesk/Views/main.php" style="color: #ffffff;">  Regresar </a> </button>
  </div>
</div>
            </div>
        </div>




   </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>