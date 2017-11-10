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
       
        case 'property-forsale':
             include "includes-employer/property-main.php"; 
            break; 
        default:
            include "includes-employer/homepage.php"; 
        break;
    } 
?>
<?php include "includes-employer/footer.php" ?>
     
      

    

      