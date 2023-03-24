<?php

try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=attendance","admin","welcome");

}
catch(Exception $e){
    die ($e->getMessage());
}

$id = $_POST['deleteToId'];

try{
    $delete = $pdo->prepare("DELETE from student_attendance where student_attendance.id =$id");
    $delete -> execute();
    header("location: /grt.php");
}
catch(PDOException $e){
    die("can't delete ".$e->getMessage());
}
