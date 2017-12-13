
       
<?php 
require_once 'includes/connection.php';
$show_profile_query="SELECT 
  a.u_id,
  CONCAT(
    UCASE(LEFT(u_fname, 1)),
    LCASE(SUBSTRING(u_fname, 2))
  )AS u_fname ,
  CONCAT(
    UCASE(LEFT(u_lname, 1)),
    LCASE(SUBSTRING(u_lname, 2))
  ) AS u_lname,
 
  b.up_age,
  b.up_picture,
  b.up_address,
  b.up_nationality,
  DATE_FORMAT(b.up_dateposted, '%M %d, %Y') AS up_dateposted,
  b.up_category,
  b.up_address,
  c.upi_skillsexp 
FROM
  user_details AS a 
  JOIN user_personal_information AS b 
    ON b.u_id = a.u_id 
  JOIN user_professional_information AS c 
   ON a.u_id = c.u_id where  b.up_status=:status GROUP BY b.u_id 
ORDER BY rand() LIMIT 10";
$show_profile_stmt=$connection->prepare($show_profile_query);
$show_profile_stmt->execute(array(':status'=>'Approved'));
   


?>
 <style type="text/css">
	table {
    table-layout: fixed;
    word-wrap: break-word;
	}
	
	.onHover{
	cursor: pointer;	
	}
  </style>
  <div class="slider-area">   
            <div class="slider-content">
                <div class="row">
                                 
                       <h2>World’s No. 1 Job hiring overseas!</h2> 
                       <h5>Start your dream job here in overseas with highly secured and trusted Employers. Registration is free.
</h5    >               
                      <br>
                         <div class="button">
                          <button class="navbar-btn nav-button wow bounceInRight login" type="reset" onclick="location.href='index.php?source=findhelpers'">FIND CANDIDATES</button>
                           <button class="navbar-btn nav-button wow bounceInRight login" type="reset" onclick="location.href='index.php?source=findemployer'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIND JOBS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            <button class="navbar-btn nav-button wow bounceInRight login" type="reset" onclick="location.href='index.php?source=agency'">List of Agencies</button>
                    </div>
            </div>
        </div>
</div>

<!-- property area -->
        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Recent Submit Resume</h2>
                        <p>List of Awesome Oversea Workers here at <strong>LAZZY WORKS</strong> .</p>
                    </div>
                </div>

                <div id="chckSize" class="row">
                    <div class="proerty-th">
						<table class="display table-condensed table dt-responsive responsive-display">
							<?php while($result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC)): 
								  $img = "assets/img/profilepicture/".$result['up_picture'];
								  $name = $result['u_fname'] . " ". $result['u_lname'];
								  $age = $result['up_age']; 
								  $address = $result['up_address']; 
								  $nationality = $result['up_nationality']; 
								  $skillsexp = $result['upi_skillsexp']; 
								  $dateposted = $result['up_dateposted']; 
								  ?>
								<tr>
									<td class='onHover col-md-4' title="Click to View Profile" onclick="window.open('print/profile.php?id=<?php echo $result['u_id'];  ?>')" class='propertyIMG'>
									 
                   <img  class="img-thumbnail" src="<?php echo $img;?>  " alt="" />
									</td>
									<td><a href="print/profile.php?id=<?php echo $result['u_id'];  ?>"></a>
										<div style="color: black">
                    <div><h3><?php echo $name;?></h3></div>
										<div> <b>Age: </b><?php echo $age;?></div>
										<div><b>Address: </b><?php echo $address;?></div>
										<div><b>Nationality: </b><?php echo $nationality;?></div>
										<div><b >Job Expertises: </b><?php echo $skillsexp;?></div>
										<div><small><i>Posted: <?php echo $dateposted;?></i></small></div>
                    </div>
                    
									</td>
								</tr>
							<?php endwhile; ?>
						</table>
                      <div class="box-tree more-proerty text-center">
                          <div class="more-entry overflow">
                              <h5><a >CAN'T FIND CANDIDATE?  </a></h5>
                              <button onclick="location.href='index.php?source=findhelpers'" class="btn border-btn more-black" value="All properties">See more Candidate</button>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>



                
                        <!-- /.feature title -->
