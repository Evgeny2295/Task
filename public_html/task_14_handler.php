<?php
session_start();
include_once 'db.php';
function getUserByEmail($table,$email){
    global $pdo;
    $sql = "SELECT * FROM $table WHERE email=:email";
    $query = $pdo->prepare($sql);
    $query->execute(['email'=>$email]);
    return $query->fetch();
}
function set_flash_message($condition,$message){
    $_SESSION[$condition] = $message;
}
function redirect_to($path){
    header("location: " . $path);
}

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$user = getUserByEmail('users',$email);

if(empty($user)){
    $message = 'Такой пользователь не существует';
    set_flash_message('danger',$message);
    redirect_to('task_14.php');
    exit();
}

if(!password_verify($password,$user['password'])){
    $message = 'Неверный логин или пароль';
    set_flash_message('danger',$message);
    redirect_to('task_14.php');
    exit();
}

$_SESSION['email'] = $email;
$message = 'Пользователь успешно авторизован';
set_flash_message('success',$message);
redirect_to('task_14.php');

