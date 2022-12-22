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
            <form action="./editarPerfil.php" method="post">
                <table>
                    <tr>
                        <td>Nueva contraseeña:</td>
                        <td>
                            <input type="password" name="newPassword" id="newPassword">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Repita la contdaseña</td>
                        <td>
                            <input type="password" name="repitPassword" id="repitPassword">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="cambiar" value="Cambiar Contdaseña"></td>
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