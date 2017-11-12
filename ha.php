<?php 


    require_once 'connection.php';
    
    
        $type="candidate";
        $email="aegraerg";
        $password="aegraegae";
        $lastname="gergesr";
        $firstname="sergserg";
        $gender="serges";


        $candidate->register($type,$email,$password,$lastname,$firstname,$gender);
        // $sql ='SELECT * from user';
        // $stmt=$connection->prepare($sql);
        // $stmt->execute();
        // $post=$stmt->fetchAll();

        // var_dump($post);

   
    ?>