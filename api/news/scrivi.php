<?php
    include_once '../../util/connessioneDB.php';
    include_once '../../util/fileWriter.php';
    include_once '../../util/getPermessi.php';
	include_once '../../util/setPermessi.php';
    session_start();
     if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('Location /index.html');
        die();
    }
    if(!isset($_POST['notizia']) || !isset($_SESSION['user'])){
        header('Location /index.html');
        die();
    }
    
    $notizia = json_decode($_POST['notizia']);
    $code = array("1","2","3","4","5","6","7","8","9","0","a","B","c","D","e","F","g");
   	shuffle($code);
    $codeShfl = implode("",$code);
    $file = substr($notizia->titolo,0,5).$codeShfl.".txt";
    
    $user = $_SESSION['user']->id;
    $titolo = $notizia->titolo;
    $evidenza = $notizia->evidenza;
    $sql = "INSERT INTO `news`(`user_id`, `titolo`, `file`, `evidenza`) VALUES (".$user.",'".$titolo."','".$file."',".$evidenza.")";
    $db = new Database();
    $conn = $db->getConnection();
    $result = $conn->query($sql);
   if(!$result){
   		die('{"status":"error"}');
   }
 	$myfile = fopen("../../file/news/".$file, "w");
	if(!fwrite($myfile, $notizia->testo)){
		echo "non riesco a scrivere";
	}
	fclose($myfile);
    echo $file;
    
?>