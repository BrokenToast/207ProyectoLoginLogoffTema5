<?php 
session_start();
if(!isset($_SESSION['usuarioDBLoginLogOffTema5'])){
    header("Location: ../index.php");
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
    <link rel="stylesheet" href="../webroot/style/detalles.css">
    <title>LoginLogoff</title>
</head>
<body>
    <header>
        <h1>LoginLogoff</h1>
    </header>
    <section>
        <a href="./programa.php">Volver</a>
        <article>
            <?php
                /**
                * Ejercicio 0
                * @author: Luis Pérez Astorga
                * @version: 1.0
                * @size 
                */
                //Recorrido con un foreach la variable superglobal $_SERVER
                ?>
                <div id="super">
                    <h3>$GLOBALS</h3> 
                    <?php
                    foreach($GLOBALS as $nomVariable=>$aVariableSuper ){
                        if(empty($aVariableSuper)){
                            ?>
                            <table>
                                <tr>
                                    <th><?php print $nomVariable; ?></th>
                                </tr>
                                <tr>
                                    <td>Esta vacia</td>
                                </tr>
                            </table> 
                            <?php
                            continue;
                        }
                        ?><table>
                            <tr>
                                <th colspan="2"><?php print $nomVariable; ?></th>
                            </tr>
                            <tr>
                                <th>Clave </th>
                                <th>Valor</th>
                            </tr>
                            <?php 
                                foreach($aVariableSuper as $clave=>$valor){
                                    ?>  
                                    <tr>
                                        <td><?php print $clave; ?></td>
                                        <td><?php print $valor; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </table> 
                    <?php
                        }
                        if(!isset($_SESSION)){
                            ?>
                            <table>
                                <tr>
                                    <th><?php print "_SESSION" ?></th>
                                </tr>
                                <tr>
                                    <td>Esta vacia</td>
                                </tr>
                            </table> 
                            <?php
                        }
                    ?>
                </div>
                <?php phpinfo() ?>
        </article>
    </section>
    <footer>
        <p>Luis Pérez Astorga® 2022-2023</p>
        <a href=""><img src="../doc/logo_tostada.png" alt="Toast"></a>
        <a href=""><img src="../doc/git.png" alt="GIt"></a>
    </footer>
</body>
</html>