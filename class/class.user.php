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
			$register_stmt->execute(['password'=>$new_password, 'email'=>$email, 'mobile'=>$mobile,'type'=> $type]);
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

			VALUES(:id,:picture,:category,:email,:address,:mobile,:telephone,:nationality,:religion,:age,:marital,:education,:languages,:status)";

			$insert_personal_stmt=$this->connection->prepare($insert_personal_query);
			$insert_personal_stmt->execute(['id'=>$id,
											'picture'=>$picture,
											'category'=>$category,
											'email'=>$email,
											'address'=>$location,
											'mobile'=>$mobile,
											'telephone'=>$telephone,
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
	

	public function update_profile_personal_information($id,$picture,$category,$email,$location,$mobile,$telephone,$nationality,$religion,$age,$marital,$education,$languages)
	{
		try
		{
			$insert_personal_query="UPDATE user_personal_information SET up_picture=:picture,
																		up_category=:category,
																		up_email=:email,
																		up_address=:address,
																		up_mobile=:mobile,
																		up_telephone=:telephone,
																		up_nationality=:nationality,
																		up_religion=:religion,
																		up_age=:age,
																		up_maritalstatus=:marital,
																		up_education=:education,
																		up_languages=:languages 
																	WHERE u_id=:id";
		    $insert_personal_stmt=$this->connection->prepare($insert_personal_query);
			$insert_personal_stmt->execute(['id'=>$id,
											'picture'=>$picture,
											'category'=>$category,
											'email'=>$email,
											'address'=>$location,
											'mobile'=>$mobile,
											'telephone'=>$telephone,
											'nationality'=>$nationality,
											'religion'=>$religion,
											'age'=>$age,
											'marital'=>$marital,
											'education'=>$education,
											'languages'=>$languages]);
			return $insert_personal_stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
 	public function update_profile_professional_information($id,$preferedworklocation,$yearsofexp,$expsummary,$skills,$cookingskills,$otherskills,$availability)
 	{
 		try
		{
			$insert_professional_query="UPDATE user_professional_information SET upi_preferedworklocation=:preferedworklocation,
																				upi_yearsofexp=:yearsofexp,
																				upi_expsummary=:expsummary,
																				upi_cookingskills=:cookingskills,
																				upi_skillsexp=:skills,
																				upi_otherskills=:otherskills,
																				upi_availability=:availability
																			  WHERE u_id=:id"
																			 ;


		
			$insert_professional_stmt=$this->connection->prepare($insert_professional_query);
			$insert_professional_stmt->execute(['id'=>$id,
												'preferedworklocation'=>$preferedworklocation,
												'yearsofexp'=>$yearsofexp,
												'expsummary'=>$expsummary,
												'skills'=>$skills,
												'cookingskills'=>$cookingskills,
												'otherskills'=>$otherskills,
												'availability'=>$availability]);
			return $insert_professional_stmt;

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

 	}
 	public function update_profile_supplementary_question($id,$ans1,$ans2,$ans3,$ans4,$ans5,$ans6,$ans7,$ans8,$ans9,$ans10)
 	{
 		try
		{
			$insert_question_query="UPDATE user_question SET uq_1=:q1,
															uq_2=:q2,
															uq_3=:q3,
															uq_4=:q4,
															uq_5=:q5,
															uq_6=:q6,
															uq_7=:q7,
															uq_8=:q8,
															uq_9=:q9,
															uq_10=:q10 
															WHERE u_id=:id";
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


	
	public function post_jobs($id,$logo,$jobtitle,$employertype,$country,$districtlocation,$type,$category,$description,$workingstatus,$requiredlanguages,$contact,$mainduties,$cookingskill,$applicationemail,$nationality,$familytype,$startdate,$monthlysalary)
	{
		 try
			{
				$insert_jobpost_query="INSERT INTO job_description(u_id,j_jobtitle,j_employertype,j_country,j_districtlocation,j_type,j_category,j_description,j_workingstatus,j_requiredlanguages,j_contact,j_mainduties,j_cookingskill,j_applicationemail,j_nationality,j_familytype,j_startdate,j_monthlysalary,j_logo,j_status)
				VALUES(:id,:jobtitle,:employertype,:country,:districtlocation,:type,:category,:description,:workingstatus,:requiredlanguages,:contact,:mainduties,:cookingskill,:applicationemail,:nationality,:familytype,:startdate,:monthlysalary,:logo,:status)";

				$insert_jobpost_stmt=$this->connection->prepare($insert_jobpost_query);
				$insert_jobpost_stmt->execute(['id'=>$id,
													'jobtitle'=>$jobtitle,
													'employertype'=>$employertype,
													'country'=>$country,
													'districtlocation'=>$districtlocation,
													'type'=>$type,
													'category'=>$category,
													'description'=>$description,
													'workingstatus'=>$workingstatus,
													'requiredlanguages'=>$requiredlanguages,
													'contact'=>$contact,
													'mainduties'=>$mainduties,
													'cookingskill'=>$cookingskill,
													'applicationemail'=>$applicationemail,
													'nationality'=>$nationality,
													'familytype'=>$familytype,
													'startdate'=>$startdate,
													'monthlysalary'=>$monthlysalary,
													'logo'=>$logo,
													'status'=>'Unapproved']);
	
				return $insert_jobpost_stmt;
	  
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
			$delete_job_query="DELETE FROM job_description WHERE j_id=:id";
			$delete_job_stmt=$this->connection->prepare($delete_job_query);
			$delete_job_stmt->execute(['id'=>$j_id]);

			return $delete_job_stmt;

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function update_job($id,$logo,$jobtitle,$employertype,$country,$districtlocation,$type,$category,$description,$workingstatus,$requiredlanguages,$contact,$mainduties,$cookingskill,$applicationemail,$nationality,$familytype,$startdate,$monthlysalary)
	{
		try
		{
				$update_jobpost_query="UPDATE job_description SET j_jobtitle=:jobtitle,
																j_employertype=:employertype,
																j_country=:country,
																j_districtlocation=:districtlocation,
																j_type=:type,
																j_category=:category,
																j_description=:description,
																j_workingstatus=:workingstatus,
																j_requiredlanguages=:requiredlanguages,
																j_contact=:contact,
																j_mainduties=:mainduties,
																j_cookingskill=:cookingskill,
																j_applicationemail=:applicationemail,
																j_nationality=:nationality,
																j_familytype=:familytype,
																j_startdate=:startdate,
																j_monthlysalary=:monthlysalary,
																j_logo=:logo
															WHERE j_id=:id";
				$update_jobpost_stmt=$this->connection->prepare($update_jobpost_query);
				$update_jobpost_stmt->execute(['id'=>$id,
															'jobtitle'=>$jobtitle,
															'employertype'=>$employertype,
															'country'=>$country,
															'districtlocation'=>$districtlocation,
															'type'=>$type,
															'category'=>$category,
															'description'=>$description,
															'workingstatus'=>$workingstatus,
															'requiredlanguages'=>$requiredlanguages,
															'contact'=>$contact,
															'mainduties'=>$mainduties,
															'cookingskill'=>$cookingskill,
															'applicationemail'=>$applicationemail,
															'nationality'=>$nationality,
															'familytype'=>$familytype,
															'startdate'=>$startdate,
															'monthlysalary'=>$monthlysalary,
															'logo'=>$logo]);
				return $update_jobpost_stmt;

		}catch(PDOException $e)
		{
			echo $e->getMessage();
		}
				
	}
	public function apply_job($id,$j_id)
	{
		try
		{
			$apply_job_query="INSERT INTO job_submitted(j_id,u_id) VALUES(:j_id,:u_id)";
			$apply_job_stmt=$this->connection->prepare($apply_job_query);
			$apply_job_stmt->execute(['j_id'=>$j_id,'u_id'=>$id]);
			return $apply_job_stmt;
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
	

}

?>