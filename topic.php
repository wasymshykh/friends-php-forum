<?php 

include 'app/start.php';
include 'app/functions.php';

if($userLogged){ 
    if(isset($_GET['id'])) {

        $id = (int)ch($_GET['id']);

        $page = isset($_GET['page']) ? (int)ch($_GET['page']) : 1;

        $perPage = 5;
        $startAt = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        $total = $db->query("SELECT * from `threads`");
        $total = $total->rowCount();
        
        $pages = ceil($total / $perPage);
        

        if(isTopic($id)) {
            $info = isTopic($id);
            $page_title = $info['name'] . ' - '.getSettings('site_title');
            include 'app/views/topic.php';

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