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


        $ac_fname=$_POST['ac_fname'];
        $ac_lname=$_POST['ac_lname'];
        $ac_gender=$_POST['ac_gender'];
        $ac_id=$user->post_agency_candidate($_SESSION['user_session'],$ac_lname,$ac_fname,$ac_gender);
        
        //personal Info

        if( isset($_POST['up_languages']) && !empty($_POST['up_languages']) ) 
        { 
            $languages = implode(',', $_POST['up_languages']);
        }
        else
        {
            $languages="none";        
        }
        $id=$ac_id;
        $category=$_POST['up_category'];
        $email=(@$_POST['up_email']);
        $mobile=$_POST['up_mobile'];
        $telephone=$_POST['up_telephone'];
        $nationality=$_POST['up_nationality'];
        $address=$_POST['up_address'];
        $age=$_POST['up_age'];
        $religion=$_POST['up_religion'];
        $education=$_POST['up_education'];
        $marital=$_POST['up_maritalstatus'];
        
        $fileName = $_FILES["up_picture"]["name"];
       $filename_parts = explode('.',$fileName);
       $count = count($filename_parts);
        if($count> 1) {
            $ext = $filename_parts[$count-1];
            unset($filename_parts[$count-1]);
            $filename_to_md5 =  implode('.',$filename_parts);
            $newName = md5($filename_to_md5). '.' . $ext ;
        } else {
            $newName = md5($fileName);
        }        
        
       $fileTmpLoc = $_FILES["up_picture"]["tmp_name"]; 
       $fileType = $_FILES["up_picture"]["type"]; 
       $fileSize = $_FILES["up_picture"]["size"];
       $fileErrorMsg = $_FILES["up_picture"]["error"]; 
       


        if(empty($newName))
        {
            $newName="default.png";
        }
        else
        {     
               
                $kaboom = explode(".", $newName); 
                $fileExt = end($kaboom); 
                $resized_file = "assets/img/profilepicture/$newName";
                $wmax = 225;
                $hmax = 225;   
               list($w_orig, $h_orig) = getimagesize($fileTmpLoc);                   
                if ($fileType == "gif"){ 
                  $img = imagecreatefromgif($fileTmpLoc);
                } else if($fileType =="image/png" || $fileType=="image/PNG"){ 
                  $img = imagecreatefrompng($fileTmpLoc);
                } else { 
                  $img = imagecreatefromjpeg($fileTmpLoc);
                }
                $tci = imagecreatetruecolor($wmax, $hmax);
                // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
                imagecopyresampled($tci, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig);
                imagejpeg($tci, $resized_file, 80);
                
        }
        $user->post_profile_personal_information($id,$newName,$category,$email,$address,$mobile,$telephone,$nationality,$religion,$age,$marital,$education,$languages);



        $jd=$_POST['ue_jd'];
        $jdlocation=$_POST['ue_jdlocation'];
        $from=$_POST['ue_from'];
        $to=$_POST['ue_to'];
        $user->post_profile_work_experience($id,$jd,$jdlocation,$from,$to);


        //work Experience
        $jd=$_POST['ue_jd'];
        $jdlocation=$_POST['ue_jdlocation'];
        $from=$_POST['ue_from'];
        $to=$_POST['ue_to'];
        
        $user->post_profile_work_experience($id,$jd,$jdlocation,$from,$to);




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
        $user->post_profile_professional_information($id,$preferedworklocation,$skillsexp,$cookingskills,$otherskills);



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
        if($user->post_profile_supplementary_question($id,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$q10))
        {
         
            echo"<script>
                    alert('Complete! Thank you');
                    location.href = 'index-employer.php?source=addnew';
                </script>";
        }
        //Supplementary Questions
        
    }
     $show_contact_query="SELECT 
                              *
                            FROM
                             user
                            WHERE u_id = :id ";
    $show_contact_stmt=$connection->prepare($show_contact_query);
    $show_contact_stmt->execute(array(':id'=>$_SESSION['user_session']));
    $result = $show_contact_stmt->fetch(PDO::FETCH_ASSOC);

   
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
                                                        <input type="file" id="wizard-picture" name="up_picture">
                                                    </div> 
                                                </div>

                                               <h3 class="info-text"> Personal Information </h3>

                                                <label>Resume Category *</label>
                                                    <select required class="selectpicker"  title="Select your resume category" name="up_category" >
                                                        
                                                        <option value="Driver">Driver</option>
                                                        <option value="Helper">Helper</option>
                                                        
                                                    </select>
                                                <div class="form-group">
                                                    <labeL>First Name *</label>
                                                    <input name="ac_fname"  required type="text" class="form-control" placeholder="First Name" title="Please input your first name">

                                                </div>
                                                <div class="form-group">
                                                    <labeL>Last Name *</label>
                                                    <input name="ac_lname"  required type="text" class="form-control" placeholder="Last Name" title="Please input your last name">

                                                </div>

                                                <div class="form-group">
                                                    <labeL>Email address <small><i>Optional</i></small></label>
                                                    <input name="up_email"  type="email" class="form-control" placeholder="Email address" title="Please input your email address" value="<?php echo $result['u_email']; ?>">

                                                </div>
                                                <div class="form-group">
                                                    <labeL>Mobile number *</label>
                                                    <input name="up_mobile"  required type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Mobile number" title="Please input your mobile number" value="<?php echo $result['u_mobile']; ?>">
                                                </div>
                                                <label>Gender  *</label>
                                                        <select name="ac_gender" required class="selectpicker"  title="Please select your gender">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                   <!-- <div class="form-group">
                                                    <labeL>Telephone number <small><i>Optional</i></small> </label>
                                                    <input name="up_telephone" onkeypress="return isNumberKey(event)" type="text" class="form-control" placeholder="Telephone number">
                                                </div> -->
                                                <label>Nationality  *</label>
                                                        <select name="up_nationality" required class="selectpicker"  title="Please select your nationality">
                                                            
                                                            <option value="Filipino">Filipino</option>
                                                            <option value="Chinese">Chinese</option>
                                                            <option value="Hongkongese">Hongkongese</option>
                                                            <option value="Indian">Indian</option>
                                                            <option value="Indonesian">Indonesian</option>
                                                            <option value="Sri Lankan">Sri Lankan</option>
                                                            <option value="Thai">Thai</option>
                                                        </select>

                                                <label>Location  *</label>
                                                        <select name="up_address" class="selectpicker" required  title="Please select your location">

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
                                                <div class="form-group">
                                                    <labeL>Age *</label>
                                                    <input name="up_age" onkeypress="return isNumberKey(event)" type="text" class="form-control" maxlength="3" required placeholder="Age" title="Please input your age">
                                                </div>

                                            
                                                <div class="form-group">
                                                     <labeL>Marital Status *</label>
                                                        <select name="up_maritalstatus" class="selectpicker" required  title="Please select your marital status">
                                                            
                                                            <option  value="Single">Single</option>
                                                            <option  value="Married">Married</option>
                                                            <option  value="Divorced">Divorced</option>
                                                            <option  value="Widowed">Widowed</option>
                                                           
                                                        </select>
                                                </div>
                                                   <div class="form-group">
                                                     <labeL>Religion *</label>
                                                        <select name="up_religion" class="selectpicker" required  title="Please select your religion">
                                                            
                                                            <option  value="Roman Catholic">Roman Catholic</option>
                                                            <option  value="Muslim">Muslim</option>
                                                            <option  value="Born Again Christian">Born Again Christian</option>
                                                            <option  value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                                                            <option  value="Baptist">Baptist</option>
                                                           
                                                        </select>
                                                    </div>
                                                     <div class="form-group">
                                                     <labeL>Highest Education Attainment *</label>
                                                        <select name="up_education" class="selectpicker" required  title="Please select your highest educational attainment">
                                                            
                                                            <option  value="Elementary">Elementary</option>
                                                            <option  value="High School">High School</option>
                                                            <option  value="College">College</option>
                                                           
                                                        </select>
                                                    </div>

                                                
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Languages Spoken *</label>
                                            </div>
                                                  

                                                <ul class="job-manager-term-checklist job-manager-term-checklist-candidate_languages">
                                                    <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="Arabic"> Arabic
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="Cantonese"> Cantonese
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="English"> English
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="Filipino"> Filipino
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input name="up_languages[]" type="checkbox" value="Indonesian"> Indonesian
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input  name="up_languages[]" type="checkbox" value="Japanese"> Japanese
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input name="up_languages[]" type="checkbox" value="Mandarin"> Mandarin
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input name="up_languages[]" type="checkbox" value="Thai"> Thai
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
                                                        <select name="upi_preferedworklocation" required="" class="selectpicker"  title="Please select your prefered location">
                                                            
                                                            <option class="form-control" selected disabled value="">Select Country</option>
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
                                                <option Option disabled>_______________________________________________</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antartica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo">Congo, the Democratic Republic of the</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                <option value="Croatia">Croatia (Hrvatska)</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="France Metropolitan">France, Metropolitan</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                                <option value="Holy See">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran (Islamic Republic of)</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="South Korea">South Korea</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia">Micronesia, Federated States of</option>
                                                <option value="Moldova">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="North Korea">South Korea</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                                <option value="Saint LUCIA">Saint LUCIA</option>
                                                <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                                <option value="Span">Spain</option>
                                                <option value="SriLanka">Sri Lanka</option>
                                                <option value="St. Helena">St. Helena</option>
                                                <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syrian Arab Republic</option>
                                                <option value="Taiwan">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Viet Nam</option>
                                                <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Yugoslavia">Yugoslavia</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>       
                               
                                                        </select>
                                                </div>      
                                            <div class="col-sm-12 padding-top-15">
                                            <label>My Skills and Experience <small><i>Maximum of 4</i></small></label>
                                                 
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-helper_requirements2">

                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-107" name="upi_skillsexp[]" type="checkbox" value="Baby Care"> Baby Care
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-236" name="upi_skillsexp[]" type="checkbox" value="Child Care"> Child Care
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
                                                        <input id="in-helper_requirement2-112" name="upi_skillsexp[]" type="checkbox" value="Pet Care"> Pet Care
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-111" name="upi_skillsexp[]" type="checkbox" value="Driver">Driver
                                                    </div>
                                                     <div class="col-sm-3">
                                                        <input id="in-helper_requirement2-109" name="upi_skillsexp[]" type="checkbox" value="Disabled"> Disabled
                                                    </div>
                                                   
                                                 </ul>
                                            </div>

                                             <div class="col-sm-12 padding-top-15">
                                            <label>My Cooking Skills <small><i>Maximum of 4</i></small> </label>
                                                   <ul class="job-manager-term-checklist job-manager-term-checklist-cooking_requirements2">

                                                       <div class="col-sm-3">
                                                            <input id="in-cooking_requirement2-114" name="upi_cookingskills[]" type="checkbox" value="Filipino"> Filipino
                                                        </div>
                                                        
                                                        <div class="col-sm-3">
                                                            <input id="in-cooking_requirement2-114" name="upi_cookingskills[]" type="checkbox" value="Arabic"> Arabic
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input id="in-cooking_requirement2-115" name="upi_cookingskills[]" type="checkbox" value="Chinese"> Chinese
                                                        </div>
                                                         <div class="col-sm-3">
                                                            <input id="in-cooking_requirement2-114" name="upi_cookingskills[]" type="checkbox" value="Indonesian"> Indonesian
                                                        </div>
                                                        
                                                        <div class="col-sm-3">   
                                                            <input id="in-cooking_requirement2-116" name="upi_cookingskills[]" type="checkbox" value="Indian"> Indian
                                                        </div>
                                                        
                                                        <div class="col-sm-3">   
                                                            <input id="in-cooking_requirement2-119" name="upi_cookingskills[]" type="checkbox" value="Japanese"> Japanese
                                                        </div>
                                                        <div class="col-sm-3">    
                                                            <input id="in-cooking_requirement2-235" name="upi_cookingskills[]" type="checkbox" value="Thai"> Thai
                                                        </div>
                                                        <div class="col-sm-3">  
                                                            <input id="in-cooking_requirement2-118" name="upi_cookingskills[]" type="checkbox" value="Western"> Western
                                                        </div>
                                                        
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
                                                    </div>
                                                   
                                        </ul>
                                            </div>
                                            <br>
                                            <h3>Work Experience</h3>
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                    <label>Job Description <small><i>Optional</i></small> </label> <input class="form-control" name="ue_jd" placeholder="Job Description"   type="text">

                                                    <label>Location <small><i>Optional</i></small></label> <input class="form-control" name="ue_jdlocation" placeholder="Work Location"   type="text">

                                                    <label>From (Year) <small><i>Optional</i></small></label> <input class="form-control"  name="ue_from" placeholder="From"  type="month">

                                                     <label>To (Year) <small><i>Optional</i></small></label> <input class="form-control"  name="ue_to" placeholder="To"  type="month">
                                                </div>
                                                
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
                                                        <label><strong>10. Are you wiling to work with other person?</strong></label>
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
                                                            <input type="checkbox" required /> <strong>Accept terms and conditions.</strong>
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