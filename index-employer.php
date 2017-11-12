<?php ob_start() ?>
<?php include "includes-employer/header.php" ?>
<?php include "includes-employer/navigation.php" ?>
<?php    

    
    include_once 'includes/connection.php';
    if(!$user->is_loggedin())
    {
        $user->redirect('index.php');
    }
    else
    {
        if($_SESSION['user_type']=='candidate')
        {
            $user->redirect('index-candidate.php');
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
       
        case 'searchhelper':
             include "includes-employer/homepage.php"; 
            break; 
        case 'postjob':
             include "includes-employer/post-job.php"; 
            break; 
       case 'listpostjobs':
             include "includes-employer/property-main.php"; 
            break; 
        case 'logout':
            include "includes-employer/logout.php";
            break;
        default:
            include "includes-employer/homepage.php"; 
        break;
    } 
?>
<?php include "includes-employer/footer.php" ?>
     
      

    

      