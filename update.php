<?php

try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=attendance","admin","welcome");
    // echo "hii srithar";
}
catch(Exception $e){
    die ($e->getMessage());
}

$id = $_POST['id'];
$editname = $_POST['name'];
$editlname = $_POST['fname'];
$editdob = $_POST['dob'];
$editmobile = $_POST['mobile'];

try{
    $update=$pdo->prepare("UPDATE student_attendance SET 	name ='$editname',father_name='$editlname',dob='$editdob',	mobile_no='$editmobile'where id = $id");
    $update->execute();
    header("location: /grt.php");


}
catch (PDOException $e) {
    die($e->getMessage());
}