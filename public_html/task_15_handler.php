<?php
function redirect_to($path){
    header("location: " . $path);
}
unset($_SESSION['email']);
redirect_to('task_14.php');