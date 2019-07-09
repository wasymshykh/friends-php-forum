<?php 

include 'app/start.php';
include 'app/functions.php';

if($userLogged){ 
        
    if(isset($_GET['id'])) {

        $id = (int)ch($_GET['id']);

        if(isCategory($id)) {
            $info = isCategory($id);
            $page_title = $info['name'] . ' - '.getSettings('site_title');
            include 'app/views/category.php';

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