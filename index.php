<?php
/**
* LoginLogoff
* @author: Luis Pérez Astorga
* @version: 1.0
* @size 15/11/2022
*/
require_once './core/221024ValidacionFormularios.php';
require_once './config/confConexion.php';
$entradaOk=false;
function existUser(String $usuario, String $password){
    try{
        $odbDepartamentos=new PDO(HOSTPDO,USER,PASSWORD);
        $oQuery=$odbDepartamentos->prepare('select CodUsuario from T02_Usuario where CodUsuario= :usuario and Password=SHA2(concat(:usuario,:password),256)');
        $oQuery->bindParam("usuario",$usuario);
        $oQuery->bindParam("password",$password);
        $oQuery->execute();
    } catch (PDOException $th) {
        print $th->getMessage();
    }finally{
        unset($odbDepartamentos);
    }
    if($oQuery->rowCount()>0){
        return true;
    }
    return false;
}
if(isset($_REQUEST['enviar'])){
    $aErrores['usuario']=validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],10,1,1);
    $aErrores['password']=validacionFormularios::comprobarAlfabetico($_REQUEST['password'],8,1,1);
    $entradaOk=true;
    foreach($aErrores as $value){
        if(!empty($value)){
            $entradaOk=false;
        }
    }
}
if($entradaOk && existUser($_REQUEST['usuario'],$_REQUEST['password'])){
    session_start();
    $_SESSION['usuarioDBLoginLogOffTema5']=$_REQUEST['usuario'];
    header("Location: ./codigo/programa.php");
    exit;
}
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./webroot/style/reset.css">
    <link rel="stylesheet" href="./webroot/style/webinicial.css">
    <title>LoginLogoff</title>
</head>
<body>
<header>
        <h1>LoginLogoff</h1>
    </header>
    <section>
        <article>
                <form action="./index.php" method="post">
                    <table id="tableForm">
                        <tr>
                            <td><label>Usuario</label></td>
                            <td><input type="text" name="usuario"<?php if(isset($_REQUEST['enviar']) && empty($aErrores['usuario'])){ printf('value="%s"',$_REQUEST['usuario']); } ?>></td>
                        </tr>
                        <tr>
                            <td><label>Password</label></td>
                            <td><input type="password" name="password"<?php if(isset($_REQUEST['enviar']) && empty($aErrores['password'])){ printf('value="%s"',$_REQUEST['password']); } ?>></td>
                        </tr>
                        <tr>

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
            <a href="../index.html"><img src="./doc/logo_tostada.png" alt="Pagina creador" height="25" width="25"></a>
            <a href="../index.html"><img src="./doc/git.png" alt="Pagina creador" height="25" width="25"></a>
    </footer>
</body>
</html>