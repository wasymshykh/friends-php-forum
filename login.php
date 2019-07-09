<?php 

include 'app/start.php';
include 'app/functions.php';

if(isset($_POST['login_submit'])){

    if(!empty($_POST['username']) && !empty($_POST['password'])) {

        $username = ch($_POST['username']);
        $password = ch($_POST['password']);
        if(checkUser($username)) {
            
            if(passwordCheck($password, $username)){

                if(checkConfirm($username)) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['data'] = getUserData($username);
                    header('location: index.php');
                } else {
                    $error_msg = "Sorry, your account is not confirmed";
                }
                
            } else {
                $error_msg = "Error! your password is incorrect";
            }

        } else {
            $error_msg = "Error! your username is invalid";
        }
        
    } else {
        $error_msg = "Please fill all fields";
    }

}

$page_title = "Login - ".getSettings('site_title');

include 'app/views/login.php';

?>