<br><br><br><br>
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
                                                        <img src='assets/img/profilepicture/".$result['j_logo']."'>
                                                          </div>
                                                             <div class='item-entry overflow'>
                                                                <h4>".$result['j_jobtitle']."</h4>
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
                                                                  ";?>
                                                            <button type="button" class="btn btn-large btn-block btn-primary full-width" 
                                                            onclick=" window.open('includes/job-page.php?id=<?php echo $result['j_id'];  ?>')"
                                                                >View Full Post</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <?php } ?>

                                       


                                            </div>
                                        </div>                         
                                    </div>     
                                </div>
                            </div>
               </div>
            </div>