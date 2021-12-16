<?php

include_once 'task_16_functions.php';

for($i=0;$i<count($_FILES['image']['name']);$i++){
   uploadFile($_FILES['image']['name'][$i],$_FILES['image']['tmp_name'][$i]);
}



function uploadFile($fileName,$tmpName){
$result = pathinfo($fileName)['extension'];
$name = uniqid() . '.' . $result;
move_uploaded_file($tmpName, 'upload/' . $name);
uploadToDb('image', $name);
}


header('location: task_17.php');