<?php ob_start(); ?>
<?php include "includes/header.php" ?>
<?php include "includes/topnavigation.php" ?>
<?php include "includes/navigation.php" ?>

<?php 
    

    include_once 'includes/connection.php';
    if(!$admin->is_loggedin())
    {
        $admin->redirect('index.php');
       
    }

    if (isset($_GET['source'])) 
    {
        $source=$_GET['source'];
    }
    else
    {
        $source="";
    }

    switch ($source) {
    case 'dashboard':
        include "includes/dashboard.php";
        break;
    case 'user':
        include "user.php";
        break;
    case 'candidate':
        include "candidate.php";
        break;
    case 'jobs':
        include "jobs.php";
        break;
    case 'professional':
        include "includes/professional.php";
        break;
    case 'experience':
        include "includes/experience.php";
        break;
    case 'supplementary':
        include "includes/supplementary.php";
        break;
    case 'logout':
        include "includes/logout.php";
        break;
    
    default:
        include "includes/dashboard.php";
        break;
} ?>

<?php include "includes/footer.php" ?>