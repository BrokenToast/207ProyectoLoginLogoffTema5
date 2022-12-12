<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../webroot/style/reset.css">
    <link rel="stylesheet" href="../webroot/style/style.css">
    <link rel="stylesheet" href="../webroot/style/codigo.css">
    <title>Ejecutar Script</title>
</head>
<body>
    <header>
        <h1>Ejecutar Script</h1>
    </header>
    <section>
        <article>
        <?php
        require_once '../config/confConexion.php';
        if(isset($_REQUEST['ejecutar'])){
            // Cambiar estos parametros
            exec($_REQUEST['gdb']." -h ".HOST." -u dbu263643 --password=".PASSWORD. "<" .$_REQUEST['script'],$respuesta);
            foreach($respuesta as $valor){
                print $valor;
            }
        }
        ?> 
        <form id="tableForm" action="insertar_scripts.php" method="post">
            <table >
                <tr>
                    <td colspan="2"><h3>Ejecución de un script</h3></td>
                </tr>
                <tr>
                    <td><p>Gestor de bases de datos:</p></td>
                    <td>
                        <select name="gdb">
                            <option value="mariadb">Mariadb</option>
                            <option value="mysql">Mysql</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><p>Scripts:</p></td>
                    <td>
                        <select name="script">
                            <option value="./BorraDB207DWESLoginLogoffTema5.sql">BorraDB207DWESproyectoTema5</option>
                            <option value="./CargaInicialDB207DWESLoginLogoffTema5.sql">CargaInicialDB207DWESproyectoTema5</option>
                            <option value="./CreaDB207DWESLoginLogoffTema5.sql">CreaDB207DWESproyectoTema5</option>

                            <option value="./BorraDB207DWESLoginLogoffTema5Explotacion.sql">BorraDB207DWESproyectoTema5Explotacion</option>
                            <option value="./CargaInicialDB207DWESLoginLogoffTema5Explotacion.sql">CargaInicialDB207DWESproyectoTema5Explotacion</option>
                            <option value="./CreaDB207DWESLoginLogoffTema5Explotacion.sql">CreaDB207DWESproyectoTema5Explotacion</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><p></p></td>
                </tr>
                <tr>
                    <td colspan="2" id="botones">
                        <button name="ejecutar" type="submit" value="ejecutar">Ejecutar</button>
                    </td>

                </tr>
            </table>
        </form> 
    <?php
    ?>
        </article>
    </section>
    <footer>
            <p>Creado por Luis Pérez Astorga | Licencia GPL</p>
            <a href="../../../index.html"><img src="../../../doc/logo_Casa.png" alt="Pagina creador"></a>
            <a href="../index.php"><img src="../../../doc/atras.svg" alt="Atras"/></a>
    </footer>
</body>
</html>




