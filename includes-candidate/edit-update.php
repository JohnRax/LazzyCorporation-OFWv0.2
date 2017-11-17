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

        if( isset($_POST['up_languages']) && !empty($_POST['up_languages']) ) 
        { 
            $languages = implode(',', $_POST['up_languages']);
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
        if(empty($picture))
        {
            $check_logo_query="SELECT * FROM user_personal_information WHERE u_id=:id";
            $check_logo_stmt=$connection->prepare($check_logo_query);
            $check_logo_stmt->execute(['id'=>$id]);
            $result=$check_logo_stmt->fetch(PDO::FETCH_ASSOC);
            $picture=$result['up_picture'];
            if (empty($picture)) 
            {
                $picture="default.png";
            }
        }
        $user->update_profile_personal_information($id,$picture,$category,$email,$address,$mobile,$telephone,$nationality,$religion,$age,$marital,$education,$languages);


        if( isset($_POST['upi_skillsexp']) && !empty($_POST['upi_skillsexp']) ) 
        { 
            $skillsexp = implode(',', $_POST['upi_skillsexp']);
        }
        else
        {
            $skillsexp="none";        
        }

        if( isset($_POST['upi_cookingskills']) && !empty($_POST['upi_cookingskills']) ) 
        { 
            $cookingskills = implode(',', $_POST['upi_cookingskills']);
        }
        else
        {
            $cookingskills="none";        
        }
        if( isset($_POST['upi_otherskills']) && !empty($_POST['upi_otherskills']) ) 
        { 
            $otherskills = implode(',', $_POST['upi_otherskills']);
        }
        else
        {
            $otherskills="none";        
        }
        $preferedworklocation=$_POST['upi_preferedworklocation'];
        $yearsofexp=$_POST['upi_yearsofexp'];
        $expsummary=$_POST['upi_expsummary'];
        $availability=$_POST['upi_availability'];
        $user->update_profile_professional_information($id,$preferedworklocation,$yearsofexp,$expsummary,$skillsexp,$cookingskills,$otherskills,$availability);
        
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
        if($user->update_profile_supplementary_question($id,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10))
        {
         
            echo"<script>
                    alert('Complete! Your profile is Updated. Thank you');
                </script>";
        }


     }

     $show_profile_query="SELECT 
                              a.*,b.*,c.*,d.*
                            FROM
                             user_details AS a
                              JOIN user_personal_information AS b 
                                ON b.u_id = a.u_id 
                              JOIN user_professional_information AS c 
                                ON a.u_id = c.u_id 
                               JOIN user_question AS d 
                               ON c.u_id =d.u_id
                            WHERE a.u_id = :id ";
    $show_profile_stmt=$connection->prepare($show_profile_query);
    $show_profile_stmt->execute(['id'=>$_SESSION['user_session']]);
    $result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC);
    

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
                                                        <img src="assets/img/profilepicture/<?php echo $result['up_picture'] ?>" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="up_picture">
                                                    </div> 
                                                </div>

                                               <h3 class="info-text"> Personal Information </h3>

                                                <label>Resume Category *</label>
                                                    <select required class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select your resume category" name="up_category" >
                                                        
                                                        <option value="Driver"  <?php if($result['up_category']=="Driver")echo "selected"; ?>>Driver</option>
                                                        <option value="Helper" <?php if($result['up_category']=="Helper")echo "selected"; ?>>Helper</option>
                                                        
                                                    </select>

                                                <div class="form-group">
                                                    <labeL>Last Name *</label>
                                                    <input name="u_lname" required type="text" class="form-control" placeholder="Last Name" title="Please input your last name" value="<?php echo $result['u_lname']; ?>">
                                                </div>
                                                   <div class="form-group">
                                                    <labeL>First Name *</label>
                                                    <input name="u_firstname" required type="text" class="form-control" placeholder="First Name" title="Please input your first name" value="<?php echo $result['u_fname']; ?>">
                                                </div>
                                                <div class="form-group">

                                                    <labeL>Email address *</label>
                                                    <input name="up_email"  required type="text" class="form-control" placeholder="Email address" title="Please input your email address" value="<?php echo $result['up_email']; ?>">

                                                </div>
                                                <div class="form-group">
                                                    <labeL>Mobile number *</label>
                                                    <input name="up_mobile"  required type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Mobile number" title="Please input your mobile number" value="<?php echo $result['up_mobile']; ?>">
                                                </div>
                                                   <div class="form-group">
                                                    <labeL>Telephone number <small><i>Optional</i></small> </label>
                                                    <input name="up_telephone" onkeypress="return isNumberKey(event)" type="text" class="form-control" placeholder="Telephone number" value="<?php echo $result['up_telephone']; ?>">
                                                </div>
                                                <label>Nationality  *</label>
                                                        <select name="up_nationality" required class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Please select your nationality">
                                                            
                                                            <option value="Filipino" <?php if($result['up_nationality']=="Filipino")echo "selected"; ?>>Filipino</option>
                                                            <option value="Chinese" <?php if($result['up_nationality']=="Chinese")echo "selected"; ?>>Chinese</option>
                                                            <option value="Hongkongese" <?php if($result['up_nationality']=="Hongkongese")echo "selected"; ?>>Hongkongese</option>
                                                            <option value="Indian" <?php if($result['up_nationality']=="Indian")echo "selected"; ?>>Indian</option>
                                                            <option value="Indonesian" <?php if($result['up_nationality']=="Indonesian")echo "selected"; ?>>Indonesian</option>
                                                            <option value="Sri Lankan" <?php if($result['up_nationality']=="Sri Lankan")echo "selected"; ?>>Sri Lankan</option>
                                                            <option value="Thai" <?php if($result['up_nationality']=="Thai")echo "selected"; ?>>Thai</option>
                                                        </select>

                                                <label>Location  *</label>
                                                        <select name="up_address" class="selectpicker" required data-live-search="true" data-live-search-style="begins" title="Please select your location">

                                                                 <option value="Philippines"  <?php if($result['up_address']=="Philippines")echo "selected"; ?>>
                                                                    Philippines
                                                                </option>
                                                                <option value="Hong Kong"  <?php if($result['up_address']=="Hong Kong")echo "selected"; ?>>
                                                                    Hong Kong
                                                                </option>
                                                                <option value="China"  <?php if($result['up_address']=="China")echo "selected"; ?>>
                                                                    China
                                                                </option>
                                                                <option value="Saudi Arabia"  <?php if($result['up_address']=="Saudi Arabia")echo "selected"; ?>>
                                                                    Saudi Arabia
                                                                </option>
                                                                <option value="United Arab Emirates"  <?php if($result['up_address']=="United Arab Emirates")echo "selected"; ?>>
                                                                    United Arab Emirates
                                                                </option>
                                                                <option value="Qatar"  <?php if($result['up_address']=="Qatar")echo "selected"; ?>>
                                                                    Qatar
                                                                </option>
                                                                <option value="Taiwan"  <?php if($result['up_address']=="Taiwan")echo "selected"; ?>>
                                                                    Taiwan
                                                                </option>       
                                                           
                                                        </select>
                                                <div class="form-group">
                                                    <labeL>Age *</label>
                                                    <input name="up_age" onkeypress="return isNumberKey(event)" type="text" class="form-control" maxlength="3" required placeholder="Age" title="Please input your age" value="<?php echo $result['up_age'] ?>">
                                                </div>

                                            
                                                <div class="form-group">
                                                     <labeL>Marital Status *</label>
                                                        <select name="up_maritalstatus" class="selectpicker" required data-live-search="true" data-live-search-style="begins" title="Please select your marital status">
                                                            
                                                            <option  value="Single"  <?php if($result['up_maritalstatus']=="Single")echo "selected"; ?>>Single</option>
                                                            <option  value="Married"  <?php if($result['up_maritalstatus']=="Married")echo "selected"; ?>>Married</option>
                                                            <option  value="Divorced"  <?php if($result['up_maritalstatus']=="Divorced")echo "selected"; ?>>Divorced</option>
                                                            <option  value="Widowed"  <?php if($result['up_maritalstatus']=="Widowed")echo "selected"; ?>>Widowed</option>
                                                           
                                                        </select>
                                                </div>
                                                   <div class="form-group">
                                                     <labeL>Religion *</label>
                                                        <select name="up_religion" class="selectpicker" required data-live-search="true" data-live-search-style="begins" title="Please select your religion">
                                                            
                                                            <option  value="Roman Catholic" <?php if($result['up_religion']=="Roman Catholic")echo "selected"; ?>>Roman Catholic</option>
                                                            <option  value="Muslim" <?php if($result['up_religion']=="Muslim")echo "selected"; ?>>Muslim</option>
                                                            <option  value="Born Again Christian" <?php if($result['up_religion']=="Born Again Christian")echo "selected"; ?>>Born Again Christian</option>
                                                            <option  value="Iglesia Ni Cristo" <?php if($result['up_religion']=="Iglesia Ni Cristo")echo "selected"; ?>>Iglesia Ni Cristo</option>
                                                            <option  value="Baptist" <?php if($result['up_religion']=="Baptist")echo "selected"; ?>>Baptist</option>
                                                           
                                                           
                                                        </select>
                                                    </div>
                                                     <div class="form-group">
                                                     <labeL>Highest Education Attainment *</label>
                                                        <select name="up_education" class="selectpicker" required data-live-search="true" data-live-search-style="begins" title="Please select your highest educational attainment">
                                                            
                                                            <option  value="Elementary" <?php if($result['up_education']=="Elementary")echo "selected"; ?>>Elementary</option>
                                                            <option  value="High School" <?php if($result['up_education']=="High School")echo "selected"; ?>>High School</option>
                                                            <option  value="College" <?php if($result['up_education']=="College")echo "selected"; ?>>College</option>
                                                           
                                                        </select>
                                                    </div>

                                                
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Languages Spoken *</label>
                                            </div>
                                                  
                                                  <?php 
                                                      $array_languages = explode(',', $result['up_languages']);
                                                   
                                                    ?>
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-candidate_languages">
                                                    <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="Arabic" <?php  if(in_array('Arabic', $array_languages))echo "checked"; ?>> Arabic
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="Cantonese" <?php  if(in_array('Cantonese', $array_languages))echo "checked"; ?>> Cantonese
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="English" <?php  if(in_array('English', $array_languages))echo "checked"; ?>> English
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="Filipino" <?php  if(in_array('Filipino', $array_languages))echo "checked"; ?>> Filipino
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="Japanese" <?php  if(in_array('Japanese', $array_languages))echo "checked"; ?>> Japanese
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input name="up_languages[]" type="checkbox" value="Mandarin" <?php  if(in_array('Mandarin', $array_languages))echo "checked"; ?>> Mandarin
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input name="up_languages[]" type="checkbox" value="Thai" <?php  if(in_array('Thai', $array_languages))echo "checked"; ?>> Thai
                                                    </div>

                                                </ul>


                                            </div>
                                        </div>
                                    </div>

                                    <!--  End step 1 -->

                                    <div class="tab-pane" id="step2">
                                     <div class="row">
                                        <h3 class="info-text"> Professional Information </h3>
                                                <div class="col-sm-12"> 
                                                        <label>Where Do You Want To Work *</label>
                                                        <select name="upi_preferedworklocation" required="" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Please select your prefered location">
                                                            
                                                            <option value="Philippines" <?php if($result['upi_preferedworklocation']=="Philippines")echo "selected"; ?>>Philippines</option>
                                                            <option value="China" <?php if($result['upi_preferedworklocation']=="China")echo "selected"; ?>>China</option>
                                                            <option value="India" <?php if($result['upi_preferedworklocation']=="India")echo "selected"; ?>>India</option>
                                                            <option value="Indonesia" <?php if($result['upi_preferedworklocation']=="Indonesia")echo "selected"; ?>>Indonesia</option>
                                                            <option value="Thailand" <?php if($result['upi_preferedworklocation']=="Thailand")echo "selected"; ?>>Thailand</option>
                                                        </select>
                                                </div>
                                                
                                                    <div class="col-sm-12"> 
                                                        <label>Years Of Experience *</label>
                                                        <select required="" class="selectpicker" name="upi_yearsofexp" data-live-search="true" data-live-search-style="begins" title="Please select your years of experience">
                                                          
                                                            <option value="0" <?php if($result['upi_yearsofexp']=="0")echo "selected"; ?>>0</option>
                                                            <option value="1" <?php if($result['upi_yearsofexp']=="1")echo "selected"; ?> >1</option>
                                                            <option value="2" <?php if($result['upi_yearsofexp']=="2")echo "selected"; ?>>2</option>
                                                            <option value="3" <?php if($result['upi_yearsofexp']=="3")echo "selected"; ?>>3</option>
                                                            <option value="4" <?php if($result['upi_yearsofexp']=="4")echo "selected"; ?>>4</option>
                                                            <option value="5" <?php if($result['upi_yearsofexp']=="5")echo "selected"; ?>>5</option>
                                                            <option value="6" <?php if($result['upi_yearsofexp']=="6")echo "selected"; ?>>6</option>
                                                            <option value="7" <?php if($result['upi_yearsofexp']=="7")echo "selected"; ?>>7</option>
                                                            <option value="8" <?php if($result['upi_yearsofexp']=="8")echo "selected"; ?>>8</option>
                                                            <option value="9" <?php if($result['upi_yearsofexp']=="9")echo "selected"; ?>>9</option>
                                                            <option value="10" <?php if($result['upi_yearsofexp']=="10")echo "selected"; ?>>10</option>
                                                            <option value="11" <?php if($result['upi_yearsofexp']=="11")echo "selected"; ?>>11</option>
                                                            <option value="12" <?php if($result['upi_yearsofexp']=="12")echo "selected"; ?>>12</option>
                                                            <option value="13" <?php if($result['upi_yearsofexp']=="13")echo "selected"; ?>>13</option>
                                                            <option value="14" <?php if($result['upi_yearsofexp']=="14")echo "selected"; ?>>14</option>
                                                            <option value="15" <?php if($result['upi_yearsofexp']=="15")echo "selected"; ?>>15</option>
                                                        </select>
                                                </div>
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label>Experience Summary </label> 
                                                            <textarea class="form-control" id="myfield" maxlength='250' minlength="30" name="upi_expsummary" placeholder="Explain here your working experience." required="" style="font-family: arial; font-size: 12pt; width: 100%; height: 20vw;"><?php echo $result['upi_expsummary'] ?></textarea> 
                                                                <i><small><div id='CharCountLabel1'></div></small></i>
                                                    </div> 
                                                </div>                            
                                            <div class="col-sm-12 padding-top-15">
                                            <label>My Skills and Experience <small><i>Maximum of 4</i></small></label>
                                                 
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-helper_requirements2">
                                                    <?php 
                                                      $array_experience = explode(',', $result['upi_skillsexp']);
                                                   
                                                    ?>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-107" name="upi_skillsexp[]" type="checkbox" value="Baby Care" <?php  if(in_array('Baby Care', $array_experience))echo "checked"; ?>> Baby Care
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-236" name="upi_skillsexp[]" type="checkbox" value="Child Care" <?php  if(in_array('Child Care', $array_experience))echo "checked"; ?>> Child Care
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-237" name="upi_skillsexp[]" type="checkbox" value="Cooking" <?php  if(in_array('Cooking', $array_experience))echo "checked"; ?>> Cooking
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-110" name="upi_skillsexp[]" type="checkbox" value="Elder Care" <?php  if(in_array('Elder Care', $array_experience))echo "checked"; ?>> Elder Care
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-113" name="upi_skillsexp[]" type="checkbox" value="Housekeeping" <?php  if(in_array('Housekeeping', $array_experience))echo "checked"; ?>> Housekeeping
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-112" name="upi_skillsexp[]" type="checkbox" value="Pet Care" <?php  if(in_array('Pet Care', $array_experience))echo "checked"; ?>> Pet Care
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-111" name="upi_skillsexp[]" type="checkbox" value="Professional Driver" <?php  if(in_array('Professional Driver', $array_experience))echo "checked"; ?>> Professional Driver
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-109" nname="upi_skillsexp[]" type="checkbox" value="Teen Care" <?php  if(in_array('Teen Care', $array_experience))echo "checked"; ?>> Teen Care
                                                    </div>
                                                   
                                                 </ul>
                                            </div>

                                             <div class="col-sm-12 padding-top-15">
                                            <label>My Cooking Skills <small><i>Maximum of 4</i></small> </label>
                                                   <ul class="job-manager-term-checklist job-manager-term-checklist-cooking_requirements2">
                                                         <?php 
                                                         $array_cooking = explode(',', $result['upi_cookingskills']);
                                                   
                                                            ?>
                                                        <div class="col-sm-3">
                                                            <input id="in-cooking_requirement2-193" name="upi_cookingskills[]" type="checkbox" value="American"  <?php  if(in_array('American', $array_cooking))echo "checked"; ?>> American
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input id="in-cooking_requirement2-114" name="upi_cookingskills[]" type="checkbox" value="Arabic"  <?php  if(in_array('Arabic', $array_cooking))echo "checked"; ?>> Arabic
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input id="in-cooking_requirement2-115" name="upi_cookingskills[]" type="checkbox" value="Chinese"  <?php  if(in_array('Chinese', $array_cooking))echo "checked"; ?>> Chinese
                                                        </div>
                                                        <div class="col-sm-3">    
                                                            <input id="in-cooking_requirement2-191" name="upi_cookingskills[]" type="checkbox" value="French"  <?php  if(in_array('French', $array_cooking))echo "checked"; ?>> French
                                                        </div>
                                                        <div class="col-sm-3">   
                                                            <input id="in-cooking_requirement2-116" name="upi_cookingskills[]" type="checkbox" value="Indian"  <?php  if(in_array('Indian', $array_cooking))echo "checked"; ?>> Indian
                                                        </div>
                                                        <div class="col-sm-3">   
                                                            <input id="in-cooking_requirement2-192" name="upi_cookingskills[]" type="checkbox" value="Italian"  <?php  if(in_array('Italian', $array_cooking))echo "checked"; ?>> Italian
                                                        </div>
                                                        <div class="col-sm-3">   
                                                            <input id="in-cooking_requirement2-119" name="upi_cookingskills[]" type="checkbox" value="Japanese"  <?php  if(in_array('Japanese', $array_cooking))echo "checked"; ?>> Japanese
                                                        </div>
                                                        <div class="col-sm-3">    
                                                            <input id="in-cooking_requirement2-235" name="upi_cookingskills[]" type="checkbox" value="Thai"  <?php  if(in_array('Thai', $array_cooking))echo "checked"; ?>> Thai
                                                        </div>
                                                        <div class="col-sm-3">   
                                                            <input id="in-cooking_requirement2-117" name="upi_cookingskills[]" type="checkbox" value="Vegeterian"  <?php  if(in_array('Vegeterian', $array_cooking))echo "checked"; ?>> Vegeterian
                                                        </div>
                                                        <div class="col-sm-3">  
                                                            <input id="in-cooking_requirement2-118" name="upi_cookingskills[]" type="checkbox" value="Western"  <?php  if(in_array('Western', $array_experience))echo "checked"; ?>> Western
                                                        </div>
                                                        
                                        </ul> 
                                            </div>
                                             <div class="col-sm-12 padding-top-15">
                                            <label>My Other Skills <small><i>Maximum of 4</i></small></label>

                                                     <?php 
                                                        $array_otherskill = explode(',', $result['upi_otherskills']);
                                                   
                                                    ?>
                                                  <ul class="job-manager-term-checklist job-manager-term-checklist-other_skills2">
                                                    <div class="col-sm-3">
                                                        <input id="in-other_skill2-232" name="upi_otherskills[]" type="checkbox" value="Baking"  <?php  if(in_array('Baking', $array_otherskill))echo "checked"; ?>> Baking
                                                    </div>
                                                    <div class="col-sm-3">    
                                                        <input id="in-other_skill2-126" name="upi_otherskills[]" type="checkbox" value="Car Wash"  <?php  if(in_array('Car Wash', $array_otherskill))echo "checked"; ?>> Car Wash
                                                    </div>
                                                    <div class="col-sm-3">    
                                                        <input id="in-other_skill2-123" name="upi_otherskills[]" type="checkbox" value="Computer"  <?php  if(in_array('Computer', $array_otherskill))echo "checked"; ?>> Computer
                                                    </div>
                                                    <div class="col-sm-3">    
                                                        <input id="in-other_skill2-124" name="upi_otherskills[]" type="checkbox" value="Driving"  <?php  if(in_array('Driving', $array_otherskill))echo "checked"; ?>> Driving
                                                    </div>
                                                    <div class="col-sm-3">    
                                                        <input id="in-other_skill2-190" name="upi_otherskills[]" type="checkbox" value="First Aid Certificate"  <?php  if(in_array('First Aid Certificate', $array_otherskill))echo "checked"; ?>> First Aid Certificate
                                                    </div>
                                                    <div class="col-sm-3">    
                                                        <input id="in-other_skill2-120" name="upi_otherskills[]" type="checkbox" value="Gardening"  <?php  if(in_array('Gardening', $array_otherskill))echo "checked"; ?>> Gardening
                                                    </div>
                                                    <div class="col-sm-3">    
                                                        <input id="in-other_skill2-122" name="upi_otherskills[]" type="checkbox" value="Handyman"  <?php  if(in_array('Handyman', $array_otherskill))echo "checked"; ?>> Handyman
                                                    </div>
                                                    <div class="col-sm-3">   
                                                        <input id="in-other_skill2-125" name="upi_otherskills[]" type="checkbox" value="Housework"  <?php  if(in_array('Housework', $array_otherskill))echo "checked"; ?>> Housework
                                                    </div>
                                                    <div class="col-sm-3">    
                                                        <input id="in-other_skill2-121" name="upi_otherskills[]" type="checkbox" value="Sewing"  <?php  if(in_array('Sewing', $array_otherskill))echo "checked"; ?>> Sewing
                                                    </div>
                                                    <div class="col-sm-3">    
                                                        <input id="in-other_skill2-238" name="upi_otherskills[]" type="checkbox" value="Tutoring"  <?php  if(in_array('Tutoring', $array_otherskill))echo "checked"; ?>> Tutoring
                                                    </div>
                                                   
                                        </ul>
                                            </div>
                                                  <div class="col-sm-12"> 

                                                     <labeL>Start Date *</label>
                                                    <input name="upi_availability" required="" type="date" class="form-control" placeholder="" title="Please input your start date" value="<?php echo $result['upi_availability'] ?>">

                                                   
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
                                                             <option value="Yes" <?php if($result['uq_1']=="Yes")echo "selected"; ?>>Yes</option>
                                                             <option value="No" <?php if($result['uq_1']=="No")echo "selected"; ?>>No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 

                                          <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>2. If your employer asked you to work on your holiday and willing to pay as compensation, are you willing to do so?</strong></label>
                                                           <select name="uq_2" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                         <option value="Yes" <?php if($result['uq_2']=="Yes")echo "selected"; ?>>Yes</option>
                                                             <option value="No" <?php if($result['uq_2']=="No")echo "selected"; ?>>No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                             <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>3. Are you willing to work for a family without your own servant room?</strong></label>
                                                           <select name="uq_3" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                               <option value="Yes" <?php if($result['uq_3']=="Yes")echo "selected"; ?>>Yes</option>
                                                             <option value="No" <?php if($result['uq_3']=="No")echo "selected"; ?>>No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                             <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>4. Are you willing to take care of children no matter how many the family has?</strong></label>
                                                           <select name="uq_4" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                               <option value="Yes" <?php if($result['uq_4']=="Yes")echo "selected"; ?>>Yes</option>
                                                             <option value="No" <?php if($result['uq_4']=="No")echo "selected"; ?>>No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>5. Living with elderly person?</strong></label>
                                                           <select name="uq_5" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                              <option value="Yes" <?php if($result['uq_5']=="Yes")echo "selected"; ?>>Yes</option>
                                                             <option value="No" <?php if($result['uq_5']=="No")echo "selected"; ?>>No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>6. Are you willing to take care of disabled elderly?</strong></label>
                                                           <select name="uq_6" class="form-group">
                                                            <option selected disabled value="">Y/N</option>
                                                              <option value="Yes" <?php if($result['uq_6']=="Yes")echo "selected"; ?>>Yes</option>
                                                             <option value="No" <?php if($result['uq_6']=="No")echo "selected"; ?>>No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>7. Do you got experience to take care of dogs or pets?</strong></label>
                                                           <select name="uq_7" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes" <?php if($result['uq_7']=="Yes")echo "selected"; ?>>Yes</option>
                                                             <option value="No" <?php if($result['uq_7']=="No")echo "selected"; ?>>No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>8. Have you suffered from health problems in your nervous system, eyes, feet, legs or any other parts of your body?</strong></label>
                                                           <select name="uq_8" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes" <?php if($result['uq_8']=="Yes")echo "selected"; ?>>Yes</option>
                                                             <option value="No" <?php if($result['uq_8']=="No")echo "selected"; ?>>No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>9. Can you drive?</strong></label>
                                                           <select name="uq_9" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                             <option value="Yes" <?php if($result['uq_9']=="Yes")echo "selected"; ?>>Yes</option>
                                                             <option value="No" <?php if($result['uq_9']=="No")echo "selected"; ?>>No</option>
                                                           </select>
                                                     </p>
                                                    
                                        </div> 
                                            <div class="col-sm-12">
                                                     <p>
                                                        <label><strong>10. Do you smoke?</strong></label>
                                                           <select name="uq_10" class="form-group">
                                                           <option selected disabled value="">Y/N</option>
                                                          <option value="Yes" <?php if($result['uq_10']=="Yes")echo "selected"; ?>>Yes</option>
                                                             <option value="No" <?php if($result['uq_10']=="No")echo "selected"; ?>>No</option>
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
                                        <input type='submit' class='btn btn-finish btn-primary ' name='finish' value='UPDATE' />
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

<?php  ?>