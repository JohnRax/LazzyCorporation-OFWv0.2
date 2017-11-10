<br><br><br>
        <!-- register-area -->
        <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">

        <?php   
            
            echo register_user();
         ?>
                <div class="col-md-6">
                    <div class="box-for overflow">                         
                        <div class="col-md-12 col-xs-12 login-blocks">
                            <h2>Login : </h2> 
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="email">Phone number *</label>
                                    <input type="text" class="form-control" id="email" name="up_mobile">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default"> Log in</button>
                                </div>
                            </form>
                            <br>
                            
                            <!-- <h2>Social login :  </h2> 
                            
                            <p>
                            <a class="login-social" href="#"><i class="fa fa-facebook"></i>&nbsp;Facebook</a> 
                            <a class="login-social" href="#"><i class="fa fa-google-plus"></i>&nbsp;Gmail</a> 
                            <a class="login-social" href="#"><i class="fa fa-twitter"></i>&nbsp;Twitter</a>  
                            </p>  -->
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-for overflow">
                        <div class="col-md-12 col-xs-12 register-blocks">
                            <h2>New account : </h2> 
                           
                            <!-- <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#usertype").change(function(){
                                        var typevalue=$("#usertype").val();                                       
                                        switch (typevalue) 
                                        {   
                                            case 'disabled':
                                                $("#show").load("ajaxfiles/register-disabled.html");
                                                break;
                                            case 'agent':
                                               $("#show").load("ajaxfiles/register-agent.html");
                                                break;
                                            case 'helper':
                                               $("#show").load("ajaxfiles/register-landlord.html");
                                                break;
                                            case 'agency':
                                               $("#show").load("ajaxfiles/register-buyer.html");
                                                break;
                                            default:
                                               
                                                 break;
                                        } 
                                    });
                                });
                            </script> -->

                            <?php   
            
                                  echo register_user();
                               ?>

                            <form  action="" method="post">                               
                                <div class="form-group">
                                     
                                    <br>
                                     <div class="form-group">

                             
                                     <div class="form-group">
                                         <label for="Lastname">Account Type *</label>
                                            <select id="usertype" class="form-control" name="u_type">
                                                <option class="form-control" selected disabled value="">Select Account Type</option>
                                                 <option class="form-control" value="candidate">Candidate</option>   
                                                 <option class="form-control" value="employer">Employer</option>
                                               
                                            </select>
                                        </div>
                                        <label for="name">Email *</label>
                                        <input type="text" required class="form-control" name="u_email" placeholder="User Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input type="password" required class="form-control" name="u_password" placeholder="******">
                                    </div>

                                    <div class="form-group">
                                        <label for="Lastname">Last Name *</label>
                                        <input type="text" required class="form-control" name="u_lname" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="Firstname">First Name *</label>
                                        <input type="text" required class="form-control" name="u_fname" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="Gender">Gender *</label>
                                         <select id="gender" class="form-control" name="u_gender">
                                                <option class="form-control" selected disabled value="disabled">Select Gender</option>
                                                <option class="form-control" value="male">Male</option>
                                                <option class="form-control" value="female">Female</option>
                                         </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default">Register</button>
                                    </div>
                                        
                                </div>
                               
                            </form>




                        </div>
                    </div>
                </div>


            </div>
        </div>      
