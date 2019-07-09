<?php

include '../app/start.php';
include '../app/admin_functions.php';
include '../app/functions.php';

if($userLogged && $userData['user_group'] == 3) {
    
    if(!empty($_POST['add_group'])) {

        $key = ch($_POST['group_key']);
        $name = ch($_POST['group_name']);
        $bg = ch($_POST['group_bg']);
        $text = ch($_POST['group_text']);

        if(!empty($key) && !empty($name) && !empty($bg) && !empty($text)) {
            
            if(insertGroup($key, $name, $bg, $text)) {
                $addSuccess = "User group successfull added!";
            } else {
                $addError = "Fill all the fields properly";
            }

        } else {
            $addError = "Fill all the fields properly";
        }
        
    }
    
    if(!empty($_POST['ug_update'])) {

        $group_id = ch($_POST['ug_id']);
        $key = ch($_POST['ug_key']);
        $name = ch($_POST['ug_name']);
        $bg = ch($_POST['ug_bg']);
        $text = ch($_POST['ug_text']);

        if(!empty($key) && !empty($name) && !empty($bg) && !empty($text)) {
            
            if(upadateGroup($group_id, $key, $name, $bg, $text)) {
                $success_msg = "User group successfull added!";
            } else {
                $error_msg = "User group couldn't be updated";
            }

        } else {
            $error_msg = "User group couldn't be updated";
        }
        
    }

    $page_title = "Users Group - ".getSettings('site_title');
    include VIEWS_URL.'/admin/users_groups.php';

} else {
    header('location: '.BASE_URL.'/index.php');
}


?>