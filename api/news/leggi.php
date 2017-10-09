<?php
    include_once '../../util/connessioneDB.php';
     if($_SERVER['REQUEST_METHOD'] != 'GET'){
        header('Location /index.html');
        die();
    }
    if(!isset($_GET['news'])){
        header('Location /index.html');
        die();
    }
    $db = new Database();
    $conn = $db->getConnection();
    $sql = "SELECT news.id,data,user_name,titolo,evidenza FROM news, users WHERE news.user_id=users.id";
    $result = $conn->query($sql);
    $list = array();
    if($result->num_rows <= 0){
        echo '{"status":"error","error":"nessuna notizia disponibile"}';
    }
    else {
         while($obj = $result->fetch_object()){
                    array_push($list, $obj);
                }
        echo json_encode($list);
    }
    $conn->close();
?>