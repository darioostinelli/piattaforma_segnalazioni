<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>News</title>
	<link rel="stylesheet" type="text/css" href="stili/styles.css">
	<link rel="stylesheet" type="text/css" href="stili/news.css">
    <script src="js/librerie/jquery.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
</head>
<?php
	include_once './util/connessioneDB.php';
	include_once './util/fileReader.php';
	if(!isset($_GET['new'])){
		header('Location index.html');
	}
	$id = $_GET['new'];
	$new = getNew($id);
	$testo = "impossibile caricare il testo della notizia";
	if($new){
		$testo = getTestoNew($new);
	}
?>
<body style=" background: silver;">
<div class="newContainer">
	<div class="newHead">
		<h1><?php echo $new->titolo ?></h1>
		<p></p><span><?php echo $new->user_name ?></span><span class="data"><?php echo $new->data ?></span></p>
	</div>
	<div class="testo">
		<?php echo $testo ?>
	</div>
	
</div>
<?php
if($new){
	echo '<div class="footer"></div>';
	}
?>
</body>
</html>

<?php
	function getNew($id){
		$db = new Database();
		$conn = $db->getConnection();
		$sql = "SELECT data, titolo, file, evidenza, user_name FROM news,users WHERE news.id=".$id." AND news.user_id = users.id";
		$result = $conn->query($sql);
		if($result->num_rows <= 0){
			return false;
		}
		else {
			$obj = $result->fetch_object();
			return $obj;
		}
	}
	function getTestoNew($new){
		$fileReader = new FileReader("file/news/".$new->file);
		return $fileReader->leggi();
	}
?>