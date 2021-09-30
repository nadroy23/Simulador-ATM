<?php
include("conexion.php");
if (isset($_POST["registrar"])) {
    $ID = mysqli_real_escape_string($conexion, $_POST['ID']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['Nombre']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['User']);
    $password = mysqli_real_escape_string($conexion, $_POST['Passw']);
    #$password_encriptada = sha1($password);
    $sqluser = "SELECT id FROM usuario WHERE ( id='$ID' or username ='$usuario')";
    $resultadouser = $conexion->query($sqluser);
    $filas = $resultadouser->num_rows;
    if ($filas > 0) {
        #echo $filas;
?>
<div class="alert alert-warning d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div>
        <h4>"El usuario ya existe"</h4>
        <a class="btn btn-secondary" href="index.php" role="button">Cerrar</a>
        <a class="btn btn-primary" href="registrar.php" role="button">Reintentar</a>
    </div>
</div>
<?php
        /*
        echo "<script>
        alert('El usuario ya existe')
        window.location = 'registrar.php'
        </script>";*/
    } else {
        #(id,nombre,usermane,passw,saldo)
        $saldo = 0;
        $sqlusuario = "INSERT INTO usuario VALUES ('$ID','$nombre','$usuario','$password','$saldo')";
        $resultadousuario = $conexion->query($sqlusuario);
        if ($resultadousuario > 0) {
        ?>
<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill" />
    </svg>
    <div>
        <h4>"Registro Exitoso"</h4>
        <a class="btn btn-secondary" href="registrar.php" role="button">Cerrar</a>
        <a class="btn btn-primary" href="index.php" role="button">Aceptar</a>
    </div>
</div>
<?php
            /*
            echo "<script>
            alert('Registro Exitoso')
            window.location = 'index.php'
            </script>";*/
        } else {
        ?>
<div class="alert alert-warning d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div>
        <h4>"Se produjo un ERROR inesperado..."</h4>
        <a class="btn btn-secondary" href="index.php" role="button">Cerrar</a>
        <a class="btn btn-primary" href="registrar.php" role="button">Reintentar</a>
    </div>
</div>
<?php
            /*
            echo "<script>
            alert('Error al registrar')
            window.location = 'registrar.php'
            </script>";*/
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" href="https://img.icons8.com/clouds/100/000000/user.png">
    <style typy="text/css">
    #centro {
        position: absolute;
        width: 20%;
        height: 50%;

        left: 40%;
    }
    </style>
    </style>
    <title>Registrarse</title>
</head>

<body style="background:#59D2F7">
    <br>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <div class="container">
        <div class="col-sm-12">
            <div class="modal-content-center text-center">
                <div class="col-12 ">
                    <img src="../img/sesion.png" alt="HTML5 Icon" width="128" height="128">
                </div>
            </div>
        </div>
        <div id="centro">
            <h3 class="text-center">Registrarse</h3>

            <form action="registrar.php" method="POST">
                <div class="mb-1">
                    <label class="form-label">ID *</label>
                    <input type="text" name="ID" placeholder="Ingrese su ID" class="form-control" required>
                </div>
                <div class="mb-1">
                    <label class="form-label">Nombre *</label>
                    <input type="text" name="Nombre" placeholder="Ingrese su nombre" class="form-control" required>
                </div>
                <div class="mb-1">
                    <label class="form-label">Username *</label>
                    <input type="text" name="User" placeholder="Ingrese un usuario" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password *</label>
                    <input type="password" name="Passw" placeholder="Ingrese una password" class="form-control"
                        required>
                </div>

                <div class="col-12 text-center">
                    <a class="btn btn-secondary" href="index.php" role="button">Cerrar</a>
                    <button type="submit" name="registrar" class="btn btn-primary">Registrarse</button>
                </div>
            </form>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>