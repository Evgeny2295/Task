<?php
include_once 'db.php';

//Task_7
function getPersons($table){
    global $pdo;
    $sql = "SELECT * FROM $table";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

//Task_8
function getUsers($table){
    global $pdo;
    $sql = "SELECT * FROM $table";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

//Task_9
$text = $_POST['text'];

insert('task9',$text);

function insert($table,$text){
    global $pdo;
    $sql = "INSERT INTO $table (text) VALUES (:text)";

    $query = $pdo->prepare($sql);
    $query->execute(['text'=>$text]);

}
