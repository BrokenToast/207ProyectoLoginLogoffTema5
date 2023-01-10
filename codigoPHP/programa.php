<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
        exit();
    }
    if(isset($_REQUEST['salir'])){
        session_destroy();
        header("Location: ./login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../webroot/style/reset.css">
    <link rel="stylesheet" href="../webroot/style/base.css">
    <link rel="stylesheet" href="../webroot/style/programa.css">
    <title>LoginLogoff</title>
</head>
<body>
    <header>
        <h1>LoginLogoff</h1>
    </header>
    <section>
    <?php 
        switch ($_COOKIE['idioma']) {
            case 'es':
                ?> <h3>Bienvenido <?php print $_SESSION['usuario']['CodUsuario']?></h3> <?php
                break;
            case 'pt':
                ?> <h3>Bem-vindo <?php print $_SESSION['usuario']['CodUsuario']?></h3> <?php
                break;
            case 'ct':
                ?> <h3>Benvingut <?php print $_SESSION['usuario']['CodUsuario']?></h3> <?php
                break;
            case 'gl':
                ?> <h3>Benvido <?php print $_SESSION['usuario']['CodUsuario']?></h3> <?php
                break;
        }
    ?>
            <a href="./detalles.php">Detalles</a>
            <a href="./mtoDepartamento.php">Mantenimiento Departamento</a>
            <a href="./editarPerfil.php">Editar Perfil</a>
            <form method="./programa.php" method="post">
                <input type="submit" name="salir" value="Salir">
            </form>
            <div>
                <p>
                <?php
                    if($_SESSION['usuario']['NumConexiones']==1){
                        print('Es tu primera conexion');
                    }else{
                        printf('Se a conectado %d <br>',$_SESSION['usuario']['NumConexiones']);
                        $oFechaHoraUltimaConexion = new DateTime();
                        $oFechaHoraUltimaConexion->setTimestamp($_SESSION['usuario']['FechaHoraUltimaConexion']);
                        printf('La ultima conexion fue en %s',$oFechaHoraUltimaConexion->format('d-m-Y H:i:s'));
                    }
                ?>
                </p>
            </div>
    </section>
    <footer>
        <p>Luis Pérez Astorga® 2022-2023</p>
        <a href="../../../index.html"><img src="../doc/logo_tostada.png" alt="Toast"></a>
        <a href="https://github.com/BrokenToast/207ProyectoLoginLogoffTema5" target="_blank"><img src="../doc/git.png" alt="github"></a>
    </footer>
</body>
</html>