<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>inicio de sesion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <div class="container">
            <h2 class="text-center">Pruebas inicio de sesión.</h2>
            <hr>
            <form action="" method="post">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="user" class="col-form-label">Usuario</label>
                        <input type="text" name="user" id="user" class="form-control" required>
                    </div>
                    <div class="col-auto">
                        <label for="pass" class="col-form-label">Contraseña</label>
                        <input type="password" name="pass" id="pass" class="form-control" required>
                    </div>
                    <div class="col-auto">
                        <label for="iniciar" class="col-form-label"></label><br>
                        <button type="submit" class="btn btn-success" id="iniciar"><i class="bi bi-hand-thumbs-up"></i> INICIAR</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<?php

    // $user = array();
    // $pass = array();

    // $user[0] = "jheison";
    // $user[1] = "ximena";
    // $user[2] = "carlos";

    // $pass[0] = "jhei54321";
    // $pass[1] = "x301250";
    // $pass[2] = "carl23";

    // for($i=0; $i <= 2; $i++){
    //     echo "I:  ".$i."<br>";
    //     echo "user ".$user[$i]."<br>";
    //     echo "pass ".$pass[$i]."<br>";
    // }
    session_start();
    if(isset($_POST["user"]) && isset($_POST["pass"])){
        include_once ("./usuario.php");
        $users = new usuario($_POST["user"], $_POST["pass"]);
        
        if($users->iniciar_sesion() == 1){
            $_SESSION["status"] = true;
            $_SESSION["nombre"] = $users->getUser();
            header("Location: ./home.php");
        }else{
            echo '
                <script>
                    Swal.fire({
                        title: "Proyecto Sena",
                        text: "Error al iniciar sesion",
                        icon: "error"
                    });
                </script>

            ';
        }
    }
    
?>
