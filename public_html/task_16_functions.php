<?php
include_once 'db.php';

function uploadToDb($table,$name){
    global $pdo;

    $sql = "INSERT INTO $table(name) VALUES(:name)";
    $query=$pdo->prepare($sql);
    $query->execute(['name'=>$name]);
}


function getImages($table){
    global $pdo;
    $sql = "SELECT * FROM $table";
    $query=$pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

function delete($table,$idImg){
    global $pdo;
    $sql = "DELETE FROM $table WHERE id=:id";
    $query=$pdo->prepare($sql);
    $query->execute(['id'=>$idImg]);
}

function getImage($table,$idImg){
    global $pdo;
    $sql = "SELECT * FROM $table WHERE id=:id";
    $query=$pdo->prepare($sql);
    $query->execute(['id'=>$idImg]);
    return $query->fetch();
}