<?php 
require '../config/confConexion.php';
session_start();
if(!isset($_SESSION['usuarioDBLoginLogOffTema5'])){
    header("Location: ../index.php");
    exit();
}
if(isset($_REQUEST['salir'])){
    session_destroy();
    unset($_COOKIE);
    header("Location: ../../../index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../webroot/style/reset.css">
    <link rel="stylesheet" href="../webroot/style/programa.css">
    <title>LoginLogoff</title>
</head>
<body>
    <header>
        <h1>LoginLogoff</h1>
    </header>
    <section>
            <h3>Bienvenido <?php print $_SESSION['usuarioDBLoginLogOffTema5']?></h3>
            <a href="./detalles.php">Detalles</a>
            <form method="./programa.php" method="post">
                <input type="submit" name="salir" value="Salir">
            </form>
            <div>
                <?php
                    if($_SESSION['numConexionDBLoginLogOffTema5']==1){
                        print('Es tu primera conexion');
                    }else{
                        printf('Se a conectado %d <br>',$_SESSION['numConexionDBLoginLogOffTema5']);
                        $fechaConexion=new DateTime(timezone:new DateTimeZone("Europe/Madrid"));
                        $fechaConexion->setTimestamp($_SESSION['fechaUltimaConexionDBLoginLogOffTema5']);
                        printf('La ultima conexion fue en %s',$fechaConexion->format('d-m-Y h:m:s'));
                    }
                ?>
            </div>
    </section>
    <footer>
        <p>Luis Pérez Astorga® 2022-2023</p>
        <a href="../../../index.html"><img src="../doc/logo_tostada.png" alt="Toast"></a>
        <a href="https://github.com/BrokenToast/207ProyectoLoginLogoffTema5" target="_blank"><img src="../doc/git.png" alt="github" height="25" width="25"></a>
    </footer>
</body>
</html>