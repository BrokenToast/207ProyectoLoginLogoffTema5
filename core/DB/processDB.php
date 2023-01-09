<?php
require_once('DBexception.php');
class processDB{
    /**
     * Clase que nos permite gestionar una base de datos.
     * @var PDO $oconexionDB Conexion a la base de datos
     */
    private PDO $oconexionDB;
    /**
     * 
     * @param PDO $conexionDB Conexion a la base de datos
     */
    public function __construct(PDO $conexionDB){
        $this->oconexionDB = $conexionDB;
    }
    /**
     * Nos permite cambiar la conexion a la base de datos.
     * @param PDO $conexionDB Conexio a la base de datos
     */
    public function setConexionDB(PDO $conexionDB){
        $this->oconexionDB = $conexionDB;
    }
    /**
     * Metodo que no permite lanzar un quiery y nos devuelve la información en una array
     * @param string $query Query que se va a ejecutar.
     * @throws DBexception Se lanza cuando hay un error con el query
     * @return array devuelve una array con la información del Quer(Formato: [[tupla1],[tupla..],[tupla..]])
     */
    public function executeQuery(string $query){
        $aresultado = [];
        try{
            $oresultado=$this->oconexionDB->query($query);
            $aresultado=$oresultado->fetchAll();
        }catch(PDOException $error){
            throw new DBexception($error);
        }finally{
            unset($oPrepareSQL);
        }
        return $aresultado;
    }
    /**
     * executeIUD
     * Nos permite ejecutar insert, update y delete.
     * 
     * Formato del query, ponemos nombre: que seran los datos que introduciremos por los $adatos.
     * Ejemplo:
     * insert into departamento values (codigo:,descripcion:);
     * 
     * $adatos tambien tiene un frormato que es [clave=>valor] o [[clave=>valor][clave=>valor]]:
     * Ejemplo:
     * ['codigo'=>'DPL','descripcion'=>"Departamento de lengua"]
     * 
     * @param string $query insert, update y delete(SQL)(Tiene un formato).
     * @param array $datos son los datos que va a contener el query(Tiene un formato);
     * @throws DBexception Se lanza cuando a ocurrido un error.
     * @return bool|int, nos devuelve flase si a ocurrido un error y si se a ejecutado bien devuelve el numero de tuplas afectadas.
     */
    public function executeIUD(string $query, array $adatos=[]){
        try{
            if(empty($adatos)){
                $ok=$this->oconexionDB->exec($query);
            }else{
                if(is_array($adatos[0])){
                    foreach($adatos as $datos){
                        $perareQuery=$ok=$this->oconexionDB->prepare($query);
                        foreach($datos as $dateName=>$dateValue){
                            $perareQuery->bindParam($dateName,$dateValue);
                        }
                        $ok=$perareQuery->execute();
                    }
                }else{
                    $perareQuery=$ok=$this->oconexionDB->prepare($query);
                    foreach($adatos as $dateName=>$dateValue){
                        $perareQuery->bindParam($dateName,$dateValue);
                    }
                    $ok=$perareQuery->execute();
                }
            }
        }catch(PDOException $error){
            throw new DBexception($error);
        }finally{
            unset($oPrepareSQL);
        }
        return $ok;
    }

}