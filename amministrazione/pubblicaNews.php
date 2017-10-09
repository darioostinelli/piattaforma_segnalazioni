<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Pubblica News</title>
    <link rel="stylesheet" type="text/css" href="../stili/styles.css">
    <script src="../js/librerie/jquery.js"></script>
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



</body>
</html>
