<?php 

include 'app/start.php';
include 'app/functions.php';


if(isset($_GET['id'])) {

    $id = (int)ch($_GET['id']);

    if(checkUserId($id)) {

        $userBase = checkUserId($id);
        $page_title = $userBase['username'] . ' - '.getSettings('site_title');

        $last_login = (findLastLogin($id)) ? convertDate(findLastLogin($id), "d M, Y")." at ".convertDate(findLastLogin($id), "h:i A") : "Not logged in yet";

        include 'app/views/profile.php';


    } else {
        header('location: '.BASE_URL.'/index.php');
    }
} else {
    header('location: '.BASE_URL.'/index.php');
}

?>