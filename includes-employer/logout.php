<?php 
	include_once 'includes/connection.php';
	if($user->logout())
	{
		$user->redirect('index.php');
	}

 ?>