<?php 

include 'app/start.php';
include 'app/functions.php';

if($userLogged && isset($_GET['id'])) {

    $id = (int)ch($_GET['id']);

    if(isThread($id)) {

        $info = isThread($id);
        
        if($info['user_id'] == $userData['id'] || $userData['user_group'] == 3 || $userData['user_group'] == 2) {

            if(isset($_POST['edit'])){
                if(!empty(trim($_POST['title'])) && !empty(trim($_POST['content']))) {

                    $title = ch($_POST['title']);
                    $content = ch($_POST['content']);

                    if(editThread($title, $content, $id)) {
                        header('location: '.BASE_URL.'/thread.php?id='.$id);
                    } else {
                        $error_msg = "Sorry, your post can not be added";
                    }
                } else {
                    $error_msg = "Fill correct information in the fields";
                }
            }

            $page_title = $info['title'] . ' - '.getSettings('site_title');
            include 'app/views/edit_thread.php';

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