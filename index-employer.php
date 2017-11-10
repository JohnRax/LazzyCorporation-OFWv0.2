<?php include "includes-employer/header.php" ?>
<?php include "includes-employer/navigation.php" ?>
<?php    
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
        default:
            include "includes-employer/homepage.php"; 
        break;
    } 
?>
<?php include "includes-employer/footer.php" ?>
     
      

    

      