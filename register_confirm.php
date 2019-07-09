<?php 

include 'app/start.php';
include 'app/functions.php';

$page_title = "Registration Confirm - ".getSettings('site_title');

if(isset($_SESSION['reg_success_user'])) {

    $username = $_SESSION['reg_success_user'];
    $email = $_SESSION['reg_success_email'];

    include 'app/views/register_confirm.php';
} else {
    header('location: register.php');
}

?>