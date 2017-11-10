<?php
function register_user()
{
	global $connection;
	if (isset($_POST['submit'])) 
			{

				

				$firstname=$_POST['u_fname'];
				$lastname=$_POST['u_lname'];
				$username=$_POST['u_username'];
				$password=$_POST['u_password'];
				$email=$_POST['u_email'];
				$role=$_POST['u_role'];
				$gender=$_POST['u_gender'];
				$firstname=mysqli_real_escape_string($connection,$firstname);
				$lastname=mysqli_real_escape_string($connection,$lastname);
				$username=mysqli_real_escape_string($connection,$username);
				$password=mysqli_real_escape_string($connection,$password);
				$email=mysqli_real_escape_string($connection,$email);
				$role=mysqli_real_escape_string($connection,$role);
				$gender=mysqli_real_escape_string($connection,$gender);
	
				$insert_user_query="INSERT INTO user (u_username, u_password, u_email, u_type) 
										VALUES(
										    '$username',
										    '$password',
										    '$email',
										    '$role'
										  )";
				if(mysqli_query($connection,$insert_user_query))
				{
					
					$id=mysqli_insert_id($connection);				
					$insert_userdetails_query="INSERT INTO user_details (u_id, u_lname, u_fname, u_gender) 
											VALUES(
											    '$id',
											    '$lastname',
											    '$firstname',
											    '$gender'
											  )";
					$insert_userdetails_result=mysqli_query($connection,$insert_userdetails_query);
					if(!$insert_userdetails_result)
					{
						 die("no result".mysqli_error($connection));
					}
					else
					{
						$_SESSION['u_id']=$id;
						$_SESSION['u_username']=$username;
						$_SESSION['u_role']=$role;
						if($role=="employer")
						{
							echo"<script>
									alert('Registration Complete!');
									location.href = 'index.php';
							</script>";
						}
						else
						{
							echo"<script>
									alert('Registration Complete!');
									location.href = 'index.php';
							</script>";
						}
							session_start();
					}
				}
				else
				{
					die("no result".mysqli_error($connection));
				}
			}


}?>