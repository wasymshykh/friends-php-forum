<?php 

include 'app/start.php';
include 'app/functions.php';
require APP_URL.'/phpmailer/PHPMailerAutoload.php';

if(isset($_POST['reset_submit'])){
    
    if(!empty($_POST['email'])) {

        $email = ch($_POST['email']);

        if(checkEmail($email)) {

            $code = md5(rand(1000,555555555));
            $message = "Hello, your reset link code: ".getSettings('site_url'). "/reset_it.php?email=".$email."&code=" . $code;
            $to = $email;
            
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
            $mail->Subject = 'Reset Request';
            $mail->Body = $message;
            $mail->AddAddress($to);
            
            if($mail->Send()){
                insertRequest($email, $code);

                $success_msg = "We have sent you an email with password reset link";
            } else {
                $error_msg = "Sorry, email couldn't be sent";
            }

        } else {
            $error_msg = "Email doesn't exists";
        }

    } else {
        $error_msg = "Please fill all fields correctly";
    }

}

$page_title = "Password Reset - ".getSettings('site_title');

include 'app/views/password_reset.php';

?>