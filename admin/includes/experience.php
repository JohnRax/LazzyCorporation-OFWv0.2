 <div id="page-wrapper">    
            <div class="container-fluid">
                <div class="row">
                        
                    <div class="col-lg-12">
                        <h1 class="page-header">User Experience Information</h1>
                    </div>
                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>     
                                <th>Picture</th> 
                                <th>Id</th> 
                                <th>Full Name</th>  
                                
                                <th>Job Description</th> 
                                <th>Job Location</th> 
                                <th>From</th> 
                                <th>To</th>
                                <th>Job Location</th>

                            </tr>
                        </thead>
                        <tbody>   
                       <?php 
                                include_once "includes/connection.php";                              
                                $experience=$admin->view_candidate_experience_information($_GET['experience_id']);
                                foreach($experience as $key =>$value)
                                { 
                                    echo "<tr>";
                                    echo "<td><img width='100' src='../assets/img/profilepicture/".$experience[$key]->up_picture."' alt=''></td>";
                                    echo "<td>".$experience[$key]->u_id."</td>";
                                    echo "<td>".$experience[$key]->u_lname.", ".$experience[$key]->u_fname."</td>";

                                    echo "<td>".$experience[$key]->ue_jd."</td>";
                                    echo "<td>".$experience[$key]->ue_jdlocation."</td>";
                                    echo "<td>".$experience[$key]->ue_from."</td>";
                                    echo "<td>".$experience[$key]->ue_to."</td>";
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
