<?php
	
	session_start();
	$host = 'lazycompanydb.comfhxnalolh.ap-southeast-1.rds.amazonaws.com';
	$user = 'dblazyc0mpAnY';
	$password = 'lazYPr0p3rt1eS';
	$dbname='lazycorporation-ofwdatabase';
	try 
	{
	    $dsn = 'mysql:host='.$host.';dbname='.$dbname;
	    $connection = new PDO($dsn,$user,$password);
	    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	} 
	catch (PDOException $e) 
	{
	    echo 'Connection failed: '.$e->getMessage();
	}
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
	include_once 'class/class.user.php';
	$user = new User($connection);

?>