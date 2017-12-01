<br><br><br><br><br>
        <!-- property area -->
        <!-- Trigger the modal with a button -->

        <div class="content-area recent-property" style="background-color: #FFF;">
            <div class="container">   
                <div class="row">

                       <div class="col-md-10 col-md-offset-1 col-sm-12 text-center ">
                        <!-- /.feature title -->
                        <h2>MY CANDIDATES</h2>
                       
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
                        if($user->delete_agency_candidate($_GET['delete_id']))
                            {
                                echo"<script>
                                        alert('Delete Complete!');
                                    </script>";
                             }
                      }
                    $agency_candidate_query="SELECT * FROM agency_candidate WHERE u_id=:id";
                    $agency_candidate_stmt=$connection->prepare($agency_candidate_query);
                    $agency_candidate_stmt->execute(array(':id'=>$_SESSION['user_session']));
                    while($candidates = $agency_candidate_stmt->fetch(PDO::FETCH_ASSOC))
                    {

                      $show_profile_query="SELECT
                                                a.u_id, 
                                                a.u_fname,
                                                a.u_lname,
                                                b.up_age,
                                                b.up_picture,
                                                b.up_address,
                                                b.up_nationality,
                                                 DATE_FORMAT(b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                b.up_category,
                                                b.up_address,
                                                c.upi_skillsexp
                                              FROM
                                                user_details AS a 
                                                 JOIN user_personal_information AS b 
                                                  ON b.u_id = a.u_id 
                                                 JOIN user_professional_information AS c 
                                                  ON a.u_id = c.u_id  where  a.u_id=:aid and b.up_status=:status order by a.u_id DESC  limit 7 ";
                      $show_profile_stmt=$connection->prepare($show_profile_query);
                      $show_profile_stmt->execute(array(':aid'=>$candidates['ac_id'],':status'=>'Approved'));
                      while($result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC))
                      {
                          echo " <div class='col-sm-6 col-md-3 p0'>
                                      <div class='box-two proerty-item'>
                                          <div class='item-thumb'>
                                             <img src='assets/img/profilepicture/".$result['up_picture']."'>
                                          </div>
                                          <div class='item-entry overflow'>
                                             <center> <h4>".$result['u_fname']." ".$result['u_lname']."</h4></center>
                                          </div>
                                              <div class='dot-hr'></div>
                                            <div class='item-entry1 overflow'>  
                                              <span class='pull-left'><b>Age : </b>".$result['up_age']."</span>
                                              <br>
                                              <h7><b>Location: </b>".$result['up_address']."</h7>
                                              <br>
                                             <h7><b>Nationality: </b>".$result['up_nationality']."</h7>
                                              <br>                                            <h7><b>Job Expertises:</b></h7>
                                              <h7>".$result['upi_skillsexp']."</h7>
                                              <br>
                                              <span class='pull-left'><b>Posted: </b> ".$result['up_dateposted']."</span>
                                               <br>
                                                  <div class='dealer-action pull-left'> 
                                                                      
                                                        <a href='index-employer.php?source=editcandidate&id=".$result['u_id']."' class='button'>Edit </a>
                                                        <a href='index-employer.php?source=listpostcandidate&delete_id=".$result['u_id']."' class='button delete_user_car'>Delete</a> ";
                                                        ?>
                                                        <a href=''   class='button' onclick=" window.open('includes/candidate-page.php?id=<?php echo $result['u_id']; ?>')">View Profile </a>  

                                              </div>
                                              
                                          </div>
                                  </div> 
                                         
                      <?php           
                      } 

                    }?>
                               
                                                          
                                                       
                            </div>
                        </div>

                        <!-- <div class="section"> 
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
                        </div> -->

                    </div>       
                            <div class="col-md-1 pr-30 padding-top-40 properties-page user-properties">
                     </div>
                    
                </div>
            </div>
        </div>

        