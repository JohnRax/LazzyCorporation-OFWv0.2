 <div id="page-wrapper">    
            <div class="container-fluid">
                <div class="row">
   
                    <div class="col-lg-12">
                        <h1 class="page-header">Candidate Profile</h1>
                    </div>
                                             
                        <table class='table table-bordered table-hover'>
                        <thead>
                            <tr>          
                          
                            <th>Picture</th>
                            <th>Professional Info.</th>
                            <th>Work Experience</th>
                            <th>Suplementary Q&A</th>                
                            <th>Id</th>   
                            <th>Status</th>      
                            <th>Full Name</th> 
                            <th>Gender</th>  
                            <th>Age</th> 
                            <th>Marital Status</th> 
                            <th>Language</th> 
                            <th>Email</th> 
                            <th>Mobile</th> 
                            <th>Telephone</th> 
                            <th>Nationality</th> 
                            <th>Address</th>     
                            </tr>
                        </thead>
                        <tbody> 


                       <?php  

                         include_once "includes/connection.php";
                         if (isset($_GET['remove_profile_id'])) 
                         {
                             if($admin->delete_candidate($_GET['remove_profile_id']))
                             {
                                 echo "<script>
                                          alert('Candidate Remove Successfully');                                       
                                        </script>";       
                             }
                         }
                         if(isset($_GET['approved_profile_id']))
                         {
                            if($admin->approved_candidate($_GET['approved_profile_id']))
                            {
                                   echo "<script>
                                          alert('Candidate Approved Successfully');                                       
                                        </script>";    
                            }
                         }
                         $candidate=$admin->view_candidate();
                         foreach($candidate as $key =>$value)
                         { 
                            echo "<tr>";                        
                            echo "<td><img width='100' src='../assets/img/profilepicture/".$candidate[$key]->up_picture."' alt=''></td>";
                            echo "<td><a href='homepage.php?source=professional&professional_id=".$candidate[$key]->u_id."'>View Professional Info</a></td>";
                            echo "<td><a href='homepage.php?source=experience&experience_id=".$candidate[$key]->u_id."'>View Work Experience </a></td>";  
                            echo "<td><a href='homepage.php?source=supplementary&supplementary_id=".$candidate[$key]->u_id."'>View Supplementary Q&A </a></td>";  
                            echo "<td>".$candidate[$key]->u_id."</td>"; 
                            echo "<td>".$candidate[$key]->up_status."</td>"; 
                            echo "<td>".$candidate[$key]->u_lname.", ".$candidate[$key]->u_fname."</td>";
                            echo "<td>".$candidate[$key]->u_gender."</td>";
                            echo "<td>".$candidate[$key]->up_age."</td>";
                            echo "<td>".$candidate[$key]->up_maritalstatus."</td>";
                            echo "<td>".$candidate[$key]->up_languages."</td>";
                            echo "<td>".$candidate[$key]->up_email."</td>";
                            echo "<td>".$candidate[$key]->up_mobile."</td>";
                            echo "<td>".$candidate[$key]->up_telephone."</td>";
                            echo "<td>".$candidate[$key]->up_nationality."</td>";
                            echo "<td>".$candidate[$key]->up_address."</td>";  
                            echo "<td><a href='homepage.php?source=candidate&remove_profile_id=".$candidate[$key]->u_id."'class='fa fa-remove'>Remove</a></td>";
                            echo "<td><a href='homepage.php?source=candidate&approved_profile_id=".$candidate[$key]->u_id."' class='fa fa-check'>Approved</a></td>";          
                            echo "</tr>";
                            echo "</tbody>";
                            echo "<tr>";
                        }
                        

                    ?>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
              </div>
            <!-- /.container-fluid -->
          </div>
        <!-- /#page-wrapper -->
