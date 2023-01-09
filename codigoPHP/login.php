<?php
    if(isset($_REQUEST['enviar'])){
        header("Location: ./programa.php");
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