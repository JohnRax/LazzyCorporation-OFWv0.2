<br><br><br><br>
        <!-- property area -->
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
                                                 <select name="country" class="selectpicker"   title="Search By Location">     
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
                                    </fieldset>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select name="employertype" class="selectpicker"   title="Employer Type">
                                                    <option value="Direct Employer">
                                                                    Direct Employer
                                                                </option>
                                                                 <option value="Agency">
                                                                    Agency
                                                                </option>
                                                </select>
                                            </div>
                                   
                                        </div>
                                    </fieldset>
                                    <label><u>Skills</label>
                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input name="skills[]" type="checkbox" value="Baby Care"> Baby Care</label>
                                                </div> 
                                            </div>

                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input name="skills[]" type="checkbox" value="Child Care"> Child Care</label>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </fieldset>
                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input name="skills[]" type="checkbox" value="Elder Care"> Elder Care</label>
                                                </div>
                                            </div> 
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label>  <input  name="skills[]" type="checkbox" value="Pet Care"> Pet Care </label>
                                                </div>
                                            </div>  
                                             
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label><input name="skills[]" type="checkbox" value="Cooking"> Cooking </label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input name="skills[]" type="checkbox" value="Housekeeping"> Housekeeping</label>
                                                </div>
                                            </div>  
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label>  <input  name="skills[]" type="checkbox" value="Professional Driver"> Professional Driver</label>
                                                </div>
                                            </div>  
                                             
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input name="skills[]" type="checkbox" value="Disabled Person"> Disabled Person </label>
                                                </div>
                                            </div> 
                                        </div>
                                    </fieldset>



                                    <fieldset >
                                        <div class="row">
                                            <div class="col-xs-12">  
                                                <input class="button btn largesearch-btn" value="Search" name ="search" type="submit">
                                            </div>  
                                        </div>
                                    </fieldset>                                     
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

             

                     <div class="col-md-9 "> 
                        <div id="list-type" class="proerty-th">                                                   
                                 

                                    <?php 
                                        
                                        if(isset($_POST['search']))
                                        {

                                              require_once 'includes/connection.php';
                                              $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status  order by j_id DESC";
                                              $show_job_stmt=$connection->prepare($show_job_query);
                                              $show_job_stmt->execute(array(':status'=>'Approved'));                        

                                                $sample="true";
                                              if(!empty($_POST['skills'])  && !empty($_POST['employertype']))
                                              {         
                                               
                                                  if( isset($_POST['skills']) && !empty($_POST['skills']) ) 
                                                    { 
                                                        $skills = implode(',', $_POST['skills']);
                                                    }
                                                     
                                                    
                                                    $array_skills = explode(',',  $skills);
                                                
                                                           
                                                    $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description  ";
                                                    foreach($array_skills as $val)
                                                    {
                                                        $arr = "'%{$val}%'";
                                                        $new_arr[] =" j_mainduties LIKE ".$arr;
                                                    }

                                                      $new_arr = implode(" OR ", $new_arr);
                                                      $show_job_query.=" where ".$new_arr;
                                                      $show_job_query.=" and j_status=:status and j_employertype=:employertype order by j_id DESC";

                                                     $show_job_stmt=$connection->prepare($show_job_query);
                                                     $show_job_stmt->execute(array( ':status'=>'Approved',
                                                                                ':employertype'=>$_POST['employertype'] ));

                                              }
                                              else if(!empty($_POST['country']) && !empty($_POST['employertype']))
                                              {
                                                    
                                                     $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status and j_country=:country and j_employertype=:employertype  order by j_id DESC";
                                                     $show_job_stmt=$connection->prepare($show_job_query);
                                                     $show_job_stmt->execute(array(':status'=>'Approved',':country'=>$_POST['country'],':employertype'=>$_POST['employertype']));
                                              }
                                              else if(!empty($_POST['country']) && !empty($_POST['skills']))
                                              {
                                                
                                                 if( isset($_POST['skills']) && !empty($_POST['skills']) ) 
                                                    { 
                                                        $skills = implode(',', $_POST['skills']);
                                                    }
                                                     
                                                    
                                                    $array_skills = explode(',',  $skills);
                                                
                                                           
                                                    $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description   ";
                                                    foreach($array_skills as $val)
                                                    {
                                                        $arr = "'%{$val}%'";
                                                        $new_arr[] =" j_mainduties LIKE ".$arr;
                                                    }

                                                      $new_arr = implode(" OR ", $new_arr);
                                                      $show_job_query.=" where ".$new_arr;
                                                      $show_job_query.=" and j_status=:status and j_country=:country order by j_id DESC";

                                                     $show_job_stmt=$connection->prepare($show_job_query);
                                                     $show_job_stmt->execute(array( ':status'=>'Approved',
                                                                                ':country'=>$_POST['country']));

                                              }
                                              else if(!empty($_POST['country']))
                                              {
                                                    
                                                    
                                                     $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status and j_country=:country  order by j_id DESC";
                                                     $show_job_stmt=$connection->prepare($show_job_query);
                                                     $show_job_stmt->execute(array(':status'=>'Approved',':country'=>$_POST['country']));
                                           
                                              }
                                              else if(!empty($_POST['employertype']))
                                              {
                                                
                                                     $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status and j_employertype=:employertype  order by j_id DESC";
                                                     $show_job_stmt=$connection->prepare($show_job_query);
                                                     $show_job_stmt->execute(array(':status'=>'Approved',':employertype'=>$_POST['employertype']));
                                              }
                                              else if(!empty($_POST['skills']))
                                              {

                                                        if( isset($_POST['skills']) && !empty($_POST['skills']) ) 
                                                        { 
                                                            $skills = implode(',', $_POST['skills']);
                                                        }
                                                         
                                                        
                                                        $array_skills = explode(',',  $skills);
                                                    
                                                               
                                                            $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description ";
                                                            foreach($array_skills as $val)
                                                            {
                                                                $arr = "'%{$val}%'";
                                                                $new_arr[] =" j_mainduties LIKE ".$arr;
                                                            }

                                                          $new_arr = implode(" OR ", $new_arr);
                                                          $show_job_query.=" where ".$new_arr;
                                                          $show_job_query.=" and j_status=:status  order by j_id DESC";

                                                         $show_job_stmt=$connection->prepare($show_job_query);
                                                         $show_job_stmt->execute(array('status'=>'Approved'));
                                              }                                            
                                               
                                          
                                             include "job.php";
                                        }
                                        else
                                        {
                                           
                                            $show_job_query="SELECT *, DATE_FORMAT(j_dateposted,'%M %d, %Y') as j_dateposted FROM job_description where j_status=:status  order by j_id DESC";
                                             $show_job_stmt=$connection->prepare($show_job_query);
                                             $show_job_stmt->execute(array(':status'=>'Approved'));
                                             include "job.php";
                                        }

                                    ?>                                     
                                         

                                   
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

        