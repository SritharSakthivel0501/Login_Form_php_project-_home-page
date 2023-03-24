<?php


try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=attendance","admin","welcome");
    // echo "hii srithar";
}
catch(Exception $e){
    die ($e->getMessage());
}


$name = $_POST['name'];
// echo $name;
$mail = $_POST['mail'];
// echo $mail;
$Password = $_POST['Password'];
// echo $Password;


if($name&&$mail&&$Password)

    try{
        $query = $pdo->prepare("INSERT INTO users(name,mail,password,created_at,updated_at)values('$name','$mail','$Password',now(),now())");
        $query->execute();
        header('location:login.html');
    }
    catch(PDOException $e){
        die ($e->getMessage());

    }





// require 'index.html';
