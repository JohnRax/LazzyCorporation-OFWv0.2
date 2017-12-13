
<?php 
require_once 'includes/connection.php';
$show_profile_query="SELECT 
  *,
  DATE_FORMAT(j_dateposted, '%M %d, %Y') AS j_dateposted 
FROM
  job_description 
 where j_status=:status GROUP BY j_id 
ORDER BY rand() LIMIT 10";
$show_profile_stmt=$connection->prepare($show_profile_query);
$show_profile_stmt->execute(array(':status'=>'Approved'));
   ?>
 <style type="text/css">
  table {
    table-layout: fixed;
    word-wrap: break-word;
  }
  
  .onHover{
  cursor: pointer;  
  }
  </style>
  

<!-- property area -->
        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-top: -55px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>Recent Posted Jobs</h2>
                        <p>List of Awesome Job Offers here at <strong>LAZZY WORKS</strong> .</p>
                    </div>
                </div>
       
                <div id="chckSize" class="row">
                    <div class="proerty-th">
            <table class="display table-condensed table dt-responsive responsive-display">
              <?php while($result = $show_profile_stmt->fetch(PDO::FETCH_ASSOC)): 
                  $img = "assets/img/profilepicture/".$result['j_logo'];
                  $name = $result['j_jobtitle'] . " ". $result['j_jobtitle'];
                  $age = $result['j_employertype']; 
                  $address = $result['j_country']; 
                  $nationality = $result['j_mainduties']; 
                  $skillsexp = $result['j_dateposted']; 
                  ?>
                <tr>
                  <td class='onHover col-md-4' title="Click to View Profile" onclick="window.open('print/job.php?id=<?php echo $result['j_id'];  ?>')" class='propertyIMG'>
                   
                   <img  class="img-thumbnail" src="<?php echo $img;?>  " alt="" />
                  </td>
                  <td><a href="print/job.php?id=<?php echo $result['j_id'];  ?>">
                    <div style="color: black">
                    <div><h4><?php echo $name;?></h4></div>
                    <div> <b>Employer Type: </b><?php echo $age;?></div>
                    <div><b>Location: </b><?php echo $address;?></div>
                    <div><b>Job Category: </b><?php echo $nationality;?></div>
                    <div><small><i>Posted: <?php echo $skillsexp;?></i></small></div>
                    </div>
                    </div>
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </table>
                      <div class="box-tree more-proerty text-center">
                          <div class="more-entry overflow">
                              <h5><a >CAN'T FIND Job?  </a></h5>
                              <button onclick="location.href='index-candidate.php?source=searchfindjob'" class="btn border-btn more-black" value="All properties">See more Jobs</button>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>