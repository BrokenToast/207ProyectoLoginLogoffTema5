<?php
    require_once '../core/221024ValidacionFormularios.php';
    require_once '../core/DB/processDB.php';
    require_once '../config/confConexion.php';
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
    $aErrores = [
        'usuario'=>'',
        'password'=>'',
    ];
    if(isset($_REQUEST['registrar'])){
        $ok = true;
        $aErrores['usuario']=validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],30,2,1);
        $aErrores['password']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'],16,3,1);
        foreach($aErrores as $value){
            if(!empty($value)){
            $ok = false;        
            }
        }
    }
    if ($ok) {
        $oConector = new processDB(new PDO(HOSTPDO, USER, PASSWORD));
        if (!($oConector->executeQuery("SELECT * FROM T02_Usuario WHERE CodUsuario=\"$_REQUEST[usuario]\""))){
            $oConector->executeIUD("INSERT INTO T02_Usuario VALUES('$_REQUEST[usuario]',SHA2(concat('$_REQUEST[usuario]','$_REQUEST[password]'),256),'$_REQUEST[descUsuario]',UNIX_TIMESTAMP(),1,'usuario',null)");
            
            session_start();
            $_SESSION['usuario']=$oConector->executeQuery("SELECT * FROM T02_Usuario WHERE CodUsuario=\"$_REQUEST[usuario]\"");
            
            if(isset($_COOKIE['idioma']) && $_REQUEST['idioma']==$_COOKIE['idioma']){
                $_SESSION['idioma']= $_COOKIE['idioma'];
            }else{
                setcookie('idioma',$_REQUEST['idioma']);
                $_SESSION['idioma']=$_REQUEST['idioma'];
            }

            header("Location: ./programa.php");
        }else{
            $aErrores['Usuario'] = "ya existe";
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
    <link rel="stylesheet" href="../webroot/style/base.css">
    <link rel="stylesheet" href="../webroot/style/registro.css">
    <title>LoginLogoff</title>
</head>
<body>
    <header>
        <h1>LoginLogoff</h1>
    </header>
    <section>
        <a href="./login.php">Volver</a>
        <article>
        <form action="registro.php" method="post">
                <table id="tableForm">
                    <tr>
                        <td><label>Usuario*</label></td>
                        <td><input type="text" name="usuario" value="<?php echo (!isset($aErrores['usuario'])) ? $_REQUEST['usuario']:"";?>"></td>
                    </tr>
                    <tr>
                        <td><label>Password*</label></td>
                        <td><input type="password" name="password" value="<?php echo (!isset($aErrores['password'])) ? $_REQUEST['password']:"";?>"></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion del Usuario</label></td>
                        <td>
                            <textarea name="descUsuario" id="descUsuario" cols="20" rows="4"><?php echo (isset($_REQUEST['registrar'])) ? $_REQUEST['descUsuario']:"";?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Imagen</label></td>
                        <td><input type="file" name="imagen" value="<?php echo (isset($_REQUEST['registrar'])) ? $_REQUEST['imagen']:"";?>"></td>
                    </tr>
                    <tr id="errores">
                        <td colspan="2">
                            <ul>
                            <?php
                            foreach($aErrores as $nombreCampo=>$error){
                                if(!empty($error)){
                                    ?> <li style="color:red;"> <?php echo $nombreCampo.":".$error?></li> <?php
                                }
                            }
                            ?>
                            </ul>
                        </td>
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
                        <td><input type="submit" name="registrar" value="registrar"></td>
                    </tr>
                </table>
        </article>
    </section>
    <footer>
        <p>Luis Pérez Astorga® 2022-2023</p>
        <a href="../../../index.html"><img src="../doc/logo_tostada.png" alt="Toast" height="50" width="50"></a>
        <a href="https://github.com/BrokenToast/207ProyectoLoginLogoffTema5" target="_blank"><img src="../doc/git.png" alt="github" height="50" width="50"></a>
    </footer>
</body>
</html>