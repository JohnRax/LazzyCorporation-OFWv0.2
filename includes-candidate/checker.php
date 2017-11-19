<?php 
    require_once 'includes/connection.php';
    $check_profile_query="SELECT * FROM user_personal_information WHERE u_id=:id";
    $check_profile_stmt=$connection->prepare($check_profile_query);
    $check_profile_stmt->execute(array(':id'=>$_SESSION['user_session']));
    $result=$check_profile_stmt->fetch(PDO::FETCH_ASSOC);
    
    if(empty($result['u_id']))
    {
             echo "<script>
                    location.href = 'index-candidate.php?source=addnew';
                </script>";
    }
    else
    {
         echo "<script>
                    location.href = 'index-candidate.php?source=update';
                </script>";
         
    }

 ?>