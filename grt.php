<?php

try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=attendance","admin","welcome");

}
catch(Exception $e){
    die ($e->getMessage());
}


$Name = $_POST['name'];
$fname = $_POST['fname'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];


if($Name && $fname && $dob && $mobile) {

    try {
        $query = $pdo->prepare("INSERT INTO student_attendance(name,father_name,dob,mobile_no,created_at,updated_at)values('$Name','$fname','$dob','$mobile',now(),now())");
        $query->execute();
    } catch (PDOException $e) {
        die ($e->getMessage());

    }
}






try{
    $sql = $pdo->prepare("SELECT id,name,father_name,dob,mobile_no FROM student_attendance;");
    $sql->execute();
    $users = $sql->fetchAll(PDO::FETCH_OBJ);
}
catch(PDOException $e){
    die ("connection fail");
}


require 'get.html';

