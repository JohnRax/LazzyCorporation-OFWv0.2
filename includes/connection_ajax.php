<?php
	
	session_start();
	$host = 'localhost';
	$user = 'root';
	$password = '';
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
	

	include_once '../class/class.user.php';
	$user = new User($connection);

?>