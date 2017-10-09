<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Admin Home</title>
	<script src="js/funzioni/adminHomeFunctions.js"></script>
	 <link rel="stylesheet" type="text/css" href="stili/styles.css">
    <script src="js/librerie/jquery.js"></script>
    <script src="js/librerie/lodash.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
</head>

<body>
<?php
	include_once './util/getPermessi.php';
	include_once './util/setPermessi.php';
	include_once './util/adminPageGenerator.php';
	 session_start();
	if(!isset($_SESSION['user']) || !isset($_SESSION['permessi'])){
		header("Location: index.html");
	}
	$permessi = $_SESSION['permessi'];
	$permissionReader = new LeggiPermessi();
	$permissionWriter = new ScriviPermessi();
	if(!$permissionReader->controllaPermesso($permessi, $permissionWriter->segnalazioni('leggi'))){
		header("Location: index.html");
	}
	$pageGenerator = new AdminPage($permessi);
?>
	<div class="mainMenu">
		<?php
			$pageGenerator->generaMenu();
		?>
	</div>
</body>
</html>
