<?php
    include_once '../../util/connessioneDB.php';
    include_once '../../util/getPermessi.php';
    include_once '../../util/setPermessi.php';
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
                $permessi = leggiPermessi($obj);
                if($permessi)
                    gestisciPermessi($permessi);
                else
                    echo '{"status":"success","user":"user"}';
                $_SESSION['user'] = $obj;
                $_SESSION['permessi'] = $permessi;
            }
            else{
                 echo '{"status":"error","error":"password errata"}';
            }
        }
        $conn->close();
    }
    function leggiPermessi($obj){
        $permissionReader = new LeggiPermessi();
        return $permissionReader->leggi($obj->id); // == false ----> nessun permesso per l'utente
    }
    function gestisciPermessi($permessi){
          $permissionReader = new LeggiPermessi();
          $permissionWriter = new ScriviPermessi();
          if($permissionReader->controllaPermesso($permessi, $permissionWriter->segnalazioni('scrivi'))){
                echo '{"status":"success","user":"admin"}';
          }
          else{
                echo '{"status":"success","user":"user"}';
        }
    }
?>



