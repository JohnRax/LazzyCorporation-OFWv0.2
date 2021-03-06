<?php

class User
{
	private $connection;
	function __construct($connection)
	{
		$this->connection=$connection;
	}
	public function register($type,$email,$mobile,$password,$lastname,$firstname,$gender,$ucountry,$companyname)
	{
		try
		{


			
			$new_password=password_hash($password,PASSWORD_DEFAULT);
			$register_query="INSERT INTO user (u_password, u_email,u_mobile,u_type) 
						  VALUES(:password,:email,:mobile,:type)";
			$register_stmt=$this->connection->prepare($register_query);
			$register_stmt->execute(array(':password'=>$new_password,':email'=>$email, ':mobile'=>$mobile,':type'=> $type));
			$id=$this->connection->lastInsertId();

			$details_query="INSERT INTO user_details (u_id,u_lname,u_fname,u_gender,u_country,u_companyname)
							VALUES (:id,:lastname,:firstname,:gender,:ucountry,:companyname)";
			$details_stmt=$this->connection->prepare($details_query);
			$details_stmt->execute(array(':id'=> $id,':lastname'=>$lastname,':firstname'=>$firstname,':gender'=>$gender,':ucountry'=>$ucountry,':companyname'=>$companyname));

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
			$login_stmt->execute(array(':email'=>$email));
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
			$insert_personal_stmt->execute(array(':id'=>$id,
											':picture'=>$picture,
											':category'=>$category,
											':email'=>$email,
											':address'=>$location,
											':mobile'=>$mobile,
											':telephone'=>$telephone,
											':nationality'=>$nationality,
											':religion'=>$religion,
											':age'=>$age,
											':marital'=>$marital,
											':education'=>$education,
											':languages'=>$languages,
											':status'=>'Approved'));
			return $insert_personal_stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	
	public function post_profile_professional_information($id,$preferedworklocation,$skills,$cookingskills,$otherskills)
	{
		try
		{
			$insert_professional_query="INSERT INTO user_professional_information(u_id,upi_preferedworklocation,upi_cookingskills,upi_skillsexp,upi_otherskills,upi_status)
			VALUES(:id,:preferedworklocation,:cookingskills,:skills,:otherskills,:status)";
			$insert_professional_stmt=$this->connection->prepare($insert_professional_query);
			$insert_professional_stmt->execute(array(':id'=>$id,
												':preferedworklocation'=>$preferedworklocation,
												':skills'=>$skills,
												':cookingskills'=>$cookingskills,
												':otherskills'=>$otherskills,
												':status'=>'Approved'));
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
			$insert_question_stmt->execute(array(':id'=>$id,
											':q1'=>$ans1,
											':q2'=>$ans2,
											':q3'=>$ans3,
											':q4'=>$ans4,
											':q5'=>$ans5,
											':q6'=>$ans6,
											':q7'=>$ans7,
											':q8'=>$ans8,
											':q9'=>$ans9,
											':q10'=>$ans10));
			return $insert_question_stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	public function post_profile_work_experience($id,$jd,$jdlocation,$from,$to)
	{
		try
		{
			$insert_work_experience_query="INSERT INTO user_experience(u_id,ue_jd,ue_jdlocation,ue_from,ue_to)
			VALUES(:id,:ue_jd,:ue_jdlocation,:ue_from,:ue_to)";
			$insert_work_experience_stmt=$this->connection->prepare($insert_work_experience_query);
			$insert_work_experience_stmt->execute(array(':id'=>$id,
											':ue_jd'=>$jd,
											':ue_jdlocation'=>$jdlocation,
											':ue_from'=>$from,
											':ue_to'=>$to));
			return $insert_work_experience_stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	public function post_agency_candidate($u_id,$lastname,$firstname,$gender)
	{
		try
		{
			$insert_agency_candidate_query="INSERT INTO agency_candidate(u_id)
			VALUES(:u_id)";
			$insert_agency_candidate_stmt=$this->connection->prepare($insert_agency_candidate_query);
			$insert_agency_candidate_stmt->execute(array(':u_id'=>$u_id));
		    $ac_id=$this->connection->lastInsertId();

		    $details_query="INSERT INTO user_details (u_id,u_lname,u_fname,u_gender)
							VALUES (:id,:lastname,:firstname,:gender)";
			$details_stmt=$this->connection->prepare($details_query);
			$details_stmt->execute(array(':id'=> $ac_id,':lastname'=>$lastname,':firstname'=>$firstname,':gender'=>$gender));
			return $ac_id;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	public function update_profile_work_experience($id,$jd,$jdlocation,$jdfrom,$to)
	{
		try
		{
			$insert_work_experience_query="UPDATE user_experience SET ue_jd=:jd,
															ue_jdlocation=:jdlocation,
															ue_from=:jdfrom,
															ue_to=:to
															WHERE u_id=:id";
			$insert_work_experience_stmt=$this->connection->prepare($insert_work_experience_query);
			$insert_work_experience_stmt->execute(array(':id'=>$id,
											':jd'=>$jd,
											':jdlocation'=>$jdlocation,
											':jdfrom'=>$jdfrom,
											':to'=>$to));

			return $insert_work_experience_stmt;
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
			$insert_personal_stmt->execute(array(':id'=>$id,
											':picture'=>$picture,
											':category'=>$category,
											':email'=>$email,
											':address'=>$location,
											':mobile'=>$mobile,
											':telephone'=>$telephone,
											':nationality'=>$nationality,
											':religion'=>$religion,
											':age'=>$age,
											':marital'=>$marital,
											':education'=>$education,
											':languages'=>$languages));
			return $insert_personal_stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
 	public function update_profile_professional_information($id,$preferedworklocation,$skills,$cookingskills,$otherskills)
 	{
 		try
		{
			$insert_professional_query="UPDATE user_professional_information SET upi_preferedworklocation=:preferedworklocation,
																				upi_cookingskills=:cookingskills,
																				upi_skillsexp=:skills,
																				upi_otherskills=:otherskills
																				
																			  WHERE u_id=:id";
			$insert_professional_stmt=$this->connection->prepare($insert_professional_query);
			$insert_professional_stmt->execute(array(':id'=>$id,
												':preferedworklocation'=>$preferedworklocation,
												':cookingskills'=>$cookingskills,
												':skills'=>$skills,
												':otherskills'=>$otherskills));
			return $insert_professional_stmt;

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

 	}

 	public function update_user_details($id,$fname,$lname)
	{
		try
		{
			$insert_user_details_query="UPDATE user_details SET u_fname=:fname,
															u_lname=:lname
															WHERE u_id=:id";
			$insert_user_details_stmt=$this->connection->prepare($insert_user_details_query);
			$insert_user_details_stmt->execute(array(':id'=>$id,
											':fname'=>$fname,
											':lname'=>$lname));

			return $insert_user_details_stmt;
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
			$insert_question_stmt->execute(array(':id'=>$id,
											':q1'=>$ans1,
											':q2'=>$ans2,
											':q3'=>$ans3,
											':q4'=>$ans4,
											':q5'=>$ans5,
											':q6'=>$ans6,
											':q7'=>$ans7,
											':q8'=>$ans8,
											':q9'=>$ans9,
											':q10'=>$ans10));
			return $insert_question_stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

 	}
	
	public function post_jobs($id,$logo,$jobtitle,$employertype,$country,$accomodation,$type,$category,$description,$requiredlanguages,$contact,$mainduties,$cookingskill,$applicationemail,$nationality,$familytype,$startdate,$monthlysalary)
	{
		 try
			{
				 $insert_jobpost_query="INSERT INTO job_description(u_id,j_jobtitle,j_employertype,j_country,j_accomodation,j_type,j_category,j_description,j_requiredlanguages,j_contact,j_mainduties,j_cookingskill,j_applicationemail,j_nationality,j_familytype,j_startdate,j_monthlysalary,j_logo,j_status)
				VALUES(:id,:jobtitle,:employertype,:country,:accomodation,:type,:category,:description,:requiredlanguages,:contact,:mainduties,:cookingskill,:applicationemail,:nationality,:familytype,:startdate,:monthlysalary,:logo,:status)";



				


				$insert_jobpost_stmt=$this->connection->prepare($insert_jobpost_query);
				$insert_jobpost_stmt->execute(array(':id'=>$id,
													':jobtitle'=>$jobtitle,
													':employertype'=>$employertype,
													':country'=>$country,
													':accomodation'=>$accomodation,
													':type'=>$type,
													':category'=>$category,
													':description'=>$description,
													':requiredlanguages'=>$requiredlanguages,
													':contact'=>$contact,
													':mainduties'=>$mainduties,
													':cookingskill'=>$cookingskill,
													':applicationemail'=>$applicationemail,
													':nationality'=>$nationality,
													':familytype'=>$familytype,
													':startdate'=>$startdate,
													':monthlysalary'=>$monthlysalary,
													':logo'=>$logo,
													':status'=>'Approved'));
	
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
			$delete_job_stmt->execute(array(':id'=>$j_id));

			return $delete_job_stmt;

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function update_job($id,$logo,$jobtitle,$employertype,$country,$accomodation,$type,$category,$description,$requiredlanguages,$contact,$mainduties,$cookingskill,$applicationemail,$nationality,$familytype,$startdate,$monthlysalary)
	{
		try
		{
				$update_jobpost_query="UPDATE job_description SET j_jobtitle=:jobtitle,
																j_employertype=:employertype,
																j_country=:country,
																j_accomodation=:accomodation,
																j_type=:type,
																j_category=:category,
																j_description=:description,
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
				$update_jobpost_stmt->execute(array(':id'=>$id,
												':jobtitle'=>$jobtitle,
												':employertype'=>$employertype,
												':country'=>$country,
												':accomodation'=>$accomodation,
												':type'=>$type,
												':category'=>$category,
												':description'=>$description,
												':requiredlanguages'=>$requiredlanguages,
												':contact'=>$contact,
												':mainduties'=>$mainduties,
												':cookingskill'=>$cookingskill,
												':applicationemail'=>$applicationemail,
												':nationality'=>$nationality,
												':familytype'=>$familytype,
												':startdate'=>$startdate,
												':monthlysalary'=>$monthlysalary,
												':logo'=>$logo));
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
			$apply_job_stmt->execute(array(':j_id'=>$j_id,':u_id'=>$id));
			return $apply_job_stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
	public function delete_agency_candidate($u_id)
	{
		try
		{
			$delete_profile1_query="DELETE FROM user_question WHERE u_id=:id";
			$delete_profile1_stmt=$this->connection->prepare($delete_profile1_query);
			$delete_profile1_stmt->execute(array(':id'=>$u_id));

			$delete_profile2_query="DELETE FROM user_personal_information WHERE u_id=:id";
			$delete_profile2_stmt=$this->connection->prepare($delete_profile2_query);
			$delete_profile2_stmt->execute(array(':id'=>$u_id));

			$delete_profile3_query="DELETE FROM user_experience WHERE u_id=:id";
			$delete_profile3_stmt=$this->connection->prepare($delete_profile3_query);
			$delete_profile3_stmt->execute(array(':id'=>$u_id));

			$delete_profile4_query="DELETE FROM user_professional_information WHERE u_id=:id";
			$delete_profile4_stmt=$this->connection->prepare($delete_profile4_query);
			$delete_profile4_stmt->execute(array(':id'=>$u_id));

			$delete_profile5_query="DELETE FROM user_details WHERE u_id=:id";
			$delete_profile5_stmt=$this->connection->prepare($delete_profile5_query);
			$delete_profile5_stmt->execute(array(':id'=>$u_id));

			return "";

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