<?php 

require 'app/start.php';

session_unset();
session_destroy();

header('Location: '.BASE_URL);

?>