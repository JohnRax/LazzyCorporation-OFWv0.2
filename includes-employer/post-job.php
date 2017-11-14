<br><br>
<script>
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode < 48 || charCode > 57)
        return false;
    return true;    
}
</script>

<?php 

    require_once 'includes/connection.php';
    if (isset($_POST['finish']))
    {

        //job Info

        if( isset($_POST['j_mainduties']) && !empty($_POST['j_mainduties']) ) 
        { 
            $mainduties = implode(', ', $_POST['j_mainduties']);
        }
        else
        {
            $mainduties="none";        
        }

        if( isset($_POST['j_cookingskill']) && !empty($_POST['j_cookingskill']) ) 
        { 
            $cookingskill = implode(', ', $_POST['j_cookingskill']);
        }
        else
        {
            $cookingskill="none";        
        }
        if( isset($_POST['j_requiredlanguages']) && !empty($_POST['j_requiredlanguages']) ) 
        { 
            $requiredlanguages = implode(', ', $_POST['j_requiredlanguages']);
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
        $applicationemail=$_POST['j_applicationemail'];
        $nationality=$_POST['j_nationality'];
        $familytype=$_POST['j_familytype'];
        $startdate=$_POST['j_startdate'];
        $monthlysalary=$_POST['j_monthlysalary'];
        $logo=$_FILES['j_logo']['name'];
        $logo_temp=$_FILES['j_logo']['tmp_name'];
        move_uploaded_file($logo_temp, "assets/img/profilepicture/{$joblogo}");
        $user->post_jobs($id,$logo_temp,$jobtitle,$employertype,$country,$districtlocation,$type,$category,$description,$workingstatus,$requiredlanguages,$contact,$mainduties,$cookingskill,$applicationemail,$nationality,$familytype,$startdate,$monthlysalary);


    }
   
  ?>
 <div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix" > 
                    <div class="wizard-container"> 

                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                            <form action="" method="">                        
                             

                                <ul>
                                    <li><a href="#step1" data-toggle="tab">Step 1 </a></li>
                                    <li><a href="#step2" data-toggle="tab">Step 2 </a></li>
                                    <li><a href="#step3" data-toggle="tab">Step 3 </a></li>
                                    
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane" id="step1">
                                        <div class="row p-b-15  ">

                                       
                                               
                                            <div class="col-sm-12">
                                                <h3 class="info-text"> <strong>Job Information</strong></h3>
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
                                                                <option value="Hong Kong">
                                                                    Hong Kong
                                                                </option>
                                                                <option value="Macau">
                                                                    Macau
                                                                </option>
                                                                <option value="Qatar">
                                                                    Qatar
                                                                </option>
                                                                <option value="Saudi Arabia">
                                                                    Saudi Arabia
                                                                </option>
                                                                <option value="Singapore">
                                                                    Singapore
                                                                </option>
                                                                <option value="State of Kuwait">
                                                                    State of Kuwait
                                                                </option>
                                                                <option value="United Arab Emirates">
                                                                    United Arab Emirates
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
                                                        <textarea name="j_description" required title="Please enter at least 50 characters." maxlength="250" minlength="50" class="form-control" style="font-family: Arial;font-size: 12pt;width:100%;height:20vw"></textarea>
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
                                                            <option value="Couple + Parents">
                                                                Couple + Parents
                                                            </option>
                                                            <option value="Couple with Parents">
                                                                Couple with Parents
                                                            </option>
                                                            <option value="Large Family (&gt; 6)">
                                                                Large Family (&gt; 6)
                                                            </option>
                                                            <option value="Large Family (&gt;6)">
                                                                Large Family (&gt;6)
                                                            </option>
                                                            <option value="Other">
                                                                Other
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
                                                <div class="col-sm-4">
                                                    
                                                        
                                                            <label><input name="j_mainduties[]" type="checkbox"> Baby Care</label>
                                                       
                                                </div>
                                                <div class="col-sm-4">
                                                   
                                                            <label><input name="j_mainduties[]" type="checkbox"> Child Care</label>
                                                      
                                                </div>
                                                <div class="col-sm-4">
                                                    
                                                            <label><input name="j_mainduties[]" type="checkbox"> Elder Care</label>
                                                        
                                                </div>
                                                <div class="col-sm-4">
                                                   
                                                            <label><input name="j_mainduties[]" type="checkbox"> Groceries</label>
                                                        
                                                </div>
                                                <div class="col-sm-4">
                                                    
                                                            <label><input name="j_mainduties[]" type="checkbox">  Housekeeping</label>
                                                        
                                                </div>
                                                <div class="col-sm-4">
                                                    
                                                            <label><input name="j_mainduties[]" type="checkbox">  Professional Driver</label>
                                                       
                                                </div>
                                                <div class="col-sm-4">
                                                   
                                                            <label><input name="j_mainduties[]" type="checkbox"> Pet Care</label>
                                                       
                                                </div>
                                            </div><br>
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Cooking Skills<small></small></label><br>
                                                <div class="col-sm-4">
                                                    
                                                            <label><input name="j_cookingskill[]" type="checkbox">  Arabic</label>
                                                     
                                                </div>
                                                <div class="col-sm-4">
                                                  
                                                            <label><input name="j_cookingskill[]" type="checkbox">  Chineses</label>
                                                        
                                                </div>
                                                <div class="col-sm-4">
                                                   
                                                            <label><input name="j_cookingskill[]" type="checkbox"> Indian</label>
                                                       
                                                </div>
                                                <div class="col-sm-4">
                                                   
                                                            <label><input name="j_cookingskill[]" type="checkbox"> Japanese</label>
                                                        
                                                </div>
                                                <div class="col-sm-4">
                                                  
                                                            <label><input name="j_cookingskill[]" type="checkbox"> Vegetarian</label>
                                                       
                                                </div>
                                                <div class="col-sm-4">
                                                 
                                                            <label><input name="j_cookingskill[]" type="checkbox"> Western</label>
                                                      
                                                </div>
                                            </div><br>
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Required Languages<small></small></label><br>
                                                <div class="col-sm-4">
                                                    
                                                            <label><input name="j_requiredlanguages[]" type="checkbox"> English</label>
                                                        
                                                </div>
                                                <div class="col-sm-4">
                                                    
                                                            <label><input name="j_requiredlanguages[]" type="checkbox"> Filipino</label>
                                                        
                                                </div>
                                                <div class="col-sm-4">
                                                    
                                                            <label><input name="j_requiredlanguages[]" type="checkbox"> Cantonese</label>
                                                       
                                                </div>
                                               <div class="col-sm-4">
                                                    
                                                            <label><input name="j_requiredlanguages[]" type="checkbox">  Mandarin</label>
                                                      
                                                </div>
                                                <div class="col-sm-4">
                                                   
                                                            <label><input name="j_requiredlanguages[]" type="checkbox">  Indonesian</label>
                                                        
                                                </div>
                                                <div class="col-sm-4">
                                                    
                                                            <label><input name="j_requiredlanguages[]" type="checkbox">  Japanese</label>
                                                        
                                                </div>
                                                <div class="col-sm-4">
                                                   
                                                            <label><input name="j_requiredlanguages[]" type="checkbox">  Thai</label>
                                                        
                                                </div>
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
                                            <div class="form-group">
                                                <label>Logo <small> <i>(Optional)</i></small></label>
                                                <input class="form-control" name="j_logo" required type="file">
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