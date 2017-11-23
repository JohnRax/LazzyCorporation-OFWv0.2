  <div id="page-wrapper">    
            <div class="container-fluid">
                <div class="row">
                        
                    <div class="col-lg-12">
                        <h1 class="page-header">User</h1>
                    </div>
                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>     
                                <th></th>      
                                <th>Id</th> 
                                <th>Password</th>  
                                <th>Email</th> 
                                <th>Mobile</th> 
                                <th>Type</th> 
                                            
                            </tr>
                        </thead>
                        <tbody>   
                       <?php 
                                include_once "includes/connection.php";
                                if(isset($_GET['remove_user_id']))
                                {
                                    if($admin->delete_user($_GET['remove_user_id']))
                                    {
                                         echo "<script>
                                                alert('User Remove Successfully');                                       
                                              </script>";
                                    }
                                }
                                
                                $users=$admin->view_users();
                                foreach($users as $key =>$value)
                                { 
                                    echo "<tr>";
                                    echo "<td><a href='homepage.php?source=user&remove_user_id=".$users[$key]->u_id."' class='fa fa-remove'> Remove User</a></td>";
                                    echo "<td>".$users[$key]->u_id."</td>";
                                    echo "<td>".$users[$key]->u_password."</td>";
                                    echo "<td>".$users[$key]->u_email."</td>";
                                    echo "<td>".$users[$key]->u_mobile."</td>";
                                    echo "<td>".$users[$key]->u_type."</td>";
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
