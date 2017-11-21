<br><br><br><br>
        <!-- property area -->
<!-- Trigger the modal with a button -->

        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                     
                <div class="col-lg-3 padding-top-40">
                    <div class="blog pr0">
                        <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                            <div class="panel-heading">
                                <h3 class="panel-title">LIST OF CANDIDATE APPLIED FOR THIS JOB</h3>
                            </div>
                            <div class="panel-body search-widget">
                                <form action="" class=" form-inline"> 
                                   
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

                                if(isset($_GET['id']))
                                {
                                    $show_jobs_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description WHERE j_id=:id";
                                    $show_jobs_stmt=$connection->prepare($show_jobs_query);
                                    $show_jobs_stmt->execute(array(':id'=>$_GET['id']));
                                    $result = $show_jobs_stmt->fetch(PDO::FETCH_ASSOC);
                                
                                       echo "<div class='col-md-12 p0'>
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
                                                         <h7><b>Job Category:</b> ".$result['j_mainduties']."</h7>
                                                         <br>
                                                         <span class='pull-left'><b>Posted:</b> ".$result['j_dateposted']."</span>
                                                         <br> 
                                                         <h7><b>Status:</b> ".$result['j_status']."</h7>
                                                         <br>                                                 
                                                      
                                                        <div class='dealer-action pull-left'>                 
                                                            <a href='index-employer.php?source=editjob&id=".$result['j_id']."' class='button'>Edit </a>
                                                            <a href='index-employer.php?source=listpostjobs&delete_id=".$result['j_id']."' class='button delete_user_car'>Delete</a>";
                                                        ?>
                                                            <a href='#' onclick=" window.open('includes/job-page.php?id=<?php echo $result['j_id'];  ?>')" class='button'>View</a>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                         </div> 
                                    <?php } ?>

                                    

                                                                     
                                </form>
                            </div>
                        </div>

                    </div>
                </div>


              
                <div class="col-md-8  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear"> 
                        <div class="col-xs-10 page-subheader sorting pl0">
                          
                            <ul class="sort-by-list">
                                <li class="active">
                                    <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                        Applied Date <i class="fa fa-sort-amount-asc"></i>                   
                                    </a>
                                </li>
                                <li class="">
                                    <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                        Applied Date <i class="fa fa-sort-numeric-desc"></i>                     
                                    </a>
                                </li>
                            </ul><!--/ .sort-by-list-->

                            <div class="items-per-page">
                                <label for="items_per_page"><b>Candidate per page :</b></label>
                                <div class="sel">
                                    <select id="items_per_page" name="per_page">
                                        <option value="3">3</option>
                                        <option value="6">6</option>
                                        <option value="9">9</option>
                                        <option selected="selected" value="12">12</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                        <option value="60">60</option>
                                    </select>
                                </div><!--/ .sel-->
                            </div><!--/ .items-per-page-->
                        </div>

                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                        </div><!--/ .layout-switcher-->
                    </div>

                    <div class="col-md-12 clear"> 
                        <div id="list-type" class="proerty-th">
                           
                        
                                       <?php 
                     try
                     {
                    require_once 'includes/connection.php';
                    $show_applied_query="SELECT * from job_submitted WHERE j_id=:j_id";
                    $show_applied_stmt=$connection->prepare($show_applied_query);
                    $show_applied_stmt->execute(['j_id'=>$_GET['id']]);
                    while($result_applied = $show_applied_stmt->fetch(PDO::FETCH_ASSOC))
                    {
                       
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
                                                ON a.u_id = c.u_id where a.u_id=:id";
                        $show_profile_stmt=$connection->prepare($show_profile_query);
                        $show_profile_stmt->execute(array(':id'=>$result_applied['u_id']));
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
                                               
                                                <h7><b>Nationality:</b>".$result['up_nationality']."</h7>
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
                        <?php }
                        }
                        }
                        catch(PDOException $e) 
                        {
                            echo $e->getMessage();
                        }?>
                              

                                    </div>
                                </div> 
                        </div>
                    </div>
                    
                    <div class="col-md-12"> 
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

