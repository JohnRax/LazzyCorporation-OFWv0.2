<br><br><br><br>
        <!-- property area -->
<!-- Trigger the modal with a button -->
<script>
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode < 48 || charCode > 57)
        return false;
    return true;    
}

</script>
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                     
                <div class="col-md-3 p0 padding-top-40">
                    <div class="blog-asside-right pr0">
                        <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Smart search</h3>
                            </div>
                            <div class="panel-body search-widget">
                                <form action="" method="post" class="form-inline"> 
                                    <fieldset>
                                     
                                    </fieldset>

                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">

                                                <select name="up_address" class="selectpicker" required data-live-search="true" data-live-search-style="begins" title="Location">
                                                                <option class="form-control" selected disabled value="">Search By Location</option>
                                                                <option value="Philippines">
                                                                    Philippines
                                                                </option>
                                                                <option value="Hong Kong">
                                                                    Hong Kong
                                                                </option>
                                                                <option value="China">
                                                                    China
                                                                </option>
                                                                <option value="Saudi Arabia">
                                                                    Saudi Arabia
                                                                </option>
                                                                <option value="United Arab Emirates">
                                                                    United Arab Emirates
                                                                </option>
                                                                <option value="Qatar">
                                                                    Qatar
                                                                </option>
                                                                <option value="Taiwan">
                                                                    Taiwan
                                                                </option>
                                    
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-6">

                                                <select id="basic" class="form-control" name="gender">
                                                    <option class="form-control" selected disabled value="">Gender</option>
                                                    <option class="form-control" value="male">male</option>
                                                    <option class="form-control" value="female">female</option>
                                                </select>
                                            </div>
                                        
                                    
                                        
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <input name="up_age" onkeypress="return isNumberKey(event)" type="text" class="form-control" maxlength="2" minlength="2"  placeholder="Age" title="Please input your age">
                                                </div>                                                
                                            </div>
                                                                                     
                                        </div>
                                    </fieldset>  
                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input id="in-helper_requirement2-107" name="upi_skillsexp[]" type="checkbox" value="Baby Care"> Baby Care</label>
                                                </div> 
                                            </div>

                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input id="in-helper_requirement2-236" name="upi_skillsexp[]" type="checkbox" value="Child Care"> Child Care</label>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input id="in-helper_requirement2-110" name="upi_skillsexp[]" type="checkbox" value="Elder Care"> Elder Care</label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input id="in-helper_requirement2-109" nname="upi_skillsexp[]" type="checkbox" value="Teen Care">Teen Care </label>
                                                </div>
                                            </div>  
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label><input id="in-helper_requirement2-113" name="upi_skillsexp[]" type="checkbox" value="Housekeeping"> Housekeeping </label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input id="in-helper_requirement2-237" name="upi_skillsexp[]" type="checkbox" value="Cooking"> Cooking</label>
                                                </div>
                                            </div>  
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label>  <input id="in-helper_requirement2-111" name="upi_skillsexp[]" type="checkbox" value="Professional Driver"> Driver</label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label>  <input id="in-helper_requirement2-112" name="upi_skillsexp[]" type="checkbox" value="Pet Care"> Pet Care </label>
                                                </div>
                                            </div>  
                                        </div>
                                    </fieldset>



                                    <fieldset >
                                        <div class="row">
                                            <div class="col-xs-12">  
                                                <input class="button btn largesearch-btn" value="Search" type="submit" name="search">
                                            </div>  
                                        </div>
                                    </fieldset>                                     
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-9  pr0 padding-top-40 properties-page">
                    <div class="col-md-12 clear"> 
                        <div class="col-xs-10 page-subheader sorting pl0">
                            <ul class="sort-by-list">
                                <li class="active">
                                    <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                        Posted Date <i class="fa fa-sort-amount-asc"></i>                   
                                    </a>
                                </li>
                                <li class="">
                                    <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                        Posted Date <i class="fa fa-sort-numeric-desc"></i>                     
                                    </a>
                                </li>
                            </ul><!--/ .sort-by-list-->

                           
                        </div>

                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                        </div><!--/ .layout-switcher-->
                    </div>

                    <div class="col-md-12 clear"> 
                        <div id="list-type" class="proerty-th">
                           
                            <?php 

                            require_once 'includes/connection.php';
                            if(isset($_POST['search']))
                            {

                                $show_profile_query="SELECT
                                                      a.u_id, 
                                                      a.u_fname,
                                                      a.u_lname,
                                                      b.up_age,
                                                      b.up_picture,
                                                      DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                      b.up_address,
                                                      b.up_nationality,
                                                      b.up_category,
                                                      b.up_address,
                                                      c.upi_skillsexp,
                                                      c.upi_yearsofexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status order by u_id desc";
                                $show_profile_stmt=$connection->prepare($show_profile_query);
                                $show_profile_stmt->execute(['status'=>'Approved']);
                              

                                if(!empty($_POST['up_address']) && !empty($_POST['gender']))
                                {

                                    $show_profile_query="SELECT
                                                      a.u_id, 
                                                      a.u_fname,
                                                      a.u_lname,
                                                      b.up_age,
                                                      a.u_gender,
                                                      b.up_picture,
                                                      DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                      b.up_address,
                                                      b.up_nationality,
                                                      b.up_category,
                                                      b.up_address,
                                                      c.upi_skillsexp,
                                                      c.upi_yearsofexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and a.u_gender=:gender and b.up_address=:address order by u_id desc";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(['status'=>'Approved','gender'=>$_POST['gender'],'address'=>$_POST['up_address']]);
                                }
                                else if(!empty($_POST['up_age']) && !empty($_POST['gender']))
                                {
                                      $show_profile_query="SELECT
                                                      a.u_id, 
                                                      a.u_fname,
                                                      a.u_lname,
                                                      b.up_age,
                                                      a.u_gender,
                                                      DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                      b.up_picture,
                                                      b.up_address,
                                                      b.up_nationality,
                                                      b.up_category,
                                                      b.up_address,
                                                      c.upi_skillsexp,
                                                      c.upi_yearsofexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and a.u_gender=:gender and b.up_age=:age order by u_id desc";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(['status'=>'Approved','gender'=>$_POST['gender'],'age'=>$_POST['up_age']]);
                                }
                                else if(!empty($_POST['up_age']) && !empty($_POST['upi_skillsexp']))
                                {
                                    if( isset($_POST['upi_skillsexp']) && !empty($_POST['upi_skillsexp']) ) 
                                    { 
                                        $skills = implode(',', $_POST['upi_skillsexp']);
                                    }
                                                                                                 
                                    $array_skills = explode(',',  $skills);

                                   $show_profile_query="SELECT
                                                          a.u_id, 
                                                          a.u_fname,
                                                          a.u_lname,
                                                          b.up_age,
                                                          a.u_gender,
                                                          DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                          b.up_picture,
                                                          b.up_address,
                                                          b.up_nationality,
                                                          b.up_category,
                                                          b.up_address,
                                                          c.upi_skillsexp,
                                                          c.upi_yearsofexp
                                                        FROM
                                                        user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id ";
                                                            
                                                        foreach($array_skills as $val)
                                                        {
                                                            $arr = "'%{$val}%'";
                                                            $new_arr[] =" c.upi_skillsexp LIKE ".$arr;
                                                        }

                                                        $new_arr = implode(" OR ", $new_arr);
                                                        $show_profile_query.=" where ".$new_arr;
                                                        $show_profile_query.=" and b.up_status=:status and b.up_age=:age order by u_id desc";
                                                        $show_profile_stmt=$connection->prepare($show_profile_query);
                                                        $show_profile_stmt->execute(['status'=>'Approved','age'=>$_POST['up_age']]);
                                }
                                else if(!empty($_POST['up_address']) && !empty($_POST['up_age']))
                                {
                                      $show_profile_query="SELECT
                                                      a.u_id, 
                                                      a.u_fname,
                                                      a.u_lname,
                                                      b.up_age,
                                                      a.u_gender,
                                                      DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                      b.up_picture,
                                                      b.up_address,
                                                      b.up_nationality,
                                                      b.up_category,
                                                      b.up_address,
                                                      c.upi_skillsexp,
                                                      c.upi_yearsofexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and b.up_address=:address and b.up_age=:age order by u_id desc";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(['status'=>'Approved','address'=>$_POST['up_address'],'age'=>$_POST['up_age']]);
                                }
                                else if(!empty($_POST['up_address']) && !empty($_POST['upi_skillsexp']))
                                {
                                    if( isset($_POST['upi_skillsexp']) && !empty($_POST['upi_skillsexp']) ) 
                                    { 
                                        $skills = implode(',', $_POST['upi_skillsexp']);
                                    }
                                                                                                 
                                    $array_skills = explode(',',  $skills);
                                    $show_profile_query="SELECT
                                                          a.u_id, 
                                                          a.u_fname,
                                                          a.u_lname,
                                                          b.up_age,
                                                          a.u_gender,
                                                          b.up_picture,
                                                          DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                          b.up_address,
                                                          b.up_nationality,
                                                          b.up_category,
                                                          b.up_address,
                                                          c.upi_skillsexp,
                                                          c.upi_yearsofexp
                                                        FROM
                                                        user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id order by u_id desc";
                                                            
                                                        foreach($array_skills as $val)
                                                        {
                                                            $arr = "'%{$val}%'";
                                                            $new_arr[] =" c.upi_skillsexp LIKE ".$arr;
                                                        }

                                                        $new_arr = implode(" OR ", $new_arr);
                                                        $show_profile_query.=" where ".$new_arr;
                                                        $show_profile_query.=" and b.up_status=:status and b.up_address=:address" ;
                                                        $show_profile_stmt=$connection->prepare($show_profile_query);
                                                        $show_profile_stmt->execute(['status'=>'Approved','address'=>$_POST['up_address']]);
                                }
                                else if(!empty($_POST['gender']) && !empty($_POST['upi_skillsexp']))
                                {
                                    if( isset($_POST['upi_skillsexp']) && !empty($_POST['upi_skillsexp']) ) 
                                    { 
                                        $skills = implode(',', $_POST['upi_skillsexp']);
                                    }
                                                                                                 
                                    $array_skills = explode(',',  $skills);

                                   $show_profile_query="SELECT
                                                          a.u_id, 
                                                          a.u_fname,
                                                          a.u_lname,
                                                          b.up_age,
                                                          a.u_gender,
                                                          DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                          b.up_picture,
                                                          b.up_address,
                                                          b.up_nationality,
                                                          b.up_category,
                                                          b.up_address,
                                                          c.upi_skillsexp,
                                                          c.upi_yearsofexp
                                                        FROM
                                                        user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id ";
                                                            
                                                        foreach($array_skills as $val)
                                                        {
                                                            $arr = "'%{$val}%'";
                                                            $new_arr[] =" c.upi_skillsexp LIKE ".$arr;
                                                        }

                                                        $new_arr = implode(" OR ", $new_arr);
                                                        $show_profile_query.=" where ".$new_arr;
                                                        $show_profile_query.=" and b.up_status=:status and a.u_gender=:gender order by u_id desc";
                                                        $show_profile_stmt=$connection->prepare($show_profile_query);
                                                        $show_profile_stmt->execute(['status'=>'Approved','gender'=>$_POST['gender']]);

                                }
                                else if(!empty($_POST['up_address']) && !empty($_POST['up_age']))
                                {
                                    $show_profile_query="SELECT
                                                      a.u_id, 
                                                      a.u_fname,
                                                      a.u_lname,
                                                      b.up_age,
                                                      a.u_gender,
                                                      DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                      b.up_picture,
                                                      b.up_address,
                                                      b.up_nationality,
                                                      b.up_category,
                                                      b.up_address,
                                                      c.upi_skillsexp,
                                                      c.upi_yearsofexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and b.up_age=:age and b.up_address=:address order by u_id desc";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(['status'=>'Approved','age'=>$_POST['up_age'],'address'=>$_POST['up_address']]);
                                }
                                else if(!empty($_POST['up_address']))
                                {
                                    
                                     $show_profile_query="SELECT
                                                      a.u_id, 
                                                      a.u_fname,
                                                      a.u_lname,
                                                      b.up_age,
                                                      b.up_picture,
                                                      DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                      b.up_address,
                                                      b.up_nationality,
                                                      b.up_category,
                                                      b.up_address,
                                                      c.upi_skillsexp,
                                                      c.upi_yearsofexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and b.up_address=:address order by u_id desc";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(['status'=>'Approved','address'=>$_POST['up_address']]);
                                }
                                else if(!empty($_POST['gender']))
                                {
                                     $show_profile_query="SELECT
                                                      a.u_id, 
                                                      a.u_fname,
                                                      a.u_lname,
                                                      b.up_age,
                                                      a.u_gender,
                                                      DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                      b.up_picture,
                                                      b.up_address,
                                                      b.up_nationality,
                                                      b.up_category,
                                                      b.up_address,
                                                      c.upi_skillsexp,
                                                      c.upi_yearsofexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and a.u_gender=:gender order by u_id desc";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(['status'=>'Approved','gender'=>$_POST['gender']]);
                                }
                                else if(!empty($_POST['up_age']))
                                {
                                     $show_profile_query="SELECT
                                                      a.u_id, 
                                                      a.u_fname,
                                                      a.u_lname,
                                                      b.up_age,
                                                      a.u_gender,
                                                      b.up_picture,
                                                      DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                      b.up_address,
                                                      b.up_nationality,
                                                      b.up_category,
                                                      b.up_address,
                                                      c.upi_skillsexp,
                                                      c.upi_yearsofexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and b.up_age=:age order by u_id desc";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(['status'=>'Approved','age'=>$_POST['up_age']]);
                                }
                                else if(!empty($_POST['upi_skillsexp']))
                                {
                                    if( isset($_POST['upi_skillsexp']) && !empty($_POST['upi_skillsexp']) ) 
                                    { 
                                        $skills = implode(',', $_POST['upi_skillsexp']);
                                    }
                                                                                                 
                                    $array_skills = explode(',',  $skills);

                                   $show_profile_query="SELECT
                                                          a.u_id, 
                                                          a.u_fname,
                                                          a.u_lname,
                                                          b.up_age,
                                                          a.u_gender,
                                                          b.up_picture,
                                                          DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                          b.up_address,
                                                          b.up_nationality,
                                                          b.up_category,
                                                          b.up_address,
                                                          c.upi_skillsexp,
                                                          c.upi_yearsofexp
                                                        FROM
                                                        user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id";
                                                            
                                                        foreach($array_skills as $val)
                                                        {
                                                            $arr = "'%{$val}%'";
                                                            $new_arr[] =" c.upi_skillsexp LIKE ".$arr;
                                                        }

                                                        $new_arr = implode(" OR ", $new_arr);
                                                        $show_profile_query.=" where ".$new_arr;
                                                        $show_profile_query.=" and b.up_status=:status order by u_id desc ";
                                                      
                                                        $show_profile_stmt=$connection->prepare($show_profile_query);
                                                        $show_profile_stmt->execute(['status'=>'Approved']);
                                }
                               

                                 while($result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC))
                                    {
                                         echo " <div class='col-sm-6 col-md-4 p0'>
                                            <div class='box-two proerty-item'>
                                                <div class='item-thumb'>
                                                   <img src='assets/img/profilepicture/".$result['up_picture']."'>
                                                </div>
                                                <div class='item-entry overflow'>
                                                    <h4><b>".$result['u_fname']." ".$result['u_lname']."</b></h4>
                                                    <div class='dot-hr'></div>
                                                    
                                                    <span class='pull-left'><b>Age : </b>".$result['up_age']."</span>
                                                    <br>
                                                    <h7><b>Location:</b> ".$result['up_address']."</h7>
                                                    <br>
                                                   
                                                    <h7><b>Nationality:</b> ".$result['up_nationality']."</h7>
                                                    <br>
                                                    <h7><b>Years Of Experience:</b> ".$result['upi_yearsofexp']."</h7>
                                                    <br>
                                                    <h7><b>Job Expertises:</b></h7>
                                                    <br>
                                                    <h7>".$result['upi_skillsexp']."</h7>
                                                    <br>
                                                    <span class='pull-left'><b>Posted: </b>".$result['up_dateposted']."</span>
                                                    <br>
                                                    <div class='span9 btn-block no-padding'>
                                                ";?>
                                                    <button type="button" class="btn btn-large btn-block btn-primary full-width" 
                                                    onclick=" window.open('includes/candidate-page.php?id=<?php echo $result['u_id'];  ?>')"
                                                            >View Full Profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php } 
                            }
                            else
                            {
                            $show_profile_query="SELECT
                                                      a.u_id, 
                                                      a.u_fname,
                                                      a.u_lname,
                                                      b.up_age,
                                                      b.up_picture,
                                                       DATE_FORMAT(b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                                      b.up_address,
                                                      b.up_nationality,
                                                      b.up_category,
                                                      b.up_address,
                                                      c.upi_skillsexp,
                                                      c.upi_yearsofexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status order by u_id desc";
                            $show_profile_stmt=$connection->prepare($show_profile_query);
                            $show_profile_stmt->execute(['status'=>'Approved']);
                            while($result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                echo " <div class='col-sm-6 col-md-4 p0'>
                                            <div class='box-two proerty-item'>
                                                <div class='item-thumb'>
                                                   <img src='assets/img/profilepicture/".$result['up_picture']."'>
                                                </div>
                                                <div class='item-entry overflow'>
                                                    <h4><b>".$result['u_fname']." ".$result['u_lname']."</b></h4>
                                                    <div class='dot-hr'></div>
                                                    
                                                    <span class='pull-left'><b>Age : </b>".$result['up_age']."</span>
                                                    <br>
                                                    <h7><b>Location: </b>".$result['up_address']."</h7>
                                                    <br>
                                                   
                                                    <h7><b>Nationality: </b>".$result['up_nationality']."</h7>
                                                    <br>
                                                    <h7><b>Years Of Experience: </b> ".$result['upi_yearsofexp']."</h7>
                                                    <br>
                                                    <h7><b>Job Expertises: </b></h7>
                                                    <br>
                                                    <h7> ".$result['upi_skillsexp']."</h7>
                                                    <br>
                                                    <span class='pull-left'><b>Posted: </b> ".$result['up_dateposted']."</span>
                                                    <br>
                                                    <div class='span9 btn-block no-padding'>
                                                ";?>
                                                    <button type="button" class="btn btn-large btn-block btn-primary full-width" 
                                                    onclick=" window.open('includes/candidate-page.php?id=<?php echo $result['u_id'];  ?>')"
                                                            >View Full Profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <?php } 

                            }?>
                                      

                                    </div>
                                </div> 
                        </div>
                    </div>
                    
                    <div class="col-md-12"> 
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
                    </div>
                </div>  
                </div>              
            </div>
        </div>

