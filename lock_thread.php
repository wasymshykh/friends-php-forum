<?php 

include 'app/start.php';
include 'app/functions.php';

if($userLogged && isset($_GET['id'])) {

    $id = (int)ch($_GET['id']);

    if(isThread($id)) {

        $info = isThread($id);
        
        if($userData['user_group'] == 3 || $userData['user_group'] == 2) {

            if(lockThread($id)) {
                header('location: '.BASE_URL.'/thread.php?id='.$id);
            } else {
                header('location: '.BASE_URL.'/thread.php?id='.$id);
            }

        } else {
            header('location: '.BASE_URL.'/index.php');
        }

    } else {
        header('location: '.BASE_URL.'/index.php');
    }
} else {
    header('location: '.BASE_URL.'/index.php');
}



?>