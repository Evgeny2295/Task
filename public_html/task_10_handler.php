<?php
session_start();
include_once 'db.php';

$text = $_POST['text'];

$result = readText('task9',$text);

function readText($table,$text){
    global $pdo;
    $sql = "SELECT * FROM $table WHERE text=:text";
    $query = $pdo->prepare($sql);
    $query->execute(['text'=>$text]);
    return $query->fetch();
}

if(!empty($result)){
    $message = 'You should check in on some of those fields below.';
    $_SESSION['danger'] = $message;
    header('Location: task_10.php');
    exit();
}

createText('task9',$text);

function createText($table,$text){
    global $pdo;
    $sql = "INSERT INTO $table(text) VALUES(:text)";
    $query = $pdo->prepare($sql);
    $query->execute(['text'=>$text]);

    $message = 'Запись успешно добавлена';
    $_SESSION['success'] = $message;

    header('Location: /task_10.php');
}