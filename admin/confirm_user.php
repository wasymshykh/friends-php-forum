<?php

include '../app/start.php';
include '../app/admin_functions.php';
include '../app/functions.php';


if($userLogged && $userData['user_group'] == 3) {
    
    $page_title = "Confirm User - ".getSettings('site_title');
    include VIEWS_URL.'/admin/confirm_user.php';

} else {
    header('location: '.BASE_URL.'/index.php');
}


?>
