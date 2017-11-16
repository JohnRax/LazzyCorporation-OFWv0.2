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
       
        case 'update':
            include "includes-candidate/edit-update.php"; 
               break;
        case 'addnew':
            include "includes-candidate/submit-profile.php"; 
               break;
        case 'editupdateprofile':
            include "includes-candidate/checker.php"; 
               break;
        case 'searchfindjob':
               include "includes-candidate/search-job.php"; 
               break;
        case 'appliedjobs':
               include "includes-candidate/applied-jobs.php"; 
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
     
      

    

      