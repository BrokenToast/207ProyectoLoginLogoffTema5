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
        <article>
        <form action="registro.php" method="post">
                <table id="tableForm">
                    <tr>
                        <td><label>Usuario</label></td>
                        <td><input type="text" name="usuario"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="password" name="password"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion del Usuario</label></td>
                        <td>
                            <textarea name="descUsuario" id="descUsuario" cols="20" rows="4"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label>Imagen</label></td>
                        <td><input type="file" name="Imagen"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="enviar" value="Iniciar"></td>
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