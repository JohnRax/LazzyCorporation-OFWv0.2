<?php ob_start() ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php 
    
    include_once 'includes/connection.php';
    if($user->is_loggedin())
    {
        if($_SESSION['user_type']=='candidate')
        {
            $user->redirect('index-candidate.php');
        }
        else
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
        case 'findhelpers':
             include "includes/Search-candidate.php"; 
            break;
        case 'findemployer':
             include "includes/search-job.php"; 
            break;

        case 'loginandregister':
             include "includes/login-register.php"; 
            break;
        case 'viewnews':
             include "includes/viewnews.php"; 
            break; 
        case 'viewnews2':
             include "includes/viewnews2.php"; 
            break;
        case 'viewnews3':
             include "includes/viewnews3.php"; 
            break;
         case 'viewnews4':
             include "includes/viewnews4.php"; 
            break;        
        case 'HK':
             include "includes/agencylisthk.php"; 
            break;
        case 'PH':
             include "includes/agencylistph.php"; 
            break;
        case 'SRI':
             include "includes/agencylistsri.php"; 
            break;
        case 'INDI':
             include "includes/agencylistindi.php"; 
            break;   
        case 'news':
             include "includes/news.php"; 
            break;         
        default:
            include "includes/homepage.php";
        break;
    } 
?>
<?php include "includes/footer.php" ?>
     
      

    

      