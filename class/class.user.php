<?php

class User
{
	private $connection;
	function __construct($connection)
	{
		$this->connection=$connection;
	}
	public function register($type,$email,$mobile,$password,$lastname,$firstname,$gender)
	{
		try
		{
			$new_password=password_hash($password,PASSWORD_DEFAULT);
			$register_query="INSERT INTO user (u_password, u_email,u_mobile, u_type) 
						  VALUES(:password,:email,:mobile,:type)";
			$register_stmt=$this->connection->prepare($register_query);
			$register_stmt->execute([':password'=>$new_password, 'email'=>$email, 'mobile'=>$mobile,'type'=> $type]);
			$id=$this->connection->lastInsertId();

			$details_query="INSERT INTO user_details (u_id,u_lname,u_fname,u_gender)
							VALUES (:id,:lastname,:firstname,:gender)";
			$details_stmt=$this->connection->prepare($details_query);
			$details_stmt->execute(['id'=> $id,'lastname'=>$lastname,'firstname'=>$firstname,'gender'=>$gender]);

			return $type;
		}
		catch(PDOException $e) 
		{
			echo $e->getMessage();
		}

	}
	public function login($email,$password)
	{
		try
		{
			$login_query="SELECT * FROM user WHERE u_email=:email or u_mobile=:email";
			$login_stmt=$this->connection->prepare($login_query);
			$login_stmt->execute(['email'=>$email]);
			$userRow=$login_stmt->fetch(PDO::FETCH_ASSOC);
		
			if($login_stmt->rowCount() > 0)
			{
				if (password_verify($password,$userRow['u_password'])) 
				{
					$_SESSION['user_session']=$userRow['u_id'];
					$_SESSION['user_type']=$userRow['u_type'];
					return true;
				}
				else
				{
					return false;
				}
			}
			
	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
     	{
         return true;
      	}
	}
	public function redirect($url)
	{
		 header("Location: $url");

	}
	public function logout()
	{
		session_destroy();
        unset($_SESSION['user_session']);
        unset($_SESSION['user_type']);
        return true;
	}
	public function post_profile()
	{

	}
	public function view_jobs()
	{

	}

}

?>