<?php
function connect(){
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=easy_mobile_service;charset=utf8','root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function query($query,$param=array()){
    $statement = connect()->prepare($query);
    $statement -> execute($param);
    if(explode(' ',$query)[0]=='SELECT'){
        $data = $statement -> fetchAll();
        return $data;
    } 
}
function redirect($location){
    header('location: ' .$location);
    die();
}

?>