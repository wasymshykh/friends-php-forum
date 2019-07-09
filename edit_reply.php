<?php 

include 'app/start.php';
include 'app/functions.php';

if($userLogged && isset($_GET['id'])) {

    $id = (int)ch($_GET['id']);

    if(isReply($id)) {

        $info = isReply($id);
        $thread = isThread($info['thread_id']);
        
        if($info['user_id'] == $userData['id'] || $userData['user_group'] == 3 || $userData['user_group'] == 2) {

            if(isset($_POST['edit'])){
                if(!empty(trim($_POST['content']))) {

                    $content = ch($_POST['content']);

                    if(editReply($content, $id)) {
                        header('location: '.BASE_URL.'/thread.php?id='.$thread['id']);
                    } else {
                        $error_msg = "Sorry, your post can not be added";
                    }
                } else {
                    $error_msg = "Fill correct information in the field";
                }
            }

            $page_title = $thread['title'] . ' - '.getSettings('site_title');
            include 'app/views/edit_reply.php';

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