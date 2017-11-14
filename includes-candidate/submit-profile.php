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

        //personal Info

        if( isset($_POST['up_languages']) && !empty($_POST['up_languages']) ) 
        { 
            $languages = implode(', ', $_POST['up_languages']);
        }
        else
        {
            $languages="none";        
        }
        $id=$_SESSION['user_session'];
        $category=$_POST['up_category'];
        $email=$_POST['up_email'];
        $mobile=$_POST['up_mobile'];
        $telephone=$_POST['up_telephone'];
        $nationality=$_POST['up_nationality'];
        $address=$_POST['up_address'];
        $age=$_POST['up_age'];
        $religion=$_POST['up_religion'];
        $education=$_POST['up_education'];
        $marital=$_POST['up_maritalstatus'];
        $picture=$_FILES['up_picture']['name'];
        $picture_temp=$_FILES['up_picture']['tmp_name'];
        move_uploaded_file($picture_temp, "assets/img/profilepicture/{$picture}");
        $user->post_profile_personal_information($id,$picture_temp,$category,$email,$address,$mobile,$telephone,$nationality,$religion,$age,$marital,$education,$languages);


        //Propessional Info

        if( isset($_POST['upi_skillsexp']) && !empty($_POST['upi_skillsexp']) ) 
        { 
            $skillsexp = implode(', ', $_POST['upi_skillsexp']);
        }
        else
        {
            $skillsexp="none";        
        }

        if( isset($_POST['upi_cookingskills']) && !empty($_POST['upi_cookingskills']) ) 
        { 
            $cookingskills = implode(', ', $_POST['upi_cookingskills']);
        }
        else
        {
            $cookingskills="none";        
        }
        if( isset($_POST['upi_otherskills']) && !empty($_POST['upi_otherskills']) ) 
        { 
            $otherskills = implode(', ', $_POST['upi_otherskills']);
        }
        else
        {
            $otherskills="none";        
        }
        $preferedworklocation=$_POST['upi_preferedworklocation'];
        $yearsofexp=$_POST['upi_yearsofexp'];
        $expsummary=$_POST['upi_expsummary'];
        $availability=$_POST['upi_availability'];
        $user->post_profile_professional_information($id,$preferedworklocation,$yearsofexp,$expsummary,$skillsexp,$cookingskills,$otherskills,$availability);

        $q1=$_POST['uq_1'];
        $q2=$_POST['uq_2'];
        $q3=$_POST['uq_3'];
        $q4=$_POST['uq_4'];
        $q5=$_POST['uq_5'];
        $q6=$_POST['uq_6'];
        $q7=$_POST['uq_7'];
        $q8=$_POST['uq_8'];
        $q9=$_POST['uq_9'];
        $q10=$_POST['uq_10'];
        $user->post_profile_supplementary_question($id,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10);
        // Supplementary Questions
        


    }
   
  ?>

 <div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix" > 
                    <div class="wizard-container"> 

                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                            <form action="" method="post"  enctype="multipart/form-data">                        
                             
                                <ul>
                                    <li><a href="#step1" data-toggle="tab">Step 1 </a></li>
                                    <li><a href="#step2" data-toggle="tab">Step 2 </a></li>
                                    <li><a href="#step3" data-toggle="tab">Step 3 </a></li>
                                    <li><a href="#step4" data-toggle="tab">Finished </a></li>
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane" id="step1">
                                        <div class="row p-b-15  ">
                                            <div class="col-sm-12">
                                            <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="assets/img/default-property.jpg" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" required=""  select you photo" id="wizard-picture" name="up_picture">
                                                    </div> 
                                                </div>

                                               <h3 class="info-text"> Personal Information </h3>

                                                <label>Resume Category *</label>
                                                    <select required class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select your resume category" name="up_category" >
                                                        
                                                        <option value="Driver">Driver</option>
                                                        <option value="Helper">Helper</option>
                                                        
                                                    </select>

                                                <div class="form-group">
                                                    <labeL>Last Name *</label>
                                                    <input name="u_lname" required type="text" class="form-control" placeholder="Last Name" title="Please input your Last name">
                                                </div>
                                                   <div class="form-group">
                                                    <labeL>First Name *</label>
                                                    <input name="u_firstname" required type="text" class="form-control" placeholder="First Name" title="Please input your First name">
                                                </div>
                                                <div class="form-group">

                                                    <labeL>Email address *</label>
                                                    <input name="up_email"  required type="text" class="form-control" placeholder="Email address" title="Please input your email address">

                                                </div>
                                                <div class="form-group">
                                                    <labeL>Mobile number *</label>
                                                    <input name="up_mobile"  required type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Mobile number" title="Please input your mobile number">
                                                </div>
                                                   <div class="form-group">
                                                    <labeL>Telephone number <small><i>Optional</i></small> </label>
                                                    <input name="up_telephone" onkeypress="return isNumberKey(event)" type="text" class="form-control" placeholder="Telephone number">
                                                </div>
                                                <label>Nationality  *</label>
                                                        <select name="up_nationality" required class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select your nationality">
                                                            
                                                            <option value="Filipino">Filipino</option>
                                                            <option value="Chinese">Chinese</option>
                                                            <option value="Hongkongese">Hongkongese</option>
                                                            <option value="Indian">Indian</option>
                                                            <option value="Indonesian">Indonesian</option>
                                                            <option value="Sri Lankan">Sri Lankan</option>
                                                            <option value="Thai">Thai</option>
                                                        </select>

                                                <label>Location  *</label>
                                                        <select name="up_address" class="selectpicker" required data-live-search="true" data-live-search-style="begins" title="Select your location">

                                                            <option selected disabled value="" >Select Country</option>
                                                            <option  value="Philippines">Philippines</option>
                                                            <option  value="China">China</option>
                                                            <option  value="India">India</option>
                                                            <option  value="Indonesia">Indonesia</option>
                                                            <option  value="Thailand">Thailand</option>
                                                           
                                                        </select>
                                                <div class="form-group">
                                                    <labeL>Age *</label>
                                                    <input name="up_age" type="text" class="form-control" required placeholder="Age" title="Please input your age">
                                                </div>

                                            
                                                <div class="form-group">
                                                     <labeL>Marital Status *</label>
                                                        <select name="up_maritalstatus" class="selectpicker" required data-live-search="true" data-live-search-style="begins" title="Select your marital status">
                                                            
                                                            <option  value="Single">Single</option>
                                                            <option  value="Married">Married</option>
                                                            <option  value="Divorced">Divorced</option>
                                                            <option  value="Widowed">Widowed</option>
                                                           
                                                        </select>
                                                </div>
                                                   <div class="form-group">
                                                     <labeL>Religion *</label>
                                                        <select name="up_religion" class="selectpicker" required data-live-search="true" data-live-search-style="begins" title="Select your religion">
                                                            
                                                            <option  value="Catholic">Catholic</option>
                                                            <option  value="Muslim">Muslim</option>
                                                           
                                                           
                                                        </select>
                                                    </div>
                                                     <div class="form-group">
                                                     <labeL>Highest Education Attainment *</label>
                                                        <select name="up_education" class="selectpicker" required data-live-search="true" data-live-search-style="begins" title="Select your highest educational ttainment ">
                                                            
                                                            <option  value="Elementary">Elementary</option>
                                                            <option  value="High School">High School</option>
                                                            <option  value="College">College</option>
                                                           
                                                           
                                                        </select>
                                                    </div>

                                                
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Languages Spoken *</label>
                                           
                                            <ul class="job-manager-term-checklist job-manager-term-checklist-candidate_languages">
                                                <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="Arabic"> Arabic
                                                        
                                                </div>
                                                <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="Cantonese"> Cantonese
                                                       
                                                </div>
                                                <div class="col-sm-3">   
                                                        <input  name="up_languages[]" type="checkbox" value="English"> English</label></li>
                                                        
                                                </div>
                                                <div class="col-sm-3">
                                                   
                                                        <input  name="up_languages[]" type="checkbox" value="Filipino"> Filipino</label></li>
                                                        
                                                </div>
                                                <div class="col-sm-3">           
                                                        <input  name="up_languages[]" type="checkbox" value="Japanese"> Japanese</label></li>
                                                        
                                                </div>
                                                <div class="col-sm-3">
                                                        <input name="up_languages[]" type="checkbox" value="Mandarin"> Mandarin</label></li>
                                                       
                                                </div>
                                                <div class="col-sm-3">
                                                        <input name="up_languages[]" type="checkbox" value="Thai"> Thai</label></li>
                                                        
                                                </div>
                                            </ul>
                                         </div>
                                            
                                            </div>
                                        </div>
                                    </div>

                                    <!--  End step 1 -->

                                    <div class="tab-pane" id="step2">
                                     <div class="row">
                                        <h3 class="info-text"> Professional Information </h3>
                                         <div class="col-sm-12"> 
                                                <div class="col-sm-12"> 
                                                        <label>Where Do You Want To Work *</label>
                                                        <select name="upi_preferedworklocation" required="" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Please select your prefered location">
                                                            
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="China">China</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Thailand">Thailand</option>
                                                        </select>
                                                </div>
                                                </div>
                                                 <div class="col-sm-12"> 
                                                   <div class="col-sm-12"> 
                                                <label>Years Of Experience *</label>
                                                        <select required="" class="selectpicker" name="upi_yearsofexp" data-live-search="true" data-live-search-style="begins" title="Please select your years of experience">
                                                          
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                </select>
                                                </div>
                                                </div>
                                       
                                            <div class="col-sm-12"> 
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label>Experience Summary<small><i>Minimum of 30 characters, Maximum of 250 chracters.</i></small> </label>
                                                        <textarea name="upi_expsummary" minlength="30" maxlength="250" required class="form-control" style="font-family: Arial;font-size: 12pt;width:100%;height:20vw" title="Please enter at least 30 characters." placeholder="Explain your working experience" ></textarea>
                                                    </div> 
                                                </div> 
                                            </div>

                                                                             
                                            <div class="col-sm-12 padding-top-15">
                                                <label>My Skills and Experience <small><i>Maximum of 4</i></small></label>
                                                     
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-helper_requirements2">
                                                    
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-111" name="upi_skillsexp[]" type="checkbox" value="Professional Driver"> Professional Driver
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-107" name="upi_skillsexp[]" type="checkbox" value="Baby Care"> Baby Care
                                                    </div>
                                                    
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-236" name="upi_skillsexp[]" type="checkbox" value="Child Care"> Child Care
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-112" name="upi_skillsexp[]" type="checkbox" value="Pet Care"> Pet Care
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-237" name="upi_skillsexp[]" type="checkbox" value="Cooking"> Cooking
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-110" name="upi_skillsexp[]" type="checkbox" value="Elder Care"> Elder Care
                                                    </div>
                                                    <div class="col-sm-3">
                                                       <input id="in-helper_requirement2-113" name="upi_skillsexp[]" type="checkbox" value="Housekeeping"> Housekeeping
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-109" type="checkbox" value="Teen Care"> Teen Care
                                                    </div>
                                                    
                                                </ul>
                                            </div>

                                             <div class="col-sm-12 padding-top-15">
                                                <label>My Cooking Skills <small><i>Maximum of 4</i></small></label>
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-cooking_requirements2">
                                                    
                                                    <div class="col-sm-3">
                                                        <input id="in-cooking_requirement2-193" name="upi_cookingskills[]" type="checkbox" value="American"> Americans
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-cooking_requirement2-114" name="upi_cookingskills[]" type="checkbox" value="Arabic"> Arabic
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-cooking_requirement2-115" name="upi_cookingskills[]" type="checkbox" value="Chinese"> Chinese
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-cooking_requirement2-191" name="upi_cookingskills[]" type="checkbox" value="French"> French
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-cooking_requirement2-116" name="upi_cookingskills[]" type="checkbox" value="Indian"> Indian
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-cooking_requirement2-192" name="upi_cookingskills[]" type="checkbox" value="Italian"> Italian
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-cooking_requirement2-119" name="upi_cookingskills[]" type="checkbox" value="Japanese"> Japanese
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-cooking_requirement2-235" name="upi_cookingskills[]" type="checkbox" value="Thai"> Thai
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-cooking_requirement2-117" name="upi_cookingskills[]" type="checkbox" value="Vegeterian"> Vegeterian
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-cooking_requirement2-118" name="upi_cookingskills[]" type="checkbox" value="Western"> Western
                                                </ul>
                                            </div>
                                            <div class="col-sm-12 padding-top-15">
                                                <label>My Other Skills <small><i>Maximum of 4</i></small></label>
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-other_skills2">
                                                   
                                                    <div class="col-sm-3">
                                                        <input id="in-other_skill2-232" name="upi_otherskills[]" type="checkbox" value="Baking"> Baking
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-other_skill2-126" name="upi_otherskills[]" type="checkbox" value="Car Wash"> Car Wash
                                                    </div>
                                                    <div class="col-sm-3">
                                                       <input id="in-other_skill2-123" name="upi_otherskills[]" type="checkbox" value="Computer"> Computer
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-other_skill2-124" name="upi_otherskills[]" type="checkbox" value="Driving"> Driving
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-other_skill2-190" name="upi_otherskills[]" type="checkbox" value="First Aid Certificate"> First Aid Certificate
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-other_skill2-120" name="upi_otherskills[]" type="checkbox" value="Gardening"> Gardening
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-other_skill2-122" name="upi_otherskills[]" type="checkbox" value="Handyman"> Handyman
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-other_skill2-125" name="upi_otherskills[]" type="checkbox" value="Housework"> Housework
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-other_skill2-121" name="upi_otherskills[]" type="checkbox" value="Sewing"> Sewing
                                                    </div>
                                                    <div class="col-sm-3">
                                                       <input id="in-other_skill2-238" name="upi_otherskills[]" type="checkbox" value="Tutoring"> Tutoring
                                                </ul>
                                            </div>
                                                  <div class="col-sm-12"> 

                                                     <labeL>Start Date *</label>
                                                    <input name="upi_availability" required="" type="date" class="form-control" placeholder="" title="Please input your start date">

                                                   
                                                </div>
                                            <br>
                                        </div>
                                    </div>
                                    <!-- End step 2 -->

                                    <div class="tab-pane" id="step3">                                        
                                        <h3 class="info-text">Supplementary Questions</h3>
                                          <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>1. Would you agreee to do extra work?</strong></label>
                                                           <select required name="uq_1"  title="Please answer this question">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes">Yes</option>
                                                             <option value="No">No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 

                                          <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>2. If your employer asked you to work on your holiday and willing to pay as compensation, are you willing to do so?</strong></label>
                                                           <select name="uq_2" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes">Yes</option>
                                                             <option value="No">No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                             <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>3. Are you willing to work for a family without your own servant room?</strong></label>
                                                           <select name="uq_3" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes">Yes</option>
                                                             <option value="No">No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                             <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>4. Are you willing to take care of children no matter how many the family has?</strong></label>
                                                           <select name="uq_4" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes">Yes</option>
                                                             <option value="No">No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>5. Living with elderly person?</strong></label>
                                                           <select name="uq_5" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes">Yes</option>
                                                             <option value="No">No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>6. Are you willing to take care of disabled elderly?</strong></label>
                                                           <select name="uq_6" class="form-group">
                                                            <option selected disabled value="">Y/N</option>
                                                             <option value="Yes">Yes</option>
                                                             <option value="No">No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>7. Do you got experience to take care of dogs or pets?</strong></label>
                                                           <select name="uq_7" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes">Yes</option>
                                                             <option value="No">No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>8. Have you suffered from health problems in your nervous system, eyes, feet, legs or any other parts of your body?</strong></label>
                                                           <select name="uq_8" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes">Yes</option>
                                                             <option value="No">No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>9. Can you drive?</strong></label>
                                                           <select name="uq_9" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes">Yes</option>
                                                             <option value="No">No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>10. Do you smoke?</strong></label>
                                                           <select name="uq_10" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes">Yes</option>
                                                             <option value="No">No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 

                                       
                                    </div>
                                    <!--  End step 3 -->


                                    <div class="tab-pane" id="step4">                                        
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
                                    <!--  End step 4 -->

                                </div>

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