<?php
error_reporting(E_ALL);

session_start();


if($_SESSION["login"] == "1" or 1){
	
	if($_POST){
	
		define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
		require('includes/classes/class.Database.php');
		
		$Database = new Database();
		
		$ime 			= $Database->sql_escape($_POST["ime"]);
		$prezime 		= $Database->sql_escape($_POST["prezime"]);
		$krv 			= $Database->sql_escape($_POST["krv"]);
		
		if(!empty($ime) || !empty($prezime) || !empty($krv)){
			$query = "SELECT * FROM bolesni WHERE ";
			if(!empty($ime))
				$query .= "ime = '".$ime."'";
			if(!empty($prezime))
				$query .= " AND prezime = '".$prezime."'";
			if(!empty($krv))
				$query .= " AND krvnagrupa = '".$krv."'";
			$rez = $Database->fetchquery($query);
		
			// Include the main TCPDF library (search for installation path).
			require_once('includes/libs/tcpdf/tcpdf.php');

			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Website');
			$pdf->SetTitle('Pretraga');
			$pdf->SetSubject('Bolesnici');
			$pdf->SetKeywords('TCPDF, PDF, pretraga, pacijenti, bolesnici');

			// set default header data
			$pdf->SetHeaderData('', '', 'Pretraga', 'Rezultat pretrage', array(0,64,255), array(0,64,128));
			$pdf->setFooterData(array(0,64,0), array(0,64,128));

			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			// set default font subsetting mode
			$pdf->setFontSubsetting(true);

			// Set font
			// dejavusans is a UTF-8 Unicode font, if you only need to
			// print standard ASCII chars, you can use core fonts like
			// helvetica or times to reduce file size.
			$pdf->SetFont('dejavusans', '', 10, '', true);

			// Add a page
			// This method has several options, check the source code documentation for more information.
			$pdf->AddPage();

			// set text shadow effect
			$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

			// Set some content to print
			$data = '';
			 foreach($rez as $red){
				 $data .= "<tr>";
				foreach($red as $stup){
					$data .= "<td>".$stup."</td>";
				}
				$data .= "</tr>";
			}
			
			$html = "
<h1>Pretraga</h1>
<table>
	<tr>
		<td>ime</td>
		<td>prezime</td>
		<td>spol</td>
		<td>datum rođenja</td>
		<td>adresa</td>
		<td>krvna grupa</td>
		<td>tegobe</td>
		<td>opis tegoba</td>
		<td>alergije</td>
		<td>opis alergija</td>
	</tr>
	".$data."
</table>
";
			
			$pdf->writeHTML($html, true, false, true, false, '');

			// ---------------------------------------------------------

			// Close and output PDF document
			// This method has several options, check the source code documentation for more information.
			$pdf->Output('pretraga.pdf', 'I');
			
		}else{
			echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
			echo '<script>alert(\'Pogrešan unos!\');</script>';
			die('<script type="text/javascript">window.location=\'pdf.php\';</script>');
		}
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
				<center><a href="#">Stranica</a></center>
			</li>
		</ul>
	</div>
	<div id="unos">
		<form action="pdf.php" method="POST">
			<label for="ime">Ime:</label><br />
			<input type="text" name="ime" id="ime" /><br />
			<label for="prezime">Prezime:</label><br />
			<input type="text" name="prezime" id="prezime" /><br />
			<label for="krv">Krvna grupa:</label><br />
			<input type="text" name="krv"><br />
			<input type="submit" name="submit" id="submit" value="Pretraži" />
			
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