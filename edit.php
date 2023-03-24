<?php

try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=attendance","admin","welcome");

}
catch(Exception $e){
    die ($e->getMessage());
}

$edit_id = $_GET["editin"];


try{
    $edit=$pdo->prepare("SELECT * FROM student_attendance where student_attendance.id = $edit_id");
    $edit->execute();
    $edit = $edit->fetchAll($pdo::FETCH_OBJ);

}
catch (PDOException $e) {
    die($e->getMessage());
}

require'edit.html';