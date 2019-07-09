<?php 

include '../app/start.php';
include '../app/admin_functions.php';
include '../app/functions.php';

if($userLogged && $userData['user_group'] == 3 && isset($_GET['id'])) {

    $id = (int)ch($_GET['id']);

    if(isGroup($id)) {
        
        if(deleteGroup($id)) {
            header('location: '.BASE_URL.'/admin/users_groups.php');
        } else {
            header('location: '.BASE_URL.'/admin/users_groups.php');
        }

    } else {
        header('location: '.BASE_URL.'/index.php');
    }
} else {
    header('location: '.BASE_URL.'/index.php');
}
