<?php

try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=attendance","admin","welcome");

}
catch(Exception $e){
    die ($e->getMessage());
}

$lmail = $_POST['lmail'];
$lPassword = $_POST['lPassword'];

try{
    $sql=$pdo->prepare("SELECT * FROM users WHERE mail='$lmail'");
    $sql->execute();

    $values = $sql->fetchAll(PDO::FETCH_OBJ);

    if(!empty($values)){
        foreach($values as $value){
            if ($value->mail == "$lmail" && $value->password == "$lPassword"){
                header('location:home.html');
            }
            else{
                header('location:login.html');
            }
        }
    }
    

}
catch (PDOException $e) {
    die($e->getMessage());
}

require 'login.html';


