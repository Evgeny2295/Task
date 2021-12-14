<?php
session_start();
include_once 'db.php';
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$user = getUserByEmail('users',$email);

function getUserByEmail($table,$email){
    global $pdo;
    $sql = "SELECT * FROM $table WHERE email=:email";
    $query=$pdo->prepare($sql);
    $query->execute(['email'=>$email]);
    return $query->fetch();
}

if(!empty($user)){
    $message = 'Такой пользователь существует';
    $_SESSION['danger'] = $message;
    header('Location: task_11.php');
    exit();
}

$user = [
        'email'=>$email,
        'password'=>password_hash($password,PASSWORD_DEFAULT)
    ];


insertUser('users',$user);

function insertUser($table,$user=[]){
global $pdo;
$fields = '';
$values = '';
$i=0;

foreach ($user as $field=>$value) {

    if ($i === 0) {
        $fields .= $field;
        $values .= "'" . $value . "'";
    } else {
        $fields .= ',' . $field;
        $values .= ',' . "'".$value."'";
    }
    $i++;
}

    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
    $query=$pdo->prepare($sql);
    $query->execute();
    $message = 'Пользователь успешно добавлен';
    $_SESSION['success'] = $message;
    header('Location: task_11.php');

}