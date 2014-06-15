<?php
session_start();
if($_POST){
	if($_POST["username"] == "admin" AND $_POST["password"] == "password"){
		$_SESSION["login"] = "1";
		$_SESSION["name"] = $_POST["username"];
		echo '
<html>
<head>
	<title>Labos1</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/sakri.js"></script>
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
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
		</ul>
	</div>
	<div id="reklama">
			<img id="reklama" alt="reklama" src="slike/slika.jpg"/>
			<img id="close" alt="close" src="slike/iconx.png"/>
	</div>
	<div id="main">
		<center><h2>Životopis</h2></center>
		<h3 class="test">Osobni podaci:</h3>
		<div id="osobnipodaci">

		<p>Valentino Vranekovic</p>
		<p>Zagreb 18.2.1993</p>
		</div>
		<h3 class="test">Podaci o skolovanju:</h3>
		<div id="skolovanje">
		<p>OS Bogumil Toni</p>
		<p>Tehnicar za racunalstvo</p>
		<p>TVZ Racunarstvo</p>
		</div>
		<h3 class="test">Radno iskustvo:</h3>
		<div id="iskustvo">
		<p>Imam - Hrvatski Telekom</p>
		</div>
		<h3 class="test">Znanja i vještine</h3>
		<div id="znanje">
		<p>Razno</p>
		</div>
	</div>
	<div id="footer">
		<center><p>Copyright ZKD, 2014</p></center>
	</div>
	<div id="reklama">
			<img id="close" alt="close" src="slike/iconx.png"/>
			<img id="reklama" alt="reklama" src="slike/slika.jpg"/>
	</div>
</body>
</html>
		';
	}else{
		echo '<script>alert(\'Pogresno korisnicko ime ili lozinka!\');</script>';
	die('<script type="text/javascript">window.location=\'login.html\';</script>');
	}
}else if($_GET){
	$_SESSION["login"] = "0";
	$_SESSION["name"] = "";
	die('<script type="text/javascript">window.location=\'login.html\';</script>');
}else if($_SESSION["login"] == "1"){
	echo '
<html>
<head>
	<title>Labos1</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/sakri.js"></script>
</head>
<body>
	<div id="reklama">
		<div>
			<img id="reklamaslika" alt="reklama" src="slike/reklama.jpg"/>
			<img id="close" alt="close" src="slike/iconx.png"/>
		</div>
	</div>
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
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
		</ul>
	</div>
	<div id="main">
		<center><h2>Životopis</h2></center>
		<h3 class="test">Osobni podaci:</h3>
		<div id="osobnipodaci">
			<p>Valentino Vranekovic</p>
			<p>Zagreb 18.2.1993.</p>
		</div>
		<h3 class="test">Podaci o skolovanju:</h3>
		<div id="skolovanje">
		<p>OS Bogumil Toni</p>
		<p>Tehnicar za racunalstvo</p>
		<p>TVZ Racunarstvo</p>
		</div>
		<h3 class="test">Radno iskustvo:</h3>
		<div id="iskustvo">
		<p>Ima - HT</p>
		</div>
		<h3 class="test">Znanja i vještine</h3>
		<div id="znanje">
		<p>Razno</p>
		</div>
	</div>
	<div id="footer">
		<center><p>Copyright ZKD, 2014</p></center>
	</div>
</body>
</html>
		';
}else{
	echo '<script>alert(\'Zabranjen pristup!\');</script>';
	die('<script type="text/javascript">window.location=\'login.html\';</script>');
}
?>