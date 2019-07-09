<?php

include '../app/start.php';
include '../app/admin_functions.php';
include '../app/functions.php';

if($userLogged && $userData['user_group'] == 3) {

    if(isset($_GET['id'])) {

        $id = (int)ch($_GET['id']);

        if(checkUserId($id)) {

            $userValues = checkUserId($id);

            if($userValues['is_banned'] == 0) {

                if(banUser($id)) {
                    header('location: '.BASE_URL.'/admin/users.php');
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