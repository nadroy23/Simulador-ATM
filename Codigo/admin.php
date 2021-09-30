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
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="https://img.icons8.com/external-itim2101-lineal-color-itim2101/64/000000/external-admin-network-technology-itim2101-lineal-color-itim2101-1.png">

    <title>Cajero</title>
</head>

<body style="background:#59D2F7">

    <br>
    <div class="container-xl">
        <ul class="nav nav-tabs justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="enviar.php">Enviar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="recargar.php">Recargar</a>
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
            <h3>Bienvenido, <?php echo utf8_decode($row['username']); ?> </h3>
            <br>
            <br>
            <br>
            <div>
                <table>
                    <thead>
                        <tr>
                            <td style="width: 570px;"></td>
                            <td style="width: 570px;">
                                <div class=" col text-center">
                                    <h3>Información de Cuenta Bancaria</h3><br>
                                </div>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <td style="width: 570px;">
                            <img src="https://cdn.pixabay.com/photo/2018/05/01/22/46/bank-3367208_960_720.jpg" width="80%" class="img-fluid rounded aligncenter" alt="">
                        </td>
                        <td style="width: 570px;">
                            <table class="table table-success">
                                <thead>
                                    <tr>
                                        <th scope="col">Titular</th>
                                        <th scope="col">Descripción </th>
                                        <th scope="col">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <th scope="row"><?php echo utf8_decode($row['nombre']); ?></th>
                                    <td>Esta cuenta no es REAL <br>
                                        es una simulación</td>
                                    <td><?php echo utf8_decode($row['saldo']); ?></td>
                                </tbody>
                            </table>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
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