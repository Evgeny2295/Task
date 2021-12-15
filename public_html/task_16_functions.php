<?php
include_once 'db.php';

function uploadToDb($table,$name){
    global $pdo;

    $sql = "INSERT INTO $table(name) VALUES(:name)";
    $query=$pdo->prepare($sql);
    $query->execute(['name'=>$name]);
}


function getImage($table){
    global $pdo;
    $sql = "SELECT * FROM $table";
    $query=$pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}