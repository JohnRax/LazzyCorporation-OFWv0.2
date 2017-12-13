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
                     
                <div class="col-md-3 padding-top-40">
                    <div class="blog-asside-right">
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

                                                <select name="up_address" class="selectpicker"  title="Location">
                                                                
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

                                                <select name="gender" class="selectpicker"  title="Gender">
                                                   <option  value="male">Male</option>
                                                    <option  value="female">Female</option>
                                                </select>
                                            </div>
                                        
                                    
                                        
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <input name="up_age" onkeypress="return isNumberKey(event)" type="text" class="form-control" maxlength="2" minlength="2"  placeholder="Age" title="Please input your age">
                                                </div>                                                
                                            </div>
                                                                                     
                                        </div>
                                    </fieldset>  
                                    <label><u>Skills</label>
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
                                                    <label>  <input id="in-helper_requirement2-112" name="upi_skillsexp[]" type="checkbox" value="Pet Care"> Pet Care </label>
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
                                                    <label>  <input id="in-helper_requirement2-111" name="upi_skillsexp[]" type="checkbox" value="Professional Driver"> Professional Driver</label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input id="in-helper_requirement2-109" name="upi_skillsexp[]" type="checkbox" value="Disabled Person"> Disabled Person </label>
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
                                                      c.upi_skillsexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status GROUP BY b.u_id order by b.up_dateposted DESC";
                                $show_profile_stmt=$connection->prepare($show_profile_query);
                                $show_profile_stmt->execute(array(':status'=>'Approved'));
                              

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
                                                      c.upi_skillsexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and a.u_gender=:gender and b.up_address=:address GROUP BY b.u_id order by b.up_dateposted DESC";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(array(':status'=>'Approved',':gender'=>$_POST['gender'],':address'=>$_POST['up_address']));
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
                                                      c.upi_skillsexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and a.u_gender=:gender and b.up_age=:age GROUP BY b.u_id order by b.up_dateposted DESC";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(array(':status'=>'Approved',':gender'=>$_POST['gender'],':age'=>$_POST['up_age']));
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
                                                          c.upi_skillsexp
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
                                                        $show_profile_query.=" and b.up_status=:status and b.up_age=:age GROUP BY b.u_id order by b.up_dateposted DESC";
                                                        $show_profile_stmt=$connection->prepare($show_profile_query);
                                                        $show_profile_stmt->execute(array(':status'=>'Approved',':age'=>$_POST['up_age']));
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
                                                      c.upi_skillsexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and b.up_address=:address and b.up_age=:age GROUP BY b.u_id order by b.up_dateposted DESC";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(array(':status'=>'Approved',':address'=>$_POST['up_address'],':age'=>$_POST['up_age']));
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
                                                          c.upi_skillsexp
                                                        FROM
                                                        user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id  GROUP BY b.u_id order by b.up_dateposted DESC";
                                                            
                                                        foreach($array_skills as $val)
                                                        {
                                                            $arr = "'%{$val}%'";
                                                            $new_arr[] =" c.upi_skillsexp LIKE ".$arr;
                                                        }

                                                        $new_arr = implode(" OR ", $new_arr);
                                                        $show_profile_query.=" where ".$new_arr;
                                                        $show_profile_query.=" and b.up_status=:status and b.up_address=:address" ;
                                                        $show_profile_stmt=$connection->prepare($show_profile_query);
                                                        $show_profile_stmt->execute(array(':status'=>'Approved',':address'=>$_POST['up_address']));
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
                                                          c.upi_skillsexp
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
                                                        $show_profile_query.=" and b.up_status=:status and a.u_gender=:gender GROUP BY b.u_id order by b.up_dateposted DESC";
                                                        $show_profile_stmt=$connection->prepare($show_profile_query);
                                                        $show_profile_stmt->execute(array(':status'=>'Approved',':gender'=>$_POST['gender']));

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
                                                      c.upi_skillsexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and b.up_age=:age GROUP BY b.u_id and b.up_address=:address order by b.up_dateposted DESC";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(array(':status'=>'Approved',':age'=>$_POST['up_age'],':address'=>$_POST['up_address']));
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
                                                      c.upi_skillsexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and b.up_address=:address GROUP BY b.u_id order by b.up_dateposted DESC";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(array(':status'=>'Approved',':address'=>$_POST['up_address']));
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
                                                      c.upi_skillsexp
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and a.u_gender=:gender GROUP BY b.u_id order by b.up_dateposted DESC";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(array(':status'=>'Approved',':gender'=>$_POST['gender']));
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
                                                      c.upi_skillsexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status and b.up_age=:age GROUP BY b.u_id order by b.up_dateposted DESC";
                                                    $show_profile_stmt=$connection->prepare($show_profile_query);
                                                    $show_profile_stmt->execute(array(':status'=>'Approved',':age'=>$_POST['up_age']));
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
                                                          c.upi_skillsexp
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
                                                        $show_profile_query.=" and b.up_status=:status GROUP BY b.u_id order by b.up_dateposted DESC";
                                                  
                                                        $show_profile_stmt=$connection->prepare($show_profile_query);
                                                        $show_profile_stmt->execute(array(':status'=>'Approved'));
                                }
                               
                                 include "candidate.php";
                                 
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
                                                      c.upi_skillsexp
                                                    FROM
                                                      user_details AS a 
                                                       JOIN user_personal_information AS b 
                                                        ON b.u_id = a.u_id 
                                                       JOIN user_professional_information AS c 
                                                        ON a.u_id = c.u_id where b.up_status=:status GROUP BY b.u_id order by b.up_dateposted DESC";
                            $show_profile_stmt=$connection->prepare($show_profile_query);
                            $show_profile_stmt->execute(array(':status'=>'Approved'));
                            
                                include "candidate.php";

                            }?>
                                      

                                    </div>
                                </div> 
                        </div>
                    </div>
                    
                    <!-- <div class="col-md-12"> 
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
                </div>              
            </div>
        </div>

