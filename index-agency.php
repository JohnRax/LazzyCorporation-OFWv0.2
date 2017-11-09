<?php include "includes-agency/header.php" ?>
<?php include "includes-agency/navigation.php" ?>

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
             include "includes/property-main.php"; 
            break;
        case 'property-forrent':
             include "includes/property-main.php"; 
            break;
    
        default:
        break;
    } 
?>




<?php include "includes-agency/footer.php" ?>
     
      

    

      