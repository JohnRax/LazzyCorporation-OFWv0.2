<?php 
	include_once 'includes/connection.php';
	if($admin->logout())
	{
		$admin->redirect('index.php');
	}

 ?>