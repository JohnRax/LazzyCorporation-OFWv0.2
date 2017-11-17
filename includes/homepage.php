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

                <div class="row">
                    <div class="proerty-th">
                        
                    <?php 

                    require_once 'includes/connection.php';
                    $show_profile_query="SELECT
                                              a.u_id, 
                                              a.u_fname,
                                              a.u_lname,
                                              b.up_age,
                                              b.up_picture,
                                              b.up_address,
                                              b.up_nationality,
                                              b.up_category,
                                              b.up_address,
                                              c.upi_skillsexp,
                                              c.upi_yearsofexp
                                            FROM
                                              user_details AS a 
                                               JOIN user_personal_information AS b 
                                                ON b.u_id = a.u_id 
                                               JOIN user_professional_information AS c 
                                                ON a.u_id = c.u_id  where  b.up_status=:status order by a.u_id DESC  limit 7 ";
                    $show_profile_stmt=$connection->prepare($show_profile_query);
                    $show_profile_stmt->execute(['status'=>'Approved']);
                    while($result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        echo " <div class='col-sm-6 col-md-3 p0'>
                                    <div class='box-two proerty-item'>
                                        <div class='item-thumb'>
                                           <img src='assets/img/profilepicture/".$result['up_picture']."'>
                                        </div>
                                        <div class='item-entry overflow'>
                                            <h4><b>".$result['u_fname']." ".$result['u_lname']."</b></h4>
                                            <div class='dot-hr'></div>
                                            
                                            <span class='pull-left'><b>Age : </b>".$result['up_age']."</span>
                                            <br>
                                            <h7><b>Location: </b>".$result['up_address']."</h7>
                                            <br>
                                            <span class='proerty-price pull-left'><b>Nationality: </b>".$result['up_nationality']."</span>
                                            <br>
                                            <h7><b>Years Of Experience: </b>".$result['upi_yearsofexp']."</h7>
                                            <br>
                                            <h7><b>Job Expertises:</b></h7>
                                            <br>
                                            <h7>".$result['upi_skillsexp']."</h7>
                                            <br>
                                            
                                            <br>
                                            <div class='span9 btn-block no-padding'>
                                        ";?>
                                            <button type="button" class='btn btn-large btn-block btn-primary full-width'
                                            onclick=" window.open('includes/candidate-page.php?id=<?php echo $result['u_id'];  ?>')"
                                                    >View Full Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php } ?>
                    

                           
                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-tree more-proerty text-center">
                                <br><br> <br><br> <br><br> <br><br>
                                <div class="more-entry overflow">
                                    <h5><a >CAN'T FIND HELPERS?  </a></h5>
                                    
                                    <button onclick="location.href='index.php?source=findhelpers'" class="btn border-btn more-black" value="All properties">All Helpers</button>

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title1">
                        <!-- /.feature title -->
                        <h2>Recent Job Post</h2>
                        <p>List of Awesome Job Offeres here at LAZZY WORKS.</p>
                    </div>
        <div class="container">
            <div class="row ">
                        <div class="col-md-12 clear"> 
                                <div id="list-type" class="property-th">
                                   
                                    <div id="list-type" class="proerty-th">   

                                    <?php 

                                         require_once 'includes/connection.php';
                                            $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status order by j_id DESC  LIMIT 7";
                                             $show_job_stmt=$connection->prepare($show_job_query);
                                             $show_job_stmt->execute(['status'=>'Approved']);
                                             while($result = $show_job_stmt->fetch(PDO::FETCH_ASSOC))
                                             {         
                                                echo " <div class='col-sm-6 col-md-3 p0'>
                                                 <div class='box-two proerty-item'>
                                                   <div class='item-thumb'>
                                                        <img src='assets/img/profilepicture/".$result['j_logo']."'>
                                                          </div>
                                                             <div class='item-entry overflow'>
                                                                <h4>".$result['j_jobtitle']."</h4>
                                                                <div class='dot-hr'></div>
                                                                
                                                                <span class='pull-left'><b>Employer Type : </b>".$result['j_employertype']." </span>
                                                                <br>
                                                                <h7><b>Location: </b> ".$result['j_country']."</h7>
                                                                <br>
                                                                <h7><b>Job Category: </b>".$result['j_mainduties']."</h7>
                                                                <br>
                                                                <span class='pull-left'><b>Posted:</b> ".$result['j_dateposted']."</span>
                                                                <br>
                                                                <br>
                                                                <div class='span9 btn-block no-padding'>
                                                                  ";?>
                                                            <button type="button" class="btn btn-large btn-block btn-primary full-width" 
                                                            onclick=" window.open('includes/job-page.php?id=<?php echo $result['j_id'];  ?>')"
                                                                >View Full Post</button>
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <?php } ?>
                                <div class="col-sm-6 col-md-3 p0">
                            <div class="box-tree more-proerty text-center">
                                <br><br> <br><br> <br><br> <br><br>
                                <div class="more-entry overflow">
                                    <h5><a >CAN'T FIND JOBS?  </a></h5>
                                    
                                    <button onclick="location.href='index.php?source=findhelpers'" class="btn border-btn more-black" value="All properties">All Jobs</button>

                                
                                </div>
                            </div>
                        </div>

                                       


                                            </div>
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
                        <h2>You can trust Us </h2> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                        <div class="row">
                            <div class="col-sm-4 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-users"></span>
                                    </div>
                                    <div class="chart" data-percent="5000">
                                        <h2 class="percent" id="counter">0</h2>
                                        <h5>SUBMITTED PROFILE </h5>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-sm-4 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-flag"></span>
                                    </div>
                                    <div class="chart" data-percent="120">
                                        <h2 class="percent" id="counter2">0</h2>
                                        <h5>POST JOBS </h5>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-sm-4 col-xs-6">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-graph2"></span>
                                    </div>
                                    <div class="chart" data-percent="5000">
                                        <h2 class="percent"  id="counter3">5000</h2>
                                        <h5>HELPERS ABROAD</h5>
                                    </div>
                                </div> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- boy-sale area -->
        