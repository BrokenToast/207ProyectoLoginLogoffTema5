<?php 
require '../config/confConexion.php';
session_start();
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
                    try {
                        $odbDepartamentos=new PDO(HOSTPDO,USER,PASSWORD);
                        $oQuery=$odbDepartamentos->prepare('select NumConexiones, FechaHoraUltimaConexion from T02_Usuario where CodUsuario=?');
                        $oQuery->bindParam(1,$_SESSION['usuarioDBLoginLogOffTema5']);
                        $oQuery->execute();
                        $resultado=$oQuery->fetchObject();
                        if($resultado->NumConexiones==1){
                            print('Es tu primera conexion');
                        }else{
                            printf('Se a conectado %d <br>',$resultado->NumConexiones);
                            printf('La ultima conexion fue en %s',date('d-m-Y h:m:s',$resultado->FechaHoraUltimaConexion));
                        }
                    } catch (PDOException $th) {
                        print $th->getMessage();
                    }finally{
                        unset($odbDepartamentos);
                    }
                ?>
            </div>
    </section>
    <footer>
        <p>Luis Pérez Astorga® 2022-2023</p>
        <a href=""><img src="../doc/logo_tostada.png" alt="Toast"></a>
        <a href=""><img src="../doc/git.png" alt="GIt"></a>
    </footer>
</body>
</html>