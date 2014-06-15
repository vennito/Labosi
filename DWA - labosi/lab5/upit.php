<?php

session_start();

if($_SESSION["login"] == "1"){
	
	if($_GET){
		
		$ime = $_GET["ime"];
		$prezime = $_GET["prezime"];
		
		$url = "http://stajp.vtszg.hr/~spredanic/DWA2/lab5/podaci.php";

		$result = file_get_contents($url);
		
		$data = json_decode($result, true);
		
		echo '
			<!DOCTYPE HTML>
			<html>
			<head>
				<title>Labos1</title>
				<link type="text/css" rel="stylesheet" href="css/style.css" /> 
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
							<center><a href="#">Stranica</a></center>
						</li>
					</ul>
				</div>
				<div id="trazi">
				<a href="upit.php">Povratak</a>
				<table>
				<tr>
				<td>Područni ured</td>
				<td>Šifra</td>
				<td>Naziv</td>
				<td>Broj</td>
				<td>Prezime</td>
				<td>Ime</td>
				<td>Osiguranik</td>
				<td>Br pošte</td>
				<td>Naz pošte</td>
				<td>Ulica</td>
				<td>Broj</td>
				<td>Grad</td>
				</tr>
				';
		if($ime != '' && $prezime != ''){
			foreach($data as $item){
				if(stripos($item[6], $ime) !== FALSE && stripos($item[5], $prezime) !== FALSE){
					echo '<tr>
							<td>'.$item[1].'</td>
							<td>'.$item[2].'</td>
							<td>'.$item[3].'</td>
							<td>'.$item[4].'</td>
							<td>'.$item[5].'</td>
							<td>'.$item[6].'</td>
							<td>'.$item[7].'</td>
							<td>'.$item[8].'</td>
							<td>'.$item[9].'</td>
							<td>'.$item[10].'</td>
							<td>'.$item[11].'</td>
							<td>'.$item[12].'</td>
					</tr>';
				}
			}
		}else if($ime != '' && $prezime == ''){
			foreach($data as $item){
				if(stripos($item[6], $ime) !== FALSE){
					echo '<tr>
							<td>'.$item[1].'</td>
							<td>'.$item[2].'</td>
							<td>'.$item[3].'</td>
							<td>'.$item[4].'</td>
							<td>'.$item[5].'</td>
							<td>'.$item[6].'</td>
							<td>'.$item[7].'</td>
							<td>'.$item[8].'</td>
							<td>'.$item[9].'</td>
							<td>'.$item[10].'</td>
							<td>'.$item[11].'</td>
							<td>'.$item[12].'</td>
					</tr>';
				}	
			}
		}else if($ime == '' && $prezime != ''){
			foreach($data as $item){
				if(stripos($item[5], $prezime) !== FALSE){
					echo '<tr>
							<td>'.$item[1].'</td>
							<td>'.$item[2].'</td>
							<td>'.$item[3].'</td>
							<td>'.$item[4].'</td>
							<td>'.$item[5].'</td>
							<td>'.$item[6].'</td>
							<td>'.$item[7].'</td>
							<td>'.$item[8].'</td>
							<td>'.$item[9].'</td>
							<td>'.$item[10].'</td>
							<td>'.$item[11].'</td>
							<td>'.$item[12].'</td>
					</tr>';
				}
			}
		}else if($ime == '' && $prezime == ''){
			foreach($data as $item){
				echo '<tr>
						<td>'.$item[1].'</td>
						<td>'.$item[2].'</td>
						<td>'.$item[3].'</td>
						<td>'.$item[4].'</td>
						<td>'.$item[5].'</td>
						<td>'.$item[6].'</td>
						<td>'.$item[7].'</td>
						<td>'.$item[8].'</td>
						<td>'.$item[9].'</td>
						<td>'.$item[10].'</td>
						<td>'.$item[11].'</td>
						<td>'.$item[12].'</td>
				</tr>';
			}
		}
				
		echo '
				</table></div>
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
				<title>Labos5</title>
				<link type="text/css" rel="stylesheet" href="css/style.css" /> 
				<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
				<script src="js/format.js"></script>
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
							<center><a href="#">Stranica</a></center>
						</li>
					</ul>
				</div>
				<div id="unos">
					<form action="upit.php" method="GET">
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
	echo '<script>alert(\'Zabranjen pristup!\');</script>';
	die('<script type="text/javascript">window.location=\'login.html\';</script>');
}
?>