<?php 

include 'app/start.php';
include 'app/functions.php';

if(isset($_GET['code']) && isset($_GET['email'])) {

    $email = ch($_GET['email']);
    $code = ch($_GET['code']);

    if(checkCode($email, $code)){
        $page_title = "Password Reset - ".getSettings('site_title');
        
        if(isset($_POST['reset_submit'])){

            $password = $_POST['password'];
            $passwordC = $_POST['passwordC'];
            
            if(!empty($password) && !empty($passwordC)) {
                if($password == $passwordC) {

                    $rest_pass = password_hash($password, PASSWORD_BCRYPT);                
                    if(updatePassword($email, $rest_pass)) {
                        $success_msg = "Password Successfully Updated";
                    }else {
                        $error_msg = "Sorry, couldn't update your password";
                    }
                } else {
                    $error_msg = "Passwords doesn't match";
                }

            } else {
                $error_msg = "Enter passwords correctly";
            }
            
        }

        include 'app/views/reset_it.php';

    } else {
        header('location: password_reset.php');
    }
} else {
    header('location: password_reset.php');
}



?>