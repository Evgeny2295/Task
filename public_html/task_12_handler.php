<?php
session_start();
$message = $_POST['text'];

$_SESSION['message'] = $message;

header("Location: task_12.php");
