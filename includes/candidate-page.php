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
                $host = 'lazycompanydb.comfhxnalolh.ap-southeast-1.rds.amazonaws.com';
                $user = 'dblazyc0mpAnY';
                $password = 'lazYPr0p3rt1eS';
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

            if (isset($_GET['id'])) 
            {
                
                $show_profile_query="SELECT * 
                                     FROM
                                    user_details AS a 
                                    JOIN user_personal_information AS b 
                                    ON b.u_id = a.u_id 
                                    JOIN user_professional_information AS c 
                                    ON a.u_id = c.u_id 
                                    JOIN user_question AS e
                                    where a.u_id=:id";
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
                                        <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                            <i class="fa fa-star-o"></i>
                                        </a>
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
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="../assets/img/profilepicture/<?php echo $result['up_picture']; ?>" class="img-circle">
                                                     </a><h3>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $result['u_fname']." ".$result['u_lname'];?></h3>
                                                     </div>
                                                <div class="col-xs-4"></div>
                                                </div>
                                            
                                </div>
                                 <div class="clearfix">
                                    <div class="favorite-and-print">
                                        <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i> 
                                        </a>
                                    </div> 
                                </div>
                                  <div class="section additional-details">

                                <h4 class="s-property-title">Basic Details</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">AGE</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['up_age']; ?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Expertise</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['upi_skillsexp']; ?></span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Location Now</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['up_address']; ?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Nationality</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['up_nationality']; ?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Religion</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['up_religion']; ?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Highest Education</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['up_education']; ?></span>
                                    </li> 
                                     <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Marital Status</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['up_maritalstatus']; ?></span>
                                    </li> 
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Gender</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['u_gender']; ?></span>
                                    </li>  
                                        
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Mobile Number</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['up_mobile']; ?></span>
                                    </li> 
                                     <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Telephone Number</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['up_telephone']; ?></span>
                                    </li> 
                                     <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Email</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $result['up_email']; ?></span>
                                    </li> 


                                </ul>
                            </div>  

                            <!-- End description area  -->

                                
                            <!-- End additional-details area  -->

                            <div class="section property-features">      

                                <h4 class="s-property-title">Languges</h4>                            
                                <ul>
                                   <?php echo $result['up_languages']; ?>
                                </ul>

                          
                                <h4 class="s-property-title">Skills</h4>                            
                                <ul>
                                
                                    <?php echo $result['upi_skillsexp']; ?>
                                </ul>

                            

                                <h4 class="s-property-title">Cooking Skills</h4>                            
                                <ul>
                                   <?php echo $result['upi_cookingskills']; ?>
                                </ul>

                            </div>



                                <div class="section">
                                <h4 class="s-property-title">Description</h4>
                                <div class="s-property-content">
                                    <p> <?php echo $result['upi_expsummary']; ?></p>
                                </div>
                            </div>

                             <div class="section additional-details">

                                <h4 class="s-property-title">Experience 1</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Start Date</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">2017-2-3</span>
                                    </li>
                                     <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">End Date</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">2017-2-3</span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Working Place</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Hong Kong</span>
                                    </li>
                                      <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Family Type</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Couple</span>
                                    </li>
                                     <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Reference</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Cooking</span>
                                    </li>
                                      <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Notes</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Good</span>
                                    </li>
                                 
                                    

                                </ul>
                            </div>  
                             
                             <div class="section additional-details">

                                <h4 class="s-property-title">Suplementary Questions</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-10 col-md-10 add-d-title">Would you agreee to do extra work?</span>
                                        <span class="col-xs-6 col-sm-2 col-md-2 add-d-entry"> <?php echo $result['uq_1']; ?></span>
                                    </li>
                                     <li>
                                        <span class="col-xs-6 col-sm-10 col-md-10 add-d-title">If your employer asked you to work on your holiday and willing to pay as compensation, are you willing to do so?</span>
                                        <span class="col-xs-6 col-sm-2 col-md-2 add-d-entry"><?php echo $result['uq_2']; ?></span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-10 col-md-10 add-d-title">Are you willing to work for a family without your own servant room?</span>
                                        <span class="col-xs-6 col-sm-2 col-md-2 add-d-entry"><?php echo $result['uq_3']; ?></span>
                                    </li>
                                      <li>
                                        <span class="col-xs-6 col-sm-10 col-md-10 add-d-title">Are you willing to take care of children no matter how many the family has?</span>
                                        <span class="col-xs-6 col-sm-2 col-md-2 add-d-entry"><?php echo $result['uq_4']; ?></span>
                                    </li>
                                     <li>
                                        <span class="col-xs-6 col-sm-10 col-md-10 add-d-title">Living with elderly person?</span>
                                        <span class="col-xs-6 col-sm-2 col-md-2 add-d-entry"><?php echo $result['uq_5']; ?></span>
                                    </li>
                                      <li>
                                        <span class="col-xs-6 col-sm-10 col-md-10 add-d-title"> Are you willing to take care of disabled elderly?</span>
                                        <span class="col-xs-6 col-sm-2 col-md-2 add-d-entry"><?php echo $result['uq_6']; ?></span>
                                           <li>
                                        <span class="col-xs-6 col-sm-10 col-md-10 add-d-title">Do you got experience to take care of dogs or pets?</span>
                                        <span class="col-xs-6 col-sm-2 col-md-2 add-d-entry"><?php echo $result['uq_7']; ?></span>
                                    </li>
                                     <li>
                                        <span class="col-xs-6 col-sm-10 col-md-10 add-d-title">Have you suffered from health problems in your nervous system, eyes, feet, legs or any other parts of your body?</span>
                                        <span class="col-xs-6 col-sm-2 col-md-2 add-d-entry"><?php echo $result['uq_8']; ?></span>
                                    </li>
                                      <li>
                                        <span class="col-xs-6 col-sm-10 col-md-10 add-d-title">Can you drive?</span>
                                        <span class="col-xs-6 col-sm-2 col-md-2 add-d-entry"><?php echo $result['uq_9']; ?></span>
                                    </li>
                                     <li>
                                        <span class="col-xs-6 col-sm-10 col-md-10 add-d-title"> Do you smoke?</span>
                                        <span class="col-xs-6 col-sm-2 col-md-2 add-d-entry"><?php echo $result['uq_10']; ?></span>
                                    </li>
                                 
                                    

                                </ul>
                            </div>

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
        
        
       

