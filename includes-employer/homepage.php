<br><br><br><br>
        <!-- property area -->
     <div id="homepage"  class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
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
                                           <img src='assets/img/profilepicture/".$result['up_picture']."'>
                                        </div>
                                        <div class='item-entry overflow'>
                                            <h4><b>".$result['u_fname']." ".$result['u_lname']."</b></h4>
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
                                        ";?>
                                            <button type="button" class="btn btn-large btn-block btn-primary full-width" 
                                            onclick=" window.open('includes/candidate-page.php?id=<?php echo $result['u_id'];  ?>')"
                                                    >View Full Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php } ?>
                    

                           
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