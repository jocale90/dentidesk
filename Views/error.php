<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Vendor/css/style.css">
    <title>DentiDesk</title>
  </head>
  <div class="container" style="padding-top: 8em;">
  

  <div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
      <img src="../Vendor/img/logo.png" />
    </div>

    <?php
    
        $num = $_GET['num']; 
        switch ($num)
        {
            case '1':
                $message = "Debe introducir todos los datos del usuario";
            break;
            case '2':
                $message = "Datos incorrectos, intente de nuevo";
            break;
            case '3':
                $message = "El usuario esta inhabilitado, solicite activacion al administrador";
            break;
            default:
                $message = "Ha ocurrido un error solicite ayuda al administrador";
            break;
        }
        
    ?>


    <div class="row text-center">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col">
            <button type="button" class="btn btn-primary">
                <a href="http://localhost/dentidesk/index.php" style="color: #ffffff;">  Regresar </a>
            </button>
        </div>
    </div>

    

    <div id="formFooter">
      
    </div>

  </div>
</div>

   </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

