<?php
			
$ime 			= $_POST["ime"];
$prezime 		= $_POST["prezime"];
$spol 			= $_POST["spol"];
$datum 			= $_POST["datum"];
$adresa 		= $_POST["adresa"];
$krv1			= $_POST["krv"];
$krv2 			= $_POST["krv2"];
$krv 			= $_POST["krv"].$_POST["krv2"];
$tegobe 		= $_POST["tegobe"];
$tegobeinfo 	= $_POST["tegobeinfo"];
$alergija 		= $_POST["alergija"];
$alergijainfo 	= $_POST["alergijainfo"];
		
if(!empty($ime) && !empty($prezime) && !empty($spol) && !empty($datum) && !empty($adresa) && !empty($tegobe) && !empty($alergija)){
	if($spol != 'M' && $spol != 'Ž'){
		echo '<script>alert(\'Pogrešan unos spola!\');</script>';
		die('<script type="text/javascript">window.location=\'unos\';</script>');
	}else if(!preg_match('(([1-9]|0[1-9]|[12][0-9]|3[01])[-\.]([1-9]|0[1-9]|1[012])[-\.](19|20)\d\d)', $datum)){
		echo '<script>alert(\'Pogrešan unos datuma!\');</script>';
		die('<script type="text/javascript">window.location=\'unos\';</script>');
	}else if($krv1 != 'A' && $krv1 != 'B' && $krv1 != 'AB' && $krv1 != '0' && $krv2 != '-' && $krv2 != '+'){
		echo '<script>alert(\'Pogrešan unos krvne grupe!\');</script>';
		die('<script type="text/javascript">window.location=\'unos\';</script>');
	}else if($tegobe != 'da' && $tegobe != 'ne'){
		echo '<script>alert(\'Pogrešan odabir tegobe!\');</script>';
		die('<script type="text/javascript">window.location=\'unos\';</script>');
	}else if($tegobe == 'da' && empty($tegobeinfo)){
		echo '<script>alert(\'Niste unjeli opis tegobe!\');</script>';
		die('<script type="text/javascript">window.location=\'unos\';</script>');
	}else if($alergija != 'da' && $alergija != 'ne' && $alergija != 'nezna'){
		echo '<script>alert(\'Pogrešan odabir alergije!\');</script>';
		die('<script type="text/javascript">window.location=\'unos\';</script>');
	}else if($alergija == 'da' && empty($alergijainfo)){
		echo '<script>alert(\'Niste unjeli opis alergije!\');</script>';
		die('<script type="text/javascript">window.location=\'unos\';</script>');
	}else{
		$app->view()->setData('ime', $ime);
		$app->view()->setData('prezime', $prezime);
		$app->view()->setData('spol', $spol);
		$app->view()->setData('datum', $datum);
		$app->view()->setData('adresa', $adresa);
		$app->view()->setData('krv', $krv);
		$app->view()->setData('tegobe', $tegobe);
		$app->view()->setData('tegobeinfo', $tegobeinfo);
		$app->view()->setData('alergija', $alergija);
		$app->view()->setData('alergijainfo', $alergijainfo);
	}
}else{
	echo '<script>alert(\'Nepotpuni podaci!\');</script>';
	die('<script type="text/javascript">window.location=\'unos\';</script>');
}
include_once('util.php');

