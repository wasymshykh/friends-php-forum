<?php

ini_set('display_errors', 'On');
date_default_timezone_set("Asia/Karachi");

try {
    $db = new PDO('mysql: host=localhost;dbname=forum', 'root', '');
} catch (Exception $e) {
    echo 'Unable to connect to db' . $e;
    die();
}

// getting site settings from db
function getSettings($name){
    global $db;
        $site_settings = $db->prepare('SELECT * FROM site_settings WHERE name = :name');
        $site_settings->execute(['name'=>$name]);
        $site_settings = $site_settings->fetch(PDO::FETCH_ASSOC);
    return $site_settings['value'];
}

define('APP_URL', __DIR__);
define('BASE_URL', getSettings('site_url'));
define('VIEWS_URL', APP_URL . '/views');

session_start();

if(!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false;
}

if(isset($_SESSION['logged_in'])) {
    if($_SESSION['logged_in'] == true) {
        $userLogged = $_SESSION['logged_in'];
        $userData = $_SESSION['data'];
    } else {
        $userLogged = false;
    }
}