<?php  
     require_once 'includes/connection.php';
     $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status order by j_id DESC  LIMIT 7";
     $show_job_stmt=$connection->prepare($show_job_query);
     $show_job_stmt->execute(array(':status'=>'Approved'));

?>
      <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                         <h2>Recent Job Post</h2>
                        <p>List of Awesome Job Offeres here at LAZZY WORKS.</p>
                    </div>
                </div>

                <div id="chckSize" class="row">
                    <div class="proerty-th">
            <table class="display table-condensed table dt-responsive responsive-display">
              <?php while($result1 = $show_job_stmt->fetch(PDO::FETCH_ASSOC)): 
                  $img1 = "assets/img/profilepicture/".$result1['j_logo'];
                  $jobtitle=$result1['j_jobtitle'];
                  $employertype=$result1['j_employertype'];
                  $location=$result1['j_country'];
                  $jobcategory=$result1['j_category'];
                  $posted=$result1['j_dateposted'];
                  ?>
                <tr>
                  <td class='onHover col-md-4' title="Click to View Profile" onclick="window.open('print/job.php?id=<?php echo $result1['j_id'];  ?>')" class='propertyIMG'>
                   
                   <img  class="img-thumbnail" src="<?php echo $img1;?>  " alt="" />
                  </td>
                  <td><a href="print/job.php?id=<?php echo $result1['j_id'];  ?>"></a>
                    <div style="color: black">
                    <div><h3><?php echo $jobtitle;?></h3></div>
                    <div><b>Employer Type: </b><?php echo $employertype;?></div>
                    <div><b>Location: </b><?php echo $location;?></div>
                    <div><b >Job Category: </b><?php echo $jobcategory;?></div>
                    <div><small><i>Posted: <?php echo $posted;?></i></small></div>
                    </div>
                    
                  </td>
                </tr>
              <?php endwhile; ?>
            </table>
                      <div class="box-tree more-proerty text-center">
                          <div class="more-entry overflow">
                              <h5><a >CAN'T FIND JOB?  </a></h5>
                              <button onclick="location.href='index.php?source=findemployer'" class="btn border-btn more-black" value="All properties">See more Candidate</button>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>




                      
                                         

<!-- Count area -->
        <div class="count-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title1">
                        <!-- /.feature title -->
                        <h2>You can trust us </h2> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                        <div class="row">
                                         <?php require_once 'includes/connection.php';
                                            $show_jobquantity_query="SELECT 
                                                      COUNT(u_id) AS user 
                                                    FROM
                                                    `user_personal_information` where up_status=:status";
                                             $show_jobquantity_stmt=$connection->prepare($show_jobquantity_query);
                                             $show_jobquantity_stmt->execute(array(':status'=>'Approved'));
                                             while($result = $show_jobquantity_stmt->fetch(PDO::FETCH_ASSOC))

                                         
                                             {         
                                                echo " <div class='col-sm-6 col-xs-6'>
                                <div class='count-item'>
                                    <div class='count-item-circle'>
                                        <span class='pe-7s-id'></span>
                                    </div>
                                    <div class='chart' data-percent='5000'>
                                        <h2 class='percent' > ".$result['user']."</h2>
                                        <h5>SUBMITTED PROFILE </h5>
                                    </div>
                                </div>
                            </div> ";?>
                                                          
                                                    
                                <?php } ?>                
                           
                             <?php require_once 'includes/connection.php';
                                            $show_jobquantity_query="SELECT 
                                                  COUNT(j_id) AS job 
                                                FROM
                                                  `job_description` where j_status=:status ";
                                             $show_jobquantity_stmt=$connection->prepare($show_jobquantity_query);
                                             $show_jobquantity_stmt->execute(array(':status'=>'Approved'));
                                             while($result = $show_jobquantity_stmt->fetch(PDO::FETCH_ASSOC))

                                         
                                             {         
                                                echo " <div class='col-sm-6 col-xs-6'>
                                <div class='count-item'>
                                    <div class='count-item-circle'>
                                        <span class='pe-7s-portfolio'></span>
                                    </div>
                                    <div class='chart' data-percent='120'>
                                        <h2 class='percent' id=''>".$result['job']."</h2>
                                        <h5>POST JOBS </h5>
                                    </div>
                                </div> 
                            </div> ";?>
                                                          
                                                    
                                <?php } ?>
                           

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- boy-sale area -->