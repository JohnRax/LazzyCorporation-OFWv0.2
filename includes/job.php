 <div id="chckSize" class="row">
                    <div class="proerty-th">
            <table class="display table-condensed table dt-responsive responsive-display">
              <?php while($result1 = $show_job_stmt->fetch(PDO::FETCH_ASSOC)): 
                  $img1 = "assets/img/profilepicture/".$result1['j_logo'];
                  $jobtitle=$result1['j_jobtitle'];
                  $employertype=$result1['j_employertype'];
                  $location=$result1['j_country'];
                  $jobcategory=$result1['j_category'];
                  $posted=$result1['j_dateposted'];
                  ?>
                <tr>
                  <td class='onHover col-md-4' title="Click to View Profile" onclick="window.open('includes/job-page.php?id=<?php echo $result1['j_id'];  ?>')" class='propertyIMG'>
                   
                   <img  class="img-thumbnail" src="<?php echo $img1;?>  " alt="" />
                  </td>
                  <td><a href="includes/job-page.php?id=<?php echo $result1['j_id'];  ?>"></a>
                    <div style="color: black">
                    <div><h3><?php echo $jobtitle;?></h3></div>
                    <div><b>Employer Type: </b><?php echo $employertype;?></div>
                    <div><b>Location: </b><?php echo $location;?></div>
                    <div><b >Job Category: </b><?php echo $jobcategory;?></div>
                    <div><small><i>Posted: <?php echo $posted;?></i></small></div>
                    </div>
                    
                  </td>
                </tr>
              <?php endwhile; ?>
            </table>
                      