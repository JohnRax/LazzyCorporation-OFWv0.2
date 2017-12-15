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
        $accomodation=$_POST['j_accomodation'];
        $type=$_POST['j_type'];
        $category=$_POST['j_category'];
        $description=$_POST['j_description'];
        $contact=$_POST['j_contact'];
        $applicationemail=(@$_POST['j_email']);
        $nationality=$_POST['j_nationality'];
        $familytype=$_POST['j_familytype'];
        $startdate=$_POST['j_startdate'];
        $monthlysalary=$_POST['j_monthlysalary'];
        
        $fileName = $_FILES["j_logo"]["name"];
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
        
       $fileTmpLoc = $_FILES["j_logo"]["tmp_name"]; 
       $fileType = $_FILES["j_logo"]["type"]; 
       $fileSize = $_FILES["j_logo"]["size"];
       

        if(empty($newName))
        {
            $newName="default.png";
        }
        else
        {
               
                $kaboom = explode(".", $newName); 
                $fileExt = end($kaboom); 
                echo $fileType;
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
        if($user->post_jobs($id,$newName,$jobtitle,$employertype,$country,$accomodation,$type,$category,$description,$requiredlanguages,$contact,$mainduties,$cookingskill,$applicationemail,$nationality,$familytype,$startdate,$monthlysalary))
            
        {
           
            echo"<script>
                    alert('Complete! Your Job Post is under approval. Thank you');
                </script>";
        }   


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
                                                    <labeL>Job Title *</label>
                                                    <input name="j_jobtitle" type="text" required class="form-control" placeholder="Select Job Title" title="Please input job title" >
                                            
                                                
                                                    <label>Job Description *</label>
                                                        <textarea class="form-control" id="myfield" maxlength='250' minlength="30" name="j_description" placeholder="Tell more about the job. e.g. (Job requirements, Salary, Incentives)" required="" style="font-family: arial; font-size: 12pt; width: 100%; height: 6vw;"></textarea> 
                                                            <i><small><div id='CharCountLabel1'></div></small></i>
                                                <label>Job Category *</label>
                                                        <select  required  name="j_category" class="selectpicker"  title="Select job category">
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
                                               
                                                <label> Employer Type  *</label>
                                                        <select  name="j_employertype" required class="selectpicker"  title="Select employer type">
                                                            <option value="Direct Employer">Direct Employer</option>
                                                            <option value="Agency">Agency</option>
                                                        </select>
                                                
                                                <label>Job Region *</label>
                                                        <select  name="j_country" required class="selectpicker"  title="Select job location">
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
                                                <label>Accomodation *</label>
                                                        <select  name="j_accomodation" required class="selectpicker"  title="Select accomodation">
                                                                <option value="Private Room">
                                                                    Private Room
                                                                </option>
                                                                <option value="Share with Children">
                                                                   Share with Children
                                                                </option>
                                                                <option value="Others">
                                                                    Others
                                                                </option>
                                                                
                                                        </select>
                                                 <label>Job Type *</label>
                                                        <select  name="j_type" required  class="selectpicker"  title="Select job type">
                                                            <option value="Full Time">Full Time</option>
                                                            <option value="Part Time">Part Time</option>
                                                        </select>
                                                  
                                                     
                                                    
                                                    <h3>Family Status</h3>
                                                    <label>Nationality *</label>
                                                        <select required  name="j_nationality" class="selectpicker"  title="Select nationality">
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
                                                        <select class="selectpicker"  name="j_familytype" required="" title="Select family type">
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
                                                    <input id="in-helper_requirement-180" name="j_mainduties[]" type="checkbox" value="Cooking"> Cooking
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-79" name="j_mainduties[]" type="checkbox" value="Housekeeping"> Housekeeping
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-53" name="j_mainduties[]" type="checkbox" value="Pet Care"> Pet Care
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-91" name="j_mainduties[]" type="checkbox" value="Driver">Driver
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-55" name="j_mainduties[]" type="checkbox" value="Disabled">Disabled
                                                </div>
                                        </ul>
                                            </div><br>
                                            <div class="col-sm-12 padding-top-15">
                                                <label>Cooking Skills<small></small></label><br>
                                                <ul class="job-manager-term-checklist job-manager-term-checklist-helper_requirements">
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-57" name="j_cookingskill[]" type="checkbox" value="Filipino"> Filipino
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-57" name="j_cookingskill[]" type="checkbox" value="Arabic"> Arabic
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-56" name="j_cookingskill[]" type="checkbox" value="Chinese"> Chinese
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-54" name="j_cookingskill[]" type="checkbox" value="Indonesian"> Indonesian
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-54" name="j_cookingskill[]" type="checkbox" value="Indian"> Indian
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-180" name="j_cookingskill[]" type="checkbox" value="Japanese"> Japanese
                                                </div>
                                                <div class="col-sm-3">
                                                    <input id="in-helper_requirement-79" name="j_cookingskill[]" type="checkbox" value="Thai"> Thai
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
                                                    <input id="in-candidate_language2-149"  name="j_requiredlanguages[]" type="checkbox" value="Arabic"> Arabic
                                               </div>
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
                                                    <input id="in-candidate_language2-151" name="j_requiredlanguages[]" type="checkbox" value="Thai"> Thai
                                               </div>
                                        </ul>
                                            </div><br>
                                            <div class="form-group">
                                                <label>Application Email  *</label> 
                                                <input class="form-control" required="" title="Please input application email" name="j_email" placeholder="Application Email"  type="email" value="<?php echo $result['u_email']; ?>">
                                            </div>  
                                            <div class="form-group">
                                                    <labeL>Contact Number *</label>
                                                    <input name="j_contact" type="text"  onkeypress="return isNumberKey(event)" title="Please input contact number" required class="form-control" placeholder="Contact" value="<?php echo $result['u_mobile']; ?>">
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