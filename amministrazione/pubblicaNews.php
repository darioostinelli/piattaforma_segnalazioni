<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Pubblica News</title>
    <link rel="stylesheet" type="text/css" href="../stili/styles.css">
    <link rel="stylesheet" type="text/css" href="../stili/news.css">
    <script src="../js/librerie/jquery.js"></script>
    <script src="../js/funzioni/pubblicaNewsFunctions.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
</head>
<?php
    include_once '../util/getPermessi.php';
	include_once '../util/setPermessi.php';
	include_once '../util/adminPageGenerator.php';
	 session_start();
     if(!isset($_SESSION['user']) || !isset($_SESSION['permessi'])){
		header("Location: index.html");
	}
	$permessi = $_SESSION['permessi'];
	$permissionReader = new LeggiPermessi();
	$permissionWriter = new ScriviPermessi();
	if(!$permissionReader->controllaPermesso($permessi, $permissionWriter->news('scrivi'))){
		header("Location: ../index.html");
	}
?>
<body>
<div id="pageBody">
    <div class="mainMenu">
        <div class="menuItem">Amministrazione</div>
        <div class="menuItem login" onclick="logout();">Logout</div>
    </div>
    <div class="newsFormWrapper">
        <div class="toolContainer">
            <input type="checkbox" value="evidenza" id="evidenza"><label for="evidenza">In evidenza</label>
            <div class="toolGroup">
                <button class="btnFormattazione" onclick="bold();"><b>G</b></button>
                <button class="btnFormattazione" onclick="italic();"><i>I</i></button>
                <button class="btnFormattazione" onclick="underline();"><u>S</u></button>
            </div>
        </div>
        <div class="textAreaContainer">
            <textarea>
                
            </textarea>
        </div>
    </div>
</div>
</body>
</html>
