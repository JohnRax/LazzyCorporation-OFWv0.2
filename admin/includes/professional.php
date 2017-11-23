 <div id="page-wrapper">    
            <div class="container-fluid">
                <div class="row">
                        
                    <div class="col-lg-12">
                        <h1 class="page-header">User Professional Information</h1>
                    </div>
                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>     
                                <th>Picture</th> 
                                <th>Id</th> 
                                <th>Full Name</th>  
                                <th>Prefered Work Location</th> 
                                <th>Years of Experience</th> 
                                <th>Experience Summary</th> 
                                <th>Cooking Skills</th>
                                <th>Skills Experience</th>  
                                <th>Other Skills</th>  
                                <th>Availability</th>        
                            </tr>
                        </thead>
                        <tbody>   
                       <?php 
                                include_once "includes/connection.php";                              
                                $professional=$admin->view_candidate_professional_information($_GET['professional_id']);
                                foreach($professional as $key =>$value)
                                { 
                                    echo "<tr>";
                                    echo "<td><img width='100' src='../assets/img/profilepicture/".$professional[$key]->up_picture."' alt=''></td>";
                                    echo "<td>".$professional[$key]->u_id."</td>";
                                    echo "<td>".$professional[$key]->u_lname.", ".$professional[$key]->u_fname."</td>";

                                    echo "<td>".$professional[$key]->upi_preferedworklocation."</td>";
                                    echo "<td>".$professional[$key]->upi_yearsofexp."</td>";
                                    echo "<td>".$professional[$key]->upi_expsummary."</td>";
                                     echo "<td>".$professional[$key]->upi_cookingskills."</td>";
                                    echo "<td>".$professional[$key]->upi_skillsexp."</td>";
                                     echo "<td>".$professional[$key]->upi_otherskills."</td>";
                                    echo "<td>".$professional[$key]->upi_availability."</td>";
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
