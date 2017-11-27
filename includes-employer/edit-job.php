<br><br>
<script>
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode < 48 || charCode > 57)
        return false;
    return true;    
}
</script>
<script type='text/javascript' src='/JavaScriptSpellCheck/include.js' ></script>
        
        <script type='text/javascript'>$Spelling.SpellCheckAsYouType('myfield')</script>

    <script type='text/javascript'>
    CharacterCount = function(TextArea,FieldToCount){
    var myField = document.getElementById(TextArea);
    var myLabel = document.getElementById(FieldToCount); 
    if(!myField || !myLabel){return false}; // catches errors
    var MaxChars =  myField.maxLengh;
    if(!MaxChars){MaxChars =  myField.getAttribute('maxlength') ; };    if(!MaxChars){return false};
    var remainingChars =   MaxChars - myField.value.length
    myLabel.innerHTML = remainingChars+" Characters remaining"
    }

    setInterval(function(){CharacterCount('myfield','CharCountLabel1')},);
    </script>

<?php 
    require_once 'includes/connection.php';
    if(isset($_POST['finish']))
    {
         if( isset($_POST['j_mainduties']) && !empty($_POST['j_mainduties']) ) 
        { 
            $mainduties = implode(',', $_POST['j_mainduties']);
        }
        else
        {
            $mainduties="none";        
        }

        if( isset($_POST['j_cookingskill']) && !empty($_POST['j_cookingskill']) ) 
        { 
            $cookingskill = implode(',', $_POST['j_cookingskill']);
        }
        else
        {
            $cookingskill="none";        
        }
        if( isset($_POST['j_requiredlanguages']) && !empty($_POST['j_requiredlanguages']) ) 
        { 
            $requiredlanguages = implode(',', $_POST['j_requiredlanguages']);
        }
        else
        {
            $requiredlanguages="none";        
        }
        $id=$_GET['id'];
        $jobtitle=$_POST['j_jobtitle'];
        $employertype=$_POST['j_employertype'];
        $country=$_POST['j_country'];
        $districtlocation=$_POST['j_districtlocation'];
        $type=$_POST['j_type'];
        $category=$_POST['j_category'];
        $description=$_POST['j_description'];
        $contact=$_POST['j_contact'];
        $applicationemail=$_POST['j_email'];
        $nationality=$_POST['j_nationality'];
        $familytype=$_POST['j_familytype'];
        $startdate=$_POST['j_startdate'];
        $monthlysalary=$_POST['j_monthlysalary'];
        $logo=$_FILES['j_logo']['name'];
        $logo_temp=$_FILES['j_logo']['tmp_name'];
        move_uploaded_file($logo_temp, "assets/img/profilepicture/{$logo}");
        
        if(empty($logo))
        {
            $check_logo_query="SELECT * FROM job_description WHERE j_id=:id";
            $check_logo_stmt=$connection->prepare($check_logo_query);
            $check_logo_stmt->execute(['id'=>$_GET['id']]);
            $result=$check_logo_stmt->fetch(PDO::FETCH_ASSOC);
            $logo=$result['j_logo'];
            if(empty($logo))
            {
                $logo="default.png";
            }
        }

        if($user->update_job($id,$logo,$jobtitle,$employertype,$country,$districtlocation,$type,$category,$description,$requiredlanguages,$contact,$mainduties,$cookingskill,$applicationemail,$nationality,$familytype,$startdate,$monthlysalary))
        {
           
            echo"<script>
                    alert('Complete! Your Job Post is Updated. Thank you');
                </script>";
        }   
    }
    if(isset($_GET['id']))
    {
        $show_job_query="SELECT * FROM job_description WHERE j_id=:id";
        $show_job_stmt=$connection->prepare($show_job_query);
        $show_job_stmt->execute(array(':id'=>$_GET['id']));
        $result = $show_job_stmt->fetch(PDO::FETCH_ASSOC);


   
  ?>
 <div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix" > 
                    <div class="wizard-container"> 

                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                            <form action="" method="post" enctype="multipart/form-data">                        
                             

                                <ul>
                                    <li><a href="#step1" data-toggle="tab">Step 1 </a></li>
                                    <li><a href="#step2" data-toggle="tab">Step 2 </a></li>
                                    <li><a href="#step3" data-toggle="tab">Finish </a></li>
                                    
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane" id="step1">
                                        <div class="row p-b-15  ">

                                       
                                               
                                            <div class="col-sm-12">
                                                <h3 class="info-text"> <strong>Job Information</strong></h3>
                                                   <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="assets/img/profilepicture/<?php echo $result['j_logo'] ?>" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="j_logo" >
                                                    </div> 
                                                </div>
                                                <div class="form-group">
                                                    <labeL>Job Title *</label>
                                                    <input name="j_jobtitle" type="text" required class="form-control" placeholder="Select Job Title" title="Please input job title" value="<?php echo $result['j_jobtitle'] ?>">
                                                </div>
                                                <label> Employer Type  *</label>
                                                        <select  name="j_employertype" required class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select employer type">

                                                                <option value="Direct Employer"  <?php if($result['j_employertype']=="Direct Employer")echo "selected"; ?> >Direct Employer</option>
                                                                <option value="Agency" <?php if($result['j_employertype']=="Agency")echo "selected"; ?> >Agency</option>
                                                        </select>
                                                
                                                <label>Job Region *</label>
                                                        <select  name="j_country" required class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select job location">
                                                                <option value="Philippines"  <?php if($result['j_country']=="Philippines")echo "selected"; ?> >
                                                                    Philippines
                                                                </option>
                                                                <option value="Hong Kong"  <?php if($result['j_country']=="Hong Kong")echo "selected"; ?>>
                                                                    Hong Kong
                                                                </option>
                                                                <option value="China"  <?php if($result['j_country']=="China")echo "selected"; ?>>
                                                                    China
                                                                </option>
                                                                <option value="Saudi Arabia" <?php if($result['j_country']=="Saudi Arabia")echo "selected"; ?> >
                                                                    Saudi Arabia
                                                                </option>
                                                                <option value="United Arab Emirates" <?php if($result['j_country']=="United Arab Emirates")echo "selected"; ?>>
                                                                    United Arab Emirates
                                                                </option>
                                                                <option value="Qatar" <?php if($result['j_country']=="Qatar")echo "selected"; ?>>
                                                                    Qatar
                                                                </option>
                                                                <option value="Taiwan" <?php if($result['j_country']=="Taiwan")echo "selected"; ?>>
                                                                    Taiwan
                                                                </option>
                                                        </select>
                                                <div class="form-group">
                                                    <labeL>City *</label>
                                                    <input name="j_districtlocation" type="text" required title="Select city" class="form-control" placeholder="City" value="<?php echo $result['j_country'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <labeL>Contact Number *</label>
                                                    <input name="j_contact" type="text"  onkeypress="return isNumberKey(event)" title="Please input contact number" required class="form-control" placeholder="Contact" value="<?php echo $result['j_contact'] ?>">
                                                </div>
                                                   
                                                 <label>Job Type *</label>
                                                        <select  name="j_type" required  class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select job type">
                                                            <option value="Full Time"  <?php if($result['j_type']=="Full Time")echo "selected"; ?>>Full Time</option>
                                                            <option value="Part Time" <?php if($result['j_type']=="Part Time")echo "selected"; ?>>Part Time</option>
                                                        </select>
                                                  <label>Job Category *</label>
                                                        <select  required  name="j_category" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select job category">
                                                            <option  value="Domestic Helper" <?php if($result['j_category']=="Domestic Helper")echo "selected"; ?>>
                                                                Domestic Helper
                                                            </option>
                                                            <option  value="Driver"   <?php if($result['j_category']=="Driver")echo "selected"; ?>>
                                                                Driver
                                                            </option>
                                                            <option  value="Babysitter"  <?php if($result['j_category']=="Babysitter")echo "selected"; ?>>
                                                               Babysitter
                                                            </option>
                                                            <option  value="Gardener"  <?php if($result['j_category']=="Gardener")echo "selected"; ?>>
                                                                Gardener
                                                            </option>
                                                            <option  value="Handyman"  <?php if($result['j_category']=="Handyman")echo "selected"; ?>>
                                                                Handyman
                                                            </option>
                                                            <option  value="Marternity Specialist"  <?php if($result['j_category']=="Marternity Specialist")echo "selected"; ?>>
                                                                Marternity Specialist
                                                            </option>
                                                        </select>

                                                     
                                                    <div class="form-group">
                                                        <label>Job Description *</label>
                                                            <textarea class="form-control" id="myfield" maxlength='250' minlength="30" name="j_description" placeholder="Tell more about the job. e.g. (Job requirements, Salary, Incentives)" required="" style="font-family: arial; font-size: 12pt; width: 100%; height: 20vw;"><?php echo $result['j_description'] ?></textarea> 
                                                                <i><small><div id='CharCountLabel1'></div></small></i>
                                                    </div> 
                                                   
                                                    <h3>Family Status</h3>
                                                    <label>Nationality *</label>
                                                        <select required  name="j_nationality" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select nationality">
                                                                 <option value="American Family" <?php if($result['j_nationality']=="American Family")echo "selected"; ?>>
                                                                    American Family
                                                                </option>
                                                                <option value="Australian Family" <?php if($result['j_nationality']=="Australian Family")echo "selected"; ?>>
                                                                    Australian Family
                                                                </option>
                                                                <option value="Belgian Family" <?php if($result['j_nationality']=="Belgian Family")echo "selected"; ?>>
                                                                    Belgian Family
                                                                </option>
                                                                <option value="British Family" <?php if($result['j_nationality']=="British Family")echo "selected"; ?>>
                                                                    British Family
                                                                </option>
                                                                <option value="Canadian Family" <?php if($result['j_nationality']=="Canadian Family")echo "selected"; ?>>
                                                                    Canadian Family
                                                                </option>
                                                                <option value="Chinese Family" <?php if($result['j_nationality']=="Chinese Family")echo "selected"; ?>>
                                                                    Chinese Family
                                                                </option>
                                                                <option value="Dutch Family" <?php if($result['j_nationality']=="Dutch Family")echo "selected"; ?>>
                                                                    Dutch Family
                                                                </option>
                                                                <option value="Filipino Family" <?php if($result['j_nationality']=="Filipino Family")echo "selected"; ?>>
                                                                    Filipino Family
                                                                </option>
                                                                <option value="French Family" <?php if($result['j_nationality']=="French Family")echo "selected"; ?>>
                                                                    French Family
                                                                </option>
                                                                <option value="German Family" <?php if($result['j_nationality']=="German Family")echo "selected"; ?>>
                                                                    German Family
                                                                </option>
                                                                <option value="Hong Kong Family" <?php if($result['j_nationality']=="Hong Kong Family")echo "selected"; ?>>
                                                                    Hong Kong Family
                                                                </option>
                                                                <option value="Indian Family" <?php if($result['j_nationality']=="Indian Family")echo "selected"; ?>>
                                                                    Indian Family
                                                                </option>
                                                                <option value="Italian Family" <?php if($result['j_nationality']=="Italian Family")echo "selected"; ?>> 
                                                                    Italian Family
                                                                </option>
                                                                <option value="Japanese Family" <?php if($result['j_nationality']=="Japanese Family")echo "selected"; ?>>
                                                                    Japanese Family
                                                                </option>
                                                                <option value="Korean Family" <?php if($result['j_nationality']=="Korean Family")echo "selected"; ?>>
                                                                    Korean Family
                                                                </option>
                                                                <option value="Middle East Family" <?php if($result['j_nationality']=="Middle East Family")echo "selected"; ?>>
                                                                    Middle East Family
                                                                </option>
                                                                <option value="Pakistani Family" <?php if($result['j_nationality']=="Pakistani Family")echo "selected"; ?>>
                                                                    Pakistani Family
                                                                </option>
                                                                <option value="Russian Family" <?php if($result['j_nationality']=="Russian Family")echo "selected"; ?>>
                                                                    Russian Family
                                                                </option>
                                                                <option value="Singaporean family" <?php if($result['j_nationality']=="Singaporean Family")echo "selected"; ?>>
                                                                    Singaporean family
                                                                </option>
                                                                <option value="South African Family" <?php if($result['j_nationality']=="South African Family")echo "selected"; ?>>
                                                                    South African Family
                                                                </option>
                                                                <option value="Spanish Family" <?php if($result['j_nationality']=="Spanish Family")echo "selected"; ?>>
                                                                    Spanish Family
                                                                </option>
                                                                <option value="Taiwanese Family" <?php if($result['j_nationality']=="Taiwanese Family")echo "selected"; ?>>
                                                                    Taiwanese Family
                                                                </option>
                                                                <option value="Turkish Family" <?php if($result['j_nationality']=="Turkish Family")echo "selected"; ?>>
                                                                    Turkish Family
                                                                </option>
                                                                <option value="Western Family" <?php if($result['j_nationality']=="Western Family")echo "selected"; ?>>
                                                                    Western Family
                                                                </option>
                                                        </select>
                                                    <label>Family Type *</label>
                                                        <select class="selectpicker" data-live-search="true" data-live-search-style="begins" name="j_familytype" required="" title="Select family type">
                                                            <option value="Couple" <?php if($result['j_familytype']=="Couple")echo "selected"; ?>>
                                                                Couple
                                                            </option>
                                                            <option value="Couple + 1 kid" <?php if($result['j_familytype']=="Couple + 1 kid")echo "selected"; ?>>
                                                                Couple + 1 kid
                                                            </option>
                                                            <option value="Couple + 2 kids" <?php if($result['j_familytype']=="Couple + 2 kids")echo "selected"; ?>>
                                                                Couple + 2 kids
                                                            </option>
                                                            <option value="Couple + 3 kids" <?php if($result['j_familytype']=="Couple + 3 kids")echo "selected"; ?>>
                                                                Couple + 3 kids
                                                            </option>
                                                            <option value="Couple + 4 kids" <?php if($result['j_familytype']=="Couple + 4 kids")echo "selected"; ?>>
                                                                Couple + 4 kids
                                                            </option>
                                                            <option value="Couple + 5 kids" <?php if($result['j_familytype']=="Couple + 5 kids")echo "selected"; ?>>
                                                                Couple + 5 kids
                                                            </option>
                                                            <option value="Couple + Parents" <?php if($result['j_familytype']=="Couple + Parents")echo "selected"; ?>>
                                                                Couple + Parents
                                                            </option>
                                                            <option value="Couple with Parents" <?php if($result['j_familytype']=="Couple with Parents")echo "selected"; ?>>
                                                                Couple with Parents
                                                            </option>
                                                            <option value="Large Family (&gt; 6)" <?php if($result['j_familytype']=="Large Family (&gt; 6)")echo "selected"; ?>>
                                                                Large Family (&gt; 6)
                                                            </option>
                                                            <option value="Large Family (&gt;6)" <?php if($result['j_familytype']=="Large Family (&gt;6)")echo "selected"; ?>>
                                                                Large Family (&gt;6)
                                                            </option>
                                                            <option value="Other" <?php if($result['j_familytype']=="Other")echo "selected"; ?>>
                                                                Other
                                                            </option>
                                                            <option value="Single" <?php if($result['j_familytype']=="Single")echo "selected"; ?>>
                                                                Single
                                                            </option>
                                                            <option value="Single + 1 kid" <?php if($result['j_familytype']=="Single + 1 kid")echo "selected"; ?>>
                                                                Single + 1 kid
                                                            </option>
                                                            <option value="Single + 2 kids" <?php if($result['j_familytype']=="Single + 2 kid")echo "selected"; ?>>
                                                                Single + 2 kids
                                                            </option>
                                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 1
 -->

                                    <div class="tab-pane" id="step2">
                                        <div class="row">
                                            <h3 class="info-text">Professional Information</h3>
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Main Duties <small></small></label><br>
                                                <?php 
                                                      $array_mainduties = explode(',', $result['j_mainduties']);
                                                   
                                                ?>
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-helper_requirements">
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-57" name="j_mainduties[]" type="checkbox" value="Baby Care" <?php  if(in_array('Baby Care', $array_mainduties))echo "checked"; ?>> Baby Care
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-56" name="j_mainduties[]" type="checkbox" value="Child Care" <?php  if(in_array('Child Care', $array_mainduties))echo "checked"; ?>> Child Care
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-54" name="j_mainduties[]" type="checkbox" value="Elder Care" <?php  if(in_array('Elder Care', $array_mainduties))echo "checked"; ?>> Elder Care
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-180" name="j_mainduties[]" type="checkbox" value="Groceries" <?php  if(in_array('Groceries', $array_mainduties))echo "checked"; ?>> Groceries
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-79" name="j_mainduties[]" type="checkbox" value="Housekeeping" <?php  if(in_array('Housekeeping', $array_mainduties))echo "checked"; ?>> Housekeeping
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-53" name="j_mainduties[]" type="checkbox" value="Pet Care" <?php  if(in_array('Pet Care', $array_mainduties))echo "checked"; ?>> Pet Care
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-91" name="j_mainduties[]" type="checkbox" value="Professional Driver" <?php  if(in_array('Professional Driver', $array_mainduties))echo "checked"; ?>> Professional Driver
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-55" name="j_mainduties[]" type="checkbox" value="Teen Care" <?php  if(in_array('Teen Care', $array_mainduties))echo "checked"; ?>> Teen Care
                                                </div>
                                        </ul>
                                            </div><br>
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Cooking Skills<small></small></label><br>
                                                 <?php 
                                                      $array_cookingskills = explode(',', $result['j_cookingskill']);
                                                   
                                                ?>
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-helper_requirements">
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-57" name="j_cookingskill[]" type="checkbox" value="Arabic" <?php  if(in_array('Arabic', $array_cookingskills))echo "checked"; ?>> Arabic
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-56" name="j_cookingskill[]" type="checkbox" value="Chinese" <?php  if(in_array('Chinese', $array_cookingskills))echo "checked"; ?>> Chinese
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-54" name="j_cookingskill[]" type="checkbox" value="Indian" <?php  if(in_array('Indian', $array_cookingskills))echo "checked"; ?>> Indian
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-180" name="j_cookingskill[]" type="checkbox" value="Japanese" <?php  if(in_array('Japanese', $array_cookingskills))echo "checked"; ?>> Japanese
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-79" name="j_cookingskill[]" type="checkbox" value="Vegetarian" <?php  if(in_array('Vegetarian', $array_cookingskills))echo "checked"; ?>> Vegetarian
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-91" name="j_cookingskill[]" type="checkbox" value="Western" <?php  if(in_array('Western', $array_cookingskills))echo "checked"; ?>> Western
                                                </div>
                                        </ul>
                                            </div><br>
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Required Languages<small></small></label><br>
                                                  <?php 
                                                      $array_languages = explode(',', $result['j_requiredlanguages']);
                                                   
                                                ?>
                                               <ul class="job-manager-term-checklist job-manager-term-checklist-candidate_languages2" required >
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-149"  name="j_requiredlanguages[]" type="checkbox" value="Cantonese"  <?php  if(in_array('Cantonese', $array_languages))echo "checked"; ?>> Cantonese
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-148" name="j_requiredlanguages[]" type="checkbox" value="English"  <?php  if(in_array('English', $array_languages))echo "checked"; ?>> English
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-152" name="j_requiredlanguages[]" type="checkbox" value="Filipino"  <?php  if(in_array('Filipino', $array_languages))echo "checked"; ?>> Filipino
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-153" name="j_requiredlanguages[]" type="checkbox" value="Indonesian"  <?php  if(in_array('Indonesian', $array_languages))echo "checked"; ?>> Indonesian
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-154" name="j_requiredlanguages[]" type="checkbox" value="Japanese"  <?php  if(in_array('Japanese', $array_languages))echo "checked"; ?>> Japanese
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-150" name="j_requiredlanguages[]" type="checkbox" value="Mandarin"  <?php  if(in_array('Mandarin', $array_languages))echo "checked"; ?>> Mandarin
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-168" name="j_requiredlanguages[]" type="checkbox" value="Modern Arabic"  <?php  if(in_array('Modern Arabic', $array_languages))echo "checked"; ?>> Modern Arabic
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-151" name="j_requiredlanguages[]" type="checkbox" value="Thai"  <?php  if(in_array('Thai', $array_languages))echo "checked"; ?>> Thai
                                               </div>
                                        </ul>
                                            </div><br>
                                            <div class="form-group">
                                                <label>Application Email  *</label> 
                                                <input class="form-control" required="" title="Please input application email" name="j_email" placeholder="Application Email"  type="email" value="<?php echo $result['j_applicationemail'] ?>">
                                            </div>  
                                            <div class="form-group">
                                                <label>Monthly Salary  *</label> 
                                                <input class="form-control" required="" title="Please input montly salary" name="j_monthlysalary" placeholder="e.g. PHP 25,000"  type="type" value="<?php echo $result['j_monthlysalary'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label> Start Date  *</label>
                                                 <input class="form-control" required="" title="Please input starting date" name="j_startdate"  type="date" value="<?php echo $result['j_startdate'] ?>">
                                            </div>
                              
                                        </div>
                                    </div>
                                    <!-- End step 2 -->

                                    <div class="tab-pane" id="step3">                                        
                                        <h4 class="info-text"> Update and Submit </h4>
                                        <div class="row">  
                                            <div class="col-sm-12">
                                                <div class="">
                                                    <p>
                                                        <label><strong>Terms and Conditions</strong></label>
                                                        By accessing or using LAZZY WORKS services, such as posting your personal information on our website you agree to the collection, use and disclosure of your personal information in the legal proper manner.
                                                    </p>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" /> <strong>Accept terms and conditions.</strong>
                                                        </label>
                                                    </div> 

                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                    <!--  End step 4 -->

                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-primary' name='next' value='Next' />
                                        <input type='submit' class='btn btn-finish btn-primary ' name='finish' value='Update' />
                                         
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>                                            
                                </div>	
                            </form>
                        </div>
                        <!-- End submit form -->
                    </div> 
                </div>
            </div>
        </div>
        <?php } ?>