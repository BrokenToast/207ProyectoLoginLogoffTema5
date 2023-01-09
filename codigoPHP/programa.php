<?php
    if(isset($_REQUEST['salir'])){
        header("Location: ./login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../webroot/style/reset.css">
    <link rel="stylesheet" href="../webroot/style/programa.css">
    <title>LoginLogoff</title>
</head>
<body>
    <header>
        <h1>LoginLogoff</h1>
    </header>
    <section>
    <h3>Bienvenido</h3> 
            <a href="./detalles.php">Detalles</a>
            <a href="./mtoDepartamento.php">Mantenimiento Departamento</a>
            <a href="./editarPerfil.php">Editar Perfil</a>
            <form method="./programa.php" method="post">
                <input type="submit" name="salir" value="Salir">
            </form>
            <div>
                <p>numero de conexiones</p>
            </div>
    </section>
    <footer>
        <p>Luis Pérez Astorga® 2022-2023</p>
        <a href="../../../index.html"><img src="../doc/logo_tostada.png" alt="Toast"></a>
        <a href="https://github.com/BrokenToast/207ProyectoLoginLogoffTema5" target="_blank"><img src="../doc/git.png" alt="github" height="25" width="25"></a>
    </footer>
</body>
</html>