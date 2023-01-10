<?php
require_once '../core/221024ValidacionFormularios.php';
require_once '../core/DB/processDB.php';
require_once '../config/confConexion.php';
$aErrores = [];
$ok = "";
$aSelectorIdioma = [
    ['es', 'Español'],
    ['ct', 'Catalan'],
    ['pt', 'Portugues'],
    ['gl', 'Gallego']
];
if(isset($_COOKIE['idioma'])){
    switch ($_COOKIE['idioma']) {
        case 'ct':
            $aSelectorIdioma = [
                ['ct', 'Catalan'],
                ['es', 'Español'],
                ['pt', 'Portugues'],
                ['gl', 'Gallego']
            ];
            break;
        case 'pt':
            $aSelectorIdioma = [
                ['pt', 'Portugues'],
                ['es', 'Español'],
                ['ct', 'Catalan'],
                ['gl', 'Gallego']
            ];
            break;
        case 'gl':
            $aSelectorIdioma = [
                ['gl', 'Gallego'],
                ['es', 'Español'],
                ['ct', 'Catalan'],
                ['pt', 'Portugues']
            ];
            break;
    }
}

if(isset($_REQUEST['enviar'])){
    $ok = true;
    $aErrores['usuario']=validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],30,2,1);
    $aErrores['password']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'],16,3,1);
    foreach($aErrores as $value){
        if(!empty($value)){
        $ok = false;        
        }
    }
}
if($ok){
    $oConector = new processDB(new PDO(HOSTPDO, USER, PASSWORD));
    $aRespuesta = $oConector->executeQuery("SELECT * FROM T02_Usuario WHERE CodUsuario=\"$_REQUEST[usuario]\" AND  Password=SHA2(concat(\"$_REQUEST[usuario]\",\"$_REQUEST[password]\"),256)");
    if($aRespuesta){
        session_start();
        $_SESSION['usuario'] = $aRespuesta;
        if(isset($_COOKIE['idioma']) && $_REQUEST['idioma']==$_COOKIE['idioma']){
            $_SESSION['idioma']= $_COOKIE['idioma'];
        }else{
            setcookie('idioma',$_REQUEST['idioma']);
            $_SESSION['idioma']=$_REQUEST['idioma'];
        }
        $oConector->executeIUD("UPDATE T02_Usuario set FechaHoraUltimaConexion=UNIX_TIMESTAMP(),NumConexiones=1+NumConexiones WHERE CodUsuario=\"$_REQUEST[usuario]\"");
        header("Location: ./programa.php");
    }
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
            <?php

            ?>
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
                                <?php
                                foreach($aSelectorIdioma as $idioma){
                                    ?> 
                                    <option value="<?php echo $idioma[0];?>"><?php echo $idioma[1];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="enviar" value="Iniciar"></td>
                        <td><a href="./registro.php">Registrarse</a></td>
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