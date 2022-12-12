<?php
/**
* LoginLogoff
* @author: Luis Pérez Astorga
* @version: 1.0
* @since 15/11/2022
*/
require_once '../core/221024ValidacionFormularios.php';
require_once '../config/confConexion.php';
$entradaOk=false;
function existUser(String $usuario, String $password){
    try{
        $odbDepartamentos=new PDO(HOSTPDO,USER,PASSWORD);
        $oQuery=$odbDepartamentos->prepare('select * from T02_Usuario where CodUsuario= :usuario and Password=SHA2(concat(:usuario,:password),256)');
        $oQuery->bindParam("usuario",$usuario);
        $oQuery->bindParam("password",$password);
        $oQuery->execute();
        if($oQuery->rowCount()>0){
            return $oQuery->fetchObject();
        }
    } catch (PDOException $th) {
        print $th->getMessage();
    }finally{
        unset($odbDepartamentos);
    }
    return "";
}
session_start();
if(!empty($_SESSION['usuarioDBLoginLogOffTema5'])){
    header('Location: programa.php');
    die;
}
if(isset($_REQUEST['enviar'])){
    $aErrores['usuario']=validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],10,1,1);
    $aErrores['password']=validacionFormularios::comprobarAlfabetico($_REQUEST['password'],8,1,1);
    $oExisteUser=existUser($_REQUEST['usuario'],$_REQUEST['password']);
    $entradaOk=true;
    foreach($aErrores as $value){
        if(!empty($value)){
            $entradaOk=false;
        }
    }
}
if(($entradaOk && !empty($oExisteUser))){
    $horaConexion=time();
    try{
        $odbDepartamentos=new PDO(HOSTPDO,USER,PASSWORD);
        $oQuery=$odbDepartamentos->prepare('update T02_Usuario set NumConexiones=NumConexiones+1,FechaHoraUltimaConexion=? where CodUsuario=?');
        $oQuery->bindParam(1,$horaConexion);
        $oQuery->bindParam(2,$_REQUEST['usuario']);
        $oQuery->execute();
    } catch (PDOException $th) {
        print $th->getMessage();
    }finally{
        unset($odbDepartamentos);
    }
    $_SESSION['usuarioDBLoginLogOffTema5']=$oExisteUser->CodUsuario;
    $_SESSION['numConexionDBLoginLogOffTema5']=$oExisteUser->NumConexiones;
    $_SESSION['fechaUltimaConexionDBLoginLogOffTema5']=new DateTime(timezone:new DateTimeZone("Europe/Madrid"));
    $_SESSION['fechaUltimaConexionDBLoginLogOffTema5']->setTimestamp($oExisteUser->FechaHoraUltimaConexion);
    setcookie('idiomaPagina',$_REQUEST['idioma'],time()+6000);
    header('Location: programa.php');
    exit;
}
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../webroot/style/reset.css">
    <link rel="stylesheet" href="../webroot/style/webinicial.css">
    <title>LoginLogoff</title>
</head>
<body>
<header>
        <h1>LoginLogoff</h1>
    </header>
    <section>
        <article>
            <form action="login.php" method="post">
                <table id="tableForm">
                    <tr>
                        <td><label>Usuario</label></td>
                        <td><input type="text" name="usuario"></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td><label>Idioma</label></td>
                        <td>
                            <select name="idioma" id="idioma">
                                <option value="es">Español</option>
                                <option value="ct">Catalan</option>
                                <option value="pt">Portugues</option>
                                <option value="gl">Gallego</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="enviar" value="Iniciar"></td>
                    </tr>
                </table>
            </form>
        </article>
    </section>
    <footer>
            <p>Creado por Luis Pérez Astorga | Licencia GPL</p>
            <a href="../index.html"><img src="../doc/logo_tostada.png" alt="Pagina creador" height="25" width="25"></a>
            <a href="https://github.com/BrokenToast/207ProyectoLoginLogoffTema5" target="_blank"><img src="../doc/git.png" alt="github" height="25" width="25"></a>
    </footer>
</body>
</html>