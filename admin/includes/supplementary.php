 <div id="page-wrapper">    
            <div class="container-fluid">
                <div class="row">
                        
                    <div class="col-lg-12">
                        <h1 class="page-header">User Experience Information</h1>
                    </div>
                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>     
                              
                                
                                
                            </tr>
                        </thead>
                        <tbody>   
                       <?php 
                                include_once "includes/connection.php";                              
                                $question=$admin->view_candidate_supplementary_information($_GET['supplementary_id']);
                                foreach($question as $key =>$value)
                                { 
                                    echo "<tr>";
                                    echo "<td><img width='200' src='../assets/img/profilepicture/".$question[$key]->up_picture."' alt=''><h1>".$question[$key]->u_lname.", ".$question[$key]->u_fname."</h1></td>";
                                
                                    echo "</tr>";
                                    echo "  <thead>
				                            <tr>     
				                                <th>Question</th> 
				                                <th>Answer</th> 
				                             </tr>
				                       		</thead>";
				                    echo "<tr>";
                                    echo "<td>1.Would you agreee to do extra work?</td>";
                                    echo "<td>".$question[$key]->uq_1."</td>";
                                    echo "</tr>";
                                   

                                    echo "<tr>";
                                    echo "<td>2.If your employer asked you to work on your holiday and willing to pay as compensation, are you willing to do so?</td>";
                                     echo "<td>".$question[$key]->uq_2."</td>";
                                    echo "</tr>";

                                       echo "<tr>";
                                    echo "<td>3.Are you willing to work for a family without your own servant room?</td>";
                                     echo "<td>".$question[$key]->uq_3."</td>";
                                    echo "</tr>";
                                   

                                    echo "<tr>";
                                    echo "<td>4.Are you willing to take care of children no matter how many the family has?</td>";
                                    echo "<td>".$question[$key]->uq_4."</td>";
                                    echo "</tr>";

                                       echo "<tr>";
                                    echo "<td>5.Living with elderly person?</td>";
                                 echo "<td>".$question[$key]->uq_5."</td>";
                                    echo "</tr>";
                                   

                                    echo "<tr>";
                                    echo "<td>6.Are you willing to take care of disabled elderly?</td>";
                                    echo "<td>".$question[$key]->uq_6."</td>";
                                    echo "</tr>";

                                       echo "<tr>";
                                    echo "<td>7.Do you got experience to take care of dogs or pets?</td>";
                                    echo "<td>".$question[$key]->uq_7."</td>";
                                    echo "</tr>";
                                   

                                    echo "<tr>";
                                    echo "<td>8.Have you suffered from health problems in your nervous system, eyes, feet, legs or any other parts of your body?</td>";
                                    echo "<td>".$question[$key]->uq_8."</td>";
                                    echo "</tr>";

                                       echo "<tr>";
                                    echo "<td>9. Can you drive?</td>";
                                     echo "<td>".$question[$key]->uq_9."</td>";
                                    echo "</tr>";
                                   

                                    echo "<tr>";
                                    echo "<td>10.Do you smoke?</td>";
                                    echo "<td>".$question[$key]->uq_10."</td>";
                                    echo "</tr>";
                                    // echo "<td>".$experience[$key]->ue_jd."</td>";
                                    // echo "<td>".$experience[$key]->ue_jdlocation."</td>";
                                    // echo "<td>".$experience[$key]->ue_from."</td>";
                                    // echo "<td>".$experience[$key]->ue_to."</td>";
                                    
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
