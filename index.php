<?php 

include 'app/start.php';
include 'app/functions.php';

if($userLogged){ 
    $page_title = getSettings('site_title');
    include 'app/views/home.php';
} else {
    header('location: '.BASE_URL.'/login.php');
}
?>