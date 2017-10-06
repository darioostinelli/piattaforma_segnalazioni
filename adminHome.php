<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Admin Home</title>
	<script src="js/funzioni/adminHomeFunctions.js"></script>
</head>

<body>

<?php
	include_once './util/getPermessi.php';
	include_once './util/setPermessi.php';
	 session_start();
	if(!isset($_SESSION['user']) || !isset($_SESSION['permessi'])){
		header("Location: index.html");
	}
	$permessi = $_SESSION['permessi'];
	$permissionReader = new LeggiPermessi();
	$permissionWriter = new ScriviPermessi();
	if(!$permissionReader->controllaPermesso($permessi, $permissionWriter->segnalazioni('scrivi'))){
		header("Location: index.html");
	}
	
?>

</body>
</html>
