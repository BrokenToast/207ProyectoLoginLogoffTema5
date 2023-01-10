<?php
    require_once '../core/221024ValidacionFormularios.php';
    require_once '../core/DB/processDB.php';
    require_once '../config/confConexion.php';
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
        exit();
    }
    if(isset($_REQUEST['changePassword'])){
        if(empty(validacionFormularios::comprobarAlfaNumerico($_REQUEST['currentPassword'],16,3,1))){
            $oConector = new processDB(new PDO(HOSTPDO, USER, PASSWORD));
            $usuario = $_SESSION['usuario']['CodUsuario'];
            $aRespuesta = $oConector->executeQuery("SELECT * FROM T02_Usuario WHERE CodUsuario=\"$usuario\" AND  Password=SHA2(concat(\"$usuario\",\"$_REQUEST[currentPassword]\"),256)");
            if ($aRespuesta) {
                header("Location: ./cambiarPassword.php");
            }
        }
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
    <link rel="stylesheet" href="../webroot/style/editarPerfil.css">
    <title>LoginLogoff</title>
</head>
<body>
    <header>
        <h1>LoginLogoff</h1>
    </header>
    <section>
        <article>
            <form action="./editarPerfil.php" method="post">
                <table>
                    <tr>
                        <td>Usuario:</td>
                        <td>
                            <input type="text" name="userName" id="userName" value="<?php echo $_SESSION['usuario']["CodUsuario"];?>">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Descripción del usuario:</td>
                        <td>
                            <textarea name="descUsuario" id="descUsuario" cols="20" rows="4"><?php echo $_SESSION['usuario']["DescUsuario"];?></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Fecha ultima conexión:</td>
                        <td>
                            <input disabled type="text" name="fechaUltima" id="fechaUltima" value="<?php echo $_SESSION['usuario']["FechaHoraUltimaConexion"];?>">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Numero de conexiones:</td>
                        <td>
                            <input disabled type="number" name="numeroConexiones" id="numeroConexiones" value="<?php echo $_SESSION['usuario']["NumConexiones"];?>">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tipo de perfil:</td>
                        <td>
                            <input disabled type="text" name="tipoPerfil" id="tipoPerfil" value="<?php echo $_SESSION['usuario']["Perfil"];?>">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="cambiar" value="Editar perfil"></td>
                    </tr>
                </table>
            </form>
        </article>
        <article>
            <form action="editarPerfil.php" method="post">
                <h3>Cambiar contraseña</h3>
                <table>
                    <tr>
                        <td>Introduce contraseña actual:</td>
                        <td><input type="password" name="currentPassword" id="currentPassword"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="changePassword" value="Cambiar contraseña"></td>
                    </tr>
                </table>
            </form>
        </article>
    </section>
    <footer>
        <p>Luis Pérez Astorga® 2022-2023</p>
        <a href="../../../index.html"><img src="../doc/logo_tostada.png" alt="Toast"></a>
        <a href="https://github.com/BrokenToast/207ProyectoLoginLogoffTema5" target="_blank"><img src="../doc/git.png" alt="github" height="50" width="25"></a>
    </footer>
</body>
</html>