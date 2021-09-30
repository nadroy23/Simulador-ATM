<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
}
$iduser = $_SESSION['id_user'];
$sql = "SELECT * FROM usuario WHERE id='$iduser'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

if (isset($_POST["recargar"])) {
    $saldo = mysqli_real_escape_string($conexion, $_POST['valor']);
    $password = mysqli_real_escape_string($conexion, $_POST['pass']);
    #$password_encriptada = sha1($password);
    if ($saldo < 10000 or $saldo > 5000000) {
?>
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                <h4>"El valor Minimo es de $10.000 El valor Maximo es de $5'000.000 "</h4>
                <a class="btn btn-secondary" href="admin.php" role="button">Cerrar</a>
                <a class="btn btn-primary" href="recargar.php" role="button">Reintentar</a>
            </div>
        </div>

    <?php
        /*
        echo "<script>
        alert('El valor Minimo es de $10000 El valor Maximo es de $5000000 ')
        window.location = 'recargar.php'
        </script>";*/
    } elseif ($row['passw'] <> $password) {
    ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                <h4>"Contraseña Incorrecta!!!!"</h4>
                <a class="btn btn-secondary" href="admin.php" role="button">Cerrar</a>
                <a class="btn btn-primary" href="recargar.php" role="button">Reintentar</a>
            </div>
        </div>
        <?php
        /*
        echo "<script>
                    alert('Contraseña Incorrecta!!!')
                    window.location = 'recargar.php'
                    </script>";
                    */
    } else {
        $saldo += $row['saldo'];
        $sal[] = $row['saldo'];
        $conexion->query("UPDATE usuario SET saldo='$saldo' WHERE (id = '$iduser' and passw = '$password')");

        $resultado = $conexion->query("SELECT * FROM usuario WHERE id='$iduser'");
        $dato = $resultado->fetch_assoc();
        if ($dato['saldo'] <> $sal[0]) {
            #echo $dato['saldo'] . " --- " . $sal[0] . " --- " . $resul1;
        ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    <h4>"La Recarga fue Exitosa!"</h4>
                    <a class="btn btn-secondary" href="recargar.php" role="button">Cerrar</a>
                    <a class="btn btn-primary" href="admin.php" role="button">Aceptar</a>
                </div>
            </div>
        <?php
        } else {
            #echo $dato['saldo'] . " --- " . $sal[0] . " --- " . $resul1;
        ?>
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    <h4>"Se produjo un ERROR inesperado..."</h4>
                    <a class="btn btn-secondary" href="admin.php" role="button">Cerrar</a>
                    <a class="btn btn-primary" href="recargar.php" role="button">Reintentar</a>
                </div>
            </div>
<?php
        }
    }
}
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="https://img.icons8.com/color/48/000000/request-money.png">
    <style typy="text/css">
        #centro {
            position: absolute;
            width: 50%;
            height: 50%;
            left: 25%;
        }

        #cont-centro {
            position: absolute;
            width: 80%;
            height: 80%;
            left: 10%;
        }
    </style>
    <title>Recargar</title>
</head>

<body style="background:#59D2F7">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <br>
    <div class="container-xl">
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="enviar.php">Enviar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="recargar.php">Recargar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="retirar.php">Retirar</a>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Salir</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Salir</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="col-form-label">¿Seguro desea Salir?</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <a class="btn btn-primary" href="salir.php">Salir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Online</a>
            </li>
        </ul>

        <div>
            <!--id="cont-centro" -->
            <h3>Usuario, <?php echo utf8_decode($row['username']); ?> </h3>
            <br>
        </div>
        <table>
            <thead>
                <tr>
                    <td style="width: 380px;"></td>
                    <td style="width: 380px;">
                        <div class=" col text-center">
                            <h3>Sistema de Recarga</h3><br>
                        </div>
                    </td>
                    <td style="width: 380px;"></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sm-6">
                        <img src="https://cdn.pixabay.com/photo/2013/07/13/12/03/banknotes-159085_960_720.png" width="80%" class="img-fluid rounded aligncenter" alt="">
                    </td>
                    <td class="col-sm-6">
                        <div>
                            <form action="recargar.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">¿Cuanto desea Recargar? *</label>
                                    <input type="number" class="form-control" name="valor" placeholder="Ejemplo: 10000" required>
                                </div>
                                <div class="mb-3">
                                    <label lass="form-label">Por favor digite su Password *</label>
                                    <input type="password" name="pass" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" name="recargar" class="btn btn-primary">Recargar</button>
                                </div>
                            </form>
                        </div>
                    </td>
                    <!--<<td style="width: 380px;"></td>-->
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>