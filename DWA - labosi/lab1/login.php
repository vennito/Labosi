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
				<center><a href="#">Stranica</a></center>

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
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
		</ul>
	</div>
	<div id="main">
		<center><h2>Zivotopis</h2></center>
		<h3>Osobni podaci:</h3>
		<p>Valentino Vranekovic</p>
		<p>Zagreb 18.2.1993</p>
		<h3>Podaci o skolovanju:</h3>
		<p>OS Bogumil Toni</p>
		<p>Tehnicar za racunalstvo</p>
		<p>TVZ Racunarstvo</p>
		<h3>Radno iskustvo:</h3>
		<p>Imam - Hrvatski Telekom</p>
		<h3>Znanja i vještine</h3>
		<p>Razno</p>
	</div>
	<div id="footer">
		<center><p>Copyright ZKD, 2014</p></center>
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
				<center><a href="#">Stranica</a></center>

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
		<a href="#osobni">Osobni podaci</a> 
		<a href="#skolovanje">Školovanje</a> 
		<a href="#iskustvo">Rano iskustvo</a> 
		<a href="#znanja">Znanja</a> 
		<h3><a id="osobni">Osobni podaci:</a></h3>
		<p>Valentino Vranekovic</p>
		<p>Zagreb 18.02.1993.</p>
		<h3><a id="skolovanje">Podaci o školovanju:</a></h3>
		<p>OŠ Bogumil TOni</p>
		<p>Tehnicar za racunalstvo</p>
		<p>TVZ Racunarstvo</p>
		<h3><a id="iskustvo">Radno iskustvo:</a></h3>
		<p>Ima - HT</p>
		<h3><a id="znanja">Znanja i vještine</a></h3>
		<p>Razno</p>
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