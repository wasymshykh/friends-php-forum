<?php

include '../app/start.php';
include '../app/admin_functions.php';
include '../app/functions.php';
require APP_URL.'/phpmailer/PHPMailerAutoload.php';

if($userLogged && $userData['user_group'] == 3) {

    if(isset($_GET['id'])) {

        $id = (int)ch($_GET['id']);

        if(checkUserId($id)) {

            $userValues = checkUserId($id);

            if($userValues['confirmed'] == 0) {

                if(approveUser($id)) {

                    $message = "Hello, your ".getSettings('site_name'). " account has been confirmed! You can now login by visiting " . getSettings('site_url'). "/login.php";
                    $to = $userValues['email'];
                    
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = 'mail.smtp2go.com';
                    $mail->Port = '2525';
                    $mail->isHTML();
                    $mail->Username = 'azeemtester@gmail.com';
                    $mail->Password = 'Pakistani@1';
                    
                    $mail->SetFrom('no-reply@localhost.com', getSettings('site_title'));
                    $mail->Subject = 'Account Confirmed!';
                    $mail->Body = $message;
                    $mail->AddAddress($to);
                    $mail->Send();

                    header('location: '.BASE_URL.'/admin/confirm_user.php');
                } else {
                    header('location: '.BASE_URL.'/admin/confirm_user.php');
                }
                
            } else {
                header('location: '.BASE_URL.'/admin/confirm_user.php');
            }
        } else {
            header('location: '.BASE_URL.'/admin/confirm_user.php');
        }
    } else {
        header('location: '.BASE_URL.'/index.php');
    }
} else {
    header('location: '.BASE_URL.'/index.php');
}
    
    
?>