<br><br><br>
<script>
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode < 48 || charCode > 57)
        return false;
    return true;    
}
</script>
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
        $gender=trim(@$_POST['u_gender']);
        $ucountry=trim(@$_POST['u_country']);

        try
            {
                 $check_query="SELECT * FROM user WHERE u_mobile=:mobile";
                 $check_stmt=$connection->prepare($check_query);
                 $check_stmt->execute(array(':mobile'=>$mobile));
                 $check_mobile=$check_stmt->fetch(PDO::FETCH_ASSOC);
                 if ($check_mobile['u_mobile']==$mobile) 
                 {
                     $error="Sorry Phone Number is already registered";
                 }
                 else
                 {
                     if($user->register($type,$email,$mobile,$password,$lastname,$firstname,$gender,$ucountry))
                     {
                        $user->redirect('index.php?source=loginandregister&joined');
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
                                    <input type="text" required class="form-control" id="u_email" name="u_email" placeholder="Phone number/Email Address">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input type="password" required class="form-control" name="u_password" placeholder="******">
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
                           
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#usertype").change(function(){
                                        var typevalue=$("#usertype").val();                                       
                                        switch (typevalue) 
                                        {   
                                           
                                            case 'Candidate':
                                               $("#show").load("ajaxfiles/register-candidate.html");
                                                break;
                                            case 'Agency':
                                               $("#show").load("ajaxfiles/register-agency.html");
                                                break;
                                            default:
                                               
                                                 break;
                                        } 
                                    });
                                });
                            </script>


                            <form  action="" method="post">                               
                                <div  class="form-group">
                                     <div class="form-group">
                                         <label  for="Lastname">Account Type *</label>
                                            <select  id="usertype" class="form-control" name="u_type">
                                                <option class="form-control" selected disabled value="">Select Account Type</option>
                                                 <option class="form-control" value="Candidate">Candidate</option>   
                                                 <option class="form-control" value="Agency">Agency</option>
                                               
                                            </select>
                                            <div id="show">
                                              
                                            </div>
                                        </div>
                                </div>
                               
                            </form>

                              




                        </div>
                    </div>
                </div>


            </div>
        </div>      
