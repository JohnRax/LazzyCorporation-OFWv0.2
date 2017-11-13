<?php 


    require_once 'connection.php';
    
    
       
        $id="4";
        $category='up_category';
        $email='up_email';
        $mobile='up_mobile';
        $telephone='up_telephone';
        $nationality='up_nationality';
        $address='up_address';
        $age='up_age';
        $religion="Catholic";
        $marital='up_maritalstatus';
        $languages='up_languages';
        $picture='up_picture';
      
        if ($user->post_profile_personal_information($id,$picture,$category,$email,$address,$mobile,$telephone,$nationality,$religion,$age,$marital,$languages)) 
        {
            $user->redirect('index.php');
        }
        else
        {
            echo "Something wrong..";
        }
        // $sql ='SELECT * from user';
        // $stmt=$connection->prepare($sql);
        // $stmt->execute();
        // $post=$stmt->fetchAll();

        // var_dump($post);

   
    ?>