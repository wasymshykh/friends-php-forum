<?php 

include 'app/start.php';
include 'app/functions.php';

if($userLogged) {
    if(isset($_GET['id'])) {

        $id = (int)ch($_GET['id']);

        if(isThread($id)) {

            $info = isThread($id);
            $infoUser = userInfo($info['user_id']);
            $badge = badgeDetails($infoUser['user_group']);

            view_adder($info['id'], $info['views']);

            $page_title = $info['title'] . ' - '.getSettings('site_title');

            if(isset($_POST['replied'])) {
                if(!empty(trim($_POST['message']))){
                    
                    $message = ch($_POST['message']);

                    if(createReply($message, $id, $userData['id'], $info['topic_id'], $userData['user_group'])){
                        $success_msg = "Reply successfully Added";
                    } else {
                        $error_msg = "Unable to post reply";
                    }

                } else {
                    $error_msg = "You have submitted empty message";
                }
            }

            include 'app/views/thread.php';

        } else {

            header('location: '.BASE_URL.'/index.php');

        }
    } else {
        header('location: '.BASE_URL.'/index.php');
    }
} else {
    header('location: '.BASE_URL.'/login.php');
}

?>