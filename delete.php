<?php 

include 'app/start.php';
include 'app/functions.php';

if($userLogged && isset($_GET['thread_id'])) {

    $id = (int)ch($_GET['thread_id']);

    if(isThread($id)) {

        $info = isThread($id);
        
        if($userData['user_group'] == 3 || $userData['user_group'] == 2) {

            if(deleteThread($id)) {
                header('location: '.BASE_URL.'/topic.php?id='.$info['topic_id']);
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

if($userLogged && isset($_GET['reply_id'])) {

    $id = (int)ch($_GET['reply_id']);

    if(isReply($id)) {

        $info = isReply($id);
        
        if($userData['user_group'] == 3 || $userData['user_group'] == 2) {

            if(deleteReply($id)) {
                header('location: '.BASE_URL.'/thread.php?id='.$info['topic_id']);
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