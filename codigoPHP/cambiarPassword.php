<?php
    require_once '../core/221024ValidacionFormularios.php';
    require_once '../core/DB/processDB.php';
    require_once '../config/confConexion.php';
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
        exit();
    }
    $aErrores = [];
    $ok="";
    if(isset($_REQUEST['cambiar'])){
        $ok=true;
        $aErrores['newPassword']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['newPassword'],16,3,1);
        $aErrores['repitPassword']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['repitPassword'],16,3,1);
        if($_REQUEST['newPassword']!=$_REQUEST['repitPassword']){
            $aErrores['iguales'] = "No son iguales";
        }
        foreach($aErrores as $value){
            if(!empty($value)){
            $ok = false;        
            }
        }
    }
    if($ok){
        $oConector = new processDB(new PDO(HOSTPDO, USER, PASSWORD));
        $usuario = $_SESSION['usuario']['CodUsuario'];
        $oConector->executeIUD("UPDATE T02_Usuario  set Password=SHA2(concat(\"$usuario\",\"$_REQUEST[newPassword]\"),256) where CodUsuario = '$usuario';");
        header("Location: ./editarPerfil.php");
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
    <link rel="stylesheet" href="../webroot/style/cambiarPassword.css">
    <title>LoginLogoff</title>
</head>
<body>
    <header>
        <h1>LoginLogoff</h1>
    </header>
    <section>
        <article>
            <form action="./cambiarPassword.php" method="post">
                <table>
                    <tr>
                        <td>Nueva contraseña:</td>
                        <td>
                            <input type="password" name="newPassword" id="newPassword">
                        </td>
                    </tr>
                    <tr>
                        <td>Repita la contraseña</td>
                        <td>
                            <input type="password" name="repitPassword" id="repitPassword">
                        </td>
                    </tr>
                    <tr id="errores">
                        <?php
                            foreach($aErrores as $error){
                                ?> 
                                <td>
                                    <?php echo $error;?>
                                </td>
                                <?php
                            }
                        ?>
                    </tr>
                    <tr>
                        <td><input type="submit" name="cambiar" value="Cambiar Contraseña"></td>
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