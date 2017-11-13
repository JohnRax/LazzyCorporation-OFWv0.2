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
	public function post_profile_personal_information($id,$picture,$category,$email,$location,$mobile,$telephone,$nationality,$religion,$age,$marital,$education,$languages)
	{
		try
		{
			$insert_personal_query="INSERT INTO user_personal_information (u_id,up_picture,up_category,up_email,up_address,up_mobile,up_telephone,up_nationality,up_religion,up_age,up_maritalstatus,up_education,up_languages,up_status) 
			VALUES(:id,:picture,:category,:email,:address,:mobile,:telehpone,:nationality,:religion,:age,:marital,:education,:languages,:status)";
			$insert_personal_stmt=$this->connection->prepare($insert_personal_query);
			$insert_personal_stmt->execute(['id'=>$id,
											'picture'=>$picture,
											'category'=>$category,
											'email'=>$email,
											'address'=>$location,
											'mobile'=>$mobile,
											'telehpone'=>$telephone,
											'nationality'=>$nationality,
											'religion'=>$religion,
											'age'=>$age,
											'marital'=>$marital,
											'education'=>$education,
											'languages'=>$languages,
											'status'=>'Unapproved']);
			return $insert_personal_stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	public function post_profile_professional_information($id,$preferedworklocation,$yearsofexp,$expsummary,$skills,$cookingskills,$otherskills,$availability)
	{
		try
		{
			$insert_professional_query="INSERT INTO user_professional_information(u_id,upi_preferedworklocation,upi_yearsofexp,upi_expsummary,upi_cookingskills,upi_skillsexp,upi_otherskills,upi_availability,upi_status)
			VALUES(:id,:preferedworklocation,:yearsofexp,:expsummary,:cookingskills,:skills,:otherskills,:availability,:status)";
			$insert_professional_stmt=$this->connection->prepare($insert_professional_query);
			$insert_professional_stmt->execute(['id'=>$id,
												'preferedworklocation'=>$preferedworklocation,
												'yearsofexp'=>$yearsofexp,
												'expsummary'=>$expsummary,
												'skills'=>$skills,
												'cookingskills'=>$cookingskills,
												'otherskills'=>$otherskills,
												'availability'=>$availability,
												'status'=>'Unapproved']);
			return $insert_professional_stmt;

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	public function post_profile_supplementary_question($id,$ans1,$ans2,$ans3,$ans4,$ans5,$ans6,$ans7,$ans8,$ans9,$ans10)
	{
		try
		{
			$insert_question_query="INSERT INTO user_question(u_id,uq_1,uq_2,uq_3,uq_4,uq_5,uq_6,uq_7,uq_8,uq_9,uq_10)
			VALUES(:id,:q1,:q2,:q3,:q4,:q5,:q6,:q7,:q8,:q9,:q10)";
			$insert_question_stmt=$this->connection->prepare($insert_question_query);
			$insert_question_stmt->execute(['id'=>$id,
											'q1'=>$ans1,
											'q2'=>$ans2,
											'q3'=>$ans3,
											'q4'=>$ans4,
											'q5'=>$ans5,
											'q6'=>$ans6,
											'q7'=>$ans7,
											'q8'=>$ans8,
											'q9'=>$ans9,
											'q10'=>$ans10]);
			return $insert_question_stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	public function post_jobs()
	{

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
	

}

?>