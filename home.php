<?php
    session_start();
    if($_SESSION["status"] == false){
        header("Location: ./index.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROYECTO SENA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>

   <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="./"><img src="https://tramiteinformativo.com/wp-content/uploads/2022/08/logo-sena-verde-png-sin-fondo.png" alt="" width="10%"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="leer.php">Leer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="crear.php">Crear</a>
            </li>
          </ul>
          
          <a href="./salir.php"><button class="btn btn-outline-success" type="submit">Salir</button></a>
          
        </div>
      </div>
   </nav>



    <div class="container">
      <h1>bienvenido, <?php echo $_SESSION["nombre"]."." ?></h1>
        <br>
        <br>
        <?php
          $cod = null;
          $nom = null;
          $can = null;
          $prc = null; 
          if(isset($_GET["cod"])){
            $cod = $_GET["cod"];
            $nom = $_GET["nom"];
            $can = $_GET["can"];
            $prc = $_GET["prc"];
          }
        
        ?>
        <form action="" method="post">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="user" class="col-form-label">Codigo</label>
                    <input type="number" name="cod" id="cod" class="form-control" value="<?php echo $cod; ?>" required>
                </div>
                <div class="col-auto">
                    <label for="user" class="col-form-label">Nombre</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom; ?>" required>
                </div>
                <div class="col-auto">
                    <label for="user" class="col-form-label">Cantidad</label>
                    <input type="number" name="can" id="can" class="form-control" value="<?php echo $can; ?>" required>
                </div>
                <div class="col-auto">
                    <label for="user" class="col-form-label">Precio</label>
                    <input type="number" name="prc" id="prc" class="form-control" value="<?php echo $prc; ?>" required>
                </div>

                <div class="col-auto">
                    <label for="crear" class="col-form-label"></label><br>
                    <button type="submit" class="btn btn-success" name="crear" id="crear"><i class="bi bi-plus-circle"></i> CREAR </button>
                </div>

                <div class="col-auto">
                    <label for="actualizar" class="col-form-label"></label><br>
                    <button type="submit" class="btn btn-success" name="actualizar" id="actualizar"><i class="bi bi-plus-circle"></i> ACTUALIZAR</button>
                </div>
                
            </div>
      </form>
      <br>

       <?php
          
          include_once "./conexion.php";

          if(isset($_POST["crear"])){
            $sql = "INSERT INTO producto (codigo, nombre, cantidad, precio) VALUES ('".$_POST["cod"]."', '".$_POST["nom"]."', '".$_POST["can"]."', '".$_POST["prc"]."')";
            $conn->query($sql);
        }

          $sql = "SELECT * FROM producto ";
          $res = $conn->query($sql);

          echo '
          <table class="table table-striped">
            <tr>
              <th>codigo</th>
              <th>nombre</th>
              <th>cantidad</th>
              <th>precio</th>
              <th>Tareas</th>
            </tr>
          ';

          while($row = $res->fetch_array()){
            echo '
              <tr>
                <td>'.$row[0].'  </td>
                <td>'.$row[1].'  </td>
                <td>'.$row[2].' KG </td>
                <td>$'.$row[3].'  </td>
                <td><a href="home.php?cod='.$row[0].'&nom='.$row[1].'&can='.$row[2].'&prc='.$row[3].'">Actualizar</a> | <a href="home.php">Eliminar</a> </td>
              </tr>
            ';
          }
          echo '</table>';

       ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>