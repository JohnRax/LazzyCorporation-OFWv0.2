<?php

class Admin
{
	private $connection;
	function __construct($connection)
	{
		$this->connection=$connection;
	}
	public function login($username,$password)
	{
		try
		{
			$login_query="SELECT * FROM admin WHERE a_username=:user";
			$login_stmt=$this->connection->prepare($login_query);
			$login_stmt->execute(array(':user'=>$username));
			$userRow=$login_stmt->fetch(PDO::FETCH_ASSOC);
			if($login_stmt->rowCount() > 0)
			{
				if ($password==$userRow['a_password'])
				{
					$_SESSION['admin_session']=$userRow['a_id'];
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
	public function view_users()
	{

		try
		{
		 $view_user_query="SELECT * from user where u_type=:type or u_type=:type1";
         $view_user_stmt=$this->connection->prepare($view_user_query);
         $view_user_stmt->execute(array(':type'=>'agency',':type1'=>'candidate'));
         $result = $view_user_stmt->fetchAll();
  
		 return $result;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

			
	}
	public function delete_user($u_id)
	{
		
		try
		{
	        $remove_user_details_query="DELETE from user_details where u_id=:user_id";
	        $remove_user_details_stmt=$this->connection->prepare($remove_user_details_query);
	        $remove_user_details_stmt->execute(array(':user_id'=>$u_id));

	        $remove_user_professional_query="DELETE from user_professional_information where  u_id=:user_id";
	        $remove_user_professional_stmt=$this->connection->prepare($remove_user_professional_query);
	        $remove_user_professional_stmt->execute(array(':user_id'=>$u_id));

	        $remove_user_personal_query="DELETE from user_personal_information where  u_id=:user_id";
	        $remove_user_personal_stmt=$this->connection->prepare($remove_user_personal_query);
	        $remove_user_personal_stmt->execute(array(':user_id'=>$u_id));

	        $remove_user_job_query="DELETE from job_description where  u_id=:user_id";
	        $remove_user_job_stmt=$this->connection->prepare($remove_user_job_query);
	        $remove_user_job_stmt->execute(array(':user_id'=>$u_id));

	        $remove_user_query="DELETE from user where  u_id=:user_id";
	        $remove_user_stmt=$this->connection->prepare($remove_user_query);
	        $remove_user_stmt->execute(array(':user_id'=>$u_id));

        }
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	public function view_jobs()
	{
		try
		{
			$view_jobs_query="SELECT * from job_description WHERE j_status=:status or j_status=:status1";
			$view_jobs_stmt=$this->connection->prepare($view_jobs_query);
			$view_jobs_stmt->execute(array('status'=>'Unapproved','status1'=>'Approved'));
			$jobs=$view_jobs_stmt->fetchAll();

			return $jobs;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	public function delete_job($j_id)
	{
		try
		{
			$delete_job_query="DELETE FROM job_description WHERE j_id=:jid";
			$delete_job_stmt=$this->connection->prepare($delete_job_query);
			$delete_job_stmt->execute(array(':jid'=>$j_id));

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	public function approved_job($j_id)
	{
		try
		{
			$approved_job_query="UPDATE job_description SET j_status=:status WHERE j_id=:jid";
			$approved_job_stmt=$this->connection->prepare($approved_job_query);
			$approved_job_stmt->execute(array(':status'=>'Approved',':jid'=>$j_id));
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function view_candidate()
	{
		try
		{
			$view_candidate_query="SELECT 
									  a.*,
									  b.*,
									  c.* 
									FROM
									    user_details AS a 
									    JOIN user_personal_information AS b 
									      ON b.u_id = a.u_id 
									    JOIN user_professional_information AS c 
									      ON a.u_id = c.u_id 
									    WHERE b.up_status=:status or b.up_status=:status1";
			$view_candidate_stmt=$this->connection->prepare($view_candidate_query);
			$view_candidate_stmt->execute(array(':status'=>'Approved',':status1'=>'Unapproved'));
			$candidate=$view_candidate_stmt->fetchAll();

			return $candidate;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	public function view_candidate_professional_information($u_id)
	{		
		try
		{
			$view_professional_query="SELECT 
										  a.u_id,
										  a.u_lname,
										  a.u_fname,
										  b.up_picture,
										  c.* 
										FROM
										    user_details AS a 
										    JOIN user_personal_information AS b 
										      ON b.u_id = a.u_id 
										    JOIN user_professional_information AS c 
										      ON a.u_id = c.u_id 
    									WHERE a.u_id=:uid";
			$view_professional_stmt=$this->connection->prepare($view_professional_query);
			$view_professional_stmt->execute(array(':uid'=>$u_id));
			$professional=$view_professional_stmt->fetchAll();

			return $professional;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function view_candidate_experience_information($u_id)
	{
		try
		{
			$view_experience_query="SELECT 
									  a.u_id,
									  a.u_lname,
									  a.u_fname,
									  b.up_picture,
									  c.* 
									FROM
									    user_details AS a 
									    JOIN user_personal_information AS b 
									      ON b.u_id = a.u_id 
									    JOIN user_experience AS c 
									      ON a.u_id = c.u_id 
									       WHERE a.u_id=:uid";
			$view_experience_stmt=$this->connection->prepare($view_experience_query);
			$view_experience_stmt->execute(array(':uid'=>$u_id));
			$experience=$view_experience_stmt->fetchAll();

			return $experience;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function view_candidate_supplementary_information($u_id)
	{
		try
		{
			
			$view_question_query="SELECT 
									  a.u_id,
									  a.u_lname,
									  a.u_fname,
									  b.up_picture,
									  c.* 
									FROM
									    user_details AS a 
									    JOIN user_personal_information AS b 
									      ON b.u_id = a.u_id 
									    JOIN user_question AS c 
									      ON a.u_id = c.u_id 
									 WHERE a.u_id=:uid";
			$view_question_stmt=$this->connection->prepare($view_question_query);
			$view_question_stmt->execute(array(':uid'=>$u_id));
			$question=$view_question_stmt->fetchAll();

			return $question;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function delete_candidate($u_id)
	{
		try
		{
			$delete_candidate_query="DELETE FROM user_personal_information WHERE u_id=:uid";
			$delete_candidate_stmt=$this->connection->prepare($delete_candidate_query);
			$delete_candidate_stmt->execute(array(':uid'=>$u_id));

			$delete_candidate1_query="DELETE FROM user_professional_information WHERE u_id=:uid";
			$delete_candidate1_stmt=$this->connection->prepare($delete_candidate1_query);
			$delete_candidate1_stmt->execute(array(':uid'=>$u_id));

		    $delete_candidate2_query="DELETE FROM user_question WHERE u_id=:uid";
			$delete_candidate2_stmt=$this->connection->prepare($delete_candidate2_query);
			$delete_candidate2_stmt->execute(array(':uid'=>$u_id));


		    $delete_candidate3_query="DELETE FROM user_experience WHERE u_id=:uid";
			$delete_candidate3_stmt=$this->connection->prepare($delete_candidate3_query);
			$delete_candidate3_stmt->execute(array(':uid'=>$u_id));


		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function approved_candidate($u_id)
	{
		try
		{
			$approved_candidate_query="UPDATE user_personal_information SET up_status=:status WHERE u_id=:uid";
			$approved_candidate_stmt=$this->connection->prepare($approved_candidate_query);
			$approved_candidate_stmt->execute(array(':status'=>'Approved',':uid'=>$u_id));
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function is_loggedin()
	{
		if(isset($_SESSION['admin_session']))
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
        unset($_SESSION['admin_session']);
        return true;
	}
	

}

?>