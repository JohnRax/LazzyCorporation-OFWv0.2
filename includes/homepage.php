  <div class="slider-area">   
            <div class="slider-content">
                <div class="row">
                                 
                       <h2>Best Search Engine To Find A Best Helpers</h2>
                                        
                      <br>
                         <div class="button">
                          <button class="navbar-btn nav-button wow bounceInRight login" type="reset" onclick="location.href='index.php?source=findhelpers'">FIND HELPERS</button>
                           <button class="navbar-btn nav-button wow bounceInRight login" type="reset" onclick="location.href='index.php?source=findemployer'">FIND EMPLOYERS</button>
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
                        <p>Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies . </p>
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
                                                ON a.u_id = c.u_id where b.up_status=:status limit 7";
                    $show_profile_stmt=$connection->prepare($show_profile_query);
                    $show_profile_stmt->execute(['status'=>'Approved']);
                    while($result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        echo " <div class='col-sm-6 col-md-3 p0'>
                                    <div class='box-two proerty-item'>
                                        <div class='item-thumb'>
                                            <a href='index.php?source=candidateprofile&id=".$result['u_id']."' ><img src='assets/img/profilepicture/".$result['up_picture']."'></a>
                                        </div>
                                        <div class='item-entry overflow'>
                                            <h5><a href='index.php?source=candidateprofile&id=".$result['u_id']."' >".$result['u_fname']." ".$result['u_lname']."</a></h5>
                                            <div class='dot-hr'></div>
                                            
                                            <span class='pull-left'><b>Age : </b>".$result['up_age']."</span>
                                            <br>
                                            <h7><b>Location:</b>".$result['up_address']."</h7>
                                            <br>
                                            <span class='proerty-price pull-left'><b>Nationality:</b>".$result['up_nationality']."</span>
                                            <br>
                                            <h7><b>Years Of Experience:</b>".$result['upi_yearsofexp']."</h7>
                                            <br>
                                            <h7><b>Job Expertises:</b></h7>
                                            <br>
                                            <h7>".$result['upi_skillsexp']."</h7>
                                            <br>
                                            <span class='pull-left'><b>Posted:</b> 20 Minutes Ago</span>
                                            <br>
                                            <div class='span9 btn-block no-padding'>
                                                <button class='btn btn-large btn-block btn-primary full-width' onclick='location.href='index.php?source=candidateprofile&id=".$result['u_id']."' type='button'>View Full Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                    }
                    ?>

                           
                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-tree more-proerty text-center">
                                <div class="item-tree-icon">
                                    <i class="fa fa-th"></i>
                                </div>
                                <div class="more-entry overflow">
                                    <h5><a href="property-1.html">CAN'T FIND HELPERS? ? </a></h5>
                                    <h5 class="tree-sub-ttl">Show all Helpers</h5>
                                    <button onclick="location.href='index.php?source=findhelpers'" class="btn border-btn more-black" value="All properties">All Helpers</button>

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Recent Job Post</h2>
                        <p>Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies . </p>
                    </div>
        <div class="container">
            <div class="row ">
                        <div class="col-md-12 clear"> 
                                <div id="list-type" class="property-th">
                                   
                                    <div id="list-type" class="proerty-th">   

                                    <?php 

                                         require_once 'includes/connection.php';
                                            $show_job_query="SELECT * FROM job_description where j_status=:status LIMIT 4";
                                             $show_job_stmt=$connection->prepare($show_job_query);
                                             $show_job_stmt->execute(['status'=>'Approved']);
                                             while($result = $show_job_stmt->fetch(PDO::FETCH_ASSOC))
                                             {         
                                                echo " <div class='col-sm-6 col-md-3 p0'>
                                                 <div class='box-two proerty-item'>
                                                   <div class='item-thumb'>
                                                        <a href='index.php?source=jobpage&id=".$result['j_id']."'><img src='assets/img/profilepicture/".$result['j_logo']."'></a>
                                                          </div>
                                                             <div class='item-entry overflow'>
                                                                <h5><a href='index.php?source=jobpage&id=".$result['j_id']."'>".$result['j_jobtitle']."</a></h5>
                                                                <div class='dot-hr'></div>
                                                                
                                                                <span class='pull-left'><b>Employer Type : </b>".$result['j_employertype']." </span>
                                                                <br>
                                                                <h7><b>Location:</b> ".$result['j_country']."</h7>
                                                                <br>
                                                                <h7><b>Job Category:</b>".$result['j_mainduties']."</h7>
                                                                <br>
                                                                <span class='pull-left'><b>Posted:</b> ".$result['j_dateposted']."</span>
                                                                <br>
                                                                <br>
                                                                <div class='span9 btn-block no-padding'>
                                                                    <button class='btn btn-large btn-block btn-primary full-width'  onclick='location.href='index.php?source=jobpage&id=".$result['j_id']."'  type='button'>View Full Post</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     </div>  ";

                                                }
                                             ?>

                                       


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
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
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
        