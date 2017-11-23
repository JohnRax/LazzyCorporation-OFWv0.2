<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LazzyWorks Control Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    <?php 
            include_once "includes/connection.php";
            if($admin->is_loggedin())
            {
                $admin->redirect('homepage.php');
               
            }
            if (isset($_POST['submit'])) 
            {
                $username=$_POST['a_username'];
                $password=$_POST['a_password'];
                if($admin->login($username,$password))
                {
                    $admin->redirect("homepage.php");
                }
                else
                {
                   echo"<script>
                            alert('Wrong Username/Password');
                        </script>";
                }

            }
    
     

    ?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
              
                    <div class="panel-heading">
                    <img src="250x150.png">
                        <h3 id="panel_title">LazzyWorks Control Panel</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" >
                            <fieldset>
                                <div class="form-group">
                                    <input name="a_username" class="form-control" autofocus>
                                </div>
                                <div class="form-group">
                                    <input name="a_password" class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                            
                                <!-- Change this to a button or input when using this as a form -->
                                
                                  <div class="form-group">
                                    <input href="" class="form-control" name="submit" type="submit"/>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
