<?php
include_once 'task_16_functions.php';
$idImg = $_GET['id'];
$image = getImage('image',$idImg);
delete('image',$idImg);
unlink("upload/" . $image['name']);
header("location: task_17.php");