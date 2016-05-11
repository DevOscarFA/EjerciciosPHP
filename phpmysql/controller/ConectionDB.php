<?php

class ConectionDB {
    
    private $db_host = 'localhost';
    private $db_name = 'user';
    private $db_user = 'root';
    private $db_password = '';
    private $db_charset = 'utf-8';
    
    /**
     * Permite hacer la conexion por medio de procedimientos
     * 
     * @return Connection Retorna la conexion a la base de datos
     */
    public function ProcedureConnection(){

        $conection = mysqli_connect($this->db_host, 
                $this->db_user, 
                $this->db_password, 
                $this->db_name);    
        
        if(mysqli_connect_error()){
            echo 'Se ha producido un error en la consulta';
            exit;
        }
        mysqli_set_charset($conection, $this->db_charset);
        return $conection;
    }
    
    /**
     * 
     * @param type $sql
     */
    public function ProcedureQuery($sql){
        //Llamamos la conexion a la base de datos
        $connection = $this->ProcedureConnection();
        $result = mysqli_query($connection, $sql);
        $arrayData = array();
        $i = 0;
        while (($row = mysqli_fetch_array($result)) == true){
            
            $arrayData[$i] = $row;
            $i++;
        }
        mysqli_close($connection);
        return $arrayData;
    }
    
    public function ProcedureSave($sql){
        $connection = $this->ProcedureConnection();
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        return $result;
    }
    
}
