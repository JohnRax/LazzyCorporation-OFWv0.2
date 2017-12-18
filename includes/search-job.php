<br><br><br><br>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
      var flag=0;    
      var start=0;
    
                 $.ajax({
                      type: "GET",
                      url:  'includes/job.php',
                      data: {"page":1,"start":1},
                      success: function(data){
                        $('#bodycandidate').html(data);
                        flag+=1;
                        start+=10;
                      }
                  });

        $('#show').click(function(){
            var country = $("#country option:selected").val();  
            var employertype = $("#employertype option:selected").val();  
            var selectedskill = new Array();
            $('input[name="upi_skillsexp"]:checked').each(function() {
                    selectedskill.push(this.value);
            });
            $.ajax({
                  type: "GET",
                  url:  'includes/job.php',
                  data: { "page":flag,
                          "start":start,
                          "country":country,
                          "employertype":employertype,
                          "skill":selectedskill
                         },
                  success: function(data){
                    $('#bodycandidate').append(data);
                    flag+=1;
                    start+=10;
                  }
              });

                
          });

         $('#search').click(function(){          
            var country = $("#country option:selected").val();  
            var employertype = $("#employertype option:selected").val();  
            var selectedskill = new Array();
            $('input[name="skills"]:checked').each(function() {
                    selectedskill.push(this.value);
            });    
            $.ajax({
                  
                  type: "GET",
                  url:  'includes/job.php',
                  data: {"page":1,
                          "start":1,
                          "country":country,
                          "employertype":employertype,
                          "skill":selectedskill
                         },
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
                     
                <div class="col-md-3  padding-top-40">
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
                                                <select id="country" name="country" class="selectpicker" title="Location">
                                                              
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
                                                  <select id="employertype" name="employertype" id="lunchBegins" class="selectpicker" title="Employer Type">
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
                                                    <label> <input name="skills" type="checkbox" value="Baby Care"> Baby Care</label>
                                                </div> 
                                            </div>

                                            <div class="col-xs-6">
                                                <div class="checkbox">
                                                    <label> <input name="skills" type="checkbox" value="Child Care"> Child Care</label>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </fieldset>
                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input name="skills" type="checkbox" value="Elder Care"> Elder Care</label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label>  <input  name="skills" type="checkbox" value="Pet Care"> Pet Care </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label><input name="skills" type="checkbox" value="Cooking"> Cooking </label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input name="skills" type="checkbox" value="Professional Driver"> Driver</label>
                                                </div>
                                            </div>  
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label>  <input  name="skills" type="checkbox" value="Housekeeping">  Housekeeping</label>
                                                </div>
                                            </div>  
                                            <div class="col-xs-6"> 
                                                <div class="checkbox">
                                                    <label> <input  name="skills" type="checkbox" value="Disabled Person"> Disabled </label>
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
 </div>
        