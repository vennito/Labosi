<?php

error_reporting(E_ALL);
ini_set('display_errors','On');

session_start();

if($_SESSION["login"] == "1"){

	if($_POST){
		
		define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
		require('includes/classes/class.Database.php');
		
		$Database = new Database();
		
		$ime 			= $Database->sql_escape($_POST["ime"]);
		$prezime 		= $Database->sql_escape($_POST["prezime"]);

		$result = $Database->fetchquery("SELECT * FROM bolesni WHERE ime LIKE '%".$ime."%' AND prezime LIKE '%".$prezime."%';");
		$data = json_encode($result);
		echo '
				<!DOCTYPE HTML>
				<html>
				<head>
					<title>Labos1</title>
					<link type="text/css" rel="stylesheet" href="css/style.css" /> 
					<meta http-equiv="content-type" content="text/html; charset=utf-8">
					<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
					<script>
						$( document ).ready(function() {
							var data = \''.$data.'\';
							var obj = jQuery.parseJSON(data);
							var i = 0;
							$("#broj").replaceWith("Broj #"+i);
						});
					</script>
				</head>
				<body>	
					<div id="header">
						<img alt="ZKD" src="slike/logo.png"/>
						<p id="name">Korisnicko ime: <b>'.$_SESSION["name"].'</b></p>
						<form action="login.php" method="GET" name="odjava">
							<input type="submit" name="submit" value="Odjava" id="odjava" />
						</form>
					</div>
					<div id="navigacija">
						<ul id="lista">
							<li>
								<center><a href="login.php">Životopis</a></center>
							</li>
							<li>
								<center><a href="tablica.php">Pacijenti</a></center>
							</li>
							<li>
								<center><a href="unos.php">Upis pac</a></center>
							</li>
							<li>
								<center><a href="pdf.php">Pretraga</a></center>
							</li>
							<li>
								<center><a href="upit.php">Traži</a></center>
							</li>
							<li>
								<center><a href="json.php">JSON</a></center>
							</li>
						</ul>
					</div>
					<div id="unos">
						<p id="broj">test</p>
						<p id="ime">prazno</p>
						<p>Prezime:</p>
						<p>Spol: </p>
						<p>Krv: </p>
					</div>
					<div id="footer">
						<center><p>Copyright ZKD, 2014</p></center>
					</div>
				</body>
				</html>
		';
	}else{
		echo '
<!DOCTYPE HTML>
<html>
<head>
	<title>Labos1</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" /> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
</head>
<body>	
	<div id="header">
		<img alt="ZKD" src="slike/logo.png"/>
		<p id="name">Korisnicko ime: <b>'.$_SESSION["name"].'</b></p>
		<form action="login.php" method="GET" name="odjava">
			<input type="submit" name="submit" value="Odjava" id="odjava" />
		</form>
	</div>
	<div id="navigacija">
		<ul id="lista">
			<li>
				<center><a href="login.php">Životopis</a></center>
			</li>
			<li>
				<center><a href="tablica.php">Pacijenti</a></center>
			</li>
			<li>
				<center><a href="unos.php">Upis pac</a></center>
			</li>
			<li>
				<center><a href="pdf.php">Pretraga</a></center>
			</li>
			<li>
				<center><a href="upit.php">Traži</a></center>
			</li>
			<li>
				<center><a href="json.php">JSON</a></center>
			</li>
		</ul>
	</div>
	<div id="unos">
		<form action="json.php" method="POST">
			<label for="ime">Ime:</label><br />
			<input type="text" name="ime" id="ime" /><br />
			<label for="prezime">Prezime:</label><br />
			<input type="text" name="prezime" id="prezime" /><br />
			<input type="submit" id="submit" value="Pošalji" />
			
		</form>
	</div>
	<div id="footer">
		<center><p>Copyright ZKD, 2014</p></center>
	</div>
</body>
</html5>
		';
	}
}else{
	echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
	echo '<script>alert(\'Zabranjen pristup!\');</script>';
	die('<script type="text/javascript">window.location=\'login.html\';</script>');
}
?>