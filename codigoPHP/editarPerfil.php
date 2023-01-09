<?php
    if(isset($_REQUEST['changePassword'])){
        header("Location: ./cambiarPassword.php");
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
                            <input type="text" name="userName" id="userName">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Descripción del usuario:</td>
                        <td>
                            <textarea name="descUsuario" id="descUsuario" cols="20" rows="4"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Fecha ultima conexión:</td>
                        <td>
                            <input type="text" name="fechaUltima" id="fechaUltima">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Numero de conexiones:</td>
                        <td>
                            <input type="number" name="numeroConexiones" id="numeroConexiones">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tipo de perfil:</td>
                        <td>
                            <input type="text" name="tipoPerfil" id="tipoPerfil">
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