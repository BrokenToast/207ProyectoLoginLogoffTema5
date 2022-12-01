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
            <h3>Bienvenido <?php print $_SESSION['usuarioDBLoginLogOffTema5']?></h3>
            <h3></h3>
            <a href="./detalles.php">Detalles</a>
            <a href="../index.php">Salir</a>
    </section>
    <footer>
        <p>Luis Pérez Astorga® 2022-2023</p>
        <a href=""><img src="../doc/logo_tostada.png" alt="Toast"></a>
        <a href=""><img src="../doc/git.png" alt="GIt"></a>
    </footer>
</body>
</html>