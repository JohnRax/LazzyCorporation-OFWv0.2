<!DOCTYPE html>
<?php   ob_start() ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Lazzy Works | Candidate Profile</title>
        <meta name="description" content="LazzyWorks is a free to use platform for jobseekers out there.">
        <meta name="author" content="Lazzy Technologies">

<link rel="icon" type="image/x-icon" href="../assets/img/icon-lazzyworks.ico"/>
        <meta name="keyword" content="OFW, Lazzy, Works, LazzyWorks, Helper , Lazzy Technologies, Find, Find Job, Job, Apply">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="../assets/css/normalize.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/fontello.css">
        <link href="../assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="../assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="../assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="../assets/css/price-range.css">
        <link rel="stylesheet" href="../assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="../assets/css/owl.theme.css">
        <link rel="stylesheet" href="../assets/css/owl.transitions.css">
        <link rel="stylesheet" href="../assets/css/lightslider.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        
        <?php 
          
              $host = 'localhost';
              $user = 'root';
              $password = '';
              $dbname='lazycorporation-ofwdatabase';
            try 
            {
                $dsn = 'mysql:host='.$host.';dbname='.$dbname;
                $connection = new PDO($dsn,$user,$password);
                $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            } 
            catch (PDOException $e) 
            {
                echo 'Connection failed: '.$e->getMessage();
            }
            include_once '../class/class.user.php';
            $user = new User($connection);

            if(isset($_GET['applied']))
            {

                $check_applied_query="SELECT * FROM job_submitted where j_id=:jid and u_id=:uid";
                $check_applied_stmt=$connection->prepare($check_applied_query);
                $check_applied_stmt->execute(array(':jid'=>$_GET['id'],
                                              ':uid'=>$_GET['candidateid']));
                $result = $check_applied_stmt->fetch(PDO::FETCH_ASSOC);

                if(empty($result))
                {
                        $check_profile_query="SELECT * FROM user_personal_information WHERE u_id=:uid";
                        $check_profile_stmt=$connection->prepare($check_profile_query);
                        $check_profile_stmt->execute(array(':uid'=>$_GET['candidateid']));
                        $result_profile = $check_profile_stmt->fetch(PDO::FETCH_ASSOC);
                 
                        if(!empty($result_profile))
                        {
                            if($user->apply_job($_GET['candidateid'],$_GET['id']))
                            {
                                   echo"<script>
                                    alert('Successfully Applied! Please Wait for the Employer Reply. Thank you');
                                    closeWindow();
                                    function closeWindow() {
                                        window.close();
                                    }
                                  </script>";
                              }
                        }
                        else
                        {
                              echo "<script>
                                        alert('Please Submit Profile first to Apply for this job. Thank you');
                                        location.href = '../index-candidate.php?source=addnew';
                                     </script>";
                        }

                }
                else
                {
                         echo "<script>
                               alert('Already Applied to This Job! Please Wait for the Employer Reply. Thank you');
                               location.href = 'job-page.php?id=".$_GET['id']."';
                              </script>";
                
                }  
            }
            
            if(isset($_GET['denied']))
            {
                  echo"<script>
                            alert('Please Register/Login to Apply for this Job. Thank you!');
                             closeWindow();
                            function closeWindow() {
                                window.close();
                                
                            }
                        </script>";
            }
            if (isset($_GET['id'])) 
            {
                
                $show_profile_query="SELECT *,  DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_id=:id";
                $show_profile_stmt=$connection->prepare($show_profile_query);
                $show_profile_stmt->execute(array(':id'=>$_GET['id']));
                $result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC);
               
                
            
         	?>

         
        <!--End top header -->
        <br>
        <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   

                <div class="clearfix padding-top-40" >

                    <div class="col-md-12 single-property-content prp-style-1 ">
                     <div class="row">
                            <div class="light-slide-item">            
                                <div class="clearfix">
                                    <div class="favorite-and-print">
                                        <!-- <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                            <i class="fa fa-star-o"></i>
                                        </a> -->
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i> 
                                        </a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="single-property-wrapper">
                          
                             <div class="dealer-widget">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">
                                   
                                <div class="section">
                                             <div class="col-md-12">
                                                <div class="col-xs-4"></div>
                                                 <div class="col-xs-4">
                                                    <a href="">
                                 <center><img src="../assets/img/profilepicture/<?php echo $result['j_logo']; ?>" class="img-circle"></center>
                                                     
                                                     </div>
                                                <div class="col-xs-4"></div>
                                                   <div class="col-xs-12">
                                                       </a><h3 align="center"> <?php echo $result['j_jobtitle'];?></h3>
                                                   </div> 
                                            </div>
                                            
                                </div>
                                 <div class="clearfix">
                                    <div class="favorite-and-print">
                                       <!--  <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                            <i class="fa fa-star-o"></i>
                                        </a> -->
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i> 
                                        </a>
                                    </div> 
                                   
                                </div>
                                  <div class="section additional-details">

                                <h4 class="s-property-title">Details</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Employer Type</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_employertype']; ?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Country</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_country']; ?></span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Dristrict Location</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_districtlocation']; ?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Job Type</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_type']; ?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Job Category</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_category']; ?></span>
                                    </li>

                                    
                                     <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Contact</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_contact']; ?></span>
                                    </li> 
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Application Email</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_applicationemail']; ?></span>
                                    </li>  
                                        
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Nationality</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_nationality']; ?></span>
                                    </li> 
                                     <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Family Type</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_familytype']; ?></span>
                                    </li> 
                                     <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Start Date</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_startdate']; ?></span>
                                    </li> 
                                     <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Monthly Salary</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_monthlysalary']; ?></span>
                                    </li>
                                      <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Date Posted</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-title1"><?php echo $result['j_dateposted']; ?></span>
                                    </li>  


                                </ul>
                            </div>  

                            <!-- End description area  -->

                                
                            <!-- End additional-details area  -->

                            <div class="section property-features">      

                                <h4 class="s-property-title">Required Languges</h4>                            
                                <ul>
                                   <?php echo $result['j_requiredlanguages']; ?>
                                </ul>

                          
                                <h4 class="s-property-title">Main Duties</h4>                            
                                <ul>
                                
                                    <?php echo $result['j_mainduties']; ?>
                                </ul>

                            

                                <h4 class="s-property-title">Cooking Skills</h4>                            
                                <ul>
                                   <?php echo $result['j_cookingskill']; ?>
                                </ul>

                            </div>



                                <div class="section">
                                <h4 class="s-property-title">Description</h4>
                                <div class="s-property-content">
                                    <p> <?php echo $result['j_description']; ?></p>
                                </div>
                            </div>

                           
                             
                                   <?php
                                      session_start();
                                      if(isset($_SESSION['user_session'])) 
                                         {
                                              if(isset($_SESSION['user_type']))
                                              {
                                                if($_SESSION['user_type']=='candidate')
                                                {
                                                    ?>
                                                  <button type="button" class="btn btn-large btn-block btn-primary full-width";
                                                   onclick="location.href='job-page.php?id=<?php echo $_GET['id'] ?>&candidateid=<?php echo $_SESSION['user_session'] ?>&applied'">CLICK HERE TO APPLY</button>
                                               <?php }
                                              }
                                         }
                                         else
                                         {
                                            ?>
                                            <button type='button' class='btn btn-large btn-block btn-primary full-width';
                                                  onclick="location.href='job-page.php?id=<?php echo $_GET['id'] ?>&denied'">CLICK HERE TO APPLY</button>
                                         <?php }
                                         
                                    ?>

                                    </div>
                                </div>
                            </div>
                           

                           
                            <!-- End features area  -->

                         
                            
                            

                        
                            
                        </div>
                    </div>


                 
                    </div>
                </div>

            </div>
        </div>

        <?php } ?>

        <script src="../assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="../assets/js/jquery-1.10.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/bootstrap-select.min.js"></script>
        <script src="../assets/js/bootstrap-hover-dropdown.js"></script>
        <script src="../assets/js/easypiechart.min.js"></script>
        <script src="../assets/js/jquery.easypiechart.min.js"></script>
        <script src="../assets/js/owl.carousel.min.js"></script>
        <script src="../assets/js/wow.js"></script>
        <script src="../assets/js/icheck.min.js"></script>
        <script src="../assets/js/price-range.js"></script>
        <script type="text/javascript" src="../assets/js/lightslider.min.js"></script>
        <script src="../assets/js/main.js"></script>

        <script>
            $(document).ready(function () {

                $('#image-gallery').lightSlider({
                    gallery: true,
                    item: 1,
                    thumbItem: 9,
                    slideMargin: 0,
                    speed: 500,
                    auto: true,
                    loop: true,
                    onSliderLoad: function () {
                        $('#image-gallery').removeClass('cS-hidden');
                    }
                });
            });
        </script>
    </body>
</html>
        
        
       

