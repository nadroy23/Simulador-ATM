<?php
include("conexion.php");
session_start();
if (isset($_SESSION['id_user'])) {
    header("Location: admin.php");
}
//Login
if (!empty($_POST)) {
    $usuario = mysqli_real_escape_string($conexion, $_POST["user"]);
    $password = mysqli_real_escape_string($conexion, $_POST["passw"]);
    #$password_encriptada = sha1($password);
    $sql = "SELECT id FROM usuario WHERE username = '$usuario' AND passw = '$password'";
    $resultado = $conexion->query($sql);
    $rows = $resultado->num_rows;
    if ($rows > 0) {
        $row = $resultado->fetch_assoc();
        $_SESSION['id_user'] = $row["id"];
        header("Location: admin.php");
    } else {
?>
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div>
        <h4>"Usuario o Password Incorrecto"</h4>
        <a class="btn btn-primary" href="index.php" role="button">Reintentar</a>
    </div>
</div>
<?php
        /*
        echo "<script>
		alert('Usuario o Password Incorrecto');
		window.location = 'index.php';
		</script>";*/
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
    <link rel="icon" href="https://img.icons8.com/fluency/48/000000/atm.png">
    <style typy="text/css">
    #centro {
        position: absolute;
        width: 20%;
        height: 50%;
        left: 40%;
    }
    </style>


    <title>CajeroAutomatico</title>
</head>

<body style="background:#59D2F7">
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
                <br>
                <br>
                <br>
                <div class="col-12 ">
                    <img src="../img/sesion.png" alt="HTML5 Icon" width="128" height="128">
                </div>
            </div>
        </div>
        <div id="centro">
            <h3 class="text-center">Iniciar sesión!</h3>

            <form action="index.php" method="post">
                <div class="form-group">
                    <label>Usuario</label>
                    <br>
                    <input type="text" class="form-control" placeholder="ingrese su nombre" name="user" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" placeholder="ingrese su contraseña" name="passw"
                        required>
                </div>
                <div class="col-12 text-center">
                    <br>
                    <a href="../Codigo/recupera.php">Recordar contrasena?</a>
                </div>
                <div class="col-12 text-center">
                    <br>
                    <a class="btn btn-secondary" href="registrar.php" role="button">Registrarse</a>
                    <button type="submit" name="ingresar" class="btn btn-primary">Ingresar</button>
                </div>

                <!-- <h1 class="animate__animated animate__backInLeft">Sistema de login</h1>
                <p>Usuario <input type="text" placeholder="ingrese su nombre" name="usuario"></p>
                <p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="contraseña"></p>
                <input type="submit" value="Ingresar"> -->
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