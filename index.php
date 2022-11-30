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
            <?php
                /**
                * LoginLogoff
                * @author: Luis Pérez Astorga
                * @version: 1.0
                * @size 15/11/2022
                */
                if(isset($_REQUEST['enviar'])){
                    header("Location: http://192.168.3.202/207DWESproyectoDWES/207ProyectoLoginLogoffTema5/codigo/programa.php");
                    exit;
                }
                ?> 
                <form action="./index.php" method="post">
                    <table id="tableForm">
                        <tr>
                            <td><label>Usuario</label></td>
                            <td><input type="text" name="usuario"<?php if(isset($_REQUEST['enviar']) && empty($aErrores['usuario'])){ printf('value="%s"',$_REQUEST['usuario']); } ?>></td>
                            <td><p class="error">* <?php if(!empty($aErrores['usuario'])){ ?><span style="color:red;"> <?php print $aErrores['usuario'];?> </span><?php }?></p></td>
                        </tr>
                        <tr>
                            <td><label>Password</label></td>
                            <td><input type="password" name="password"<?php if(isset($_REQUEST['enviar']) && empty($aErrores['password'])){ printf('value="%s"',$_REQUEST['password']); } ?>></td>
                            <td><p class="error">* <?php if(!empty($aErrores['password'])){ ?><span style="color:red;"> <?php print $aErrores['password'];?> </span><?php }?></p></td>
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