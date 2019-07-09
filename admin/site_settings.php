<?php

include '../app/start.php';
include '../app/admin_functions.php';
include '../app/functions.php';

if($userLogged && $userData['user_group'] == 3) {

    if(!empty($_POST['settings_update'])) {
       
        
        $url = ch($_POST['site_url']);
        $title = ch($_POST['site_title']);
        $image_type = ch($_POST['image_type']);
        $default_user = ch($_POST['default_user']);
        $default_confirmed = ch($_POST['default_confirmed']);
        
        if(!empty($url) && !empty($title) && !empty($image_type) && !empty($default_user)){

            if(updateSettings('site_url', $url) 
            && updateSettings('site_title', $title) 
            && updateSettings('image_accepted', $image_type) 
            && updateSettings('default_usergroup', $default_user) 
            && updateSettings('default_confirmed', $default_confirmed)) {
                $success_msg = "Settings successfully Updated";
            } else {
                $error_msg = "Sorry, couldn't update settings";
            }

        } else {
            $error_msg = "Sorry, fill all details properly & submit again";
        }

    }
        
    $page_title = "Admin - ".getSettings('site_title');

    include VIEWS_URL.'/admin/site_settings.php';

} else {
    header('location: '.BASE_URL.'/index.php');
}


?>