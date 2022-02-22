<?php

session_start();

require_once 'classes/Database.php';
$db = new Database();

if(!isset($_SESSION['email'])){
    header('location: index.php');
    die();
}

$email = $_SESSION['email'];
$admin_data = $db->table('admin')->where(['email'=>$email])->get();


?>