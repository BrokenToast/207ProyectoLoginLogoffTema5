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
            $CodigoDepartamento="";
            $DescripcionDepartamento="";
            $FechaCreacionDepartamento="";
            $VolumenNegocioDepartamento="";
            $FechaBajaDepartamento="";

            $oConectorDB=new processDB(new PDO(HOSTPDO,USER,PASSWORD));
            $aDepartamentos=$oConectorDB->executeQuery("select * from T02_Departamento");
            if(isset($_REQUEST['selecionar'])){
                foreach($aDepartamentos  as $departamento){
                    if($departamento["T02_CodDepartamento"] == $_REQUEST['selecionar']){
                        $CodigoDepartamento=$departamento["T02_CodDepartamento"];
                        $DescripcionDepartamento=$departamento["T02_DescDepartamento"];
                        $FechaCreacionDepartamento=$departamento["T02_FechaDeCreacionDepartamento"];
                        $VolumenNegocioDepartamento=$departamento["T02_VolumenDeNegocio"];
                        $FechaBajaDepartamento=$departamento["T02_FechaBajaDepartamento"];
                        break;
                    }
                }
            }elseif(isset($_REQUEST['eliminar'])){
                //$oConectorDB->executeIUD("delete from T02_Departamento where 'T02_CodDepartamento'=='$CodigoDepartamento'",[]);
            }elseif(isset($_REQUEST['modificar'])){

            }elseif(isset($_REQUEST['crear'])){
                //$
            }
        ?>
        <a href="./programa.php">Volver</a>
        <article>
            <form action="mtoDepartamento.php" method="post">
                <h2>Departamento <?php echo $CodigoDepartamento;?></h2>
                <table id="tableForm">
                    <tr>
                        <td><label>Codigo Departamento</label></td>
                        <td><input type="text" name="codDepartamento" value="<?php echo $CodigoDepartamento;?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">Descripcion del departamento</label></td>
                        <td><input type="text" name="descDepartamento" value="<?php echo $DescripcionDepartamento;?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">Fecha creación</label></td>
                        <td><input type="text" name="fechaDeCreacionDepartamento" value="<?php echo $FechaCreacionDepartamento;?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">Volumen de negocio</label></td>
                        <td><input type="text" name="volumentNegocio" value="<?php echo $VolumenNegocioDepartamento;?>"></td>
                    </tr>
                    <tr>
                        <td><label for="">Fecha de baja</label></td>
                        <td><input disabled type="text" name="fechaBaja" value="<?php echo $FechaBajaDepartamento;?>"></td>    
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="eliminar" value="Eliminar">
                            <input type="submit" name="modificar" value="Modificar">
                            <input type="submit" name="crear" value="Crear">
                        </td>
                    </tr>
                </table>
            </form>
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
                                <td><input type="submit" name="selecionar" value="<?php echo $departamento["T02_CodDepartamento"];?>" ></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
                <input type="submit" name="anterios" value="<">
                <input type="submit" name="Siguiente"value=">">
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