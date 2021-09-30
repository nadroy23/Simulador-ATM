<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="https://img.icons8.com/color/96/000000/show-password.png">
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
    <title>Recordar Contraseña</title>
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
    <div class="container-xl">
        <br>
        <br>
        <hr>
        <table>
            <thead>
                <tr>
                    <td style="width: 380px;"></td>
                    <td style="width: 380px;">
                        <div class=" col text-center">
                            <h3>Recuperar Contraseña</h3><br>
                        </div>
                    </td>
                    <td style="width: 380px;"></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sm-6">
                        <img src="https://cdn.pixabay.com/photo/2017/05/01/06/19/key-hole-2274790_960_720.png"
                            width="80%" class="img-fluid rounded aligncenter" alt="">
                    </td>
                    <td class="col-sm-6">
                        <div>
                            <form action="recupera.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Por favor digite su ID *</label>
                                    <input type="number" class="form-control" name="ID" placeholder="Id" required>
                                </div>
                                <div class="mb-3">
                                    <label lass="form-label">Por favor digite su Usuario *</label>
                                    <input type="text" name="USER" class="form-control" placeholder="Usuario" required>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a class="btn btn-secondary" href="index.php" role="button">Cerrar</a>
                                    <button type="submit" name="recupera" class="btn btn-primary">Recuperar
                                        Contraseña</button>
                                </div>
                            </form>
                        </div>
                        <br>
                        <div>
                            <?php
                            include("conexion.php");
                            if (isset($_POST["recupera"])) {
                                $id = mysqli_real_escape_string($conexion, $_POST['ID']);
                                $user = mysqli_real_escape_string($conexion, $_POST['USER']);

                                $resul = $conexion->query("SELECT * FROM usuario WHERE (id = '$id' and username = '$user')");
                                $dato = $resul->fetch_assoc();
                                #echo $dato;
                                if ($dato > 0) {

                                    #$dato['id'] == $id and $dato['username'] == $user
                                    #echo $dato['username'] . " --- " . $user;
                            ?>
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    <h4>Su Contraseña es: "<?php echo utf8_decode($dato['passw']); ?>", No la OLVIDE...
                                    </h4>
                                </div>
                            </div>
                            <?php
                                } else {
                                ?>
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Warning:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    <h4>"El Usuario NO Existe!!!"</h4>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
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