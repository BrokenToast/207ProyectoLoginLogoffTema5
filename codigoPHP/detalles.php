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
                * @since: 
                */
                //Recorrido con un foreach la variable superglobal $_SERVER
                function printTable(array $dateTable, string $nameTable){
                    ?><table>
                        <tr>
                            <th colspan="2"><?php print $nameTable; ?></th>
                        </tr>
                        <tr>
                            <th>Clave </th>
                            <th>Valor</th>
                        </tr>
                        <?php 
                            foreach($dateTable as $clave=>$valor){
                                ?>  
                                <tr>
                                    <td><?php print $clave; ?></td>
                                    <td>
                                        <?php
                                            if(is_array($valor)){
                                                printTable($valor,$clave);
                                            }else{
                                                print_r($valor);
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </table> 
                    <?php
                }
                    //Delcaración de un array con todas las superglobales
                    $aVairablesSuper=[
                        "_SESSION"=>$_SESSION?? array(),
                        "_SERVER"=>$_SERVER,
                        "_GET"=>$_GET,
                        "_POST"=>$_POST,
                        "_FILES"=>$_FILES,
                        "_REQUEST"=>$_REQUEST,
                        "_ENV"=>$_ENV,
                        "_COOKIE"=>$_COOKIE,
                        "GLOBALS"=>$GLOBALS
                    ];
                    // Recorremos el  la array de SuperGlobales y la imprimimos como tablas;
                    foreach($aVairablesSuper as $nameGlobalVar=>$aGlobalVar ){
                        //En caso de que la SuperGlobal este vaica muesta esta tabla;
                        if(empty($aGlobalVar)){
                            ?>
                            <table>
                                <tr>
                                    <th><?php print $nameGlobalVar; ?></th>
                                </tr>
                                <tr>
                                    <td>Esta vacia</td>
                                </tr>
                            </table> 
                            <?php
                        }else{
                        // En caso de que no este vacia muestra el contenido como en una tabla
                            printTable($aGlobalVar,$nameGlobalVar);
                        }
                    }
                ?>
                <?php phpinfo() ?>
        </article>
    </section>
    <footer>
        <p>Luis Pérez Astorga® 2022-2023</p>
        <a href="../../../index.html"><img src="../doc/logo_tostada.png" alt="Toast"></a>
        <a href="https://github.com/BrokenToast/207ProyectoLoginLogoffTema5" target="_blank"><img src="../doc/git.png" alt="github" height="50" width="25"></a>
    </footer>
</body>
</html>