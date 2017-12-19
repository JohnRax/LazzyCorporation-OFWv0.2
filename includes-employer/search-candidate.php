<br><br><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
      var flag=0;    
      var start=0;
     

                 $.ajax({
                      type: "GET",
                      url:  'includes/candidate.php',
                      data: {"page":1,"start":1},
                      success: function(data){
                        $('#bodycandidate').html(data);
                        flag+=1;
                        start+=10;
                      }
                  });

        $('#show').click(function(){
            var country = $("#address option:selected").val();  
            var gender = $("#gender option:selected").val();
            var nationality = $("#nationality option:selected").val();
            var marital = $("#marital option:selected").val();     
            var education = $("#education option:selected").val();
            var age = $(".span2").val(); 
            var selectedskill = new Array();
            $('input[name="upi_skillsexp"]:checked').each(function() {
                    selectedskill.push(this.value);
            });
            $.ajax({
                  type: "GET",
                  url:  'includes-employer/candidate.php',
                  data: { "page":flag,
                          "start":start,
                          "address":country,
                          "gender":gender,
                          "nationality":nationality,
                          "marital":marital,
                          "education":education,
                          "age":age,
                          "skill":selectedskill},
                  success: function(data){
                    $('#bodycandidate').append(data);
                    flag+=1;
                    start+=10;
                  }
              });

                
          });

         $('#search').click(function(){          
            var country = $("#address option:selected").val();  
            var gender = $("#gender option:selected").val();
            var nationality = $("#nationality option:selected").val();
            var marital = $("#marital option:selected").val();     
            var education = $("#education option:selected").val(); 
            var age = $(".span2").val();
            var selectedskill = new Array();
            $('input[name="upi_skillsexp"]:checked').each(function() {
                    selectedskill.push(this.value);
            });
           

            $.ajax({
                  
                  type: "GET",
                  url:  'includes-employer/candidate.php',
                  data: {"page":1,
                          "start":1,
                          "address":country,
                          "gender":gender,
                          "nationality":nationality,
                          "marital":marital,
                          "education":education,
                          "age":age,
                          "skill":selectedskill},
                  success: function(data){
                     $('#bodycandidate').html(data);
                   
                     flag+=1;
                    start+=10;
                  }
              });

                
          });

                   

    });
    </script>
    
  <script type="text/javascript">
     function refreshPage(){
     location.reload();}
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
                                    <form name="fp" id="fp" action="" method="post" class="form-inline"> 
                                     

                                        <fieldset>
                                            <br>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <select id="address" name="up_address" class="selectpicker"   title="Location">
                                                                    
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

                                                    <select id="gender" name="up_gender" class="selectpicker"  title="Gender">
                                                       <option  value="male">Male</option>
                                                        <option  value="female">Female</option>
                                                    </select>
                                                     <select id="nationality" name="up_nationality" class="selectpicker"  title="Nationality">
                                                         <option  value="Filipino">Filipino</option>
                                                         <option  value="Chinese">Chinese</option>
                                                        <option  value="Vietnamese">Vietnamese</option>
                                                         <option  value="Vietnamese">Vietnamese</option>
                                                    </select>

                                                    <select id="marital" name="up_marital" class="selectpicker"  title="Marital Status">
                                                       <option  value="Married">Married</option>
                                                        <option  value="Single">Single</option>
                                                        <option  value="Divorce">Divorce</option>
                                                        <option  value="Widowed">Widowed</option>
                                                    </select>
                                                    
                                                    <select id="education" name="up_education" class="selectpicker"  title="Education Level">
                                                       <option  value="Elementary">Elementary</option>
                                                        <option  value="Highschool">Highschool</option>
                                                        <option  value="Degree Holder">Degree Holder</option>
                                                    </select>
                                            

                                              <label>Age</label>
                                                <input  type="text" class="span2" value="" data-slider-min="16" data-slider-max="60" data-slider-step="1" data-slider-value="[16,60]" id="property-geo" style="">
                                              </div>
                                                                                 
                                            </div>
                                        </fieldset>  
                                        <label><u>Skills</label>
                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input id="skills" name="upi_skillsexp" type="checkbox" value="Baby Care"> Baby Care</label>
                                                    </div> 
                                                </div>

                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input id="skills" name="upi_skillsexp" type="checkbox" value="Child Care"> Child Care</label>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input id="skills" name="upi_skillsexp" type="checkbox" value="Elder Care"> Elder Care</label>
                                                    </div>
                                                </div> 
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input id="skills" name="upi_skillsexp" type="checkbox" value="Pet Care"> Pet Care </label>
                                                    </div>
                                                </div> 
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                               
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input id="skills" name="upi_skillsexp" type="checkbox" value="Driver"> Driver</label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input id="skills" name="upi_skillsexp" type="checkbox" value="Cooking"> Cooking</label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">


                                               <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label><input id="skills" name="upi_skillsexp" type="checkbox" value="Housekeeping"> Housekeeping </label>
                                                    </div>
                                                </div>  


                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input id="skills" name="upi_skillsexp" type="checkbox" value="Disabled"> Disabled</label>
                                                    </div>
                                                </div>    
                                            </div>

                                         
                                        
                                        </fieldset>



                                                                         
                                    </form>

                                </div>
                        </div>


                        <div class="col-md-12"> 
                            <button id="search" class="btn btn-default">SEARCH</button>  
                            <button id="clear" class="btn btn-default" onclick="refreshPage()">CLEAR</button>  
                         </div>       
                       
                    </div>      
                </div>
                        
                        <div class="col-md-9 "> 
                        <div id="bodycandidate" class="col-md-9">
                        

                        </div>
                            <div class="col-md-12">  
                                 <button id="show" class="navbar-btn nav-button wow  login">SHOW MORE CANDIDATE</button>
                            </div>
                  
                        </div>
                    </div>
                    
                      
                </div>  
                </div>              
            </div>
        </div>

