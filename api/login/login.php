<?php
    include_once '../../util/connessioneDB.php';
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        header('Location /index.html');
        die();
    }
    if(!isset($_POST['login'])){
        header('Location /index.html');
        die();
    }
    $data = json_decode($_POST['login']);
    $user = $data->user;
    $pass = $data->pass;
    controllaLogin($user, $pass);
    
    function controllaLogin($user, $pass){
        $db = new Database();
        $conn = $db->getConnection();
        $sql = 'SELECT * FROM users WHERE user_name="'.$user.'";';
        $result = $conn->query($sql);
        if($result->num_rows <= 0){ //utente non trovato
            echo '{"status":"error","error":"user non trovato"}';
        }
        else{
            $obj = $result->fetch_object();
            if($obj->pass == $pass){
                 echo '{"status":"success"}';
            }
            else{
                 echo '{"status":"error","error":"password errata"}';
            }
        }
        $conn->close();
    }
?>