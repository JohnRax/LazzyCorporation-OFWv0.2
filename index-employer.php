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
        if($_SESSION['user_type']=='Candidate')
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
             include "includes-employer/search-candidate.php"; 
            break; 
        case 'postjob':
             include "includes-employer/post-job.php"; 
            break; 
        case 'addnew':
            include "includes-employer/agency_submit-profile.php"; 
               break;
        case 'listpostjobs':
             include "includes-employer/list-jobs.php"; 
            break; 
       case 'editjob':
             include "includes-employer/edit-job.php"; 
            break;
        case 'viewsubmitted':
             include "includes-employer/view-submitted-profile.php"; 
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
     
      

    

      