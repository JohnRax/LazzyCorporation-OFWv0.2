<br><br><br><br>
  <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
                        <!-- /.feature title -->
                        <h2>Recent Posted Jobs</h2>
                        <p>List of Awesome Job Offers here at LAZZY WORKS.</p>
                    </div>
                </div>
        <div class="container">
            <div class="row ">
                        <div class="col-md-12 clear"> 
                                <div id="list-type" class="property-th">
                                   
                                    <div id="list-type" class="proerty-th">   

                                    <?php 

                                         require_once 'includes/connection.php';
                                            $show_job_query="SELECT  *,  DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status order by j_id DESC  limit 7";
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
                                                                <center><h4>".$result['j_jobtitle']."</h4> </center>
                                                              </div> 
                                                               <div class='dot-hr'></div>
                                                             <div class='item-entry1 overflow'>  
                                                                <span class='pull-left'><b>Employer Type : </b>".$result['j_employertype']." </span>
                                                                <br>
                                                                <h7><b>Location: </b> ".$result['j_country']."</h7>
                                                                <br>
                                                                <h7><b>Job Category: </b>".$result['j_mainduties']."</h7>
                                                                <br>
                                                                <span class='pull-left'><b>Posted:</b> ".$result['j_dateposted']."</span>
                                                                <br>
                                                                </div> 
                                                                  ";?>
                                                                  <div class='span9 btn-block no-padding'>
                                                            <button type="button" class="btn btn-large btn-block btn-primary full-width" 
                                                            onclick=" window.open('includes/job-page.php?id=<?php echo $result['j_id'];  ?>')"
                                                                >View Full Post</button>  
                                                    </div>
                                                </div>
                                            </div>
                                <?php } ?>
                                <div class="col-sm-6 col-md-3 p0">
                            <div class="box-tree more-proerty text-center">
                                <br><br> <br><br> <br><br> <br><br>
                                <div class="more-entry overflow">
                                    <h5><a >CAN'T FIND JOBS? </a></h5>
                                    
                                    <button onclick="location.href='index-candidate.php?source=searchfindjob'" class="btn border-btn more-black" value="All properties">All Jobs</button>

                                
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