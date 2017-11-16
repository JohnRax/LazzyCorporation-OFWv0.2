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
    if (isset($_POST['finish']))
    {

        //job Info

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
        $id=$_SESSION['user_session'];
        $jobtitle=$_POST['j_jobtitle'];
        $employertype=$_POST['j_employertype'];
        $country=$_POST['j_country'];
        $districtlocation=$_POST['j_districtlocation'];
        $type=$_POST['j_type'];
        $category=$_POST['j_category'];
        $description=$_POST['j_description'];
        $workingstatus=$_POST['j_workingstatus'];
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
            $logo="default.png";
        }
        if($user->post_jobs($id,$logo,$jobtitle,$employertype,$country,$districtlocation,$type,$category,$description,$workingstatus,$requiredlanguages,$contact,$mainduties,$cookingskill,$applicationemail,$nationality,$familytype,$startdate,$monthlysalary))
        {
           
            echo"<script>
                    alert('Complete! Your Job Post is under approval. Thank you');
                </script>";
        }   


    }
   
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
                                                        <img src="assets/img/default-property.jpg" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="j_logo">
                                                    </div> 
                                                </div>
                                                <div class="form-group">
                                                    <labeL>Job Title *</label>
                                                    <input name="j_jobtitle" type="text" required class="form-control" placeholder="Select Job Title" title="Please input job title">
                                                </div>
                                                <label> Employer Type  *</label>
                                                        <select  name="j_employertype" required class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select employer type">
                                                            <option value="Direct Employer">Direct Employer</option>
                                                            <option value="Agency">Agency</option>
                                                        </select>
                                                
                                                <label>Job Region *</label>
                                                        <select  name="j_country" required class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select job location">
                                                                <option value="Philippines">
                                                                    Philippines
                                                                </option>
                                                                <option value="Hong Kong">
                                                                    Hong Kong
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
                                                <div class="form-group">
                                                    <labeL>City *</label>
                                                    <input name="j_districtlocation" type="text" required title="Select city" class="form-control" placeholder="City">
                                                </div>
                                                <div class="form-group">
                                                    <labeL>Contact Number *</label>
                                                    <input name="j_contact" type="text"  onkeypress="return isNumberKey(event)" title="Please input contact number" required class="form-control" placeholder="Contact">
                                                </div>
                                                   
                                                 <label>Job Type *</label>
                                                        <select  name="j_type" required  class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select job type">
                                                            <option value="Full Time">Full Time</option>
                                                            <option value="Part Time">Part Time</option>
                                                        </select>
                                                  <label>Job Category *</label>
                                                        <select  required  name="j_category" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select job category">
                                                            <option  value="Domestic Helper">
                                                                Domestic Helper
                                                            </option>
                                                            <option  value="Driver">
                                                                Driver
                                                            </option>
                                                            <option  value="Babysitter">
                                                               Babysitter
                                                            </option>
                                                            <option  value="Gardener">
                                                                Gardener
                                                            </option>
                                                            <option  value="Handyman">
                                                                Handyman
                                                            </option>
                                                            <option  value="Marternity Specialist">
                                                                Marternity Specialist
                                                            </option>
                                                        </select>
                                                     
                                                    <div class="form-group">
                                                        <label>Job Description *</label>
                                                            <textarea class="form-control" id="myfield" maxlength='250' minlength="30" name="j_description" placeholder="Tell more about the job. e.g. (Job requirements, Salary, Incentives)" required="" style="font-family: arial; font-size: 12pt; width: 100%; height: 20vw;"></textarea> 
                                                                <i><small><div id='CharCountLabel1'></div></small></i>
                                                    </div> 
                                               

                                                    
                                                    <label>Prefered Working Status *</label>
                                                        <select  required  name="j_workingstatus" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select working status">
                                                            <option  value="Break Contract">
                                                                Break Contract
                                                            </option>
                                                            <option  value="Finished Contract">
                                                                Finished Contract
                                                            </option>
                                                            <option  value="Terminated Due to Relocation/Financial">
                                                                Terminated Due to Relocation/Financial
                                                            </option>
                                                            <option  value="Terminated for Other Reasons">
                                                                Terminated for Other Reasons
                                                            </option>
                                                            <option  value="Transfer">
                                                                Transfer
                                                            </option>
                                                            <option  value="Unemployed">
                                                                Unemployed
                                                            </option>
                                                           
                                                        </select>

                                                    <h3>Family Status</h3>
                                                    <label>Nationality *</label>
                                                        <select required  name="j_nationality" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select nationality">
                                                                 <option value="American Family">
                                                                    American Family
                                                                </option>
                                                                <option value="Australian Family">
                                                                    Australian Family
                                                                </option>
                                                                <option value="Belgian Family">
                                                                    Belgian Family
                                                                </option>
                                                                <option value="British Family">
                                                                    British Family
                                                                </option>
                                                                <option value="Canadian Family">
                                                                    Canadian Family
                                                                </option>
                                                                <option value="Chinese Family">
                                                                    Chinese Family
                                                                </option>
                                                                <option value="Dutch Family">
                                                                    Dutch Family
                                                                </option>
                                                                <option value="Filipino Family">
                                                                    Filipino Family
                                                                </option>
                                                                <option value="French Family">
                                                                    French Family
                                                                </option>
                                                                <option value="German Family">
                                                                    German Family
                                                                </option>
                                                                <option value="Hong Kong Family">
                                                                    Hong Kong Family
                                                                </option>
                                                                <option value="Indian Family">
                                                                    Indian Family
                                                                </option>
                                                                <option value="Italian Family">
                                                                    Italian Family
                                                                </option>
                                                                <option value="Japanese Family">
                                                                    Japanese Family
                                                                </option>
                                                                <option value="Korean Family">
                                                                    Korean Family
                                                                </option>
                                                                <option value="Middle East Family">
                                                                    Middle East Family
                                                                </option>
                                                                <option value="Pakistani Family">
                                                                    Pakistani Family
                                                                </option>
                                                                <option value="Russian Family">
                                                                    Russian Family
                                                                </option>
                                                                <option value="Singaporean family">
                                                                    Singaporean family
                                                                </option>
                                                                <option value="South African Family">
                                                                    South African Family
                                                                </option>
                                                                <option value="Spanish Family">
                                                                    Spanish Family
                                                                </option>
                                                                <option value="Taiwanese Family">
                                                                    Taiwanese Family
                                                                </option>
                                                                <option value="Turkish Family">
                                                                    Turkish Family
                                                                </option>
                                                                <option value="Western Family">
                                                                    Western Family
                                                                </option>
                                                        </select>
                                                    <label>Family Type *</label>
                                                        <select class="selectpicker" data-live-search="true" data-live-search-style="begins" name="j_familytype" required="" title="Select family type">
                                                            <option value="Couple">
                                                                Couple
                                                            </option>
                                                            <option value="Couple + 1 kid">
                                                                Couple + 1 kid
                                                            </option>
                                                            <option value="Couple + 2 kids">
                                                                Couple + 2 kids
                                                            </option>
                                                            <option value="Couple + 3 kids">
                                                                Couple + 3 kids
                                                            </option>
                                                            <option value="Couple + 4 kids">
                                                                Couple + 4 kids
                                                            </option>
                                                            <option value="Couple + 5 kids">
                                                                Couple + 5 kids
                                                            </option>
                                                            <option value="Large Family (&gt; 6)">
                                                                Large Family (&gt; 6)
                                                            </option>
                                                            <option value="Couple + Parents">
                                                                Couple + Parents
                                                            </option>
                                                            <option value="Couple with Parents">
                                                                Couple with Parents
                                                            </option>
                                                            <option value="Single">
                                                                Single
                                                            </option>
                                                            <option value="Single + 1 kid">
                                                                Single + 1 kid
                                                            </option>
                                                            <option value="Single + 2 kids">
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
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-helper_requirements">
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-57" name="j_mainduties[]" type="checkbox" value="Baby Care"> Baby Care
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-56" name="j_mainduties[]" type="checkbox" value="Child Care"> Child Care
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-54" name="j_mainduties[]" type="checkbox" value="Elder Care"> Elder Care
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-180" name="j_mainduties[]" type="checkbox" value="Groceries"> Groceries
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-79" name="j_mainduties[]" type="checkbox" value="Housekeeping"> Housekeeping
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-53" name="j_mainduties[]" type="checkbox" value="Pet Care"> Pet Care
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-91" name="j_mainduties[]" type="checkbox" value="Professional Driver"> Professional Driver
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-55" name="j_mainduties[]" type="checkbox" value="Teen Care"> Teen Care
                                                </div>
                                        </ul>
                                            </div><br>
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Cooking Skills<small></small></label><br>
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-helper_requirements">
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-57" name="j_cookingskill[]" type="checkbox" value="Arabic"> Arabic
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-56" name="j_cookingskill[]" type="checkbox" value="Chinese"> Chinese
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-54" name="j_cookingskill[]" type="checkbox" value="Indian"> Indian
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-180" name="j_cookingskill[]" type="checkbox" value="Japanese"> Japanese
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-79" name="j_cookingskill[]" type="checkbox" value="Vegetarian"> Vegetarian
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-91" name="j_cookingskill[]" type="checkbox" value="Western"> Western
                                                </div>
                                        </ul>
                                            </div><br>
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Required Languages<small></small></label><br>
                                               <ul class="job-manager-term-checklist job-manager-term-checklist-candidate_languages2" required >
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-149"  name="j_requiredlanguages[]" type="checkbox" value="Cantonese"> Cantonese
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-148" name="j_requiredlanguages[]" type="checkbox" value="English"> English
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-152" name="j_requiredlanguages[]" type="checkbox" value="Filipino"> Filipino
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-153" name="j_requiredlanguages[]" type="checkbox" value="Indonesian"> Indonesian
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-154" name="j_requiredlanguages[]" type="checkbox" value="Japanese"> Japanese
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-150" name="j_requiredlanguages[]" type="checkbox" value="Mandarin"> Mandarin
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-168" name="j_requiredlanguages[]" type="checkbox" value="Modern Arabic"> Modern Arabic
                                               </div>
                                               <div class="col-sm-3">
                                                    <input id="in-candidate_language2-151" name="j_requiredlanguages[]" type="checkbox" value="Thai"> Thai
                                               </div>
                                        </ul>
                                            </div><br>
                                            <div class="form-group">
                                                <label>Application Email  *</label> 
                                                <input class="form-control" required="" title="Please input application email" name="j_email" placeholder="Application Email"  type="email">
                                            </div>  
                                            <div class="form-group">
                                                <label>Monthly Salary  *</label> 
                                                <input class="form-control" required="" title="Please input montly salary" name="j_monthlysalary" placeholder="e.g. PHP 25,000"  type="type">
                                            </div>
                                            <div class="form-group">
                                                <label> Start Date  *</label>
                                                 <input class="form-control" required="" title="Please input starting date" name="j_startdate"  type="date">
                                            </div>
                              
                                        </div>
                                    </div>
                                    <!-- End step 2 -->

                                    <div class="tab-pane" id="step3">                                        
                                        <h4 class="info-text"> Finished and submit </h4>
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
                                        <input type='submit' class='btn btn-finish btn-primary ' name='finish' value='Finish' />
                                         
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