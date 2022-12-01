<?php
    /**
    * 
    * @author: Luis Pérez Astorga
    * @version: 1.9
    * Fecha Modification: 8/11/2022
    */
    //Configuración de la conexion
    const USER="userDAW207DBprotoyectoTema5";
    //const USER="dbu263643";
    const PASSWORD="paso";
    //const PASSWORD="daw2_Sauces";
    //const HOST="192.168.20.19";
    const HOST="192.168.3.202";
    //const HOST="db5010845906.hosting-data.io";
    const DATABASE="DB207DWESLoginLogoffTema5";
    //const DATABASE="dbs9174075";
    define("HOSTPDO",sprintf("mysql:dbname=%s;host=%s",DATABASE,HOST));
    const PORT="3306";
?>


