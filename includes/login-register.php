<br><br><br>
 <?php  
    require_once 'connection.php';  
    if(isset($_POST['btn-register']))
    {

        $type=trim($_POST['u_type']);
        $email=trim($_POST['u_email']);
        $mobile=trim($_POST['u_mobile']);
        $password=trim($_POST['u_password']);
        $lastname=trim($_POST['u_lname']);
        $firstname=trim($_POST['u_fname']);
        $gender=trim($_POST['u_gender']);

        try
        {
            $check_query="SELECT * FROM user WHERE u_email=:email";
            $check_stmt=$connection->prepare($check_query);
            $check_stmt->execute(['email'=>$email]);
            $check_email=$check_stmt->fetch(PDO::FETCH_ASSOC);
            if($check_email['u_email']==$email)
            {
                $error="Sorry Email Address is already registered";

            }
            else
            {
                 $check_query="SELECT * FROM user WHERE u_mobile=:mobile";
                 $check_stmt=$connection->prepare($check_query);
                 $check_stmt->execute(['mobile'=>$mobile]);
                 $check_mobile=$check_stmt->fetch(PDO::FETCH_ASSOC);
                 if ($check_mobile['u_mobile']==$mobile) 
                 {
                     $error="Sorry Phone Number is already registered";
                 }
                 else
                 {
                     if($user->register($type,$email,$mobile,$password,$lastname,$firstname,$gender))
                     {
                        $user->redirect('index.php?source=loginandregister&joined');
                     }
                 }
            }

        }
        catch(PDOExeception $e)
        {
            echo $e->getMessage();
        }
    }
   
    if (isset($_POST['btn-login'])) 
    {
        $email=$_POST['u_email'];
        $password=$_POST['u_password'];
        if($user->login($email,$password))
        {
           
            $user->redirect('index.php');
           
        }
        else
        {
            $error_login="Wrong Details";
        }
    }
  

  ?>
 <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">
                <div class="col-md-6">
                    <div class="box-for overflow">                         
                        <div class="col-md-12 col-xs-12 login-blocks">
                            <?php
                                if(isset($error_login))
                                {
                                  
                                      ?>
                                      <div class="alert alert-danger">
                                          <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error_login; ?>
                                      </div>
                                      <?php
                                   
                                }                             
                                ?>
                            <h2>Login : </h2>                           
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="email">Phone number/Email Address *</label>
                                    <input type="text" class="form-control" id="u_email" name="u_email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input type="password" class="form-control" name="u_password">
                                </div>
                                <div class="text-center">
                                     <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                                     <i class="glyphicon glyphicon-log-in"></i>&nbsp;SIGN IN
                                </button>                         
                                 
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
                              <?php
                                if(isset($error))
                                {
                                  
                                      ?>
                                      <div class="alert alert-danger">
                                          <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                                      </div>
                                      <?php
                                   
                                }
                                else if(isset($_GET['joined']))
                                {
                                     ?>
                                     <div class="alert alert-info">
                                          <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered 
                                     </div>
                                     <?php
                                }
                            
                                ?>
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
                                        
                                        <label for="name">Phone Number *</label>
                                        <input type="text" required class="form-control" name="u_mobile" placeholder="User Name">
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
                                        <button type="submit" name="btn-register" class="btn btn-block btn-primary">
                                     <i class="glyphicon glyphicon-log-in"></i>&nbsp;REGISTER
                                </button>    
                                    </div>
                                        
                                </div>
                               
                            </form>




                        </div>
                    </div>
                </div>


            </div>
        </div>      
