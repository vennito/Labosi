<?php
session_start();
if($_SESSION["login"] == "1"){
	include 'excel_reader.php';
	$excel = new PhpExcelReader;
	$excel->setOutputEncoding('UTF-8');
	$excel->read('podaci.xls');
	$sheet = $excel->sheets[0];
	echo '
<html>
<head>
	<title>Labos1</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" /> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/tablica.js"></script>
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
		<input type="text" id="search" placeholder="Pretraži">
		<table id="table"><tbody>';
		foreach($sheet['cells'] as $index => $cell){
			if($index <= 21){
				echo '<tr>';
				foreach($cell as $data){
					echo '<td>';
					echo $data;
					echo '</td>';
				}
				echo '</tr>';
			}
		}
		echo '
		</tbody></table>
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