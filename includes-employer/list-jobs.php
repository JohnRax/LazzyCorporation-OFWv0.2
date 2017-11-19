<br><br><br><br><br>
        <!-- property area -->
        <!-- Trigger the modal with a button -->

        <div class="content-area recent-property" style="background-color: #FFF;">
            <div class="container">   
                <div class="row">

                       <div class="col-md-10 col-md-offset-1 col-sm-12 text-center ">
                        <!-- /.feature title -->
                        <h2>MY JOB POST</h2>
                       
                    </div>
                     <div class="col-md-1 pr-30 padding-top-40 properties-page user-properties">
                     </div>
                    <div class="col-md-12 pr-30 padding-top-40 properties-page user-properties">


                        <div class="section"> 
                            <div id="list-type" class="proerty-th">
                                                      
                            <?php  
                                require_once 'includes/connection.php';
                                if(isset($_GET['delete_id']))
                                {
                                    if($user->delete_job($_GET['delete_id']))
                                    {
                                            echo"<script>
                                                    alert('Delete Complete!');
                                                </script>";
                                    }
                                }
                                $show_jobs_query="SELECT * FROM job_description WHERE u_id=:id";
                                $show_jobs_stmt=$connection->prepare($show_jobs_query);
                                $show_jobs_stmt->execute(array(':id'=>$_SESSION['user_session']));
                                while($result = $show_jobs_stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                   echo "<div class='col-md-4 p0'>
                                        <div class='box-two proerty-item'>
                                            <div class='item-thumb'>
                                                <a href='index-employer.php?source=editjob&id=".$result['j_id']."' ><img src='assets/img/profilepicture/".$result['j_logo']."'></a>
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
                                                     <h7><b>Status:</b>".$result['j_status']."</h7>
                                                     <br>                                                 
                                                  
                                                    <div class='dealer-action pull-left'> 
                                                        <a href='index-employer.php?source=viewsubmitted&id=".$result['j_id']."'  data-toggle='modal' class='button'>View Submitted Profile </a>                   
                                                        <a href='index-employer.php?source=editjob&id=".$result['j_id']."' class='button'>Edit </a>
                                                        <a href='index-employer.php?source=listpostjobs&delete_id=".$result['j_id']."' class='button delete_user_car'>Delete</a>";
                                                    ?>
                                                        <a href='#' onclick=" window.open('includes/job-page.php?id=<?php echo $result['j_id'];  ?>')" class='button'>View</a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <?php } ?>
                            

                               
                                                          
                                                       
                            </div>
                        </div>

                        <div class="section"> 
                            <div class="pull-right">
                                <div class="pagination">
                                    <ul>
                                        <li><a href="#">Prev</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>                
                        </div>

                    </div>       
                            <div class="col-md-1 pr-30 padding-top-40 properties-page user-properties">
                     </div>
                    
                </div>
            </div>
        </div>

        