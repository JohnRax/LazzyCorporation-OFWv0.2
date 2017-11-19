<br><br><br><br><br>
        <!-- property area -->
        <!-- Trigger the modal with a button -->

        <div class="content-area recent-property" style="background-color: #FFF;">
            <div class="container">   
            <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center ">
                        <!-- /.feature title -->
                        <h2>MY APPLIED JOBS</h2>
                       
                    </div>
                </div>
                <div class="row">
                   
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


                                $check_applied_query="SELECT * from job_submitted WHERE u_id=:id";
                                $check_applied_stmt=$connection->prepare($check_applied_query);
                                $check_applied_stmt->execute(array(':id'=>$_SESSION['user_session']));
                                while($result = $check_applied_stmt->fetch(PDO::FETCH_ASSOC))
                                {


                        
                                    $show_jobs_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description WHERE j_id=:id";
                                    $show_jobs_stmt=$connection->prepare($show_jobs_query);
                                    $show_jobs_stmt->execute(array(':id'=>$result['j_id']));
                                    while($result = $show_jobs_stmt->fetch(PDO::FETCH_ASSOC))
                                    {
                                       echo "<div class='col-md-4 p0'>
                                            <div class='box-two proerty-item'>
                                                <div class='item-thumb'>
                                                    <a href='' ><img src='assets/img/profilepicture/".$result['j_logo']."'></a>
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
                                                         <h7><b>Status: </b>".$result['j_status']."</h7>
                                                         <br>                                                 
                                                      
                                                        <div class='dealer-action pull-left'> 
                                                            ";
                                                        ?>
                                                           <button class="navbar-btn nav-button wow bounceInRight login" type="reset" onclick=" window.open('includes/job-page.php?id=<?php echo $result['j_id'];  ?>')">VIEW</button>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                        <?php }    

                                    }?>
                            

                               
                                                          
                                                       
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
                         
                    
                </div>
            </div>
        </div>

        