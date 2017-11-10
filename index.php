<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
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
       
        case 'findhelpers':
             include "includes/Search-candidate.php"; 
            break;
        case 'findemployer':
             include "includes/search-job.php"; 
            break;
        case 'loginandregister':
             include "includes/login-register.php"; 
            break;     
        default:
            include "includes/homepage.php";
          
        break;
    } 
?>
<?php include "includes/footer.php" ?>
     
      

    

      