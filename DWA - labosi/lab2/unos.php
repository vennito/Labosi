<?php
session_start();
if($_SESSION["login"] == "1"){
	if($_POST){
	}else{
		echo '
<!DOCTYPE HTML>
<html>
<head>
	<title>Labos1</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" /> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/format.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
	<script>
		jQuery(function($){
			$("#datum").mask("99.99.9999.");
			$("#tegobe1, #tegobe2").change(function () {
				if($("#tegobe1").is(":checked")){
					$("#tegobeinfo").css({"visibility": "visible", "display": "inline"});
				}else{
					$("#tegobeinfo").css({"visibility": "hidden", "display": "none"});
				}
			});
			$("#alergija1, #alergija2, #alergija3").change(function () {
				if($("#alergija1").is(":checked")){
					$("#alergijainfo").css({"visibility": "visible", "display": "inline"});
				}else{
					$("#alergijainfo").css({"visibility": "hidden", "display": "none"});
				}
			});
			$("#submit").click(function(){
				if($("#ime").val().length < 3){
					alert("Upisite ime!");
					return false;
				}else if($("#prezime").val().length < 3){
					alert("Upisite prezime!");
					return false;
				}else if($("#adresa").val().length < 8){
					alert("Upisite adresu!");
					return false;
				}else if($("#datum").val().length < 11){
					alert("Upisite datum rođenja!");
					return false;
				}else if($("#tegobe1").is(":checked") && $("#tegobeinfotext").val().length < 3){
					alert("Upisite tegobe!");
					return false;
				}else if($("#alergija1").is(":checked") && $("#alergijainfotext").val().length < 3){
					alert("Upisite alergije!");
					return false;
				}
			});
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
	<div id="unos">
		<form action="unos.php" method="POST">
			<label for="ime">Ime:</label><br />
			<input type="text" name="ime" id="ime" /><br />
			<label for="prezime">Prezime:</label><br />
			<input type="text" name="prezime" id="prezime" /><br />
			<label for="spol">Spol:</label><br />
			<input type="radio" name="spol" value="M" checked>M
			<input type="radio" name="spol" value="Ž">Ž<br />
			<label for="datum">Datum rođenja:</label><br />
			<input type="date" name="datum" id="datum"><br />
			<label for="adresa">Adresa i mjesto stanovanja:</label><br />
			<input type="text" name="adresa" id="adresa" /><br />
			<label for="krv">Krvna grupa(nije obavezno):</label><br />
			<input type="radio" name="krv" value="A">A
			<input type="radio" name="krv" value="B">B
			<input type="radio" name="krv" value="AB">AB
			<input type="radio" name="krv" value="0">0
			<input type="radio" name="krv2" value="+">+ (pos)
			<input type="radio" name="krv2" value="-">- (neg)<br />
			<label for="tegobe">Ima li prijašnjih medicinskih tegoba (srčane tegobe, tlak, virusne bolesti (Hepatits, HIV))</label><br />
			<input type="radio" name="tegobe" id="tegobe1" value="da">Da
			<input type="radio" name="tegobe" id="tegobe2" value="ne" checked>Ne<br />
			<span id="tegobeinfo">
			<label for="tegobeinfo">Koje tegobe:</label><br />
			<input type="text" name="tegobeinfo" id="tegobeinfotext"/><br />
			</span>
			<label for="alergija">Jeste li alergični na lijekove:</label><br />
			<input type="radio" name="alergija" id="alergija1" value="da">Da
			<input type="radio" name="alergija" id="alergija2" value="ne" checked>Ne
			<input type="radio" name="alergija" id="alergija3" value="nezna">Ne znam<br />
			<span id="alergijainfo">
			<label for="alergijainfo">Na koje lijekove ste alergični:</label><br />
			<input type="text" name="alergijainfo" id="alergijainfotext"/><br />
			</span>
			<input type="submit" name="submit" id="submit" value="Pošalji" />
			
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