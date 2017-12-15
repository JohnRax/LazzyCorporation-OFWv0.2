<?php include "header.php"; ?>
<?php include "navigation.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
      var flag=1;       
        $("#show").click(function(){
             
                $.ajax({
                      type: "GET",
                      url:  'candidate.php',
                      data: {"page":flag},
                      success: function(data){
                        $('#bodycandidate').append(data);
                        flag+=1;
                      }
                  });alert("The paragraph was clicked.");
          });
    });


</script>

   <div id="bodycandidate" class="col-md-9">
                           
                         

                                            
   </div>

<button id="show" class="navbar-btn nav-button wow  login">SHOW MORE CANDIDATE</button>

<?php include "footer.php"; ?>