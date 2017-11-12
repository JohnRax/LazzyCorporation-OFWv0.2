<?php ob_start() ?>
<?php include "includes-candidate/header.php" ?>
<?php include "includes-candidate/navigation.php" ?>

<?php 
    
    include_once 'includes/connection.php';
    if(!$user->is_loggedin())
    {
        $user->redirect('index.php');
    }
    else
    {
        if($_SESSION['user_type']=='employer')
        {
            $user->redirect('index-employer.php');
        }
       
    }

    if (isset($_GET['source'])) {
        
        $source=$_GET['source'];
    }
    else
    {
        $source="";
    }

    switch ($source) 
    {
       
        case 'submitprofile':
             include "includes-candidate/submit-profile.php"; 
            break;
        case 'editupdateprofile':
            include "includes-candidate/submit-profile.php"; 
               break;
        case 'searchfindjob':
               include "includes-candidate/homepage.php"; 
               break;
         case 'logout':
               include "includes-candidate/logout.php"; 
               break;
        
        default:
             include "includes-candidate/homepage.php"; 
        break;
    } 
?>




<?php include "includes-candidate/footer.php" ?>
     
      

    

      