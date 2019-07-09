<?php 

include 'app/start.php';
include 'app/functions.php';

if($userLogged && isset($_GET['id'])) {

    $id = (int)ch($_GET['id']);

    if(isTopic($id)) {

        $info = isTopic($id);
        
        if(isset($_POST['create'])){
            if(!empty(trim($_POST['title'])) && !empty(trim($_POST['content']))) {

                $title = ch($_POST['title']);
                $content = ch($_POST['content']);

                if(createThread($title, $content, $userData['id'], $id, $info['cat_id'])) {
                    header('location: '.BASE_URL.'/topic.php?id='.$id);
                } else {
                    $error_msg = "Sorry, your post can not be added";
                }

            } else {
                $error_msg = "Fill correct information in the fields";
            }
        }

        $page_title = $info['name'] . ' - '.getSettings('site_title');
        include 'app/views/create.php';

    } else {
        header('location: '.BASE_URL.'/index.php');
    }
} else {
    header('location: '.BASE_URL.'/index.php');
}



?>