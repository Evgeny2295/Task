<?php
include_once 'task_16_functions.php';
$result = pathinfo($_FILES['image']['name'])['extension'];
$name = uniqid() . '.' .  $result;

move_uploaded_file($_FILES['image']['tmp_name'],'upload/' . $name);

uploadToDb('image',$name);


header('location: task_16.php');