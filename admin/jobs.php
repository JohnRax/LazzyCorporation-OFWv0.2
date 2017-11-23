  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
         
                    <div class="col-lg-12">
                        <h1 class="page-header">Jobs</h1>
                    </div>
                   
                  
                     <table class="table table-bordered table-hover" >
                        <thead>
                        
                            <tr>   
                                <th></th> 
                                <th></th>
                                <th>Logo</th>                  
                              
                                <th>Id</th> 
                                <th>Post By</th>   
                                <th>Status</th> 
                                <th>Title</th> 
                                <th>Type</th> 
                                <th>Country</th> 
                                <th>Location</th> 
                                <th>Job Type</th> 
                                <th>Category</th> 
                                <th>Description</th> 
                                <th>Working Status</th> 
                                <th>Main Duties</th> 
                                <th>Cooking Skills</th> 
                                <th>Required Languages</th> 
                                <th>Application Email</th> 
                                <th>Nationality</th> 
                                <th>Family Type</th> 
                                <th>Start Date</th> 
                                <th>Monthly Salary</th> 
                                            
                            </tr>
                        </thead>
                        <tbody >   
                           <?php

                                include_once "includes/connection.php";
                                if (isset($_GET['remove_job_id'])) 
                                {
                                    if($admin->delete_job($_GET['remove_job_id']))
                                    {
                                        echo "<script>
                                                alert('Job Remove Successfully');                                       
                                              </script>";
                                    }
                                }
                                if (isset($_GET['approved_job_id'])) 
                                {
                                    if($admin->approved_job($_GET['approved_job_id']))
                                    {
                                        echo "<script>
                                                alert('Job Approved Successfully');                                       
                                              </script>";
                                    }
                                }
                                $jobs=$admin->view_jobs();
                                foreach($jobs as $key =>$value)
                                { 
                                        echo "<tr>";
                                        echo "<td><a href='homepage.php?source=jobs&remove_job_id=".$jobs[$key]->j_id."' class='fa fa-remove'> Remove</a></td>";
                                        echo "<td><a href='homepage.php?source=jobs&approved_job_id=".$jobs[$key]->j_id."' class='fa fa-check'> Approved</a></td>";
                                        echo "<td><img width='100' src='../assets/img/profilepicture/".$jobs[$key]->j_logo."' alt=''></td>";
                                      
                                        echo "<td>".$jobs[$key]->j_id."</td>";
                                        echo "<td>".$jobs[$key]->u_id."</td>";
                                        echo "<td>".$jobs[$key]->j_status."</td>";
                                        echo "<td>".$jobs[$key]->j_jobtitle."</td>";
                                        echo "<td>".$jobs[$key]->j_employertype."</td>";
                                        echo "<td>".$jobs[$key]->j_country."</td>";
                                       
                                        echo "<td>".$jobs[$key]->j_districtlocation."</td>";      
                                        echo "<td>".$jobs[$key]->j_type."</td>";
                                        echo "<td>".$jobs[$key]->j_category."</td>";
                                        echo "<td>".$jobs[$key]->j_description."</td>";
                                        echo "<td>".$jobs[$key]->j_workingstatus."</td>";
                                        echo "<td>".$jobs[$key]->j_mainduties."</td>";
                                        echo "<td>".$jobs[$key]->j_cookingskill."</td>";
                                        echo "<td>".$jobs[$key]->j_requiredlanguages."</td>";
                                        echo "<td>".$jobs[$key]->j_applicationemail."</td>";
                                        echo "<td>".$jobs[$key]->j_nationality."</td>";
                                        echo "<td>".$jobs[$key]->j_familytype."</td>";
                                        echo "<td>".$jobs[$key]->j_startdate."</td>";
                                        echo "<td>".$jobs[$key]->j_monthlysalary."</td>";
                                
                                    
                                        echo "</tr>";
                                }

                           ?>
                              
                                                                                                                                                                        
                        </tbody>
                    </table>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
