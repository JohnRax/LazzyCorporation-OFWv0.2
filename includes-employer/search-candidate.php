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
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

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
                                       
                                        <br>
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

                                                <select name="gender" class="selectpicker"  title="Gender">
                                                   <option  value="male">Male</option>
                                                    <option  value="female">Female</option>
                                                </select>
                                                 <select name="nationality" class="selectpicker"  title="Nationality">
                                                     <option  value="Filipino">Filipino</option>
                                                     <option  value="Chinese">Chinese</option>
                                                    <option  value="Vietnamese">Vietnamese</option>
                                                     <option  value="Vietnamese">Vietnamese</option>
                                                </select>

                                                <select name="marital" class="selectpicker"  title="Marital Status">
                                                   <option  value="Married">Married</option>
                                                    <option  value="Single">Single</option>
                                                    <option  value="Divorce">Divorce</option>
                                                    <option  value="Widowed">Widowed</option>
                                                </select>
                                                
                                                <select name="education" class="selectpicker"  title="Education Level">
                                                   <option  value="Elementary">Elementary</option>
                                                    <option  value="Highschool">Highschool</option>
                                                    <option  value="Degree Holder">Degree Holder</option>
                                                </select>
                                        
                                          <label>Age</label>
                                          <input name="up_age" type="text" class="span2" value="" data-slider-min="16" data-slider-max="60" data-slider-step="1" data-slider-value="[16,60]" id="property-geo" style="">
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
                                                    <label>  <input id="in-helper_requirement2-111" name="upi_skillsexp[]" type="checkbox" value="Driver">Driver</label>
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
                                                    <label><input id="in-helper_requirement2-113" name="upi_skillsexp[]" type="checkbox" value="Housekeeping"> Housekeeping </label>
                                                </div>
                                            </div>  


                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input id="in-helper_requirement2-109" name="upi_skillsexp[]" type="checkbox" value="Disabled"> Disabled</label>
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

             

                    <div class="col-md-9 "> 
                        <div id="list-type" class="scroll-class">
                           
                            <?php 
                             
                            require_once 'includes/connection.php';
                               $query="SELECT a.u_id, 
                                             a.u_fname,
                                             a.u_lname,
                                             b.up_age,
                                             b.up_picture,
                                             a.u_gender,
                                             DATE_FORMAT( b.up_dateposted,'%M %d, %Y') as up_dateposted,
                                             b.up_address,
                                             b.up_maritalstatus,
                                             b.up_nationality,
                                             b.up_category,
                                             b.up_address,
                                             b.up_education,
                                             c.upi_skillsexp
                                      FROM
                                             user_details AS a 
                                      JOIN user_personal_information AS b 
                                        ON b.u_id = a.u_id 
                                      JOIN user_professional_information AS c 
                                        ON a.u_id = c.u_id where b.up_status=:status";

                            if(isset($_POST['search']))
                            {              
                                  
                               if(!empty($_POST['up_address']))     
                               {
                                  $location= $_POST['up_address'];
                                  $query.=" AND b.up_address='".$location."'";
                               }  
                               if(!empty($_POST['gender']))     
                               {
                                  $query.=" AND a.u_gender='".$_POST['gender']."'";
                               }
                               if(!empty($_POST['nationality']))     
                               {
                                  $query.=" AND b.up_nationality='".$_POST['nationality']."'";
                               }
                               if(!empty($_POST['marital']))     
                               {
                                    $query.=" AND b.up_maritalstatus='".$_POST['marital']."'";
                               }
                               if(!empty($_POST['education']))     
                               {
                                    $query.=" AND b.up_education='".$_POST['education']."'";
                               }
                               $age = explode(",", $_POST['up_age']);
                               if(!empty($age[1]))
                               {
                                    $query.=" AND b.up_age BETWEEN '".$age[0]."' AND '".$age[1]."'";
                               }

                               if( isset($_POST['upi_skillsexp']) && !empty($_POST['upi_skillsexp']) ) 
                                  { 
                                        $skills = implode(',', $_POST['upi_skillsexp']);
                                        $array_skills = explode(',',  $skills);
                                        foreach($array_skills as $val)
                                              {
                                                  $arr = "'%{$val}%'";
                                                  $new_arr[] =" c.upi_skillsexp LIKE ".$arr;
                                              }


                                                  $new_arr = implode(" OR ", $new_arr);
                                                  $query.=" AND ".$new_arr;  
                                    }    
                                       else
                                              {
                                                  $skills="";
                                              } 
                               }     
                                
                                $query.=" LIMIT ". $_GET['page'].'0';
                                $show_profile_stmt=$connection->prepare($query);
                                $show_profile_stmt->execute(array(':status'=>'Approved'));
                                include "candidate.php";


                               ?>


                                              
                                        
                                    </div>
                                </div> 

                                <fieldset >
                                        <div class="row1">
                                            <div class="col-md-12">  
                                          <button id="scroll" class="navbar-btn nav-button wow  login" type="reset" onclick="location.href=' index-employer.php?source=searchhelper&page=<?php if(isset($_GET['page']))
                                                                                      {echo $_GET['page']+1;}else{echo '1';} ?>'">SHOW MORE CANDIDATE</button>
                                          </div>
                                      </div>
                                </fieldset>
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

