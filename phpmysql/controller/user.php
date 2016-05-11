<?php
include_once 'ConectionDB.php';

class user{
    
    public static function createUser($name, $last_name, $age){
        $connectionDB = new ConectionDB();
        $sql = "INSERT INTO user VALUES(NULL,'".$name."','".$last_name."',".$age.")";
        $connectionDB->ProcedureSave($sql);
    }
    
    public static function readAllUser(){
        $connectionDB = new ConectionDB();
        $sql = "SELECT * FROM user";
        $result = $connectionDB->ProcedureQuery($sql);
        return $result;
    }
    
    public static function updateUser($id, $name, $last_name, $age){
        $connectionDB = new ConectionDB();
        $sql = "UPDATE user SET name='".$name."', last_name='".$last_name."', age= ".$age." WHERE id = ".$id;
        $connectionDB->ProcedureSave($sql);
    }
    
    public static function deleteUser($id){
        $connectionDB = new ConectionDB();
        $sql = "DELETE FROM user WHERE id = ".$id;
        $connectionDB->ProcedureSave($sql);
    }
}
