<?php
session_start();
require_once 'classes/Database.php';
require_once 'classes/Helper.php';

$db = new Database();
$help = new Helper();


// Handle admin Login
if(isset($_POST['action']) && $_POST['action'] == 'admin_login'){
    $email = $help->sanitize_data($_POST['email']);
    $password = $help->sanitize_data($_POST['password']);

    $loggedIn = $db->table('admin')->where(['email' => $email])->get();
    if($loggedIn != null){
        if(password_verify($password, $loggedIn['password'])){
            if(!empty($_POST['rem'])){
                setcookie("email", $email, time()+(30*24*60*60), '/');
                setcookie("password", $password, time()+(30*24*60*60), '/');
            }else{
                setcookie("email", "", 1, '/');
                setcookie("password", "", 1, '/');
            }

            echo "login";
            $_SESSION['email'] = $email;
        }else{
            echo 'password_not_matched';
            //echo $help->message('danger','Password didn\'t matched with your email');
        }
    }else{
        echo 'data_not_found';
        //echo $help->message('danger','We didn\'t find your email in our database');
    }
}



// Handle Admin Logout
if(isset($_POST['action']) && $_POST['action'] == 'admin_logout'){
    unset($_SESSION['email']);
    echo 'logout';
}

?>