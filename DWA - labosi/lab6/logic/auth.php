<?php

$req = $app->request()->post();

// VALIDACIJA na serverskoj strani se vrši GUMP klasom (https://github.com/Wixel/GUMP),
// dok je na klijentskoj strani za to zadužen jQuery Validation plugin (http://bassistance.de/jquery-plugins/jquery-plugin-validation/)
require ROOT . 'lib/gump.class.php';

$gump = new GUMP();

$postData = $gump->sanitize($req); // You don't have to sanitize, but it's safest to do so.

$gump->validation_rules(array(
    'username'    => 'required|alpha_numeric|min_len,4',
    'password'    => 'required|alpha_numeric|min_len,8',
));

$gump->filter_rules(array(
    'username'    => 'trim|sanitize_string',
    'password'       => 'trim|sanitize_string',
));

$validated_data = $gump->run($postData);

if ($validated_data !== FALSE) {
    var_dump($validated_data);
    
/* 	$ptn = "/^[a-zA-Z0-9]{4,}/";
    $str = $validated_data['username'];
    preg_match($ptn, $str, $matches);
    
    if (count($matches)==0) {
        $validated_data=NULL;
    } */
	
	include_once('idiormUse.php');

	$upit = ORM::for_table('users')->where('username', $validated_data['username'])->where('password', md5($validated_data['password']))->count();
	
	if ($upit == 0) {
        $validated_data=NULL;
    }
}
var_dump($validated_data);
if($validated_data === false) {
    echo $gump->get_readable_errors(true);
} else {
  //  print_r($validated_data); // validation successful
    $_SESSION['user']=$validated_data['username'];
}

