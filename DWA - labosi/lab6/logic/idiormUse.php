<?php
require_once 'idiorm.php';

// podesite parametre za svoju bazu
ORM::configure('mysql:host=localhost;dbname=dwa');
ORM::configure('username', 'root');
ORM::configure('password', 'password');

// iduća linija je potrebna kako bi natjerali konekciju prema MySQL-u u utf8
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

