<?php 

include '../app/start.php';
include '../app/admin_functions.php';
include '../app/functions.php';

if($userLogged && $userData['user_group'] == 3 && isset($_GET['id'])) {

    $id = (int)ch($_GET['id']);

    if(findCategoryName($id)) {
        
        if(deleteCategory($id)) {
            header('location: '.BASE_URL.'/admin/add_cat.php');
        } else {
            header('location: '.BASE_URL.'/admin/add_cat.php');
        }

    } else {
        header('location: '.BASE_URL.'/admin/add_cat.php');
    }
} else {
    header('location: '.BASE_URL.'/index.php');
}
