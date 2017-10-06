<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        header('Location /index.html');
        die();
    }
    if(!isset($_POST['logout'])){
        header('Location /index.html');
        die();
    }
    session_start();
    session_unset();
    session_destroy();
?>