<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
        exit();
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
    <link rel="stylesheet" href="../webroot/style/mtoDepartamento.css">
    <title>LoginLogoff</title>
</head>
<body>
    <header>
        <h1>LoginLogoff</h1>
    </header>
    <section>
        <?php
            require_once '../config/confConexion.php';
            require_once '../core/DB/processDB.php';

            $oConectorDB=new processDB(new PDO(HOSTPDO,USER,PASSWORD));
            $aDepartamentos=$oConectorDB->executeQuery("select * from T02_Departamento");
        ?>
        <a href="./programa.php">Volver</a>
        <article>
            <form action="" method="post">
                <table>
                    <?php
                        $keysDepartamentos=array_keys($aDepartamentos[0]);
                        ?> 
                            <tr>
                                <th><?php echo $keysDepartamentos[0];?></th>
                                <th><?php echo $keysDepartamentos[1];?></th>
                                <th><?php echo $keysDepartamentos[2];?></th>
                                <th><?php echo $keysDepartamentos[3];?></th>
                                <th><?php echo $keysDepartamentos[4];?></th>
                                <th>Selecionar</th>
                            </tr>
                        <?php
                        reset($aDepartamentos);
                        foreach($aDepartamentos as $departamento){
                            ?> 
                            <tr>
                                <td><?php echo $departamento["T02_CodDepartamento"];?></td>
                                <td><?php echo $departamento["T02_DescDepartamento"];?></td>
                                <td><?php echo $departamento["T02_FechaDeCreacionDepartamento"];?></td>
                                <td><?php echo $departamento["T02_VolumenDeNegocio"];?></td>
                                <td><?php echo $departamento["T02_FechaBajaDepartamento"];?></td>
                                <td><input type="submit" name="" value="<?php echo $departamento["T02_CodDepartamento"];?>" ></td>
                            </tr>
                            <?php
                        }
                    ?>
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