<?php include "includes-candidate/header.php" ?>
<?php include "includes-candidate/navigation.php" ?>

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
       
        case 'submitprofile':
             include "includes-candidate/submit-profile.php"; 
            break;
     
    
        default:
             include "includes-candidate/homepage.php"; 
        break;
    } 
?>




<?php include "includes-candidate/footer.php" ?>
     
      

    

      